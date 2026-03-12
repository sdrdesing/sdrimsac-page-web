<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Facturación Recreos - SDRIMSAC</title>
<link rel="stylesheet" href="assets/css/estilo.css">
<link rel="stylesheet" href="assets/css/facturacionrecreos.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
<?php include("includes/header.php"); ?>
<section class="servicios-header" style="background:#18376b; color:#fff; padding:60px 0 40px 0; text-align:center;">
    <h1 style="font-size:3rem;font-weight:700;margin-bottom:12px;">Aplicativo para Facturación Electrónica - Recreo</h1>

    <div style="font-size:1.1rem;color:#cfd8e3;">Servicios <span style="color:#fff;">:</span> Facturación Recreo</div>
</section>
<!-- Banner principal -->
<div class="recreos-banner">
    <img src="assets/img/recreo.jpg" alt="App Recreos Facturación Electrónica" />
</div>

<!-- Desarrollo de Facturación Electrónica -->
<div class="recreos-desarrollo">
    <h2>DESARROLLO DE FACTURACIÓN ELECTRÓNICA</h2>
    <p>
        El servicio de desarrollo de facturación electrónica para un recreo es una solución tecnológica diseñada para permitir que un negocio de recreo, como un parque de diversiones, una sala de juegos o un centro de entretenimiento, emita facturas electrónicas de manera eficiente y cumpla con las regulaciones fiscales y legales vigentes en su país.
    </p>
</div>

<!-- Roles y Funcionalidades -->
<div class="recreos-roles">
    <div class="recreos-rol-card">
        <h3><span class="recreos-rol-icon"><i class="fa-solid fa-user-gear"></i></span> ADMINISTRADOR</h3>
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
    <div class="recreos-rol-card">
        <h3><span class="recreos-rol-icon"><i class="fa-solid fa-cash-register"></i></span> CAJA</h3>
        <ul>
            <li>Emisión de comprobantes electrónicos ilimitados libre de IGV con envíos directos al WhatsApp del cliente</li>
            <li>Emisión de comprobantes electrónicos ilimitados con diferentes métodos de pago</li>
            <li>Campo de observaciones</li>
            <li>Toma de pedidos por mesa</li>
            <li>Delivery</li>
            <li>Cambios de mesa</li>
            <li>Unión de mesas</li>
            <li>Cancelación de órdenes (con PIN de seguridad y motivos de cancelación )</li>
            <li>Emisión de documentos por Variación, sin afectar el Stock de platos y productos</li>
            <li>Ventas aparcadas</li>
            <li>Emisión de Factura con IGV</li>
            <li>Ingresos y Gastos de Efectivo</li>
            <li>Envío de Facturas y Boletas directo a SUNAT</li>
            <li>Anulación de comprobantes (Interno y Externo) Notas de Crédito</li>
            <li>Reporte de ventas diarias en pdf más documento Excel con stock de productos</li>
        </ul>
    </div>
    <div class="recreos-rol-card">
        <h3><span class="recreos-rol-icon"><i class="fa-solid fa-utensils"></i></span> MOZO</h3>
        <ul>
            <li>Toma de pedidos por mesa (individual o pagos en grupo)</li>
            <li>Envíos directos a cocina a través de Pantalla o impresión de comandas con ticketera</li>
            <li>Unión de mesas</li>
            <li>Cambio de órdenes de mesa</li>
            <li>Check en pedido listo</li>
        </ul>
    </div>
</div>
<div class="recreos-roles-bottom">
    <div class="recreos-rol-card">
        <h3><span class="recreos-rol-icon"><i class="fa-solid fa-bowl-food"></i></span> COCINA</h3>
        <ul>
            <li>Recepción de pedidos con Pc (sonido), Laptop, Tablet y/o Ticket</li>
            <li>- Check en pedido listo</li>
        </ul>
    </div>
    <div class="recreos-rol-card">
        <h3><span class="recreos-rol-icon"><i class="fa-solid fa-star"></i></span> BARRA</h3>
        <ul>
            <li>Recepción de pedidos con Pc (sonido), Laptop, Tablet y/o Ticket</li>
            <li>Pedido listo</li>
        </ul>
    </div>
</div>

<!-- Preguntas Frecuentes -->
<div class="recreos-faq-section">
    <div class="recreos-faq-img">
        <img src="assets/img/dragonRecreo.png" alt="Recreos Preguntas Frecuentes" />
        
    </div>
    <div class="recreos-faq">
        <h2>Preguntas Frecuentes</h2>
        <div class="recreos-faq-item">
            <div class="recreos-faq-question">
                ¿Cuáles son los beneficios de usar la facturación electrónica?
                <span class="recreos-faq-toggle"></span>
            </div>
            <div class="recreos-faq-answer">
                <ul>
                    <li>Reducción de costos operativos.</li>
                    <li>Menor riesgo de errores y fraudes.</li>
                    <li>Mejora en la gestión y almacenamiento de documentos.</li>
                    <li>Cumplimiento con normativas fiscales.</li>
                    <li>Acceso rápido a informes y datos.</li>
                </ul>
            </div>
        </div>
        <div class="recreos-faq-item">
            <div class="recreos-faq-question">
                ¿Es necesario que mis clientes también usen facturación electrónica?
                <span class="recreos-faq-toggle"></span>
            </div>
            <div class="recreos-faq-answer">
                No, tus clientes pueden recibir comprobantes electrónicos sin necesidad de contar con un sistema propio de facturación electrónica.
            </div>
        </div>
        <div class="recreos-faq-item">
            <div class="recreos-faq-question">
                ¿Qué seguridad ofrece el sistema de facturación electrónica?
                <span class="recreos-faq-toggle"></span>
            </div>
            <div class="recreos-faq-answer">
                El sistema utiliza certificados digitales y protocolos de seguridad para garantizar la autenticidad y confidencialidad de los comprobantes emitidos.
            </div>
        </div>
        <div class="recreos-faq-item">
            <div class="recreos-faq-question">
                ¿Cómo puedo empezar a usar el servicio de facturación electrónica?
                <span class="recreos-faq-toggle"></span>
            </div>
            <div class="recreos-faq-answer">
                Ponte en contacto con nuestro equipo para recibir asesoría personalizada y comenzar el proceso de implementación en tu negocio de recreo.
            </div>
        </div>
    </div>
</div>

<script>
// FAQ desplegable con flecha animada y respuesta
document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.recreos-faq-item').forEach(function(item) {
        var question = item.querySelector('.recreos-faq-question');
        question.addEventListener('click', function() {
            var wasActive = item.classList.contains('active');
            document.querySelectorAll('.recreos-faq-item').forEach(function(i) {
                i.classList.remove('active');
                i.querySelector('.recreos-faq-answer').style.display = 'none';
            });
            if (!wasActive) {
                item.classList.add('active');
                item.querySelector('.recreos-faq-answer').style.display = 'block';
            }
        });
    });
    // Inicialmente ocultar todas las respuestas
    document.querySelectorAll('.recreos-faq-answer').forEach(function(ans) {
        ans.style.display = 'none';
    });
});
</script>
<?php include("includes/footer.php"); ?>
</body>
</html>