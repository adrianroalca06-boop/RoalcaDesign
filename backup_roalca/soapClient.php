<?php
require_once 'includes/config.php';

try {
    $busqueda = filter_input(INPUT_GET, 'busqueda', FILTER_SANITIZE_STRING) ?? "";
    
    $options = [
        'location' => 'http://localhost/roalcaDecor/soapServer.php',
        'uri' => 'http://localhost/soap_server',
        'encoding' => 'UTF-8',
        'trace' => true
    ];
    
    $client = new SoapClient(null, $options);
    $productos = $client->consultarProductos($busqueda);
} catch (SoapFault $e) {
    error_log($e->getMessage());
    $error = "Lo sentimos, ha ocurrido un error al buscar productos.";
    $productos = [];
} catch (Exception $e) {
    error_log($e->getMessage());
    $error = "Error inesperado. Por favor, intente más tarde.";
    $productos = [];
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Catálogo de productos de lujo RoalcaDesign">
    <title>Catálogo de Productos - RoalcaDesign</title>
    <link rel="stylesheet" href="Diseño.css">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&display=swap" rel="stylesheet">
    <link rel="icon" type="image/png" href="imágenes/logoRoalca.png">
</head>
<body>
    <header id="Cabecera1">
        <nav class="navbar">
            <ul class="nav-list">
                <li><a href="index.php">&#8592; Inicio</a></li>
                <li><a href="ejemplos.php">Ejemplos</a></li>
                <li><a href="queEs.php">Sobre Nosotros</a></li>
            </ul>
        </nav>
        <h1>Catálogo RoalcaDesign</h1>
        <p class="subtitle"><em>Luxury matters.</em></p>
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