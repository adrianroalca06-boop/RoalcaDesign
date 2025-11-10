<?php
$imagenes = [
    'imágenes/Ej1.jpeg',
    'imágenes/Ej2.jpeg',
    'imágenes/Ej3.jpeg',
    'imágenes/Ej4.jpeg',
    'imágenes/Ej5.jpeg',
    // Agrega más rutas de imágenes aquí
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ejemplos - RoalcaDesign</title>
    <link rel="stylesheet" href="Diseño.css">
</head>
<body>
    <header id="Cabecera1">
        <nav>
            <ul style="list-style:none; display:flex; justify-content:center; gap:30px; padding:0;">
                <li>
                    <a href="mailto:adrianroalca06@gmail.com?subject=Consulta%20RoalcaDesign">Contacto</a>
                </li>
                <li>
                    <a href="index.php">Inicio</a>
                </li>
            </ul>
        </nav>
        <h1>RoalcaDesign</h1>
        <p><strong><em>Luxury matters.</em></strong></p>
    </header>
    <div class="contenedor-principal">
        <section id="Acerca-de">
            <h2>Ejemplos de Proyectos</h2>
            <div style="display:flex; flex-wrap:wrap; gap:20px; justify-content:center;">
                <?php foreach ($imagenes as $img): ?>
                    <img src="<?php echo $img; ?>" alt="Ejemplo" style="width:200px; border-radius:12px; box-shadow:0 2px 8px rgba(0,0,0,0.10);">
                <?php endforeach; ?>
            </div>
        </section>
    </div>
</body>
</html>