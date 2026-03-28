<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require __DIR__ . '/PHPMailer/src/Exception.php';
require __DIR__ . '/PHPMailer/src/PHPMailer.php';
require __DIR__ . '/PHPMailer/src/SMTP.php';

header('Content-Type: application/json; charset=UTF-8');

function jsonResponse(int $statusCode, array $payload): void
{
    http_response_code($statusCode);
    echo json_encode($payload, JSON_UNESCAPED_UNICODE);
    exit;
}

function envValue(string $key, string $default = ''): string
{
    static $fileEnv = null;

    if ($fileEnv === null) {
        $fileEnv = [];
        $envPath = __DIR__ . '/.env';
        if (is_readable($envPath)) {
            $lines = file($envPath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
            if (is_array($lines)) {
                foreach ($lines as $line) {
                    $trimmed = trim($line);
                    if ($trimmed === '' || str_starts_with($trimmed, '#') || strpos($trimmed, '=') === false) {
                        continue;
                    }
                    [$envKey, $envValue] = array_map('trim', explode('=', $trimmed, 2));
                    $fileEnv[$envKey] = trim($envValue, "\"'");
                }
            }
        }
    }

    $value = getenv($key);
    if ($value !== false) {
        return trim($value);
    }

    if (array_key_exists($key, $fileEnv)) {
        return $fileEnv[$key];
    }

    return $default;
}

function cleanText(string $value, int $maxLen = 500): string
{
    $normalized = trim(preg_replace('/\s+/', ' ', $value));
    $safe = strip_tags($normalized);
    return mb_substr($safe, 0, $maxLen);
}

function isValidHostOrigin(?string $headerValue): bool
{
    if (!$headerValue) {
        return true;
    }

    $originHost = parse_url($headerValue, PHP_URL_HOST);
    $serverHost = $_SERVER['HTTP_HOST'] ?? '';
    if (!is_string($originHost) || $originHost === '' || $serverHost === '') {
        return false;
    }

    return strcasecmp($originHost, $serverHost) === 0;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    jsonResponse(405, ['status' => 'error', 'message' => 'Método no permitido']);
}

$contentType = $_SERVER['CONTENT_TYPE'] ?? '';
if ($contentType === '' || stripos($contentType, 'multipart/form-data') === false) {
    jsonResponse(415, ['status' => 'error', 'message' => 'Tipo de contenido no soportado']);
}

$origin = $_SERVER['HTTP_ORIGIN'] ?? null;
$referer = $_SERVER['HTTP_REFERER'] ?? null;
if (!isValidHostOrigin($origin) || !isValidHostOrigin($referer)) {
    jsonResponse(403, ['status' => 'error', 'message' => 'Origen inválido']);
}

$honeypot = trim($_POST['_gotcha'] ?? '');
if ($honeypot !== '') {
    jsonResponse(200, ['status' => 'success']);
}

$submittedAt = isset($_POST['_ts']) ? (int) $_POST['_ts'] : 0;
$nowMs = (int) round(microtime(true) * 1000);
if ($submittedAt <= 0 || ($nowMs - $submittedAt) < 3000) {
    jsonResponse(400, ['status' => 'error', 'message' => 'Solicitud inválida']);
}

$ipAddress = $_SERVER['REMOTE_ADDR'] ?? 'unknown';
$rateLimitFile = sys_get_temp_dir() . '/mielapp_rate_' . md5($ipAddress) . '.json';
$rateLimitWindow = 60;
$maxRequestsPerWindow = 4;

if (is_readable($rateLimitFile)) {
    $rateData = json_decode((string) file_get_contents($rateLimitFile), true);
    if (is_array($rateData)) {
        $windowStart = (int) ($rateData['windowStart'] ?? time());
        $count = (int) ($rateData['count'] ?? 0);
        if ((time() - $windowStart) <= $rateLimitWindow && $count >= $maxRequestsPerWindow) {
            jsonResponse(429, ['status' => 'error', 'message' => 'Demasiadas solicitudes. Intente nuevamente en unos minutos.']);
        }
    }
}

$company = cleanText((string) ($_POST['company'] ?? ''), 120);
$email = trim((string) ($_POST['email'] ?? ''));
$country = cleanText((string) ($_POST['country'] ?? ''), 80);
$service = cleanText((string) ($_POST['service'] ?? ''), 80);
$message = cleanText((string) ($_POST['message'] ?? ''), 2000);

if ($company === '' || $email === '' || $message === '') {
    jsonResponse(422, ['status' => 'error', 'message' => 'Complete los campos obligatorios.']);
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    jsonResponse(422, ['status' => 'error', 'message' => 'Ingrese un email válido.']);
}

if (preg_match('/[\r\n]/', $email)) {
    jsonResponse(422, ['status' => 'error', 'message' => 'Email inválido.']);
}

if (mb_strlen($company) < 2 || mb_strlen($company) > 120) {
    jsonResponse(422, ['status' => 'error', 'message' => 'Nombre de empresa inválido.']);
}

if ($country !== '' && !preg_match('/^[\p{L}\p{N} .,\-]{2,80}$/u', $country)) {
    jsonResponse(422, ['status' => 'error', 'message' => 'País inválido.']);
}

$allowedServices = ['Bulk', 'Retail', 'PrivateLabel'];
if (!in_array($service, $allowedServices, true)) {
    jsonResponse(422, ['status' => 'error', 'message' => 'Servicio inválido.']);
}

if (mb_strlen($message) < 10 || mb_strlen($message) > 2000) {
    jsonResponse(422, ['status' => 'error', 'message' => 'El mensaje debe tener entre 10 y 2000 caracteres.']);
}

$smtpHost = envValue('MAIL_HOST', 'smtp.gmail.com');
$smtpPort = (int) envValue('MAIL_PORT', '587');
$smtpUser = envValue('MAIL_USERNAME');
$smtpPass = envValue('MAIL_PASSWORD');
$smtpEncryption = strtolower(envValue('MAIL_ENCRYPTION', 'tls'));
$mailFrom = envValue('MAIL_FROM', $smtpUser);
$mailFromName = envValue('MAIL_FROM_NAME', 'Web Honey Export');
$mailTo = envValue('MAIL_TO', $smtpUser);

if ($smtpUser === '' || $smtpPass === '' || $mailFrom === '' || $mailTo === '') {
    jsonResponse(500, ['status' => 'error', 'message' => 'Configuración de correo incompleta en el servidor.']);
}

$securityMap = [
    'tls' => PHPMailer::ENCRYPTION_STARTTLS,
    'ssl' => PHPMailer::ENCRYPTION_SMTPS,
];
$smtpSecure = $securityMap[$smtpEncryption] ?? PHPMailer::ENCRYPTION_STARTTLS;

$companyEsc = htmlspecialchars($company, ENT_QUOTES, 'UTF-8');
$emailEsc = htmlspecialchars($email, ENT_QUOTES, 'UTF-8');
$countryEsc = htmlspecialchars($country, ENT_QUOTES, 'UTF-8');
$serviceEsc = htmlspecialchars($service, ENT_QUOTES, 'UTF-8');
$messageEsc = nl2br(htmlspecialchars($message, ENT_QUOTES, 'UTF-8'));

try {
    $mail = new PHPMailer(true);

    $mail->isSMTP();
    $mail->Host = $smtpHost;
    $mail->SMTPAuth = true;
    $mail->Username = $smtpUser;
    $mail->Password = $smtpPass;
    $mail->SMTPSecure = $smtpSecure;
    $mail->Port = $smtpPort;
    $mail->CharSet = 'UTF-8';
    $mail->setLanguage('es');

    $mail->setFrom($mailFrom, $mailFromName);
    $mail->addAddress($mailTo);
    $mail->addReplyTo($email, $company);
    $mail->isHTML(true);
    $mail->Subject = 'NUEVA CONSULTA B2B: ' . $company;
    $mail->Body = "<h3>Nueva consulta desde la web</h3>
        <p><strong>Empresa:</strong> {$companyEsc}</p>
        <p><strong>Email:</strong> {$emailEsc}</p>
        <p><strong>País:</strong> {$countryEsc}</p>
        <p><strong>Servicio:</strong> {$serviceEsc}</p>
        <p><strong>Mensaje:</strong><br>{$messageEsc}</p>";
    $mail->AltBody = "Nueva consulta desde la web\n"
        . "Empresa: {$company}\n"
        . "Email: {$email}\n"
        . "País: {$country}\n"
        . "Servicio: {$service}\n"
        . "Mensaje: {$message}";

    $mail->send();

    $mail->clearAddresses();
    $mail->clearReplyTos();
    $mail->addAddress($email);
    $mail->Subject = 'Contacto/Contact - MielApp Honey Argentina';
    $mail->Body = "
        <div style='font-family: sans-serif; color: #333; line-height: 1.6;'>
            <h2 style='color: #F59E0B;'>Thank you for contacting us.</h2>
            <p>Estimado/a representante de <strong>{$companyEsc}</strong>,</p>
            <p>Hemos recibido correctamente su consulta. Nuestro equipo de exportación está revisando sus requerimientos y se pondrá en contacto a la brevedad.</p>
            <hr style='border: none; border-top: 1px solid #eee; margin: 20px 0;'>
            <p><em>Dear representative of <strong>{$companyEsc}</strong>,</em></p>
            <p><em>We have successfully received your inquiry. Our export team is reviewing your requirements and will contact you shortly.</em></p>
            <p>Atentamente / Best regards,<br><strong>Export Department</strong><br>MielApp | Argentine Premium Honey</p>
        </div>
    ";
    $mail->AltBody = "Thank you for contacting us. We received your inquiry and will contact you shortly.";

    $mail->send();

    $rateData = ['windowStart' => time(), 'count' => 1];
    if (is_readable($rateLimitFile)) {
        $previousData = json_decode((string) file_get_contents($rateLimitFile), true);
        if (is_array($previousData) && (time() - (int) ($previousData['windowStart'] ?? 0)) <= $rateLimitWindow) {
            $rateData['windowStart'] = (int) $previousData['windowStart'];
            $rateData['count'] = ((int) ($previousData['count'] ?? 0)) + 1;
        }
    }

    @file_put_contents($rateLimitFile, json_encode($rateData));
    jsonResponse(200, ['status' => 'success']);
} catch (Exception $e) {
    jsonResponse(500, ['status' => 'error', 'message' => 'No se pudo enviar el mensaje en este momento.']);
}
?>