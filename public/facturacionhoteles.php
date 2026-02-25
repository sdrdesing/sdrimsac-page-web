<?php
?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Facturación Hoteles - SDRIMSAC</title>
<link rel="stylesheet" href="../public/assets/css/facturacionhoteles.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<script src="../public/assets/js/script.js" defer></script>
</head>
<body>
<?php include(__DIR__ . '/../includes/header.php'); ?>
<section class="servicios-header">
    <h1>Aplicativo para Facturacion Electronica - Hoteles</h1>
    <div>Sdrim S.A.C.</div>
    <div>Servicios : Facturación Hoteles</div>
</section>

<div class="hoteles-banner">
    <img src="../public/assets/img/hotel.png" alt="App Hoteles Facturación Electrónica" />
</div>

<div class="hoteles-desarrollo">
    <h2>DESARROLLO DE FACTURACIÓN ELECTRÓNICA</h2>
    <p>El servicio de desarrollo de facturación electrónica para NEGOCIO – HOTEL es una herramienta integral que facilita la administración de operaciones diarias de un hotel o establecimiento de un hospedaje. Este sistema está diseñado para mejorar la eficiencia operativa, optimizar la experiencia del huésped y aumentar la rentabilidad.</p>
    <img src="../public/assets/img/hotel1.png" alt="Zona de Atención Hotel" />
</div>

<div class="hoteles-roles">
    <div class="hoteles-roles-col">
        <h3>ADMINISTRADOR</h3>
        <ul>
            <li>Mantenimiento de Usuarios, Clientes, Categorías, Marcas, Registro de número de Cuentas de Banco</li>
            <li>Compras – Listado de Compras</li>
            <li>Creación de Productos y Servicios</li>
            <li>Ventas Administrativas (Factura, Boletas y Notas de Venta) Envíos de Factura, Boleta directos a SUNAT</li>
            <li>Anulación de comprobantes (Interno y Externo) – Nota de Crédito</li>
            <li>Ingresos y Gastos de Efectivo</li>
            <li>Configuración habitaciones por Torre y Piso (Sencillas – Matrimoniales – VIP)</li>
            <li>Registro de Insumos para uso de habitaciones (papel hotelero – jabón hotelero – Frio bar – muebles que contienen cada habitación)</li>
            <li>Configuración de Promoción / Ofertas por tipo de habitación</li>
            <li>Habilitación de usuarios de trabajadores de Housekeeper (aseo – mantenimiento) con aviso por WhatsApp</li>
            <li>Reporte de Caja</li>
            <li>Reporte de Cierre de Caja por Establecimiento y Turnos</li>
            <li>Arca (Recepciona y/o rechaza los cierres de Caja de todos los usuarios)</li>
            <li>Reporte de habitaciones (estado libre – alquiladas por horas – mensual – reservadas)</li>
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
    <div class="hoteles-roles-col">
        <h3>CAJA</h3>
        <ul>
            <li>Visualización de Habitaciones por Torre – Piso y por estado (libre – ocupadas – alquiler mensual reservadas)</li>
            <li>Ejecución de alquiler de habitaciones por horas y mensual</li>
            <li>Reservación de habitaciones</li>
            <li>Interacción con equipo de Housekeeper (aseo – mantenimiento) con aviso por WhatsApp</li>
            <li>Cobro de alquiler de habitaciones</li>
            <li>Emisión de comprobantes electrónicos ilimitados (Factura, Boleta y Nota de Venta) con envíos directos al WhatsApp del cliente</li>
            <li>Emisión de comprobantes electrónicos ilimitados con diferentes métodos de pago</li>
            <li>Campo de observaciones</li>
            <li>Emisión de Factura con IGV</li>
            <li>Ingresos y Gastos de Efectivo</li>
            <li>Envío de Facturas y Boletas directo a SUNAT</li>
            <li>Anulación de comprobantes (Interno y Externo) Notas de Crédito</li>
            <li>Reporte de ventas diarias en PDF (con envíos directo a WhatsApp de la administración)</li>
        </ul>
    </div>
</div>

<div class="hoteles-faq-section">
    <h2>Preguntas Frecuentes</h2>
    <div class="hoteles-faq">
        <div class="hoteles-faq-item">
            <div class="hoteles-faq-question">¿Por qué es importante la facturación electrónica en el sector hotelero?<span class="hoteles-faq-toggle">&#9654;</span></div>
            <div class="hoteles-faq-answer">
                La facturación electrónica simplifica el proceso administrativo, reduce errores, acelera la gestión de pagos y facilita el cumplimiento de las normativas fiscales.
            </div>
        </div>
        <div class="hoteles-faq-item">
            <div class="hoteles-faq-question">¿Qué información debe contener una factura electrónica hotelera?<span class="hoteles-faq-toggle">&#9654;</span></div>
            <div class="hoteles-faq-answer">
                Debe contener datos del huésped, detalles de la habitación, servicios consumidos, impuestos aplicados y método de pago.
            </div>
        </div>
        <div class="hoteles-faq-item">
            <div class="hoteles-faq-question">¿Qué beneficios ofrece la facturación electrónica para los hoteles?<span class="hoteles-faq-toggle">&#9654;</span></div>
            <div class="hoteles-faq-answer">
                Ofrece mayor control, reducción de errores, acceso rápido a reportes y cumplimiento normativo, además de mejorar la experiencia del huésped y la gestión interna.
            </div>
        </div>
        <div class="hoteles-faq-item">
            <div class="hoteles-faq-question">¿Qué es el Housekeeper?<span class="hoteles-faq-toggle">&#9654;</span></div>
            <div class="hoteles-faq-answer">
                Es el personal encargado de la limpieza y mantenimiento de las habitaciones, asegurando que estén en óptimas condiciones para los huéspedes.
            </div>
        </div>
    </div>
</div>

<script>
// FAQ desplegable
document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.hoteles-faq-question').forEach(function(q) {
        q.addEventListener('click', function() {
            var item = this.parentElement;
            var wasActive = item.classList.contains('active');
            document.querySelectorAll('.hoteles-faq-item').forEach(function(i) { i.classList.remove('active'); });
            if (!wasActive) item.classList.add('active');
        });
    });
});
</script>

    <?php include(__DIR__ . '/../includes/footer.php'); ?>
</body>
</html>
