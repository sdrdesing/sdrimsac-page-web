<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Facturación Cafetería - SDRIMSAC</title>
    <link rel="stylesheet" href="assets/css/estilo.css">
    <link rel="stylesheet" href="assets/css/facturacioncafeteria.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="js/script.js" defer></script>
</head>
<body>

<?php include("includes/header.php"); ?>

<!-- BANNER MODERNO -->
<section class="cafeteria-banner-modern">
    <img src="https://images.unsplash.com/photo-1486312338219-ce68d2c6f44d?w=1400&q=80" alt="Banner Cafetería">
    <div class="cafeteria-banner-overlay"></div>

    <div class="cafeteria-banner-content">
        <span class="cafeteria-badge">Solución especializada para Cafeterías</span>
        <h1>Aplicativo de Facturación Electrónica - Cafetería</h1>
        <p>Sdrim S.A.C. · Servicios · Facturación Electrónica para Cafeterías</p>
    </div>
</section>

<!-- HERO PRINCIPAL -->
<section class="cafeteria-hero">
    <div class="cafeteria-hero-container">

        <div class="cafeteria-hero-text">
            <span class="cafeteria-tag">Solución integral</span>

            <h2>Desarrollo de Facturación Electrónica</h2>

            <p>
                El servicio de desarrollo de facturación electrónica para un NEGOCIO – CAFETERÍA es una solución tecnológica diseñada para permitir que el negocio de cafetería emita facturas electrónicas de manera eficiente y cumpla con las regulaciones fiscales y legales vigentes en su país.
                <br><br>
                Además, contribuye a la modernización y digitalización de la operación de la cafetería.
            </p>

            <div class="cafeteria-features">
                <div class="feature">
                    <i class="fa-solid fa-check"></i>
                    <span>Emisión rápida de comprobantes electrónicos</span>
                </div>

                <div class="feature">
                    <i class="fa-solid fa-check"></i>
                    <span>Control de caja, ventas y reportes</span>
                </div>

                <div class="feature">
                    <i class="fa-solid fa-check"></i>
                    <span>Envío directo de comprobantes a SUNAT</span>
                </div>
            </div>
        </div>

        <div class="cafeteria-hero-image">
            <div class="cafeteria-banner-container">
                <img src="assets/img/banercafeteria.png" alt="App Cafetería Facturación Electrónica" class="cafeteria-banner">
                <img src="assets/img/cafeteria.png" alt="App Cafetería Vista" class="cafeteria-card">
            </div>
        </div>

    </div>
</section>

<!-- ROLES -->
<section class="cafeteria-roles-section">
    <div class="cafeteria-section-heading">
        <span class="cafeteria-tag">Funciones principales</span>
        <h3>Módulos del sistema</h3>
        <p>
            Organiza la cafetería con herramientas especializadas para administración, caja, atención, cocina y barra.
        </p>
    </div>

    <div class="cafeteria-roles">
        <div class="cafeteria-rol-card cafeteria-rol-large">
            <h3><span class="cafeteria-rol-icon"><i class="fa-solid fa-user-gear"></i></span> ADMINISTRADOR</h3>
            <ul>
                <li>Mantenimiento de Usuarios, Clientes, Categorías, Marcas, Registro de número de Cuentas de Banco</li>
                <li>Compras – Listado de Compras</li>
                <li>Creación de Recetas, Productos y Servicios</li>
                <li>Creación de Promoción/Ofertas</li>
                <li>Ventas Administrativas (Factura, Boletas y Notas de Venta) Envíos de Factura, Boleta directos a SUNAT</li>
                <li>Anulación de comprobantes(Interno y Externo) – Nota de Crédito</li>
                <li>Ingresos y Gastos de Efectivo</li>
                <li>Reporte de Caja</li>
                <li>Reporte de Cierre de Caja por Establecimiento y Turnos</li>
                <li>Reporte de Ganancia</li>
                <li>Reporte de Stock de Productos</li>
                <li>Reporte Productos Vendidos</li>
                <li>Reporte Valorizado</li>
                <li>Reporte de Stock Mínimo</li>
                <li>Reporte de Métodos de Pago</li>
                <li>Reporte de Kardex</li>
                <li>Contabilidad (Compras y Ventas)</li>
            </ul>
        </div>

        <div class="cafeteria-rol-card">
            <h3><span class="cafeteria-rol-icon"><i class="fa-solid fa-cash-register"></i></span> CAJA</h3>
            <ul>
                <li>Emisión de comprobantes electrónicos ilimitados libre de IGV con envíos directos al WhatsApp del cliente.</li>
                <li>Emisión de comprobantes electrónicos ilimitados con diferentes métodos de pago</li>
                <li>Campo de observaciones</li>
                <li>Toma de pedidos por mesa</li>
                <li>Delivery</li>
                <li>Cambios de mesa</li>
                <li>Unión de mesas</li>
                <li>Cancelación de orden (con PIN de seguridad y motivos de cancelación)</li>
                <li>Emisión de documentos por Variación, sin afectar el Stock de platos y productos</li>
                <li>Ventas aparcadas</li>
                <li>Emisión de Factura con IGV</li>
                <li>Ingresos y Gastos de Efectivo</li>
                <li>Envío de Facturas y Boletas directo a SUNAT</li>
                <li>Anulación de comprobantes(Interno y Externo) Notas de Crédito</li>
                <li>Reporte de ventas diarias en pdf más documento Excel con stock de productos</li>
            </ul>
        </div>

        <div class="cafeteria-rol-card">
            <h3><span class="cafeteria-rol-icon"><i class="fa-solid fa-utensils"></i></span> MOZO</h3>
            <ul>
                <li>Toma de pedidos por mesa (individual o pagos en grupo)</li>
                <li>Envíos directos a cocina a través de Pantalla o impresión de comandas con ticketera</li>
                <li>Unión de mesas</li>
                <li>Cambio de órdenes de mesa</li>
                <li>Check en pedido listo</li>
            </ul>
        </div>
    </div>

    <div class="cafeteria-roles-bottom">
        <div class="cafeteria-rol-card">
            <h3><span class="cafeteria-rol-icon"><i class="fa-solid fa-bowl-food"></i></span> COCINA</h3>
            <ul>
                <li>Recepción de pedidos con Pc (sonido), Laptop, Tablet y/o Ticket</li>
                <li>Check en pedido listo</li>
            </ul>
        </div>

        <div class="cafeteria-rol-card">
            <h3><span class="cafeteria-rol-icon"><i class="fa-solid fa-champagne-glasses"></i></span> BARRA</h3>
            <ul>
                <li>Recepción de pedidos con Pc (sonido), Laptop, Tablet y/o Ticket</li>
                <li>Pedido listo</li>
            </ul>
        </div>
    </div>
</section>

<!-- FAQ -->
<section class="cafeteria-faq-wrapper">
    <div class="cafeteria-faq-section">
        <div class="cafeteria-faq">
            <h2>Preguntas Frecuentes</h2>

            <div class="cafeteria-faq-item active">
                <div class="cafeteria-faq-question">
                    ¿Qué es la facturación electrónica y por qué es obligatoria en mi cafetería?
                    <span class="cafeteria-faq-toggle">&#9654;</span>
                </div>
                <div class="cafeteria-faq-answer">
                    La facturación electrónica es un sistema que permite emitir y almacenar facturas de manera digital. Es obligatoria para todas las empresas, incluyendo cafeterías, para mejorar la transparencia y reducir la evasión fiscal.
                </div>
            </div>

            <div class="cafeteria-faq-item">
                <div class="cafeteria-faq-question">
                    ¿Qué tipo de facturas debo emitir en mi cafetería?
                    <span class="cafeteria-faq-toggle">&#9654;</span>
                </div>
                <div class="cafeteria-faq-answer">
                    Debes emitir facturas electrónicas y boletas de venta según el tipo de cliente y la normativa vigente.
                </div>
            </div>

            <div class="cafeteria-faq-item">
                <div class="cafeteria-faq-question">
                    ¿Qué información debe incluir la factura electrónica?
                    <span class="cafeteria-faq-toggle">&#9654;</span>
                </div>
                <div class="cafeteria-faq-answer">
                    Debe incluir datos del emisor, receptor, detalle de productos o servicios, montos, impuestos y fecha de emisión.
                </div>
            </div>

            <div class="cafeteria-faq-item">
                <div class="cafeteria-faq-question">
                    ¿Cómo puedo almacenar y conservar las facturas electrónicas?
                    <span class="cafeteria-faq-toggle">&#9654;</span>
                </div>
                <div class="cafeteria-faq-answer">
                    Puedes almacenarlas digitalmente en tu sistema o en la nube, asegurando copias de respaldo y acceso seguro.
                </div>
            </div>

            <div class="cafeteria-faq-item">
                <div class="cafeteria-faq-question">
                    ¿Qué sucede si no emito facturas electrónicas en mi cafetería?
                    <span class="cafeteria-faq-toggle">&#9654;</span>
                </div>
                <div class="cafeteria-faq-answer">
                    Podrías recibir sanciones y multas por incumplimiento de la normativa fiscal vigente.
                </div>
            </div>
        </div>

        <div class="cafeteria-faq-img">
            <img src="assets/img/dragonCafeteria.png" alt="Cafetería Preguntas Frecuentes">
        </div>
    </div>
</section>

<?php include("includes/footer.php"); ?>

<script>
document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.cafeteria-faq-question').forEach(function(q) {
        q.addEventListener('click', function() {
            var item = this.parentElement;
            var wasActive = item.classList.contains('active');

            document.querySelectorAll('.cafeteria-faq-item').forEach(function(i) {
                i.classList.remove('active');
            });

            if (!wasActive) item.classList.add('active');
        });
    });
});
</script>

</body>
</html>