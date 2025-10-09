<?php
$busqueda = isset($_GET['busqueda']) ? $_GET['busqueda'] : "";
$options = [
    'location' => 'http://localhost/roalcaDecor/soapServer.php',
    'uri' => 'http://localhost/soap_server'
];
$client = new SoapClient(null, $options);
$productos = $client->consultarProductos($busqueda);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Buscar Productos - RoalcaDesign</title>
    <link rel="stylesheet" href="Diseño.css">
</head>
<body>
    <header id="Cabecera1">
        <a href="index.php" style="display:inline-block; margin-top:20px; font-weight:bold;">&#8592; Volver a inicio</a>
        <h1>RoalcaDesign</h1>
        <p><strong><em>Luxury matters.</em></strong></p>
    </header>
    <div class="contenedor-principal">
        <section id="Acerca-de">
            <form method="get">
                <input type="text" name="busqueda" placeholder="Buscar producto..." value="<?php echo htmlspecialchars($busqueda); ?>">
                <button type="submit">Buscar</button>
            </form>

            <h2>Lista de Productos</h2>
           <ul>
            <?php
 foreach ($productos as $producto): ?>
    <li>
        <a href="detalleProducto.php?id=<?php echo urlencode($producto['id']); ?>">
            <?php echo htmlspecialchars($producto['nombre']); ?>
        </a>
    </li>
<?php endforeach; ?>
</ul>
        </section>
    </div>
</body>
</html>