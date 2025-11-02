<?php
require_once 'includes/config.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['success' => false, 'message' => 'Método no permitido']);
    exit;
}

// Validar y limpiar datos
$nombre = filter_input(INPUT_POST, 'nombre', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$mensaje = filter_input(INPUT_POST, 'mensaje', FILTER_SANITIZE_STRING);

if (!$nombre || !$email || !$mensaje) {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'Todos los campos son requeridos']);
    exit;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'Email no válido']);
    exit;
}

// Configurar el correo
$to = 'adrianroalca06@gmail.com';
$subject = 'Nuevo mensaje de contacto - RoalcaDesign';

// Crear las cabeceras del correo correctamente
$headers = [];
$headers[] = 'MIME-Version: 1.0';
$headers[] = 'Content-Type: text/html; charset=UTF-8';
$headers[] = 'From: ' . $email;
$headers[] = 'Reply-To: ' . $email;
$headers[] = 'X-Mailer: PHP/' . phpversion();

$emailContent = "
<!DOCTYPE html>
<html>
<head>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; }
        .container { max-width: 600px; margin: 0 auto; padding: 20px; }
        .header { background-color: #C4A484; color: white; padding: 20px; text-align: center; }
        .content { padding: 20px; background-color: #f9f9f9; }
        .footer { text-align: center; padding: 20px; color: #666; }
    </style>
</head>
<body>
    <div class='container'>
        <div class='header'>
            <h2>Nuevo Mensaje de Contacto</h2>
        </div>
        <div class='content'>
            <p><strong>Nombre:</strong> " . htmlspecialchars($nombre) . "</p>
            <p><strong>Email:</strong> " . htmlspecialchars($email) . "</p>
            <p><strong>Mensaje:</strong></p>
            <p>" . nl2br(htmlspecialchars($mensaje)) . "</p>
        </div>
        <div class='footer'>
            <p>Este mensaje fue enviado desde el formulario de contacto de RoalcaDesign</p>
        </div>
    </div>
</body>
</html>
";

// Intentar enviar el correo
try {
    // Asegurarse de que no haya salida antes de enviar la respuesta JSON
    if (ob_get_level()) ob_end_clean();
    
    if (mail($to, $subject, $emailContent, implode("\r\n", $headers))) {
        echo json_encode(['success' => true, 'message' => '¡Mensaje enviado con éxito!']);
        exit;
    } else {
        throw new Exception('Error al enviar el mensaje');
    }
} catch (Exception $e) {
    error_log($e->getMessage());
    http_response_code(500);
    echo json_encode(['success' => false, 'message' => 'Error al enviar el mensaje. Por favor, intente más tarde.']);
    exit;
}