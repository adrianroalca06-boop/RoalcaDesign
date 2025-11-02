<?php
// Header común para todas las páginas
function getHeader($title = '', $description = '') {
    $site_title = $title ? "$title - " . SITE_NAME : SITE_NAME;
    $site_desc = $description ?: SITE_DESC;
    
    return <<<HTML
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="$site_desc">
    <title>$site_title</title>
    <link rel="stylesheet" href="Diseño.css">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&display=swap" rel="stylesheet">
    <link rel="icon" type="image/png" href="imágenes/logoRoalca.png">
</head>
<body>
    <header id="Cabecera1">
        <nav class="navbar">
            <ul class="nav-list">
                <li><a href="index.php">Inicio</a></li>
                <li><a href="ejemplos.php">Ejemplos</a></li>
                <li><a href="queEs.php">Sobre Nosotros</a></li>
                <li><a href="soapClient.php">Catálogo</a></li>
            </ul>
        </nav>
        <h1>$site_title</h1>
        <p class="subtitle"><em>Luxury matters.</em></p>
    </header>
HTML;
}

// Footer común
function getFooter() {
    return <<<HTML
    <footer class="site-footer">
        <div class="footer-content">
            <div class="footer-info">
                <h3>RoalcaDesign</h3>
                <p>Diseño de interiores y decoración de lujo</p>
            </div>
            <div class="footer-contact">
                <h4>Contacto</h4>
                <p>Email: <a href="mailto:adrianroalca06@gmail.com">adrianroalca06@gmail.com</a></p>
                <p>Tel: +34 662 03 71 29</p>
            </div>
            <div class="footer-location">
                <h4>Ubicación</h4>
                <p>Marbella, Málaga</p>
                <p>España</p>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; <?php echo date('Y'); ?> RoalcaDesign. Todos los derechos reservados.</p>
        </div>
    </footer>
</body>
</html>
HTML;
}

// Función para mostrar mensajes de error o éxito
function showMessage($message, $type = 'info') {
    return "<div class=\"message message-$type\">$message</div>";
}

// Función para generar el breadcrumb
function getBreadcrumb($items) {
    $html = '<nav class="breadcrumb" aria-label="breadcrumb">';
    $html .= '<ol>';
    
    foreach ($items as $label => $url) {
        if ($url) {
            $html .= "<li><a href=\"$url\">$label</a></li>";
        } else {
            $html .= "<li class=\"active\" aria-current=\"page\">$label</li>";
        }
    }
    
    $html .= '</ol>';
    $html .= '</nav>';
    
    return $html;
}