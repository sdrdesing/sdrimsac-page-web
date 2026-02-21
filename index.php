<?php
// Iniciar sesión solo si no hay una sesión activa (evita Notice por doble session_start)
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
// Intentamos cargar la conexión a la base si existe (para contar productos en carrito DB)
$dbLoaded = false;
if(file_exists(__DIR__ . '/config/database.php')){
    try {
        require_once __DIR__ . '/config/database.php';
        $dbLoaded = isset($conn);
    } catch(Throwable $e){
        $dbLoaded = false;
    }
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>sdrimsac - Facturación Electrónica</title>
<link rel="stylesheet" href="assets/css/estilo.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<script src="js/script.js" defer></script>
</head>
<body>

<div class="topbar">
    <span>📞 +51 995 764 963</span>
    <span>✉ contacto@sdrimsac.com</span>
</div>

<nav class="navbar">
    <div class="logo">
        <a href="index.php" aria-label="sdrimsac">
            <img src="assets/img/SDRIMSAC.png" alt="sdrimsac logo">
        </a>
    </div>

    <ul class="menu">
        <li class="dropdown">
            <a href="index.php"><i class="fa-solid fa-house"></i> Principal</a>
            <ul class="submenu">
                <li><a href="nosotros.php">Nosotros</a></li>
                <li><a href="contacto.php">Contacto</a></li>
            </ul>
        </li>

        <li class="dropdown">
            <a href="servicios.php"><i class="fa-solid fa-briefcase"></i> Servicios</a>
            <ul class="submenu">
                <li><a href="paginaweb.php">Página Web</a></li>
                <li><a href="tiendasvirtuales.php">Tiendas Virtuales</a></li>
                <li><a href="marketingdigital.php">Marketing Digital</a></li>
                <li><a href="instalacioncamaras.php">Instalación de Cámaras de Seguridad</a></li>
                <li><a href="instalacionluminarias.php">Instalación de Luminarias Solares</a></li>
                <li class="dropdown-sub">
                    <a href="servicios.php#facturacion-electronica">Facturación Electrónica</a>
                    <ul class="submenu sub-submenu">
                        <li><a href="facturacionchifa.php">Facturación Chifa</a></li>
                        <li><a href="facturacioncafeteria.php">Facturación Cafetería</a></li>
                        <li><a href="facturacioncevicheria.php">Facturación Cevichería</a></li>
                        <li><a href="facturacionkaraoke.php">Facturación Karaoke</a></li>
                        <li><a href="facturacionpizzeria.php">Facturación Pizzería</a></li>
                        <li><a href="facturacionrestaurant.php">Facturación Restaurant</a></li>
                        <li><a href="facturacionrecreos.php">Facturación Recreos</a></li>
                        <li><a href="facturacionhotel.php">Facturación Hotel</a></li>
                        <li><a href="facturacionfarmacia.php">Facturación Farmacia</a></li>
                        <li><a href="facturacionhoteles.php">Facturación Hoteles</a></li>
                        <li><a href="facturacionescolar.php">Facturación Escolar</a></li>
                        <li><a href="facturacioncreditos.php">Facturación Créditos</a></li>
                    </ul>
                </li>
            </ul>
        </li>

        <li><a href="productos.php"><i class="fa-solid fa-store"></i> Tienda</a></li>
        <li><a href="herramientas.php"><i class="fa-solid fa-wrench"></i> Herramientas</a></li>
        <li><a href="manuales.php"><i class="fa-solid fa-book"></i> Manuales</a></li>
        <li><a href="blog.php"><i class="fa-solid fa-blog"></i> Blog</a></li>
    </ul>

    <div class="icons">
        <a href="register.php" title="Registrarse"><i class="fa-solid fa-user"></i></a>

        <a href="carrito.php" class="cart-icon" title="Carrito">
            <i class="fa-solid fa-cart-shopping"></i>
            <span class="cart-count"><?php
                // Si la conexión a DB está disponible, sumar cantidades desde la tabla `carrito`
                $count = 0;
                if($dbLoaded){
                    $q = $conn->query("SELECT SUM(cantidad) AS total FROM carrito");
                    if($q){
                        $r = $q->fetch_assoc();
                        $count = intval($r['total']) ?: 0;
                    }
                } else {
                    // Fallback a session (array) si se usa ese método
                    $count = isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0;
                }
                echo $count;
            ?></span>
        </a>
    </div>
</nav>

<section class="hero">
    <div class="hero-overlay"></div>
    <img class="hero-bg" src="assets/img/SDRIMSAC.png" alt="SDRIMSAC Logo" style="object-fit:cover;width:100%;height:100%;filter:brightness(0.95);">
    <div class="hero-content">
        <span class="hero-badge">✦ Certificado por SUNAT ✦</span>
        <h1>sdrimsac</h1>
        <p>Soluciones de facturación electrónica para empresas peruanas. Emite facturas, boletas y notas de crédito de forma rápida y segura.</p>
        <div class="hero-btns">
            <a href="servicios.php" class="btn-hero-primary">Ver Servicios</a>
            <a href="productos.php" class="btn-hero-secondary">Explorar Tienda</a>
        </div>
        <div class="hero-stats">
            <div class="stat">
                <strong>500+</strong>
                <span>Empresas activas</span>
            </div>
            <div class="stat">
                <strong>99.9%</strong>
                <span>Disponibilidad</span>
            </div>
            <div class="stat">
                <strong>24/7</strong>
                <span>Soporte</span>
            </div>
        </div>
    </div>
</section>

<!-- COMPATIBILIDAD -->
<section class="partners-bar">
    <p>Compatible con</p>
    <div class="partners-logos">
        <span>SUNAT</span>
        <span>OSE</span>
        <span>NUBEFACT</span>
        <span>EFACT</span>
        <span>BIZLINKS</span>
    </div>
</section>


<!-- CARRUSEL DE 4 IMÁGENES HORIZONTALES -->
<section class="carousel-section">
    <div class="carousel-multi-container">
        <button class="carousel-btn prev" onclick="moveMultiCarousel(-1)">&#10094;</button>
        <div class="carousel-multi-track">
            <div class="carousel-multi-slide"><img src="assets/img/img1.jpg" alt="Imagen 1"></div>
            <div class="carousel-multi-slide"><img src="assets/img/img8.jpg" alt="Imagen 8"></div>
            <div class="carousel-multi-slide"><img src="assets/img/img3.jpg" alt="Imagen 3"></div>
            <div class="carousel-multi-slide"><img src="assets/img/img4.jpg" alt="Imagen 4"></div>
            <div class="carousel-multi-slide"><img src="assets/img/img5.jpg" alt="Imagen 5"></div>
            <div class="carousel-multi-slide"><img src="assets/img/img6.jpg" alt="Imagen 6"></div>
            <div class="carousel-multi-slide"><img src="assets/img/img7.jpg" alt="Imagen 7"></div>
            <div class="carousel-multi-slide"><img src="assets/img/img9.jpg" alt="Imagen 9"></div>
        </div>
        <button class="carousel-btn next" onclick="moveMultiCarousel(1)">&#10095;</button>
    </div>
</section>
<link rel="stylesheet" href="assets/css/carousel.css">
<script>
let multiCarouselIndex = 0;
function showMultiCarousel(n) {
    const track = document.querySelector('.carousel-multi-track');
    const slides = document.querySelectorAll('.carousel-multi-slide');
    if (!track || slides.length < 4) return;
    const total = slides.length;
    multiCarouselIndex = (n + total) % total;
    // Mover el track para mostrar 4 imágenes
    track.style.transform = `translateX(-${multiCarouselIndex * 25}%)`;
}
function moveMultiCarousel(n) {
    const slides = document.querySelectorAll('.carousel-multi-slide');
    if (slides.length < 4) return;
    multiCarouselIndex = (multiCarouselIndex + n + slides.length) % slides.length;
    showMultiCarousel(multiCarouselIndex);
}
setInterval(() => moveMultiCarousel(1), 5000);
document.addEventListener('DOMContentLoaded', () => showMultiCarousel(0));
</script>


<!-- FEATURES -->
<!-- SECCIÓN SOMOS SDRIMSAC SOLUTIONS -->
<section class="somos-section">
    <div class="somos-inner">
        <div class="somos-img">
            <img src="https://images.unsplash.com/photo-1556742049-0cfed4f6a45d?w=600&q=80" alt="SDRIMSAC Facturación" />
        </div>
        <div class="somos-info">
            <span class="somos-label">SOMOS</span>
            <h2 class="somos-title">SDRIMSAC SOLUTIONS</h2>
            <p class="somos-desc">Somos especialistas en el mundo tecnológico (informática) que desarrolla Sistemas de Facturación Electrónica personalizados.</p>
            <div class="somos-cards">
                <div class="somos-card">
                    <div class="somos-card-icon"><i class="fa-solid fa-clipboard-check"></i></div>
                    <div>
                        <strong>Compromiso</strong>
                        <div class="somos-card-desc">Personal capacitado y eficiente</div>
                    </div>
                </div>
                <div class="somos-card">
                    <div class="somos-card-icon"><i class="fa-solid fa-headset"></i></div>
                    <div>
                        <strong>Soporte</strong>
                        <div class="somos-card-desc">Atención continua y Oportuna</div>
                    </div>
                </div>
            </div>
            <p class="somos-mision">Partimos desde la idea de simplificarle la vida a los comerciantes de todo el territorio peruano, brindando herramientas tecnológicas necesarias</p>
            <a href="nosotros.php" class="somos-btn">LEER MÁS <i class="fa-solid fa-arrow-right"></i></a>
        </div>
    </div>
</section>
<link rel="stylesheet" href="assets/css/somos.css">
<!-- BENEFICIOS - ¿Por qué elegirnos? -->
<section class="beneficios-section">
    <h2 class="beneficios-title">¿Por qué Elegirnos?</h2>
    <div class="beneficios-grid">
        <div class="beneficio-card">
            <div class="beneficio-icon">
                <i class="fa-solid fa-lightbulb"></i>
            </div>
            <h3>Innovación Constante</h3>
            <p>Mantenemos nuestras soluciones tecnológicas actualizadas para que tu empresa siempre esté a la vanguardia.</p>
        </div>
        <div class="beneficio-card">
            <div class="beneficio-icon">
                <i class="fa-solid fa-user-graduate"></i>
            </div>
            <h3>Experiencia</h3>
            <p>Contamos con un equipo altamente calificado y con experiencia en el sector de servicios tecnológicos y facturación electrónica.</p>
        </div>
        <div class="beneficio-card">
            <div class="beneficio-icon">
                <i class="fa-solid fa-shield-halved"></i>
            </div>
            <h3>Seguridad de Datos</h3>
            <p>Seguridad de tus datos y de tu empresa. Implementamos medidas de seguridad informática para proteger tus registros y transacciones.</p>
        </div>
        <div class="beneficio-card">
            <div class="beneficio-icon">
                <i class="fa-solid fa-headset"></i>
            </div>
            <h3>Asesoría Técnica</h3>
            <p>Contarás con un equipo de atención al cliente siempre dispuesto a responder a tus preguntas y resolver cualquier problema que puedas tener.</p>
        </div>
    </div>
</section>
<link rel="stylesheet" href="assets/css/beneficios.css">

<!-- SHOWCASE -->
<section class="showcase-section">
    <div class="showcase-inner">
        <div class="showcase-text">
            <h2 class="section-title"><i class="fa-solid fa-layer-group"></i> Gestión completa de tu negocio</h2>
            <p>Nuestro sistema integra facturación, inventario y reportes financieros en una plataforma simple y potente, homologada con SUNAT.</p>
            <ul class="showcase-list">
                <li>✓ Emisión de facturas y boletas electrónicas</li>
                <li>✓ Control de inventario en tiempo real</li>
                <li>✓ Reportes financieros automatizados</li>
                <li>✓ Gestión de clientes y proveedores</li>
                <li>✓ Conexión directa con SUNAT vía OSE</li>
            </ul>
            <a href="servicios.php" class="btn-hero-primary" style="display:inline-block;margin-top:24px;">Ver todos los servicios</a>
        </div>
        <div class="showcase-img">
            <img src="https://images.unsplash.com/photo-1460925895917-afdab827c52f?w=700&q=80" alt="Sistema de gestión">
        </div>
    </div>
</section>

<!-- TESTIMONIOS -->
<section class="testimonios-section">
    <h2 class="section-title"><i class="fa-solid fa-quote-left"></i> Lo que dicen nuestros clientes</h2>
    <p class="section-sub">Más de 500 empresas confían en sdrimsac</p>
    <div class="testimonios-grid">
        <div class="testimonio">
            <p>"SDRIM transformó nuestra facturación. Ahora emitimos 300 comprobantes diarios sin errores. El soporte es excepcional."</p>
            <div class="testimonio-autor">
                <div class="testimonio-avatar">JR</div>
                <div>
                    <strong>Jorge Ríos</strong>
                    <span>Gerente - Distribuidora El Sol</span>
                </div>
            </div>
        </div>
        <div class="testimonio">
            <p>"La implementación fue rápida y nos capacitaron muy bien. El sistema es intuitivo y funciona perfectamente con SUNAT."</p>
            <div class="testimonio-autor">
                <div class="testimonio-avatar">MP</div>
                <div>
                    <strong>María Palacios</strong>
                    <span>Contadora - Restaurante Lima</span>
                </div>
            </div>
        </div>
        <div class="testimonio">
            <p>"Llevamos mas 2 años usando SDRIM y nunca hemos tenido problemas. La integración con nuestras impresoras Epson es perfecta."</p>
            <div class="testimonio-autor">
                <div class="testimonio-avatar">CM</div>
                <div>
                    <strong>Carlos Mendoza</strong>
                    <span>CEO - TechStore Perú</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA FINAL -->
<section class="cta-section">
    <div class="cta-inner">
        <h2 class="section-title"><i class="fa-solid fa-rocket"></i> ¿Listo para digitalizar tu empresa?</h2>
        <p>Únete a más de 500 empresas que ya emiten comprobantes electrónicos con sdrimsac.</p>
        <a href="register.php" class="btn-hero-primary">Crear cuenta gratis</a>
    </div>
</section>

<?php include("includes/social.php"); ?>
<?php include("includes/footer.php"); ?>