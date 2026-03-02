<?php
?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Aplicativo para Facturacion Electronica - Restaurante  - SDRIMSAC</title>
<link rel="stylesheet" href="assets/css/estilo.css">
<link rel="stylesheet" href="assets/css/facturacionrestaurant.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
<?php include("includes/header.php"); ?>
<section class="servicios-header" style="background:#18376b; color:#fff; padding:60px 0 40px 0; text-align:center;">
    <h1 style="font-size:3rem;font-weight:700;margin-bottom:12px;">Facturación Restaurant</h1>
    <div style="font-size:1.5rem;font-weight:500;margin-bottom:8px;">Sdrim S.A.C.</div>
    <div style="font-size:1.1rem;color:#cfd8e3;">Servicios <span style="color:#fff;">:</span> Facturación Restaurant</div>
</section>
<!-- Banner principal -->
<div class="restaurant-banner">
    <img src="assets/img/restaurante.jpg" alt="App Restaurant Facturación Electrónica" />
</div>

<!-- Desarrollo de Facturación Electrónica -->
<div class="restaurant-desarrollo">
    <h2>DESARROLLO DE FACTURACIÓN ELECTRÓNICA</h2>
    <p>
        El servicio de desarrollo de facturación electrónica para un RESTAURANTE busca simplificar y agilizar el proceso de emisión de facturas, garantizando la legalidad y la eficiencia en la gestión financiera del negocio. Esto no solo facilita el cumplimiento de las obligaciones fiscales, sino que también mejora la experiencia del cliente al proporcionar facturas electrónicas claras y precisas. Además, contribuye a la modernización y digitalización de la operación del restaurante, lo que puede aumentar la eficiencia y la satisfacción del cliente.
    </p>
</div>

<!-- Roles y Funcionalidades -->
<div class="restaurant-roles">
    <div class="restaurant-rol-card">
        <h3><span class="restaurant-rol-icon"><i class="fa-solid fa-user-gear"></i></span> ADMINISTRADOR</h3>
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
    <div class="restaurant-rol-card">
        <h3><span class="restaurant-rol-icon"><i class="fa-solid fa-cash-register"></i></span> CAJA</h3>
        <ul>
            <li>Emisión de comprobantes electrónicos ilimitados libre de IGV con envíos directos al WhatsApp del cliente</li>
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
    <div class="restaurant-rol-card">
        <h3><span class="restaurant-rol-icon"><i class="fa-solid fa-utensils"></i></span> MOZO</h3>
        <ul>
            <li>Toma de pedidos por mesa (individual o pagos en grupo)</li>
            <li>Envíos directos a cocina a través de Pantalla o impresión de comandas con ticketera</li>
            <li>Unión de mesas</li>
            <li>Cambio de órdenes de mesa</li>
            <li>Check en pedido listo</li>
        </ul>
    </div>
</div>
<div class="restaurant-roles-bottom">
    <div class="restaurant-rol-card">
        <h3><span class="restaurant-rol-icon"><i class="fa-solid fa-bowl-food"></i></span> COCINA</h3>
        <ul>
            <li>Recepción de pedidos con Pc (sonido), Laptop, Tablet y/o Ticket</li>
            <li>Check en pedido listo</li>
        </ul>
    </div>
    <div class="restaurant-rol-card">
        <h3><span class="restaurant-rol-icon"><i class="fa-solid fa-champagne-glasses"></i></span> BARRA</h3>
        <ul>
            <li>Recepción de pedidos con Pc (sonido), Laptop, Tablet y/o Ticket</li>
            <li>Pedido listo</li>
        </ul>
    </div>
</div>

<!-- Preguntas Frecuentes -->
<div class="restaurant-faq-section">
    <div class="restaurant-faq">
        <h2>Preguntas Frecuentes</h2>
        <div class="restaurant-faq-item active">
            <div class="restaurant-faq-question">¿Cómo puedo implementar la facturación electrónica en mi restaurante?<span class="restaurant-faq-toggle">&#9654;</span></div>
            <div class="restaurant-faq-answer">
                Debes seleccionar un proveedor de servicios de facturación electrónica que se ajuste a tus necesidades, y capacitar a tu personal sobre el nuevo proceso.
            </div>
        </div>
        <div class="restaurant-faq-item">
            <div class="restaurant-faq-question">¿Cuáles son los beneficios de la facturación electrónica para un restaurante?<span class="restaurant-faq-toggle">&#9654;</span></div>
            <div class="restaurant-faq-answer">
                Permite mayor control, reducción de errores, acceso rápido a reportes y cumplimiento normativo, además de mejorar la experiencia del cliente y la gestión interna.
            </div>
        </div>
        <div class="restaurant-faq-item">
            <div class="restaurant-faq-question">¿Es necesario tener una solución de facturación electrónica si mi restaurante es pequeño?<span class="restaurant-faq-toggle">&#9654;</span></div>
            <div class="restaurant-faq-answer">
                Sí, la facturación electrónica es obligatoria para la mayoría de negocios, independientemente de su tamaño, y facilita la gestión y cumplimiento fiscal.
            </div>
        </div>
    </div>
    <div class="restaurant-faq-img">
        <img src="assets/img/dragonRestaurante.png" alt="Restaurant Preguntas Frecuentes" />
    
    </div>
</div>

<script>
// FAQ desplegable
document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.restaurant-faq-question').forEach(function(q) {
        q.addEventListener('click', function() {
            var item = this.parentElement;
            var wasActive = item.classList.contains('active');
            document.querySelectorAll('.restaurant-faq-item').forEach(function(i) { i.classList.remove('active'); });
            if (!wasActive) item.classList.add('active');
        });
    });
});
</script>
<?php include("includes/footer.php"); ?>
</body>
</html>
