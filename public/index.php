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
<link rel="stylesheet" href="assets/css/noticias-carousel.css">

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
            <img src="assets/img/LOGO.gif" 20200Palt="sdrimsac logo">
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
                        <li><a href="facturacionapafa.php">Facturación Apafa</a></li>
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

<!-- Carrusel de Noticias Dinámico -->
<?php include 'noticias_carousel.php'; ?>

<?php include 'comentarios_noticia.php'; ?>

<section class="carousel-section">
  <div class="carousel-wrapper">

    <!-- IZQUIERDA -->
    <div class="carousel-left">

      <div class="section-head">
        <h2>Nuestros Servicios</h2>
        <p>Soluciones tecnológicas para empresas en Perú</p>
      </div>

      <div class="compat-strip hero-strip">
        <span class="compat-title">
          Digitaliza tu empresa hoy: Facturación electrónica rápida, segura y sin complicaciones.
        </span>
        <div class="compat-logos"></div>
      </div>

      <div class="beneficios-clave-container">
        <h2 class="beneficios-clave-title">Beneficios Clave de Nuestra Facturación Electrónica</h2>

        <div class="beneficios-clave-grid">
          <div class="beneficio-item">
            <i class="fa-solid fa-stopwatch-20 icon-blue"></i>
            <h3>Rapidez Increíble</h3>
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

    <!-- DERECHA -->
    <div class="carousel-right">
      <div class="promo-card">
        <div class="promo-media">
          <video src="assets/img/video.mp4" autoplay loop muted playsinline></video>
          <img src="assets/img/2.png" alt="Sticker SDRIMSAC" class="promo-sticker">
        </div>

        <div class="promo-content">
          <span class="promo-badge">Soporte 24/7</span>
          <h3>Impulsa tu negocio con SDRIMSAC</h3>
          <p>Facturación electrónica lista para SUNAT, con soporte real, implementación rápida y operación segura.</p>

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
            <div class="somos-video-card">
                <video src="assets/video/Sdrimsac - 01 ok.mp4" controls muted playsinline class="somos-video"></video>
            </div>

            <div class="somos-video-card">
                <video src="assets/video/Funcionamiento de Rubro Consumo.mp4" controls muted playsinline class="somos-video"></video>
            </div>
        </div>

        <div class="somos-info">
            <span class="somos-label">SOMOS</span>
            <h2 class="somos-title">SDRIMSAC SOLUTIONS</h2>
            <p class="somos-desc">
                Somos especialistas en el mundo tecnológico (informática) que desarrolla
                Sistemas de Facturación Electrónica personalizados.
            </p>

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
                        <div class="somos-card-desc">Atención continua y oportuna</div>
                    </div>
                </div>
            </div>

            <p class="somos-mision">
                Partimos desde la idea de simplificarle la vida a los comerciantes de todo el territorio peruano,
                brindando herramientas tecnológicas necesarias.
            </p>

            <a href="nosotros.php" class="somos-btn">
                LEER MÁS <i class="fa-solid fa-arrow-right"></i>
            </a>
        </div>
    </div>
</section>

<!-- BENEFICIOS - ¿Por qué elegirnos? -->
<section class="beneficios-section">
    <div class="beneficios-wrap">
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
    </div>
</section>

<?php include 'carrusel_empresas.php'; ?>

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
            <img src="assets/img/facturacion1.jpg" alt="Sistema de gestión">
        </div>
    </div>
</section>


<link rel="stylesheet" href="assets/css/planes.css"> 
<!-- PLANES FACTURACION -->
<link rel="stylesheet" href="assets/css/planes.css">

<!-- PLANES FACTURACION -->
<section class="planes-section">
  <div class="planes-inner">

    <h2 class="planes-title">Planes de Facturación Electrónica</h2>

    <p class="planes-subtitle">
      Elige la solución ideal para tu tipo de negocio
    </p>

    <div class="planes-grid">

      <!-- PLAN EMPRENDEDOR -->
      <div class="plan-card">
        <div class="plan-img-wrap">
          <img src="assets/img/emprendedor.png" alt="Plan Emprendedor">
        </div>

        <h3>Emprendedor</h3>

        <p>Perfecto para pequeños negocios que están iniciando con facturación electrónica.</p>

        <ul class="plan-features">
          <li>✓ Facturas electrónicas</li>
          <li>✓ Boletas electrónicas</li>
          <li>✓ Registro de clientes</li>
          <li>✓ Soporte básico</li>
        </ul>

        <a href="https://wa.me/51995764963" target="_blank" class="plan-btn"></a>
      </div>

      <!-- PLAN BASICO -->
      <div class="plan-card">
        <div class="plan-img-wrap">
          <img src="assets/img/basico.png" alt="Plan Básico">
        </div>

        <h3>Básico</h3>

        <p>Ideal para negocios que necesitan control de ventas y facturación rápida.</p>

        <ul class="plan-features">
          <li>✓ Facturas y boletas</li>
          <li>✓ Control de productos</li>
          <li>✓ Reportes de ventas</li>
          <li>✓ Soporte técnico</li>
        </ul>

        <a href="https://wa.me/51995764963" target="_blank" class="plan-btn"></a>
      </div>

      <!-- PLAN EMPRESARIAL -->
      <div class="plan-card">
        <div class="plan-img-wrap">
          <img src="assets/img/empresarial.png" alt="Plan Empresarial">
        </div>

        <h3>Empresarial</h3>

        <p>Diseñado para empresas que requieren mayor control administrativo.</p>

        <ul class="plan-features">
          <li>✓ Control de inventario</li>
          <li>✓ Reportes financieros</li>
          <li>✓ Gestión de clientes</li>
          <li>✓ Soporte prioritario</li>
        </ul>

        <a href="https://wa.me/51995764963" target="_blank" class="plan-btn"></a>
      </div>

      <!-- PLAN PREMIUM -->
      <div class="plan-card">
        <div class="plan-img-wrap">
          <img src="assets/img/premium.png" alt="Plan Premium">
        </div>

        <h3>Premium</h3>

        <p>La solución más completa con soporte avanzado y personalización.</p>

        <ul class="plan-features">
          <li>✓ Sistema completo</li>
          <li>✓ Integración con SUNAT</li>
          <li>✓ Capacitación incluida</li>
          <li>✓ Soporte 24/7</li>
        </ul>

        <a href="https://wa.me/51995764963" target="_blank" class="plan-btn"></a>
      </div>

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
      <div class="cta-social">
        <a href="https://www.facebook.com/sdrimsacsolutions/#" target="_blank" title="Facebook SDRIMSAC" class="cta-social-icon cta-fb">
          <i class="fa-brands fa-facebook-f"></i>
        </a>
        <a href="https://www.tiktok.com/@sdrimsac" target="_blank" title="TikTok SDRIMSAC" class="cta-social-icon cta-tiktok">
          <i class="fa-brands fa-tiktok"></i>
        </a>
        <a href="https://maps.google.com/?q=SDRIMSAC+Solutions,+Lima,+Peru" target="_blank" title="Ubicación SDRIMSAC" class="cta-social-icon cta-location">
          <i class="fa-solid fa-location-dot"></i>
        </a>
          <a href="https://www.youtube.com/@sdrimsac" target="_blank" title="YouTube SDRIMSAC" class="cta-social-icon cta-youtube">
            <i class="fa-brands fa-youtube"></i>
          </a>
          <a href="https://www.instagram.com/sdrimsacsolutions/" target="_blank" title="Instagram SDRIMSAC" class="cta-social-icon cta-instagram">
            <i class="fa-brands fa-instagram"></i>
          </a>
      </div>
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
      <form id="asesor-form">
        <div style="display:flex;gap:8px;margin-bottom:8px;">
          <select name="tipo_doc" id="asesor-tipo-doc" required style="padding:8px;border-radius:6px;border:1px solid #ccc;">
            <option value="DNI">DNI</option>
            <option value="RUC">RUC</option>
          </select>
          <input type="text" name="doc" id="asesor-doc" placeholder="DNI o RUC" required style="flex:1;padding:8px;border-radius:6px;border:1px solid #ccc;">
          <button type="button" id="asesor-buscar" style="padding:8px 12px;border-radius:6px;border:1px solid #ccc;background:#eee;cursor:pointer;">
            <i class="fa fa-search"></i>
          </button>
        </div>
        <input type="text" name="nombres" id="asesor-nombres" placeholder="Nombres" style="width:100%;margin-bottom:8px;padding:8px;border-radius:6px;border:1px solid #ccc;">
        <input type="text" name="apellidos" id="asesor-apellidos" placeholder="Apellidos" style="width:100%;margin-bottom:8px;padding:8px;border-radius:6px;border:1px solid #ccc;">
        <input type="text" name="razon_social" id="asesor-razon-social" placeholder="Razón Social" style="width:100%;margin-bottom:8px;padding:8px;border-radius:6px;border:1px solid #ccc;">
        <input type="text" name="telefono" placeholder="Teléfono" inputmode="numeric" maxlength="9" pattern="\d{9}" required style="width:100%;margin-bottom:8px;padding:8px;border-radius:6px;border:1px solid #ccc;">
        <input type="text" name="empresa" placeholder="Nombre de la empresa" style="width:100%;margin-bottom:8px;padding:8px;border-radius:6px;border:1px solid #ccc;">
        <textarea name="mensaje" placeholder="Mensaje" style="width:100%;margin-bottom:8px;padding:8px;border-radius:6px;border:1px solid #ccc;"></textarea>
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
      <form id="demo-form">
        <div style="display:flex;gap:8px;margin-bottom:8px;">
          <select name="tipo_doc" id="demo-tipo-doc" required style="padding:8px;border-radius:6px;border:1px solid #ccc;">
            <option value="DNI">DNI</option>
            <option value="RUC">RUC</option>
          </select>
          <input type="text" name="doc" id="demo-doc" placeholder="DNI o RUC" required style="flex:1;padding:8px;border-radius:6px;border:1px solid #ccc;">
          <button type="button" id="demo-buscar" style="padding:8px 12px;border-radius:6px;border:1px solid #ccc;background:#eee;cursor:pointer;">
            <i class="fa fa-search"></i>
          </button>
        </div>
        <input type="text" name="nombres" id="demo-nombres" placeholder="Nombres" style="width:100%;margin-bottom:8px;padding:8px;border-radius:6px;border:1px solid #ccc;">
        <input type="text" name="apellidos" id="demo-apellidos" placeholder="Apellidos" style="width:100%;margin-bottom:8px;padding:8px;border-radius:6px;border:1px solid #ccc;">
        <input type="text" name="razon_social" id="demo-razon-social" placeholder="Razón Social" style="width:100%;margin-bottom:8px;padding:8px;border-radius:6px;border:1px solid #ccc;">
        <input type="text" name="telefono" placeholder="Teléfono" inputmode="numeric" maxlength="9" pattern="\d{9}" required style="width:100%;margin-bottom:8px;padding:8px;border-radius:6px;border:1px solid #ccc;">
        <div class="demo-rubro-wrap">
          <select name="rubro" id="demo-rubro" class="demo-rubro-control demo-rubro-select" size="1" required style="width:100%;padding:8px;border-radius:6px;border:1px solid #ccc;">
            <option value="">SELECCIONA UN RUBRO</option>
            <option value="CHIFA">CHIFA</option>
            <option value="CAFETERÍA">CAFETERÍA</option>
            <option value="CEVICHERÍA">CEVICHERÍA</option>
            <option value="KARAOKE">KARAOKE</option>
            <option value="PIZZERÍA">PIZZERÍA</option>
            <option value="RESTAURANT">RESTAURANT</option>
            <option value="RECREOS">RECREOS</option>
            <option value="HOSPITAL">HOSPITAL</option>
            <option value="FARMACIA">FARMACIA</option>
            <option value="HOTELES">HOTELES</option>
            <option value="ESCOLAR">ESCOLAR</option>
            <option value="CRÉDITOS">CRÉDITOS</option>
            <option value="FERRETERÍA">FERRETERÍA</option>
            <option value="OTROS">OTROS</option>
          </select>
        </div>
        <input type="text" name="rubro_otro" id="demo-rubro-otro" class="demo-rubro-control" placeholder="Especifica tu rubro" style="display:none;width:100%;margin-bottom:8px;padding:8px;border-radius:6px;border:1px solid #ccc;">
        <input type="text" name="empresa" placeholder="Nombre de la empresa" style="width:100%;margin-bottom:8px;padding:8px;border-radius:6px;border:1px solid #ccc;">
        <textarea name="mensaje" placeholder="Mensaje" style="width:100%;margin-bottom:8px;padding:8px;border-radius:6px;border:1px solid #ccc;"></textarea>
        <button type="submit" style="background:#18376b;color:#fff;padding:12px 32px;border:none;border-radius:8px;font-size:1.2em;display:flex;align-items:center;gap:8px;cursor:pointer;">
          <i class="fa-solid fa-rocket"></i> Solicitar Demo
        </button>
      </form>
    </div>
  </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
  const whatsappNumber = '51995764963';

  // --- Validación dinámica de longitud para DNI/RUC en ambos formularios ---
  function setDocInputMaxLength(tipoDocSelectId, docInputId) {
    const tipoDoc = document.getElementById(tipoDocSelectId);
    const docInput = document.getElementById(docInputId);
    function updateMaxLength() {
      if(tipoDoc.value === 'DNI') {
        docInput.maxLength = 8;
        docInput.value = docInput.value.slice(0, 8);
        docInput.pattern = '\\d{8}';
      } else {
        docInput.maxLength = 11;
        docInput.value = docInput.value.slice(0, 11);
        docInput.pattern = '\\d{11}';
      }
    }
    tipoDoc.addEventListener('change', updateMaxLength);
    docInput.addEventListener('input', function() {
      // Solo permitir números
      this.value = this.value.replace(/[^0-9]/g, '');
    });
    updateMaxLength();
  }
  setDocInputMaxLength('asesor-tipo-doc', 'asesor-doc');
  setDocInputMaxLength('demo-tipo-doc', 'demo-doc');

  function configurarCamposPorTipo(prefix) {
    const tipoDoc = document.getElementById(`${prefix}-tipo-doc`);
    const doc = document.getElementById(`${prefix}-doc`);
    const nombres = document.getElementById(`${prefix}-nombres`);
    const apellidos = document.getElementById(`${prefix}-apellidos`);
    const razonSocial = document.getElementById(`${prefix}-razon-social`);
    const form = document.getElementById(`${prefix}-form`);
    const empresa = form.querySelector('input[name="empresa"]');
    const telefono = form.querySelector('input[name="telefono"]');

    function setCampoVisible(campo, visible) {
      campo.style.display = visible ? 'block' : 'none';
    }

    function aplicarReglas() {
      const esDni = tipoDoc.value === 'DNI';

      telefono.required = true;
      telefono.maxLength = 9;
      telefono.pattern = '\\d{9}';

      nombres.required = false;
      apellidos.required = false;
      razonSocial.required = false;
      empresa.required = false;

      razonSocial.disabled = esDni;
      empresa.disabled = esDni;
      nombres.disabled = !esDni;
      apellidos.disabled = !esDni;

      setCampoVisible(nombres, esDni);
      setCampoVisible(apellidos, esDni);
      setCampoVisible(razonSocial, !esDni);
      setCampoVisible(empresa, !esDni);

      if (esDni) {
        razonSocial.value = '';
        empresa.value = '';
      } else {
        nombres.value = '';
        apellidos.value = '';
      }
    }

    tipoDoc.addEventListener('change', function() {
      doc.value = '';
      nombres.value = '';
      apellidos.value = '';
      razonSocial.value = '';
      empresa.value = '';
      nombres.readOnly = false;
      apellidos.readOnly = false;
      razonSocial.readOnly = false;
      aplicarReglas();
    });

    doc.addEventListener('input', function() {
      nombres.readOnly = false;
      apellidos.readOnly = false;
      razonSocial.readOnly = false;

      if (this.value.trim() === '') {
        nombres.value = '';
        apellidos.value = '';
        razonSocial.value = '';
      }
    });

    telefono.addEventListener('input', function() {
      this.value = this.value.replace(/\D/g, '').slice(0, 9);
    });

    aplicarReglas();
  }

  configurarCamposPorTipo('asesor');
  configurarCamposPorTipo('demo');

  function valorCampo(form, selector) {
    const campo = form.querySelector(selector);
    if (!campo || campo.disabled) return '';
    return (campo.value || '').trim();
  }

  function redirigirWhatsapp(form, titulo, nuevaPestana = false) {
    const tipo = valorCampo(form, '[name="tipo_doc"]');
    const doc = valorCampo(form, '[name="doc"]');
    const telefono = valorCampo(form, '[name="telefono"]');
    const telefonoDigitos = telefono.replace(/\D/g, '');

    if (telefonoDigitos.length !== 9) {
      alert('El teléfono es obligatorio y debe tener exactamente 9 dígitos.');
      return;
    }

    const nombres = valorCampo(form, '[name="nombres"]');
    const apellidos = valorCampo(form, '[name="apellidos"]');
    const razonSocial = valorCampo(form, '[name="razon_social"]');
    const empresa = valorCampo(form, '[name="empresa"]');
    const mensaje = valorCampo(form, '[name="mensaje"]');
    const rubroCampo = form.querySelector('[name="rubro"]');
    const rubroOtroCampo = form.querySelector('[name="rubro_otro"]');
    let rubro = '';

    if (rubroCampo) {
      rubro = (rubroCampo.value || '').trim();
      if (!rubro) {
        alert('Selecciona un rubro para solicitar demo.');
        return;
      }

      if (rubro === 'OTROS') {
        const rubroOtro = (rubroOtroCampo?.value || '').trim();
        if (!rubroOtro) {
          alert('Especifica tu rubro en la opción Otros.');
          return;
        }
        rubro = `OTROS: ${rubroOtro}`;
      }
    }


    // Mensaje concatenado en una sola frase
    let mensajeFinal = `${titulo}`;
    if (nombres || apellidos) {
      mensajeFinal += ` Mi nombre es ${nombres ? nombres : ''}${apellidos ? ' ' + apellidos : ''}.`;
    }
    if (tipo && doc) {
      mensajeFinal += ` Mi documento (${tipo}) es ${doc}.`;
    }
    if (telefono) {
      mensajeFinal += ` Mi teléfono es ${telefono}.`;
    }
    if (razonSocial) {
      mensajeFinal += ` Razón social: ${razonSocial}.`;
    }
    if (empresa) {
      mensajeFinal += ` Empresa: ${empresa}.`;
    }
    if (rubro) {
      mensajeFinal += ` Mi rubro es ${rubro}.`;
    }
    if (mensaje) {
      mensajeFinal += ` Mensaje: ${mensaje}.`;
    }

    const texto = encodeURIComponent(mensajeFinal);
    const urlWhatsapp = `https://wa.me/${whatsappNumber}?text=${texto}`;

    if (nuevaPestana) {
      window.open(urlWhatsapp, '_blank', 'noopener,noreferrer');
      return;
    }

    window.location.href = urlWhatsapp;
  }

  // --- API PERU DOC AUTOFILL PARA MODAL ASESOR ---
  function setAutofillReadonly(prefix, tipo, bloqueado) {
    const nombres = document.getElementById(`${prefix}-nombres`);
    const apellidos = document.getElementById(`${prefix}-apellidos`);
    const razonSocial = document.getElementById(`${prefix}-razon-social`);

    if (tipo === 'DNI') {
      nombres.readOnly = bloqueado;
      apellidos.readOnly = bloqueado;
      razonSocial.readOnly = false;
    } else {
      razonSocial.readOnly = bloqueado;
      nombres.readOnly = false;
      apellidos.readOnly = false;
    }
  }

  function limpiarCamposAsesor() {
    document.getElementById('asesor-nombres').value = '';
    document.getElementById('asesor-apellidos').value = '';
    document.getElementById('asesor-razon-social').value = '';
    setAutofillReadonly('asesor', document.getElementById('asesor-tipo-doc').value, false);
  }
  document.getElementById('asesor-buscar').addEventListener('click', function() {
    const tipo = document.getElementById('asesor-tipo-doc').value;
    const doc = document.getElementById('asesor-doc').value.trim();
    limpiarCamposAsesor();
    if((tipo === 'DNI' && doc.length === 8) || (tipo === 'RUC' && doc.length === 11)) {
      fetch(`helpers/apiperu.php?tipo=${tipo.toLowerCase()}&numero=${doc}`)
        .then(r => r.json())
        .then(data => {
          if(data.ok && data.data) {
            if(tipo === 'DNI') {
              document.getElementById('asesor-nombres').value = data.data.nombres || '';
              document.getElementById('asesor-apellidos').value = (data.data.apellido_paterno || '') + ' ' + (data.data.apellido_materno || '');
            } else if(tipo === 'RUC') {
              document.getElementById('asesor-razon-social').value = data.data.nombre_o_razon_social || data.data.razon_social || '';
            }
            setAutofillReadonly('asesor', tipo, true);
          } else {
            setAutofillReadonly('asesor', tipo, false);
            let msg = 'No se encontraron datos para el documento ingresado.';
            if(data.mensaje_api) msg += '\nMotivo: ' + data.mensaje_api;
            else if(data.error) msg += '\nMotivo: ' + data.error;
            alert(msg);
          }
        })
        .catch(() => {
          setAutofillReadonly('asesor', tipo, false);
          alert('Error consultando el documento.');
        });
    }
  });

  // --- API PERU DOC AUTOFILL PARA MODAL DEMO ---
  function limpiarCamposDemo() {
    document.getElementById('demo-nombres').value = '';
    document.getElementById('demo-apellidos').value = '';
    document.getElementById('demo-razon-social').value = '';
    setAutofillReadonly('demo', document.getElementById('demo-tipo-doc').value, false);
  }
  document.getElementById('demo-buscar').addEventListener('click', function() {
    const tipo = document.getElementById('demo-tipo-doc').value;
    const doc = document.getElementById('demo-doc').value.trim();
    limpiarCamposDemo();
    if((tipo === 'DNI' && doc.length === 8) || (tipo === 'RUC' && doc.length === 11)) {
      fetch(`helpers/apiperu.php?tipo=${tipo.toLowerCase()}&numero=${doc}`)
        .then(r => r.json())
        .then(data => {
          if(data.ok && data.data) {
            if(tipo === 'DNI') {
              document.getElementById('demo-nombres').value = data.data.nombres || '';
              document.getElementById('demo-apellidos').value = (data.data.apellido_paterno || '') + ' ' + (data.data.apellido_materno || '');
            } else if(tipo === 'RUC') {
              document.getElementById('demo-razon-social').value = data.data.nombre_o_razon_social || data.data.razon_social || '';
            }
            setAutofillReadonly('demo', tipo, true);
          } else {
            setAutofillReadonly('demo', tipo, false);
            alert('No se encontraron datos para el documento ingresado.');
          }
        })
        .catch(() => {
          setAutofillReadonly('demo', tipo, false);
          alert('Error consultando el documento.');
        });
    }
  });

  const demoRubro = document.getElementById('demo-rubro');
  const demoRubroOtro = document.getElementById('demo-rubro-otro');

  function expandirRubro() {
    demoRubro.size = 10;
    demoRubro.classList.add('expanded');
  }

  function colapsarRubro() {
    demoRubro.size = 1;
    demoRubro.classList.remove('expanded');
  }

  function actualizarRubroDemo() {
    const esOtros = demoRubro.value === 'OTROS';
    demoRubroOtro.style.display = esOtros ? 'block' : 'none';
    demoRubroOtro.required = esOtros;
    if (!esOtros) {
      demoRubroOtro.value = '';
    }
  }

  demoRubro.addEventListener('change', actualizarRubroDemo);
  demoRubro.addEventListener('focus', expandirRubro);
  demoRubro.addEventListener('blur', colapsarRubro);
  demoRubro.addEventListener('mousedown', function(e) {
    if (demoRubro.size === 1) {
      e.preventDefault();
      expandirRubro();
      demoRubro.focus();
    }
  });
  demoRubro.addEventListener('change', function() {
    setTimeout(colapsarRubro, 0);
  });

  demoRubroOtro.addEventListener('input', function() {
    this.value = this.value.toUpperCase();
  });
  actualizarRubroDemo();
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
    redirigirWhatsapp(form, 'Hola, quiero contactar con un asesor.');
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
    redirigirWhatsapp(demoForm, 'Hola, quiero solicitar una demo.', true);
  });
});
</script>

<style>
.demo-rubro-control {
  text-transform: uppercase;
}
.demo-rubro-wrap {
  position: relative;
  margin-bottom: 8px;
  min-height: 40px;
}
.demo-rubro-select {
  background: #fff;
  cursor: pointer;
  font-weight: 600;
  width: 100%;
  margin-bottom: 0;
}
.demo-rubro-select.expanded {
  position: absolute;
  left: 0;
  top: 0;
  z-index: 60;
  width: 100%;
  overflow-y: auto;
  box-shadow: 0 8px 20px rgba(0, 0, 0, 0.18);
}
.demo-rubro-select option {
  padding: 6px 8px;
}
</style>

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