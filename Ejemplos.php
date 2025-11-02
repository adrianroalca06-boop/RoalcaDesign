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
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio - RoalcaDesign</title>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="Diseño.css">
    <link rel="icon" type="image/png" href="imágenes/logoRoalca.png">
</head>
<body>
    <header id="Cabecera1">
        <nav class="navbar">
            <ul class="nav-list">
                <li><a href="index.php">Inicio</a></li>
                <li><a href="soapClient.php">Catálogo</a></li>
                <li><a href="queEs.php">Nosotros</a></li>
                <li><a href="mailto:adrianroalca06@gmail.com">Contacto</a></li>
            </ul>
        </nav>
        <h1>Nuestros Proyectos</h1>
        <p class="subtitle">Diseños que Inspiran</p>
    </header>
    
    <main class="contenedor-principal">
        <section class="seccion">
            <h2 class="text-center">Portfolio de Proyectos</h2>
            <div class="galeria">
                <?php foreach ($imagenes as $img): ?>
                <div class="galeria-item">
                    <img src="<?php echo $img; ?>" alt="Proyecto RoalcaDesign" 
                         loading="lazy">
                    <div class="galeria-info">
                        <h3>Diseño Exclusivo</h3>
                        <p>Proyecto personalizado de diseño interior</p>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </section>

        <section class="seccion contacto">
            <h2 class="text-center">¿Te inspira algún proyecto?</h2>
            <p class="text-center">Contáctanos para crear tu espacio ideal</p>
            <div class="text-center">
                <a href="mailto:adrianroalca06@gmail.com?subject=Consulta%20sobre%20proyectos" 
                   class="btn">Contactar Ahora</a>
            </div>
        </section>
    </main>
</body>
</html>