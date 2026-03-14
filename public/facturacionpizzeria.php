<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Aplicativo para Facturación Electrónica - Pizzería</title>
    <link rel="stylesheet" href="assets/css/estilo.css">
    <link rel="stylesheet" href="assets/css/facturacionpizzeria.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>

<?php include("includes/header.php"); ?>

<!-- BANNER MODERNO -->
<section class="pizzeria-banner-modern">
    <img src="https://images.unsplash.com/photo-1486312338219-ce68d2c6f44d?w=1400&q=80" alt="Banner Pizzería">
    <div class="pizzeria-banner-overlay"></div>

    <div class="pizzeria-banner-content">
        <span class="pizzeria-badge">Solución especializada para Pizzerías</span>
        <h1>Aplicativo para Facturación Electrónica - Pizzería</h1>
        <p>Sdrim S.A.C. · Servicios · Aplicativo para Facturación Electrónica - Pizzería</p>
    </div>
</section>

<!-- HERO PRINCIPAL -->
<section class="pizzeria-hero">
    <div class="pizzeria-hero-container">

        <div class="pizzeria-hero-text">
            <span class="pizzeria-tag">Solución integral</span>

            <h2>Desarrollo de Facturación Electrónica</h2>

            <p>
                El servicio de desarrollo de facturación electrónica para una pizzería busca simplificar y agilizar el proceso de emisión de facturas, garantizando la legalidad y la eficiencia en la gestión financiera del negocio. El sistema proporciona herramientas de generación de reportes y análisis que permiten a la pizzería obtener información valiosa sobre sus ventas, impuestos y otros aspectos financieros. Esto facilita la toma de decisiones informadas sobre la gestión del negocio.
            </p>

            <div class="pizzeria-features">
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

        <div class="pizzeria-hero-image">
            <div class="pizzeria-banner-container">
                <img src="assets/img/banerpizza.png" alt="App Pizzerías Facturación Electrónica" class="pizzeria-banner">
                <img src="assets/img/pizza.jpg" alt="Sistema Pizzería" class="pizzeria-card">
            </div>
        </div>

    </div>
</section>

<!-- ROLES -->
<section class="pizzeria-roles-section">
    <div class="pizzeria-section-heading">
        <span class="pizzeria-tag">Funciones principales</span>
        <h3>Módulos del sistema</h3>
        <p>
            Organiza la pizzería con herramientas especializadas para administración, caja, atención, cocina y barra.
        </p>
    </div>

    <div class="pizzeria-roles">
        <div class="pizzeria-rol-card pizzeria-rol-large">
            <h3><span class="pizzeria-rol-icon"><i class="fa-solid fa-user-gear"></i></span> ADMINISTRADOR</h3>
            <ul>
                <li>Mantenimiento de Usuarios, Clientes, Categorías, Marcas, Registro de número de Cuentas de Banco</li>
                <li>Compras – Listado de Compras</li>
                <li>Creación de Recetas, Productos y Servicios</li>
                <li>Creación de Promoción/Ofertas</li>
                <li>Ventas Administrativas (Factura, Boletas y Notas de Venta) Envíos de Factura, Boleta directos a SUNAT</li>
                <li>Anulación de comprobantes (Interno y Externo) – Nota de Crédito</li>
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

        <div class="pizzeria-rol-card">
            <h3><span class="pizzeria-rol-icon"><i class="fa-solid fa-cash-register"></i></span> CAJA</h3>
            <ul>
                <li>Emisión de comprobantes electrónicos ilimitados libre de IGV con envíos directos al WhatsApp del cliente.</li>
                <li>Emisión de comprobantes electrónicos ilimitados con diferentes métodos de pago</li>
                <li>Campo de observaciones</li>
                <li>Toma de pedidos por mesa</li>
                <li>Delivery</li>
                <li>Cambios de mesa</li>
                <li>Unión de mesas</li>
                <li>Cancelación de órdenes (con PIN de seguridad y motivos de cancelación)</li>
                <li>Emisión de documentos por Variación, sin afectar el Stock de platos y productos</li>
                <li>Ventas aparcadas</li>
                <li>Emisión de Factura con IGV</li>
                <li>Ingresos y Gastos de Efectivo</li>
                <li>Envío de Facturas y Boletas directo a SUNAT</li>
                <li>Anulación de comprobantes (Interno y Externo) Notas de Crédito</li>
                <li>Reporte de ventas diarias en pdf más documento Excel con stock de productos</li>
            </ul>
        </div>

        <div class="pizzeria-rol-card">
            <h3><span class="pizzeria-rol-icon"><i class="fa-solid fa-utensils"></i></span> MOZO</h3>
            <ul>
                <li>Toma de pedidos por mesa (individual o pagos en grupo)</li>
                <li>Envíos directos a cocina a través de Pantalla o impresión de comandas con ticketera</li>
                <li>Unión de mesas</li>
                <li>Cambio de órdenes de mesa</li>
                <li>Check en pedido listo</li>
            </ul>
        </div>
    </div>

    <div class="pizzeria-roles-bottom">
        <div class="pizzeria-rol-card">
            <h3><span class="pizzeria-rol-icon"><i class="fa-solid fa-bowl-food"></i></span> COCINA</h3>
            <ul>
                <li>Recepción de pedidos con Pc (sonido), Laptop, Tablet y/o Ticket</li>
                <li>Check en pedido listo</li>
            </ul>
        </div>

        <div class="pizzeria-rol-card">
            <h3><span class="pizzeria-rol-icon"><i class="fa-solid fa-champagne-glasses"></i></span> BARRA</h3>
            <ul>
                <li>Recepción de pedidos con Pc (sonido), Laptop, Tablet y/o Ticket</li>
                <li>Pedido listo</li>
            </ul>
        </div>
    </div>
</section>

<!-- FAQ -->
<section class="pizzeria-faq-wrapper">
    <div class="pizzeria-faq-section">
        <div class="pizzeria-faq">
            <h2>Preguntas Frecuentes</h2>

            <div class="pizzeria-faq-item">
                <div class="pizzeria-faq-question">
                    ¿Es obligatorio utilizar facturación electrónica en mi país?
                    <span class="pizzeria-faq-toggle"></span>
                </div>
                <div class="pizzeria-faq-answer">
                    La obligatoriedad puede variar según la legislación local. En muchos lugares, las empresas están obligadas a adoptar la facturación electrónica, especialmente para ciertos tipos de transacciones o tamaños de empresa.
                </div>
            </div>

            <div class="pizzeria-faq-item">
                <div class="pizzeria-faq-question">
                    ¿Qué requisitos debo cumplir para emitir facturas electrónicas?
                    <span class="pizzeria-faq-toggle"></span>
                </div>
                <div class="pizzeria-faq-answer">
                    Debes contar con un RUC activo, un certificado digital válido y un sistema de facturación electrónica autorizado por la SUNAT u organismo fiscal correspondiente.
                </div>
            </div>

            <div class="pizzeria-faq-item">
                <div class="pizzeria-faq-question">
                    ¿Qué debo hacer si un cliente no recibe su factura electrónica?
                    <span class="pizzeria-faq-toggle"></span>
                </div>
                <div class="pizzeria-faq-answer">
                    Verifica que el correo electrónico del cliente esté correctamente registrado y que no haya problemas de envío. Puedes reenviar la factura desde el sistema o proporcionar un enlace de descarga.
                </div>
            </div>

            <div class="pizzeria-faq-item">
                <div class="pizzeria-faq-question">
                    ¿Qué beneficios ofrece la facturación electrónica para una pizzería?
                    <span class="pizzeria-faq-toggle"></span>
                </div>
                <div class="pizzeria-faq-answer">
                    Ofrece mayor control, reducción de errores, acceso rápido a reportes y cumplimiento normativo, además de mejorar la experiencia del cliente y la gestión interna.
                </div>
            </div>
        </div>

        <div class="pizzeria-faq-img">
            <img src="assets/img/dragonPizzeria.png" alt="Pizzería Preguntas Frecuentes">
        </div>
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.pizzeria-faq-item').forEach(function(item) {
        var question = item.querySelector('.pizzeria-faq-question');

        question.addEventListener('click', function() {
            var wasActive = item.classList.contains('active');

            document.querySelectorAll('.pizzeria-faq-item').forEach(function(i) {
                i.classList.remove('active');
                i.querySelector('.pizzeria-faq-answer').style.display = 'none';
            });

            if (!wasActive) {
                item.classList.add('active');
                item.querySelector('.pizzeria-faq-answer').style.display = 'block';
            }
        });
    });

    document.querySelectorAll('.pizzeria-faq-answer').forEach(function(ans) {
        ans.style.display = 'none';
    });
});
</script>

<?php include("includes/footer.php"); ?>
</body>
</html>