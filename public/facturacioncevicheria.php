<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Facturación Cevichería - SDRIMSAC</title>
    <link rel="stylesheet" href="assets/css/estilo.css">
    <link rel="stylesheet" href="assets/css/facturacioncevicheria.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>

<?php include("includes/header.php"); ?>

<!-- BANNER MODERNO -->
<section class="cevicheria-banner-modern">
    <img src="https://images.unsplash.com/photo-1486312338219-ce68d2c6f44d?w=1400&q=80" alt="Banner Cevichería">
    <div class="cevicheria-banner-overlay"></div>

    <div class="cevicheria-banner-content">
        <span class="cevicheria-badge">Solución especializada para Cevicherías</span>
        <h1>Aplicativo para Facturación Electrónica - Cevichería</h1>
        <p>Sdrim S.A.C. · Servicios · Facturación Electrónica para Cevicherías</p>
    </div>
</section>

<!-- HERO PRINCIPAL -->
<section class="cevicheria-hero">
    <div class="cevicheria-hero-container">

        <div class="cevicheria-hero-text">
            <span class="cevicheria-tag">Solución integral</span>

            <h2>Desarrollo de Facturación Electrónica</h2>

            <p>
                El servicio de desarrollo de facturación electrónica para una CEVICHERÍA
                busca simplificar y agilizar el proceso de emisión de facturas,
                garantizando la legalidad y eficiencia en la gestión financiera.
                El sistema permite personalizar comprobantes electrónicos
                con identidad visual del negocio y envío directo a SUNAT.
            </p>

            <div class="cevicheria-features">
                <div class="feature">
                    <i class="fa-solid fa-check"></i>
                    <span>Emisión rápida de comprobantes electrónicos</span>
                </div>

                <div class="feature">
                    <i class="fa-solid fa-check"></i>
                    <span>Control de caja, ventas y pedidos</span>
                </div>

                <div class="feature">
                    <i class="fa-solid fa-check"></i>
                    <span>Envío directo de comprobantes a SUNAT</span>
                </div>
            </div>
        </div>

        <div class="cevicheria-hero-image">
            <div class="cevicheria-banner-container">
                <img src="assets/img/banercevicheria.png" alt="Facturación Cevichería" class="cevicheria-banner">
                <img src="assets/img/cevicheria.jpg" alt="Sistema Cevichería" class="cevicheria-card">
            </div>
        </div>

    </div>
</section>

<!-- MÓDULOS -->
<section class="cevicheria-modulos-section">
    <div class="cevicheria-section-heading">
        <span class="cevicheria-tag">Funciones principales</span>
        <h3>Módulos del sistema</h3>
        <p>
            Organiza la operación de la cevichería con herramientas especializadas para administración, caja, atención, cocina y barra.
        </p>
    </div>

    <div class="fact-modulos">
        <div class="modulo">
            <h3><i class="fa-solid fa-user-gear"></i> ADMINISTRADOR</h3>
            <ul>
                <li>Mantenimiento de Usuarios y Clientes</li>
                <li>Compras y Registro de Cuentas</li>
                <li>Creación de Productos y Servicios</li>
                <li>Ventas Administrativas</li>
                <li>Reporte de Caja</li>
                <li>Reporte de Stock</li>
                <li>Reporte de Ganancias</li>
            </ul>
        </div>

        <div class="modulo">
            <h3><i class="fa-solid fa-cash-register"></i> CAJA</h3>
            <ul>
                <li>Emisión de Boletas y Facturas</li>
                <li>Diferentes métodos de pago</li>
                <li>Toma de pedidos por mesa</li>
                <li>Delivery</li>
                <li>Ventas Aparcadas</li>
                <li>Envío directo a SUNAT</li>
            </ul>
        </div>

        <div class="modulo">
            <h3><i class="fa-solid fa-utensils"></i> MOZO</h3>
            <ul>
                <li>Toma de pedidos por mesa</li>
                <li>Envíos directos a cocina</li>
                <li>Unión de mesas</li>
                <li>Cambio de órdenes</li>
                <li>Check de pedido listo</li>
            </ul>
        </div>

        <div class="modulo">
            <h3><i class="fa-solid fa-fire-burner"></i> COCINA</h3>
            <ul>
                <li>Recepción de pedidos con sonido</li>
                <li>Check pedido listo</li>
            </ul>
        </div>

        <div class="modulo">
            <h3><i class="fa-solid fa-martini-glass"></i> BARRA</h3>
            <ul>
                <li>Recepción de pedidos con sonido</li>
                <li>Pedido listo</li>
            </ul>
        </div>
    </div>
</section>

<!-- FAQ -->
<section class="faq-wrapper">
    <div class="faq-section">
        <div class="faq-left">
            <h2>Preguntas Frecuentes</h2>

            <div class="faq-item">
                <button class="faq-question">
                    ¿Cómo debo almacenar y conservar las facturas electrónicas?
                    <span class="faq-toggle">&#9654;</span>
                </button>
                <div class="faq-answer">
                    Debes almacenarlas en formato digital seguro (PDF y XML),
                    con respaldo en la nube o servidor seguro.
                </div>
            </div>

            <div class="faq-item">
                <button class="faq-question">
                    ¿Cómo puedo proporcionar copias a mis clientes?
                    <span class="faq-toggle">&#9654;</span>
                </button>
                <div class="faq-answer">
                    Puedes enviarlas por correo electrónico o WhatsApp directamente
                    desde el sistema.
                </div>
            </div>

            <div class="faq-item">
                <button class="faq-question">
                    ¿Qué información debe incluir la factura electrónica?
                    <span class="faq-toggle">&#9654;</span>
                </button>
                <div class="faq-answer">
                    Datos del cliente, RUC, detalle de productos, IGV,
                    método de pago y validación SUNAT.
                </div>
            </div>

            <div class="faq-item">
                <button class="faq-question">
                    ¿Cómo evitar pérdida de datos?
                    <span class="faq-toggle">&#9654;</span>
                </button>
                <div class="faq-answer">
                    Implementando copias de seguridad automáticas
                    y almacenamiento en la nube.
                </div>
            </div>
        </div>

        <div class="faq-right">
            <img src="assets/img/dagronCevicheria.png" alt="Cevichería Preguntas Frecuentes" class="faq-side-img">
        </div>
    </div>
</section>

<script>
document.querySelectorAll(".faq-question").forEach(btn => {
    btn.addEventListener("click", () => {
        const item = btn.parentElement;
        const answer = btn.nextElementSibling;
        const isOpen = item.classList.contains("active");

        document.querySelectorAll(".faq-item").forEach(el => {
            el.classList.remove("active");
            const ans = el.querySelector(".faq-answer");
            if (ans) ans.style.display = "none";
        });

        if (!isOpen) {
            item.classList.add("active");
            answer.style.display = "block";
        }
    });
});
</script>

<?php include("includes/footer.php"); ?>
</body>
</html>