<?php
// ...existing code...
<?php
require_once 'includes/config.php';
require_once 'includes/template.php';

try {
    $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
    if (!$id) {
        throw new Exception('ID de producto inválido');
    }

    $options = [
        'location' => SITE_URL . '/soapServer.php',
        'uri' => 'http://localhost/soap_server',
        'encoding' => 'UTF-8',
        'trace' => true
    ];

$producto = null;
$error = null;

try {
    $client = new SoapClient(null, $options);
    $productos = $client->consultarProductos(); // Obtiene todos los productos

    if ($id > 0) {
        foreach ($productos as $p) {
            if (isset($p['id']) && intval($p['id']) === $id) {
                $producto = $p;
                break;
            }
        }
        if (!$producto) {
            $error = "Producto no encontrado.";
        }
    } else {
        $error = "ID de producto inválido.";
    }
} catch (Exception $e) {
    $error = "Error al conectar con el servicio: " . htmlspecialchars($e->getMessage());
}

// Funciones auxiliares
function esc($v) { return htmlspecialchars($v, ENT_QUOTES, 'UTF-8'); }
function formatoPrecio($p) { return number_format((float)$p, 2, ',', '.') . " €"; }

// Ruta de imagen por producto (intenta varias opciones)
function rutaImagenProducto($id) {
    $candidates = [
        "imágenes/productos/{$id}.jpg",
        "imágenes/productos/{$id}.jpeg",
        "imágenes/productos/{$id}.png",
        "imágenes/productos/{$id}.webp",
    ];
    foreach ($candidates as $c) {
        if (file_exists(__DIR__ . DIRECTORY_SEPARATOR . $c)) return $c;
    }
    return 'imágenes/placeholder.png'; // placeholder genérico
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title><?php echo $producto ? esc($producto['nombre']) . " - RoalcaDesign" : "Detalle del Producto - RoalcaDesign"; ?></title>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="stylesheet" href="Diseño.css">
    <link rel="icon" type="image/png" href="imágenes/logoRoalca.png">
</head>
<body>
    <header id="Cabecera1">
        <nav class="navbar">
            <ul class="nav-list">
                <li><a href="index.php">&#8592; Inicio</a></li>
                <li><a href="soapClient.php">&#8592; Volver al listado</a></li>
            </ul>
        </nav>
        <h1>RoalcaDesign</h1>
        <p><strong><em>Luxury matters.</em></strong></p>
    </header>

    <main class="contenedor-principal">
        <section id="Acerca-de" class="detalle-producto">
            <?php if ($error): ?>
                <div class="mensaje-error"><?php echo esc($error); ?></div>
            <?php else: ?>
                <?php
                    $img = rutaImagenProducto($producto['id']);
                    $nombre = $producto['nombre'] ?? '';
                    $categoria = $producto['categoria'] ?? '';
                    $precio = isset($producto['precio']) ? formatoPrecio($producto['precio']) : '—';
                    $metros = isset($producto['metros']) ? esc($producto['metros']) . ' m²' : null;
                    $descripcion = isset($producto['descripcion']) ? $producto['descripcion'] : '';
                ?>
                <div class="producto-grid">
                    <div class="producto-imagen">
                        <img src="<?php echo esc($img); ?>" alt="<?php echo esc($nombre); ?>">
                    </div>
                    <div class="producto-info">
                        <h2><?php echo esc($nombre); ?></h2>
                        <p class="categoria"><strong>Categoría:</strong> <?php echo esc($categoria); ?></p>
                        <p class="precio"><strong>Precio:</strong> <?php echo esc($precio); ?></p>
                        <?php if ($metros): ?><p><strong>Metros:</strong> <?php echo $metros; ?></p><?php endif; ?>
                        <?php if ($descripcion): ?><p class="descripcion"><?php echo nl2br(esc($descripcion)); ?></p><?php endif; ?>

                        <div class="acciones">
                            <a class="btn" href="soapClient.php">Volver al listado</a>
                            <a class="btn btn-mail" href="https://mail.google.com/mail/?view=cm&fs=1&to=adrianroalca06@gmail.com&su=<?php echo urlencode('Solicitud de información: ' . $nombre); ?>&body=<?php echo urlencode("Hola,\n\nMe interesa el producto: {$nombre}\nID: {$producto['id']}\nPor favor, envíenme más información y disponibilidad.\n\nGracias."); ?>" target="_blank">Solicitar cotización</a>
                        </div>
                    </div>
                </div>

                <!-- JSON-LD para SEO (schema.org Product) -->
                <script type="application/ld+json">
                {
                    "@context": "https://schema.org/",
                    "@type": "Product",
                    "name": "<?php echo esc($nombre); ?>",
                    "image": "<?php echo esc((isset($_SERVER['REQUEST_SCHEME']) ? $_SERVER['REQUEST_SCHEME'] : 'http') . '://' . $_SERVER['HTTP_HOST'] . '/' . esc($img)); ?>",
                    "description": "<?php echo esc(strip_tags($descripcion)); ?>",
                    "offers": {
                        "@type": "Offer",
                        "priceCurrency": "EUR",
                        "price": "<?php echo isset($producto['precio']) ? number_format((float)$producto['precio'],2,'.','') : ''; ?>",
                        "availability": "https://schema.org/InStock"
                    }
                }
                </script>
            <?php endif; ?>
        </section>
    </main>

    <footer style="text-align:center; padding:16px; color:#777;">
        &copy; <?php echo date('Y'); ?> RoalcaDesign
    </footer>
</body>
</html>
// ...existing code...