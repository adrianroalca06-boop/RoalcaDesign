<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RoalcaDesign</title>
    <link rel="stylesheet" href="Diseño.css">
    <link rel="icon" type="image/png" href="imágenes/logoRoalca.png">
</head>
<body>
<header id="Cabecera1">
    <form method="get" action="soapClient.php" style="margin-bottom:20px;">
    <input type="text" name="busqueda" placeholder="Buscar producto..." style="padding:8px; border-radius:6px; border:1px solid #ccc;">
    <button type="submit" style="padding:8px 16px; border-radius:6px; background:#bfa16a; color:#fff; border:none;">Buscar</button>
</form>
    <nav>
        <ul style="list-style:none; display:flex; justify-content:center; gap:30px; padding:0;">
            <li>
                <a href="mailto:adrianroalca06@gmail.com?subject=Consulta%20RoalcaDesign">Contacto</a>
            </li>
            <li>
                <a href="ejemplos.php">Ejemplos</a>
            </li>
            <li>
                <a href="queEs.php">que es Roalca</a>
        </ul>
    </nav>
    <?php
        echo "<h1>RoalcaDesign</h1>";
        echo "<p>Luxury matters.</p>";
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
    <div class="contenedor-principal">
    <section class="zona-texto">
        <h3>¿Sabías que?</h3>
        <p>
            Nuestro equipo te asesora para que cada rincón de tu hogar refleje tu personalidad y estilo. Además, trabajamos con materiales de alta calidad para garantizar que cada proyecto no solo sea hermoso, sino también duradero. Encarga ahora tu proyecto de decoración y transforma tu espacio en un lugar lleno de lujo y confort.
        </p>
    </section>
</div>
</div>
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