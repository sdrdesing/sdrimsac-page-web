<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Aplicativo para Facturación Electrónica - Ferretería</title>
<link rel="stylesheet" href="assets/css/estilo.css">
<link rel="stylesheet" href="assets/css/facturacionferreteria.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
<?php include("includes/header.php"); ?>
<section class="servicios-header" style="background:rgba(4, 21, 75, 0.85); color:#fff; padding:60px 0 40px 0; text-align:center;">
    <h1 style="font-size:3rem;font-weight:700;margin-bottom:12px;">Aplicativo para Facturación Electrónica - Ferretería</h1>
    <div style="font-size:1.5rem;font-weight:500;margin-bottom:8px;">Sdrim S.A.C.</div>
</section>
<!-- Banner principal -->
<div class="ferreteria-banner">
    <img src="assets/img/ferreteria.png" alt="Facturación Electrónica Ferretería" />
</div>

<!-- Desarrollo de Facturación Electrónica -->
<div class="ferreteria-desarrollo">
    <h2>DESARROLLO DE FACTURACIÓN ELECTRÓNICA</h2>
    <p>
        Un sistema para una ferretería es una solución tecnológica integral diseñada para gestionar de manera eficiente todas las operaciones y procesos relacionados con la administración y venta de productos en una tienda de ferretería. Un sistema para una ferretería es una herramienta esencial que optimiza la gestión de inventarios, simplifica las transacciones, mejora la atención al cliente y proporciona información valiosa para la toma de decisiones empresariales.
    </p>
</div>

<!-- Roles y Funcionalidades -->
<div class="ferreteria-roles">
    <div class="ferreteria-rol-card">
        <h3><span class="ferreteria-rol-icon"><i class="fa-solid fa-user-gear"></i></span> ADMINISTRADOR</h3>
        <ul>
            <li>Mantenimiento de Usuarios, Clientes, Categorías, Marcas, Registro de número de Cuentas de Banco</li>
            <li>Impresión de Etiquetas de código de barra</li>
            <li>Compras</li>
            <li>Creación de productos de acuerdo a la unidad de medida (Litro - Kilogramo - Docena - Unidad- Metro - Pulgada - Etc) y Servicios</li>
            <li>Creación de Promoción/Ofertas</li>
            <li>Traslados de productos a los distintos establecimientos</li>
            <li>Guías de Remisión</li>
            <li>Lotes de Productos por Fecha de vencimiento</li>
            <li>Ventas Administrativas (Factura, Boletas y Notas de Venta) Envíos de Factura, Boleta directos a SUNAT</li>
            <li>Anulación de comprobantes(Interno y Externo) – Nota de Crédito</li>
            <li>Cotizaciones</li>
            <li>Ingresos y Gastos de Efectivo</li>
            <li>Reporte de Caja</li>
            <li>Reporte de Cierre de Caja por Establecimiento y Turnos</li>
            <li>Reporte de Ganancia</li>
            <li>Reporte de Stock de Productos</li>
            <li>Reporte Valorizado</li>
            <li>Reporte de Stock Mínimo</li>
            <li>Reporte de Kardex</li>
            <li>Contabilidad (Compras y Ventas)</li>
        </ul>
    </div>
    <div class="ferreteria-rol-card">
        <h3><span class="ferreteria-rol-icon"><i class="fa-solid fa-cash-register"></i></span> CAJA</h3>
        <ul>
            <li>Emisión de comprobantes electrónicos ilimitados libre de IGV con envíos directos al WhatsApp del cliente</li>
            <li>Emisión de comprobantes electrónicos ilimitados con diferentes métodos de pago</li>
            <li>Campo de observaciones</li>
            <li>Descuento de Stock automático al realizar una venta</li>
            <li>Ventas aparcadas</li>
            <li>Guía de Remisión nueva y/o a partir de una Factura y Boleta</li>
            <li>Emisión de Factura con IGV</li>
            <li>Ingresos y Gastos de Efectivo</li>
            <li>Envío de Facturas y Boletas directo a SUNAT</li>
            <li>Anulación de comprobantes(Interno y Externo) Notas de Crédito</li>
            <li>Reporte de ventas diarias en pdf más documento Excel con stock de productos (con envíos directo a WhatsApp de la administración)</li>
            <li>Creación de productos de acuerdo a la unidad de medida (Litro - Kilogramo - Docena - Unidad- Metro - Pulgada - Etc) y Servicios</li>
            <li>Cotización</li>
        </ul>
    </div>
</div>

<!-- Preguntas Frecuentes -->
<div class="ferreteria-faq-section">
    <div class="ferreteria-faq-img">
        <img src="assets/img/ferr.png" alt="Ferretería Preguntas Frecuentes" />
        
    </div>
    <div class="ferreteria-faq">
        <h2>Preguntas Frecuentes</h2>
        <div class="ferreteria-faq-item">
            <div class="ferreteria-faq-question">¿Cuáles son los beneficios de la facturación electrónica para mi ferretería?<span class="ferreteria-faq-toggle">&#9654;</span></div>
            <div class="ferreteria-faq-answer">
                La facturación electrónica ofrece varios beneficios, como la reducción de costos operativos, mayor eficiencia en el procesamiento de facturas, mejor gestión de documentos, y cumplimiento con las normativas fiscales.
            </div>
        </div>
        <div class="ferreteria-faq-item">
            <div class="ferreteria-faq-question">¿Cómo se implementa la facturación electrónica en una ferretería?<span class="ferreteria-faq-toggle">&#9654;</span></div>
            <div class="ferreteria-faq-answer">
                Se implementa mediante un software especializado que se integra con los procesos de venta y administración de la ferretería, permitiendo la emisión y almacenamiento digital de comprobantes.
            </div>
        </div>
        <div class="ferreteria-faq-item">
            <div class="ferreteria-faq-question">¿Cómo afecta la facturación electrónica al servicio al cliente en una ferretería?<span class="ferreteria-faq-toggle">&#9654;</span></div>
            <div class="ferreteria-faq-answer">
                Mejora la atención al cliente al agilizar los procesos de facturación y facilitar el acceso a comprobantes digitales.
            </div>
        </div>
        <div class="ferreteria-faq-item">
            <div class="ferreteria-faq-question">¿Qué son las guías de remisión?<span class="ferreteria-faq-toggle">&#9654;</span></div>
            <div class="ferreteria-faq-answer">
                Son documentos electrónicos que respaldan el traslado de bienes y productos, exigidos por la normativa fiscal para el control de inventarios y transporte.
            </div>
        </div>
    </div>
</div>

<script>
// FAQ desplegable para sección ferretería
document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.ferreteria-faq-question, .ferreteria-faq-toggle').forEach(function(q) {
        q.addEventListener('click', function(e) {
            var item = this.closest('.ferreteria-faq-item');
            var wasActive = item.classList.contains('active');
            document.querySelectorAll('.ferreteria-faq-item').forEach(function(i) { i.classList.remove('active'); });
            if (!wasActive) item.classList.add('active');
        });
    });
});
</script>
</body>
</html>
<?php include("includes/footer.php"); ?>