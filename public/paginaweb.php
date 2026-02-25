<?php
// Iniciar sesión solo si no hay una sesión activa (evita Notice por doble session_start)
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<?php
// Intentamos cargar la conexión a la base si existe (para contar productos en carrito DB)
$dbLoaded = false;
if(file_exists(__DIR__ . '/../config/database.php')){
    try {
        require_once __DIR__ . '/../config/database.php';
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
    <title>Páginas Web - SDRIMSAC</title>
    <link rel="stylesheet" href="assets/css/estilo.css">
    <link rel="stylesheet" href="assets/css/paginaweb.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="assets/js/script.js" defer></script>
</head>
<body>
    <?php include(__DIR__ . '/includes/header.php'); ?>

    <section class="servicios-header" style="background:#18376b; color:#fff; padding:60px 0 40px 0; text-align:center;">
        <h1 style="font-size:3rem;font-weight:700;margin-bottom:12px;">Páginas Web</h1>
        <div style="font-size:1.5rem;font-weight:500;margin-bottom:8px;">Sdrim S.A.C.</div>
        <div style="font-size:1.1rem;color:#cfd8e3;">Servicios <span style="color:#fff;">:</span> Páginas Web</div>
    </section>

    <div class="paginaweb-intro-card">
        <h2>Descubre sobre Páginas Web</h2>
        <p>Especializada en el desarrollo y diseño web, y nuestra misión es transformar las ideas y visiones de nuestros clientes en experiencias web funcionales, atractivas y efectivas. Entendemos que una página web es la ventana principal de una empresa en el mundo digital, por lo que nos esforzamos por crear soluciones web de alta calidad que generen impacto y resultados tangibles.</p>
        <div class="paginaweb-list-grid">
            <ul class="paginaweb-list">
                <li><i class="fa-solid fa-circle-check"></i> Diseño Web Creativos</li>
                <li><i class="fa-solid fa-circle-check"></i> Desarrollo Web Personalizado</li>
                <li><i class="fa-solid fa-circle-check"></i> Optimización para Móviles y Responsividad</li>
            </ul>
            <ul class="paginaweb-list">
                <li><i class="fa-solid fa-circle-check"></i> Seguridad y Protección</li>
                <li><i class="fa-solid fa-circle-check"></i> Gestión y Contenido</li>
                <li><i class="fa-solid fa-circle-check"></i> Analíticas Web y Seguimiento</li>
            </ul>
        </div>
    </div>

    <section class="paginaweb-beneficios-section">
        <div class="paginaweb-beneficios-title">BENEFICIOS DE LA PÁGINA WEB</div>
        <div class="paginaweb-beneficios-desc">Descubre cómo nuestra página web te ayuda a optimizar tu tiempo y acceder a nuestros servicios en cualquier momento.<br>A continuación, te presentamos todos los beneficios que te esperan.</div>
        <div class="paginaweb-beneficios-grid">
        <div class="paginaweb-beneficio-card">
            <img src="https://cdn-icons-png.flaticon.com/512/1828/1828884.png" alt="Visibilidad">
            <h3>Visibilidad en Línea</h3>
            <p>Una página web te proporciona una presencia en línea permanente y global. Los usuarios de Internet pueden encontrar tu sitio web desde cualquier parte del mundo en cualquier momento.</p>
        </div>
        <div class="paginaweb-beneficio-card">
            <img src="https://cdn-icons-png.flaticon.com/512/1828/1828919.png" alt="Alcance Global">
            <h3>Alcance Global</h3>
            <p>Puedes llegar a una audiencia global sin necesidad de estar físicamente presente en diferentes lugares. Esto amplía enormemente tu mercado potencial.</p>
        </div>
        <div class="paginaweb-beneficio-card">
            <img src="https://cdn-icons-png.flaticon.com/512/1828/1828917.png" alt="Credibilidad">
            <h3>Credibilidad y Profesionalismo</h3>
            <p>Tener un sitio web bien diseñado y funcional aumenta la credibilidad y proyecta una imagen profesional, lo que puede atraer a más clientes o seguidores.</p>
        </div>
        <div class="paginaweb-beneficio-card">
            <img src="https://cdn-icons-png.flaticon.com/512/1828/1828915.png" alt="Marca">
            <h3>Control sobre tu Marca</h3>
            <p>Una página web te da el control total sobre la presentación de tu marca, incluyendo diseño, contenido y mensaje. Puedes comunicar tus valores, servicios y productos de manera clara y coherente.</p>
        </div>
        <div class="paginaweb-beneficio-card">
            <img src="https://cdn-icons-png.flaticon.com/512/1828/1828918.png" alt="Marketing">
            <h3>Marketing y Promoción</h3>
            <p>Tu sitio web como una plataforma para estrategias de marketing digital, incluyendo SEO, publicidad pagada y redes sociales.</p>
        </div>
        <div class="paginaweb-beneficio-card">
            <img src="https://cdn-icons-png.flaticon.com/512/1828/1828916.png" alt="Actualización">
            <h3>Información Actualizada</h3>
            <p>Las páginas web permiten la integración de formularios de contacto, suscripciones a newsletters y otros mecanismos para capturar información de posibles clientes o seguidores.</p>
        </div>
    </div>
</section>

<section class="paginaweb-precios-section">
    <div class="paginaweb-precios-title">Nuestro mejores precio para Paginas Webs</div>
    <div class="paginaweb-precios-grid">
        <div class="paginaweb-precio-card">
            <h3>Página Web Emprendedor</h3>
            <div class="sub">OPCION ASEQUIBLE PARA EMPRENDEDORES QUE RECIEN EMPIEZA SU NEGOCIO</div>
            <div class="precio">s/ 449 <span style="font-size:1rem; color:#888;">/por año</span></div>
            <ul>
                <li><i class="fa-solid fa-circle-check"></i> Precio en $USD 179.00</li>
                <li><i class="fa-solid fa-circle-check"></i> Brindamos Facilidades de Pago</li>
                <li><i class="fa-solid fa-circle-check"></i> El Precio Incluye IGV</li>
                <li><i class="fa-solid fa-circle-check"></i> Asesoria Gratuita</li>
                <li><i class="fa-solid fa-circle-check"></i> Hasta 25 Páginas Internas</li>
                <li><i class="fa-solid fa-circle-check"></i> Incl. Hosting Emprendedor 10GB</li>
                <li><i class="fa-solid fa-circle-check"></i> Incl. 50 Correos Electrónico</li>
                <li><i class="fa-solid fa-circle-check"></i> Incl. Dominio Gratis (.COM)</li>
                <li><i class="fa-solid fa-circle-check"></i> Personalización Completa</li>
                <li><i class="fa-solid fa-circle-check"></i> Diseño a gusto del Cliente</li>
                <li><i class="fa-solid fa-circle-check"></i> Diferentes Plantillas a Escoger</li>
                <li><i class="fa-solid fa-circle-check"></i> Certificación de Seguridad SSL</li>
                <li><i class="fa-solid fa-circle-check"></i> Pagos Online - Offline</li>
                <li><i class="fa-solid fa-circle-check"></i> Plantilla Ideal para SEO</li>
                <li><i class="fa-solid fa-circle-check"></i> Adaptable a Dispositivo</li>
                <li><i class="fa-solid fa-circle-check"></i> Chat Online WhatsApp Business</li>
                <li><i class="fa-solid fa-circle-check"></i> Formulario de Contacto</li>
                <li><i class="fa-solid fa-circle-check"></i> Creación de 2 Banners</li>
                <li><i class="fa-solid fa-circle-check"></i> Acceso Completo Administrador</li>
                <li><i class="fa-solid fa-circle-check"></i> Imunify360 Seguridad Gratis</li>
                <li><i class="fa-solid fa-circle-check"></i> Manual de Usuario Incluido</li>
            </ul>
            <a href="https://wa.me/51995764963?text=Hola%20quiero%20cotizar%20una%20p%C3%A1gina%20web" target="_blank" class="btn-cotizar">COTIZAR</a>
        </div>
        <div class="paginaweb-precio-card">
            <h3>Página Web Empresa</h3>
            <div class="sub">OPCION ASEQUIBLE PARA EMPRENDEDORES QUE RECIEN EMPIEZA SU NEGOCIO</div>
            <div class="precio">s/ 999 <span style="font-size:1rem; color:#888;">/por año</span></div>
            <ul>
                <li><i class="fa-solid fa-circle-check"></i> Precio en $USD 279.00</li>
                <li><i class="fa-solid fa-circle-check"></i> Brindamos facilidades de pago</li>
                <li><i class="fa-solid fa-circle-check"></i> El precio incluye IGV</li>
                <li><i class="fa-solid fa-circle-check"></i> Asesoria Gratuita</li>
                <li><i class="fa-solid fa-circle-check"></i> Hasta 50 Páginas Internas</li>
                <li><i class="fa-solid fa-circle-check"></i> Incl. Hosting Empresa 50GB</li>
                <li><i class="fa-solid fa-circle-check"></i> Incl. 100 Correo Electrónico</li>
                <li><i class="fa-solid fa-circle-check"></i> Incl. Dominio gratis (.PE)</li>
                <li><i class="fa-solid fa-circle-check"></i> Personalización Completa</li>
                <li><i class="fa-solid fa-circle-check"></i> Diseño a gusto del Cliente</li>
                <li><i class="fa-solid fa-circle-check"></i> Diferentes Plantillas a Escoger</li>
                <li><i class="fa-solid fa-circle-check"></i> Certificación de Seguridad SSL</li>
                <li><i class="fa-solid fa-circle-check"></i> Pagos Online - Offline</li>
                <li><i class="fa-solid fa-circle-check"></i> Plantilla Ideal para SEO</li>
                <li><i class="fa-solid fa-circle-check"></i> Adaptable a Dispositivos</li>
                <li><i class="fa-solid fa-circle-check"></i> Chat Online WhatsApp Business</li>
                <li><i class="fa-solid fa-circle-check"></i> Formulario de Contacto</li>
                <li><i class="fa-solid fa-circle-check"></i> Creación de 5 banners</li>
                <li><i class="fa-solid fa-circle-check"></i> Acceso Completo Administrador</li>
                <li><i class="fa-solid fa-circle-check"></i> Imunify360 Seguridad Gratis</li>
                <li><i class="fa-solid fa-circle-check"></i> Manual de Usuario Incluido</li>
            </ul>
            <a href="https://wa.me/51995764963?text=Hola%20quiero%20cotizar%20una%20p%C3%A1gina%20web" target="_blank" class="btn-cotizar">COTIZAR</a>
        </div>
        <div class="paginaweb-precio-card">
            <h3>Página Web Premium</h3>
            <div class="sub">OPCION ASEQUIBLE PARA EMPRENDEDORES QUE RECIEN EMPIEZA SU NEGOCIO</div>
            <div class="precio">s/ 1,449 <span style="font-size:1rem; color:#888;">/por año</span></div>
            <ul>
                <li><i class="fa-solid fa-circle-check"></i> Precio en $USD 407.00</li>
                <li><i class="fa-solid fa-circle-check"></i> Brindamos facilidades de pago</li>
                <li><i class="fa-solid fa-circle-check"></i> El precio incluye IGV</li>
                <li><i class="fa-solid fa-circle-check"></i> Asesoria Gratuita</li>
                <li><i class="fa-solid fa-circle-check"></i> Hasta 100 Páginas Internas</li>
                <li><i class="fa-solid fa-circle-check"></i> Incl. Hosting Emprendedor 100GB</li>
                <li><i class="fa-solid fa-circle-check"></i> Incl. 200 Correo Electrónico</li>
                <li><i class="fa-solid fa-circle-check"></i> Incl. Dominio gratis (.PE)</li>
                <li><i class="fa-solid fa-circle-check"></i> Personalización Completa</li>
                <li><i class="fa-solid fa-circle-check"></i> Diseño a gusto del Cliente</li>
                <li><i class="fa-solid fa-circle-check"></i> Diferentes Plantillas a Escoger</li>
                <li><i class="fa-solid fa-circle-check"></i> Certificación de Seguridad SSL</li>
                <li><i class="fa-solid fa-circle-check"></i> Pagos Online - Offline</li>
                <li><i class="fa-solid fa-circle-check"></i> Plantilla Ideal para SEO</li>
                <li><i class="fa-solid fa-circle-check"></i> Adaptable a Dispositivos</li>
                <li><i class="fa-solid fa-circle-check"></i> Chat Online WhatsApp Business</li>
                <li><i class="fa-solid fa-circle-check"></i> Formulario de Contacto</li>
                <li><i class="fa-solid fa-circle-check"></i> Creación de 7 banners</li>
                <li><i class="fa-solid fa-circle-check"></i> Acceso Completo Administrador</li>
                <li><i class="fa-solid fa-circle-check"></i> Imunify360 Seguridad Gratis</li>
                <li><i class="fa-solid fa-circle-check"></i> Manual de Usuario Incluido</li>
            </ul>
            <a href="https://wa.me/51995764963?text=Hola%20quiero%20cotizar%20una%20p%C3%A1gina%20web" target="_blank" class="btn-cotizar">COTIZAR</a>
        </div>
    </div>
</section>


    <?php include(__DIR__ . '/includes/footer.php'); ?>
</body>
</html>