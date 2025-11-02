<?php require_once 'includes/config.php'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="RoalcaDesign - Diseño de interiores de lujo y decoración personalizada">
    <title>RoalcaDesign | Diseño de Interiores de Lujo</title>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&family=Montserrat:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="Diseño.css">
    <link rel="icon" type="image/png" href="imágenes/logoRoalca.png">
</head>
<body>
    <header id="Cabecera1" class="fade-in">
        <nav class="navbar">
            <ul class="nav-list">
                <li><a href="#inicio">Inicio</a></li>
                <li><a href="#servicios">Servicios</a></li>
                <li><a href="ejemplos.php">Portfolio</a></li>
                <li><a href="queEs.php">Nosotros</a></li>
                <li><a href="#contacto">Contacto</a></li>
            </ul>
        </nav>
        <div class="hero-content">
            <h1>RoalcaDesign</h1>
            <p class="subtitle">Creando espacios que inspiran</p>
            <div class="hero-buttons">
                <a href="#servicios" class="btn btn-primary">Descubrir Servicios</a>
                <a href="soapClient.php" class="btn btn-outline">Ver Catálogo</a>
            </div>
        </div>
    </header>

    <main class="contenedor-principal">
        <section id="servicios" class="seccion fade-in">
            <h2 class="text-center">Nuestros Servicios</h2>
            <div class="servicios-grid">
                <div class="servicio-card">
                    <div class="servicio-icono">
                        <img src="imágenes/habitacion1.jpeg" alt="Diseño de Interiores">
                    </div>
                    <h3>Diseño de Interiores</h3>
                    <p>Transformamos espacios combinando elegancia y funcionalidad para crear ambientes únicos que reflejen tu estilo personal.</p>
                </div>
                <div class="servicio-card">
                    <div class="servicio-icono">
                        <img src="imágenes/habitacion2.jpeg" alt="Decoración">
                    </div>
                    <h3>Decoración de Lujo</h3>
                    <p>Seleccionamos cuidadosamente cada elemento decorativo para crear espacios sofisticados y armoniosos.</p>
                </div>
                <div class="servicio-card">
                    <div class="servicio-icono">
                        <img src="imágenes/habitacion3.jpeg" alt="Materiales">
                    </div>
                    <h3>Materiales Premium</h3>
                    <p>Trabajamos con los mejores materiales y acabados para garantizar calidad y durabilidad en cada proyecto.</p>
                </div>
            </div>
        </section>

        <section id="proyectos" class="seccion fade-in">
            <h2 class="text-center">Proyectos Destacados</h2>
            <div class="galeria">
                <div class="galeria-item">
                    <img src="imágenes/habitacion1.jpeg" alt="Proyecto 1">
                    <div class="galeria-overlay">
                        <h3>Dormitorio Principal</h3>
                        <p>Diseño contemporáneo con toques clásicos</p>
                    </div>
                </div>
                <div class="galeria-item">
                    <img src="imágenes/habitacion2.jpeg" alt="Proyecto 2">
                    <div class="galeria-overlay">
                        <h3>Sala de Estar</h3>
                        <p>Elegancia y confort en perfecta armonía</p>
                    </div>
                </div>
                <div class="galeria-item">
                    <img src="imágenes/habitacion3.jpeg" alt="Proyecto 3">
                    <div class="galeria-overlay">
                        <h3>Cocina de Lujo</h3>
                        <p>Funcionalidad con estilo moderno</p>
                    </div>
                </div>
            </div>
            <div class="text-center mb-3">
                <a href="ejemplos.php" class="btn">Ver Más Proyectos</a>
            </div>
        </section>

        <section id="contacto" class="seccion fade-in">
            <h2 class="text-center">Contacta con Nosotros</h2>
            <div class="grid-2-columns">
                <div class="contacto-info">
                    <h3>Información de Contacto</h3>
                    <p><strong>Email:</strong><br>
                    <a href="mailto:adrianroalca06@gmail.com">adrianroalca06@gmail.com</a></p>
                    <p><strong>Teléfono:</strong><br>
                    +34 662 03 71 29</p>
                    <p><strong>Ubicación:</strong><br>
                    Marbella, Málaga<br>
                    España</p>
                </div>
                <form id="contactForm" class="contacto-form">
                    <div class="form-grupo">
                        <label for="nombre">Nombre</label>
                        <input type="text" id="nombre" name="nombre" class="form-control" required>
                    </div>
                    <div class="form-grupo">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" class="form-control" required>
                    </div>
                    <div class="form-grupo">
                        <label for="mensaje">Mensaje</label>
                        <textarea id="mensaje" name="mensaje" class="form-control" rows="5" required></textarea>
                    </div>
                    <button type="submit" class="btn">Enviar Mensaje</button>
                    <div id="mensajeEstado" class="mensaje-estado"></div>
                </form>
            </div>
        </section>
    </main>

    <footer class="footer">
        <div class="footer-content">
            <div class="footer-info">
                <h3>RoalcaDesign</h3>
                <p>Diseño de interiores y decoración de lujo</p>
            </div>
            <div class="footer-links">
                <h4>Enlaces</h4>
                <ul>
                    <li><a href="#inicio">Inicio</a></li>
                    <li><a href="#servicios">Servicios</a></li>
                    <li><a href="ejemplos.php">Portfolio</a></li>
                    <li><a href="queEs.php">Nosotros</a></li>
                </ul>
            </div>
            <div class="footer-contacto">
                <h4>Contacto</h4>
                <p>Email: adrianroalca06@gmail.com</p>
                <p>Tel: +34 662 03 71 29</p>
                <p>Marbella, Málaga</p>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; <?php echo date('Y'); ?> RoalcaDesign. Todos los derechos reservados.</p>
        </div>
    </footer>

    <script>
        // Efecto de scroll suave para los enlaces internos
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                document.querySelector(this.getAttribute('href')).scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });

        // Efecto de navbar al hacer scroll
        window.addEventListener('scroll', () => {
            const navbar = document.querySelector('.navbar');
            if (window.scrollY > 100) {
                navbar.classList.add('navbar-scrolled');
            } else {
                navbar.classList.remove('navbar-scrolled');
            }
        });

        // Animación de elementos al hacer scroll
        const observador = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                }
            });
        }, {
            threshold: 0.1
        });

        document.querySelectorAll('.fade-in').forEach((elemento) => {
            observador.observe(elemento);
        });

        // Manejo del formulario de contacto
        document.getElementById('contactForm').addEventListener('submit', async function(e) {
            e.preventDefault();
            
            const mensajeEstado = document.getElementById('mensajeEstado');
            const formData = new FormData(this);
            const btn = this.querySelector('button[type="submit"]');
            
            try {
                btn.disabled = true;
                btn.textContent = 'Enviando...';
                mensajeEstado.className = 'mensaje-estado';
                mensajeEstado.style.display = 'none';

                const response = await fetch('send_mail.php', {
                    method: 'POST',
                    body: formData
                });

                const data = await response.json();

                if (data.success) {
                    mensajeEstado.textContent = data.message;
                    mensajeEstado.classList.add('exito');
                    this.reset();
                } else {
                    throw new Error(data.message);
                }
            } catch (error) {
                mensajeEstado.textContent = error.message || 'Error al enviar el mensaje. Por favor, intente más tarde.';
                mensajeEstado.classList.add('error');
            } finally {
                mensajeEstado.style.display = 'block';
                btn.disabled = false;
                btn.textContent = 'Enviar Mensaje';
            }
        });
    </script>
</body>
</html>