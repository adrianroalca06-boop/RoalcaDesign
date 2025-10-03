<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="Diseño.css">
</head>
<body>
<header id="Cabecera1">
   
    <?php
        echo "<h1>RoalcaDesign</h1>";
        echo "<p><strong><em>Diseñado</em></strong></p> a tu medida.";
    ?>  
</header>
<div class="contenedor-principal">
    <section id="Acerca-de">
        <h2>Acerca de RoalcaDesign</h2>
        <p>
            RoalcaDesign es una empresa dedicada a la decoración de interiores a pequeña escala como habitaciones, salones, etc, sin perder la elegancia y el lujo.
        </p>
        <div class="slider">
            <img id="slider-img" src="imágenes/habitacion1.jpeg" alt="Galería RoalcaDesign" width="300" height="200">
        </div>
    </section>
</div>
<script>
    const imagenes = [
        'imágenes/habitacion2.jpeg',
        'imágenes/habitacion3.jpeg',
        'imágenes/habitacion4.jpeg'
    ];
    let indice = 0;
    setInterval(() => {
        indice = (indice + 1) % imagenes.length;
        document.getElementById('slider-img').src = imagenes[indice];
    }, 6000);
</script>
    </body>
</html>