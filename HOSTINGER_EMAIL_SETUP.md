# Configuración SMTP en Hostinger (MielApp)

## 1) Crear el archivo `.env`
1. En el root del sitio (`public_html` o carpeta del proyecto), crea un archivo llamado `.env`.
2. Copia uno de estos bloques (recomendado TLS 587).
3. Si prefieres una base ya preparada, usa el archivo `.env.hostinger.ready` de este proyecto y reemplaza placeholders.

### Modo pre-dominio (temporal)
Si aún no tienes dominio final, puedes probar con la URL temporal/subdominio de Hostinger y una casilla de correo ya creada en hPanel.

```env
MAIL_HOST=smtp.hostinger.com
MAIL_PORT=587
MAIL_USERNAME=contacto@subdominio-temporal.tld
MAIL_PASSWORD=TU_PASSWORD_REAL
MAIL_ENCRYPTION=tls
MAIL_FROM=contacto@subdominio-temporal.tld
MAIL_FROM_NAME=MielApp Web
MAIL_TO=ventas@subdominio-temporal.tld
```

Notas:
- `subdominio-temporal.tld` es un placeholder. Usa la casilla real creada en Hostinger.
- El formulario funciona igual sin dominio final; la validación toma el host actual de la web.

### Opción recomendada (TLS - puerto 587)
```env
MAIL_HOST=smtp.hostinger.com
MAIL_PORT=587
MAIL_USERNAME=contacto@tudominio.com
MAIL_PASSWORD=TU_PASSWORD_REAL
MAIL_ENCRYPTION=tls
MAIL_FROM=contacto@tudominio.com
MAIL_FROM_NAME=MielApp Web
MAIL_TO=ventas@tudominio.com
```

### Opción alternativa (SSL - puerto 465)
```env
MAIL_HOST=smtp.hostinger.com
MAIL_PORT=465
MAIL_USERNAME=contacto@tudominio.com
MAIL_PASSWORD=TU_PASSWORD_REAL
MAIL_ENCRYPTION=ssl
MAIL_FROM=contacto@tudominio.com
MAIL_FROM_NAME=MielApp Web
MAIL_TO=ventas@tudominio.com
```

## 2) Qué poner en cada variable
- `MAIL_USERNAME`: cuenta de correo creada en Hostinger (ej: contacto@tudominio.com).
- `MAIL_PASSWORD`: contraseña de esa cuenta.
- `MAIL_FROM`: normalmente igual a `MAIL_USERNAME`.
- `MAIL_TO`: cuenta interna que recibirá las consultas (ventas/comercial).

## 3) Verificar datos SMTP en Hostinger
En hPanel: **Emails → Manage → (cuenta) → Configure Devices**.
Ahí verás host, puertos y cifrado exactos de tu plan.

## 4) Prueba funcional rápida
1. Abre la web en HTTPS.
2. Envía formulario con datos válidos.
3. Confirma:
   - llega mail interno a `MAIL_TO`,
   - llega autorespuesta al cliente,
   - no hay error JSON en frontend.

## 5) Si no envía
- Prueba cambiar TLS 587 ↔ SSL 465.
- Revisa usuario/contraseña de la casilla.
- Verifica que la casilla existe y tiene cuota disponible.
- Revisa carpeta spam del destinatario.

## 6) Seguridad
- No subas `.env` a git.
- Mantén `.htaccess` activo (ya protege `.env`).
- Cambia password si fue compartido por error.

## 7) Migración al dominio final (2 minutos)
1. Edita `.env` y reemplaza:
   - `MAIL_USERNAME`
   - `MAIL_FROM`
   - `MAIL_TO`
2. Verifica la casilla final en hPanel (usuario, password, puertos).
3. Prueba envío de formulario (interno + autorespuesta).
4. Si cambiaste imagen o URL pública, limpia caché de OG en redes sociales.
