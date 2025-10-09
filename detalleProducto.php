<?php
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$options = [
    'location' => 'http://localhost/roalcaDecor/soapServer.php',
    'uri' => 'http://localhost/soap_server'
];
$client = new SoapClient(null, $options);
$productos = $client->consultarProductos(); // Obtiene todos los productos

$producto = null;
foreach ($productos as $p) {
    if ($p['id'] == $id) {
        $producto = $p;
        break;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Detalle del Producto</title>
    <link rel="stylesheet" href="Diseño.css">
</head>
<body>
    <header id="Cabecera1">
        <h1>RoalcaDesign</h1>
        <p><strong><em>Luxury matters.</em></strong></p>
    </header>
    <div class="contenedor-principal">
        <section id="Acerca-de">
            <?php if ($producto): ?>
                <h2><?php echo htmlspecialchars($producto['nombre']); ?></h2>
                <p><strong>Categoría:</strong> <?php echo htmlspecialchars($producto['categoria']); ?></p>
                <p><strong>Precio:</strong> <?php echo htmlspecialchars($producto['precio']); ?> €</p>
                <!-- Puedes agregar más campos aquí, como metros, descripción, etc. -->
            <?php else: ?>
                <p>Producto no encontrado.</p>
            <?php endif; ?>
            <a href="soapClient.php">Volver al listado</a>
        </section>
    </div>
</body>
</html>