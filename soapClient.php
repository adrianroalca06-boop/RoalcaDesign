<?php
$busqueda = isset($_GET['busqueda']) ? $_GET['busqueda'] : "";
$options = [
    'location' => 'http://localhost/RoalcaDesign/soapServer.php',
    'uri' => 'http://localhost/soap_server'
];
$client = new SoapClient(null, $options);
$productos = $client->consultarProductos($busqueda);
?>

<form method="get">
    <input type="text" name="busqueda" placeholder="Buscar producto..." value="<?php echo htmlspecialchars($busqueda); ?>">
    <button type="submit">Buscar</button>
</form>

<h2>Lista de Productos</h2>
<ul>
<?php foreach ($productos as $producto): ?>
    <li>ID: <?php echo $producto['id']; ?> - Nombre: <?php echo $producto['nombre']; ?> - Categoría: <?php echo $producto['categoria']; ?> - Precio: <?php echo $producto['precio']; ?></li>
<?php endforeach; ?>
</ul>