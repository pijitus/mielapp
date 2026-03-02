<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $mail = new PHPMailer(true);

    try {
        // --- CONFIGURACIÓN SMTP (Igual que antes) ---
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'intranethml@gmail.com'; 
        $mail->Password   = 'gunc tbsf ageq qcgq'; // Contraseña de aplicación generada en Gmail
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;
        $mail->CharSet    = 'UTF-8';

        // --- 1. ENVÍO PARA TI (Notificación de Venta) ---
        $mail->setFrom('intranethml@gmail.com', 'Web Honey Export');
        $mail->addAddress('intranethml@gmail.com'); 
        
        $mail->isHTML(true);
        $mail->Subject = 'NUEVA CONSULTA B2B: ' . $_POST['company'];
        $mail->Body    = "<h3>Nueva consulta desde la web</h3>
                          <p><strong>Empresa:</strong> {$_POST['company']}</p>
                          <p><strong>Email:</strong> {$_POST['email']}</p>
                          <p><strong>Mensaje:</strong> {$_POST['message']}</p>";

        $mail->send();

        // --- 2. ENVÍO PARA EL CLIENTE (Respuesta Automática) ---
        $mail->clearAddresses(); // Limpiamos el destinatario anterior
        $mail->addAddress($_POST['email']); // Enviamos al correo que el cliente puso en el form
        
        $mail->Subject = 'Contacto/Contact - MielApp Honey Argentina';
        
        // Redacción profesional bilingüe (recomendado para exportación)
        $mail->Body = "
            <div style='font-family: sans-serif; color: #333; line-height: 1.6;'>
                <h2 style='color: #F59E0B;'>Thank you for contacting us.</h2>
                <p>Estimado/a representante de <strong>{$_POST['company']}</strong>,</p>
                
                <p>Hemos recibido correctamente su consulta a través de nuestro sitio web. Nuestro equipo de exportación está revisando sus requerimientos y nos pondremos en contacto con usted a la brevedad posible para brindarle una propuesta comercial detallada.</p>
                
                <hr style='border: none; border-top: 1px solid #eee; margin: 20px 0;'>
                
                <p><em>Dear representative of <strong>{$_POST['company']}</strong>,</em></p>
                <p><em>We have successfully received your inquiry through our website. Our export team is currently reviewing your requirements, and we will get back to you shortly with a detailed commercial proposal.</em></p>
                
                <br>
                <p>Atentamente / Best regards,</p>
                <p><strong>Export Department</strong><br>
                MielApp | Argentine Premium Honey<br>
                <small>Lincoln, Buenos Aires, Argentina</small></p>
            </div>
        ";

        $mail->send();
        echo json_encode(['status' => 'success']);

    } catch (Exception $e) {
        echo json_encode(['status' => 'error', 'message' => $mail->ErrorInfo]);
    }
}
?>