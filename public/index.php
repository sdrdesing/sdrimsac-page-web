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
<link rel="stylesheet" href="assets/css/carousel.css">
<link rel="stylesheet" href="assets/css/somos.css">
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
                        <li><a href="facturacionhospital.php">Facturación Hospital</a></li>
                        <li><a href="facturacionfarmacia.php">Facturación Farmacia</a></li>
                        <li><a href="facturacionhoteles.php">Facturación Hoteles</a></li>
                        <li><a href="facturacionescolar.php">Facturación Escolar</a></li>
                        <li><a href="facturacioncreditos.php">Facturación Créditos</a></li>
                        <li><a href="facturacionferreteria.php">Facturación Ferretería</a></li>
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

        <a href="admin/dashboard.php" class="account-icon" title="Mi cuenta">
            <i class="fa-solid fa-user-circle"></i>
            <span class="account-text">Mi cuenta</span>
        </a>

        <a href="carrito.php" class="cart-icon" title="Carrito">
            <i class="fa-solid fa-cart-shopping"></i>
            <span class="cart-count"><?php
                $count = 0;
                if($dbLoaded){
                    $q = $conn->query("SELECT SUM(cantidad) AS total FROM carrito");
                    if($q){
                        $r = $q->fetch_assoc();
                        $count = intval($r['total']) ?: 0;
                    }
                } else {
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
            <button id="contact-asesor-btn" class="btn-hero-primary">Contacta un Asesor</button>
            <button id="solicitar-demo-btn" class="btn-hero-secondary">Solicitar Demo</button>
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

<section class="carousel-section">
  <div class="carousel-wrapper">

    <!-- IZQUIERDA: CARRUSEL -->
    <div class="carousel-left">
      <div class="section-head">
        <h2>Nuestros Servicios</h2>
        <p>Soluciones tecnológicas para empresas en Perú</p>
      </div>


      <div class="carousel-left">
    <div class="compat-strip">
        <span class="compat-title">Digitaliza tu empresa hoy: Facturación electrónica rápida, segura y sin complicaciones.</span>
        <div class="compat-logos"> 
            </div>
    </div>

    <div class="beneficios-clave-container">
        <h2 class="beneficios-clave-title">Beneficios Clave de Nuestra Facturación Electrónica</h2>
        <div class="beneficios-clave-grid">
            <div class="beneficio-item">
                <i class="fa-solid fa-stopwatch-20 icon-blue"></i> <h3>Rapidez Increíble</h3>
                <p>Emite tus comprobantes en segundos, no minutos.</p>
            </div>
            <div class="beneficio-item">
                <i class="fa-solid fa-shield-halved icon-blue"></i>
                <h3>Seguridad Total</h3>
                <p>Tus datos están protegidos con cifrado de nivel bancario.</p>
            </div>
            <div class="beneficio-item">
                <i class="fa-solid fa-coins icon-blue"></i>
                <h3>Ahorro de Costos</h3>
                <p>Reduce gastos operativos y de papel significativamente.</p>
            </div>
            <div class="beneficio-item">
                <i class="fa-solid fa-laptop-medical icon-blue"></i>
                <h3>Acceso Multiplataforma</h3>
                <p>Gestiona tu negocio desde cualquier dispositivo y lugar.</p>
            </div>
        </div>
    </div>
</div> <div class="carousel-right">
    </div>

      <div class="carousel-multi-container">
        <button class="carousel-btn prev" onclick="moveMultiCarousel(-1)">&#10094;</button>

        <div class="carousel-multi-track">

          <div class="carousel-multi-slide">
            <a class="service-card" href="servicios.php#facturacion-electronica">
              <img src="assets/img/img1.jpg" alt="Facturación electrónica">
              <span class="service-tag">SUNAT</span>
              <div class="service-title">Facturación Electrónica</div>
              <div class="service-sub">Boletas, facturas y notas</div>
            </a>
          </div>

          <div class="carousel-multi-slide">
            <a class="service-card" href="paginaweb.php">
              <img src="assets/img/img8.jpg" alt="Páginas web">
              <span class="service-tag">WEB</span>
              <div class="service-title">Páginas Web</div>
              <div class="service-sub">Diseño moderno y rápido</div>
            </a>
          </div>

          <div class="carousel-multi-slide">
            <a class="service-card" href="servicios.php">
              <img src="assets/img/img3.jpg" alt="Hosting web">
              <span class="service-tag">HOST</span>
              <div class="service-title">Hosting Web</div>
              <div class="service-sub">Seguridad + rendimiento</div>
            </a>
          </div>

          <div class="carousel-multi-slide">
            <a class="service-card" href="tiendasvirtuales.php">
              <img src="assets/img/img4.jpg" alt="Tiendas virtuales">
              <span class="service-tag">E-COM</span>
              <div class="service-title">Tiendas Virtuales</div>
              <div class="service-sub">Vende online 24/7</div>
            </a>
          </div>

          <div class="carousel-multi-slide">
            <a class="service-card" href="marketingdigital.php">
              <img src="assets/img/img5.jpg" alt="Marketing digital">
              <span class="service-tag">ADS</span>
              <div class="service-title">Marketing Digital</div>
              <div class="service-sub">Campañas + contenido</div>
            </a>
          </div>

          <div class="carousel-multi-slide">
            <a class="service-card" href="instalacioncamaras.php">
              <img src="assets/img/img6.jpg" alt="Cámaras de seguridad">
              <span class="service-tag">CCTV</span>
              <div class="service-title">Cámaras de Seguridad</div>
              <div class="service-sub">Instalación profesional</div>
            </a>
          </div>

          <div class="carousel-multi-slide">
            <a class="service-card" href="instalacionluminarias.php">
              <img src="assets/img/img7.jpg" alt="Luminarias solares">
              <span class="service-tag">SOLAR</span>
              <div class="service-title">Luminarias Solares</div>
              <div class="service-sub">Ahorro + durabilidad</div>
            </a>
          </div>

          <div class="carousel-multi-slide">
            <a class="service-card" href="productos.php">
              <img src="assets/img/img9.jpg" alt="Tienda">
              <span class="service-tag">SHOP</span>
              <div class="service-title">Tienda</div>
              <div class="service-sub">Productos y licencias</div>
            </a>
          </div>

        </div>

        <button class="carousel-btn next" onclick="moveMultiCarousel(1)">&#10095;</button>
      </div>

      <!-- COMPATIBLE CON -->
      <div class="compat-strip">
        <span class="compat-title">Compatible con</span>
        <div class="compat-logos">
          <span class="compat-logo">SUNAT</span>
          <span class="compat-logo">OSE</span>
          <span class="compat-logo">Nubefact</span>
          <span class="compat-logo">Bizlinks</span>
          <span class="compat-logo">Efact</span>
        </div>
      </div>
      

    </div>

    <!-- DERECHA: PANEL DRAGÓN PRO -->
    <div class="carousel-right">
      <div class="promo-card">
                <div style="position:relative;width:100%;">
                    <video src="assets/img/video.mp4" autoplay loop muted style="width:100%;border-radius:16px;"></video>
                        <img src="assets/img/2.png" alt="Sticker" style="position:absolute;top: -120px;right:-70px;width:270px;z-index:2;">
                </div>

        <div class="promo-content">
          <span class="promo-badge">Soporte 24/7</span>
          <h3>Impulsa tu negocio con SDRIMSAC</h3>
          <p>Facturación electrónica lista para SUNAT + soporte real. Implementación rápida y segura.</p>

          <div class="promo-actions">
            <a class="btn-primary" href="https://wa.me/51995764963" target="_blank">WhatsApp</a>
            <a class="btn-ghost" href="servicios.php">Ver Servicios</a>
          </div>

          <div class="promo-metrics">
            <div><strong>+500</strong><span>Empresas</span></div>
            <div><strong>24/7</strong><span>Soporte</span></div>
            <div><strong>99.9%</strong><span>Estable</span></div>
          </div>
        </div>
      </div>
    </div>
    

  </div>

</section>

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

<!-- BENEFICIOS - ¿Por qué elegirnos? -->
<section class="beneficios-section">
    <h2 class="beneficios-title">¿Por qué Elegirnos?</h2>
    <div class="beneficios-grid">
        <div class="beneficio-card">
            <div class="beneficio-icon"><i class="fa-solid fa-lightbulb"></i></div>
            <h3>Innovación Constante</h3>
            <p>Mantenemos nuestras soluciones tecnológicas actualizadas para que tu empresa siempre esté a la vanguardia.</p>
        </div>
        <div class="beneficio-card">
            <div class="beneficio-icon"><i class="fa-solid fa-user-graduate"></i></div>
            <h3>Experiencia</h3>
            <p>Contamos con un equipo altamente calificado y con experiencia en el sector de servicios tecnológicos y facturación electrónica.</p>
        </div>
        <div class="beneficio-card">
            <div class="beneficio-icon"><i class="fa-solid fa-shield-halved"></i></div>
            <h3>Seguridad de Datos</h3>
            <p>Seguridad de tus datos y de tu empresa. Implementamos medidas de seguridad informática para proteger tus registros y transacciones.</p>
        </div>
        <div class="beneficio-card">
            <div class="beneficio-icon"><i class="fa-solid fa-headset"></i></div>
            <h3>Asesoría Técnica</h3>
            <p>Contarás con un equipo de atención al cliente siempre dispuesto a responder a tus preguntas y resolver cualquier problema que puedas tener.</p>
        </div>
    </div>
</section>

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

<!-- Modal Contacta un Asesor -->
<div id="contact-asesor-modal" class="modal-overlay" style="display:none;position:fixed;top:0;left:0;width:100vw;height:100vh;background:rgba(0,0,0,0.5);z-index:9999;justify-content:center;align-items:center;">
  <div class="modal-content" style="background:#fff;border-radius:16px;max-width:600px;width:90vw;padding:32px;position:relative;box-shadow:0 8px 32px #0003;display:flex;gap:32px;">
    <img src="assets/img/demo.png" alt="Robot SDRIMSAC" style="width:180px;height:auto;">
    <div style="flex:1;">
      <button id="close-modal-btn" style="position:absolute;top:16px;right:16px;background:#ffc107;border:none;border-radius:50%;width:32px;height:32px;font-size:1.5em;cursor:pointer;">&times;</button>
      <h2 style="color:#d00;font-weight:bold;">CONTACTA UN ASESOR</h2>
      <p>Favor completar los siguientes datos para poder contactar a un asesor</p>
      <form>
        <input type="text" placeholder="Nombre" required style="width:100%;margin-bottom:8px;padding:8px;border-radius:6px;border:1px solid #ccc;">
        <input type="text" placeholder="Teléfono" required style="width:100%;margin-bottom:8px;padding:8px;border-radius:6px;border:1px solid #ccc;">
        <input type="email" placeholder="Correo electrónico" required style="width:100%;margin-bottom:8px;padding:8px;border-radius:6px;border:1px solid #ccc;">
        <textarea placeholder="QUIERO CONTACTAR UN ASESOR" required style="width:100%;margin-bottom:8px;padding:8px;border-radius:6px;border:1px solid #ccc;"></textarea>
        <div style="margin-bottom:8px;">
          <input type="checkbox" id="not-robot">
          <label for="not-robot">No soy un robot</label>
        </div>
        <button type="submit" style="background:#28a745;color:#fff;padding:12px 32px;border:none;border-radius:8px;font-size:1.2em;display:flex;align-items:center;gap:8px;cursor:pointer;">
          <i class="fa-brands fa-whatsapp"></i> Contactar
        </button>
      </form>
    </div>
  </div>
</div>

<!-- Modal Solicitar Demo -->
<div id="solicitar-demo-modal" class="modal-overlay" style="display:none;position:fixed;top:0;left:0;width:100vw;height:100vh;background:rgba(0,0,0,0.5);z-index:9999;justify-content:center;align-items:center;">
  <div class="modal-content" style="background:#fff;border-radius:16px;max-width:600px;width:90vw;padding:32px;position:relative;box-shadow:0 8px 32px #0003;display:flex;gap:32px;">
    <img src="assets/img/SDRIMSAC.png" alt="Demo SDRIMSAC" style="width:180px;height:auto;">
    <div style="flex:1;">
      <button id="close-demo-modal-btn" style="position:absolute;top:16px;right:16px;background:#18376b;border:none;border-radius:50%;width:32px;height:32px;font-size:1.5em;color:#fff;cursor:pointer;">&times;</button>
      <h2 style="color:#18376b;font-weight:bold;">SOLICITAR DEMO</h2>
      <p>Completa los datos para solicitar una demo gratuita</p>
      <form>
        <input type="text" placeholder="Nombre" required style="width:100%;margin-bottom:8px;padding:8px;border-radius:6px;border:1px solid #ccc;">
        <input type="email" placeholder="Correo electrónico" required style="width:100%;margin-bottom:8px;padding:8px;border-radius:6px;border:1px solid #ccc;">
        <input type="tel" placeholder="Teléfono" required style="width:100%;margin-bottom:8px;padding:8px;border-radius:6px;border:1px solid #ccc;">
        <textarea placeholder="¿Qué sistema te interesa?" required style="width:100%;margin-bottom:8px;padding:8px;border-radius:6px;border:1px solid #ccc;"></textarea>
        <div style="margin-bottom:8px;">
          <input type="checkbox" id="demo-not-robot">
          <label for="demo-not-robot">No soy un robot</label>
        </div>
        <button type="submit" style="background:#18376b;color:#fff;padding:12px 32px;border:none;border-radius:8px;font-size:1.2em;display:flex;align-items:center;gap:8px;cursor:pointer;">
          <i class="fa-solid fa-rocket"></i> Solicitar Demo
        </button>
      </form>
    </div>
  </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
  const contactBtn = document.getElementById('contact-asesor-btn');
  const modal = document.getElementById('contact-asesor-modal');
  const closeBtn = document.getElementById('close-modal-btn');
  contactBtn.addEventListener('click', function(e) {
    e.preventDefault();
    modal.style.display = 'flex';
  });
  closeBtn.addEventListener('click', function() {
    modal.style.display = 'none';
  });
  modal.addEventListener('click', function(e) {
    if(e.target === modal) modal.style.display = 'none';
  });

  // Redirigir a WhatsApp al enviar el formulario
  const form = modal.querySelector('form');
  form.addEventListener('submit', function(e) {
    e.preventDefault();
    window.location.href = 'https://wa.me/51995764963';
  });

  // Solicitar Demo modal logic
  const demoBtn = document.getElementById('solicitar-demo-btn');
  const demoModal = document.getElementById('solicitar-demo-modal');
  const closeDemoBtn = document.getElementById('close-demo-modal-btn');
  demoBtn.addEventListener('click', function(e) {
    e.preventDefault();
    demoModal.style.display = 'flex';
  });
  closeDemoBtn.addEventListener('click', function() {
    demoModal.style.display = 'none';
  });
  demoModal.addEventListener('click', function(e) {
    if(e.target === demoModal) demoModal.style.display = 'none';
  });
  // Demo form submit: redirect to WhatsApp
  const demoForm = demoModal.querySelector('form');
  demoForm.addEventListener('submit', function(e) {
    e.preventDefault();
    window.location.href = 'https://wa.me/51995764963';
  });
});
</script>

<?php include("includes/social.php"); ?>
<?php include("includes/footer.php"); ?>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const cards = document.querySelectorAll('.beneficio-card');
    const observer = new IntersectionObserver(entries => {
        entries.forEach(entry => {
            if(entry.isIntersecting) {
                entry.target.classList.add('visible');
                observer.unobserve(entry.target);
            }
        });
    }, { threshold: 0.2 });
    cards.forEach(card => observer.observe(card));
});
</script>

</body>
</html>