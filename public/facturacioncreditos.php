<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Aplicativo para Facturación Electrónica - Créditos - SDRIMSAC</title>
    <link rel="stylesheet" href="assets/css/estilo.css">
    <link rel="stylesheet" href="assets/css/facturacioncreditos.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="js/script.js" defer></script>
</head>
<body>

<?php include("includes/header.php"); ?>

<!-- BANNER MODERNO -->
<section class="creditos-banner-modern">
    <img src="https://images.unsplash.com/photo-1486312338219-ce68d2c6f44d?w=1400&q=80" alt="Servicios SDRIM">
    <div class="creditos-banner-overlay"></div>

    <div class="creditos-banner-content">
        <span class="creditos-badge">Solución especializada para Créditos</span>
        <h1>Aplicativo para Facturación Electrónica - Créditos</h1>
        <p>Soluciones integrales de facturación electrónica para tu empresa</p>
    </div>
</section>

<!-- HERO PRINCIPAL -->
<section class="creditos-hero">
    <div class="creditos-hero-container">

        <div class="creditos-hero-text">
            <span class="creditos-tag">Solución integral</span>

            <h2>Desarrollo de Facturación Electrónica</h2>

            <p>
                El servicio de desarrollo de facturación electrónica para NEGOCIO – CRÉDITOS busca simplificar y agilizar el proceso de emisión de facturas, garantizando la legalidad y la eficiencia en la gestión financiera de la empresa. Esto no solo facilita el cumplimiento de las obligaciones fiscales, sino que también mejora la experiencia del cliente al proporcionar facturas electrónicas claras y precisas.
            </p>

            <div class="creditos-features">
                <div class="feature">
                    <i class="fa-solid fa-check"></i>
                    <span>Gestión integral de créditos y cobranzas</span>
                </div>

                <div class="feature">
                    <i class="fa-solid fa-check"></i>
                    <span>Control de pagos, cuotas y cronogramas</span>
                </div>

                <div class="feature">
                    <i class="fa-solid fa-check"></i>
                    <span>Comprobantes electrónicos con envío a SUNAT</span>
                </div>
            </div>
        </div>

        <div class="creditos-hero-image">
            <div class="creditos-banner-container">
                <img src="assets/img/banercreditos.png" alt="Facturación Electrónica Créditos" class="creditos-banner">
                <img src="assets/img/creditos.jpeg" alt="Sistema Créditos" class="creditos-card">
            </div>
        </div>

    </div>
</section>

<!-- ROLES -->
<section class="creditos-roles-section">
    <div class="creditos-section-heading">
        <span class="creditos-tag">Funciones principales</span>
        <h3>Módulos del sistema</h3>
        <p>
            Organiza la gestión de créditos con herramientas para administración, caja, analistas y cajeros, incluyendo seguimiento, cobranza y reportes.
        </p>
    </div>

    <div class="creditos-roles-grid">
        <div class="creditos-rol-card">
            <h3><span class="creditos-rol-icon"><i class="fa-solid fa-user-gear"></i></span> ADMINISTRADOR</h3>
            <ul>
                <li>Mantenimiento de Usuarios, Clientes, Categorías, Marcas, Registro de número de Cuentas de Banco</li>
                <li>Compras de Productos Hogar (se descuenta automático de Cartera Presupuestaria) – Listado de Compras</li>
                <li>Ventas Administrativas (Factura, Boletas y Notas de Venta) Envíos de Factura, Boleta directos a SUNAT</li>
                <li>Anulación de comprobantes (Interno y Externo) – Nota de Crédito</li>
                <li>Ingresos y Gastos de Efectivo</li>
                <li>Reporte de Caja</li>
                <li>Reporte de Cierre de Caja por Establecimiento y Turnos</li>
                <li>Arca (Recepciona y/o rechaza los cierres de Caja de todos los usuarios ANALISTA/CAJA)</li>
                <li>Transferencia de efectivo de Cartera Presupuestaria a usuarios Caja/Analista</li>
                <li>Reporte de Créditos</li>
                <li>Reporte de Ganancia Hogar / Efectivo</li>
                <li>Reporte de Stock de Productos</li>
                <li>Reporte Valorizado</li>
                <li>Reporte de Stock Mínimo</li>
                <li>Reporte de Métodos de Pago</li>
                <li>Reporte de Kardex</li>
                <li>Contabilidad (Compras y Ventas)</li>
            </ul>
        </div>

        <div class="creditos-rol-card">
            <h3><span class="creditos-rol-icon"><i class="fa-solid fa-cash-register"></i></span> CAJA ADMIN</h3>
            <ul>
                <li>Realiza Créditos Efectivo / Hogar con tasa de porcentaje variante, abonos, generando pagos diarios / semanal / quincenal / mensual / pago único; con tiempo de pago desde 1 mes en adelante</li>
                <li>Al generar un crédito, puede asignar un analista para que haga seguimiento al prestatario</li>
                <li>Al generar un crédito se genera un contrato de préstamo con acuerdos estipulados con el prestatario</li>
                <li>Puede visualizar Cronograma de Pagos del prestatario</li>
                <li>Puede ingresar pago de cuotas y/o cancelación completa del prestatario</li>
                <li>Acepta o rechaza créditos que generen los usuarios Analista / Cajero</li>
                <li>Puede filtrar créditos por Nombre o DNI de clientes, total de créditos por mes, por créditos aceptados, rechazados, pendientes, crédito hogar / efectivo, filtro por usuario, por tipo de pago diario / semanal / quincenal / mensual</li>
                <li>Puede exportar en documento Excel filtro de créditos Nombre o DNI de clientes, total de créditos por mes, por créditos aceptados, rechazados, pendientes, crédito hogar / efectivo, filtro por usuario, por tipo de pago diario / semanal / quincenal / mensual</li>
                <li>Puede exportar Reporte de Créditos Diario por cobrar y atrasados</li>
                <li>Puede generar gastos / ingreso de efectivo</li>
                <li>Puede visualizar y generar comprobantes de pago emitidos Factura – Boleta a partir de la Nota de Venta generada por el crédito</li>
                <li>Puede visualizar monto de Cobros del día</li>
                <li>Historial de Cierres de Caja</li>
                <li>Visualizar saldo disponible para realizar créditos de efectivo</li>
                <li>Recepciona traslado de efectivo por parte de Usuario Arca</li>
            </ul>
        </div>

        <div class="creditos-rol-card">
            <h3><span class="creditos-rol-icon"><i class="fa-solid fa-user-tie"></i></span> ANALISTA</h3>
            <ul>
                <li>Realiza Créditos Efectivo / Hogar con tasa de porcentaje variante, abonos, generando pagos diarios / semanal / quincenal / mensual / pago único; con tiempo de pago desde 1 mes en adelante</li>
                <li>Al generar un crédito se genera un contrato de préstamo con acuerdos estipulados con el prestatario</li>
                <li>Puede visualizar Cronograma de Pagos del prestatario</li>
                <li>Puede ingresar pago de cuotas y/o cancelación completa del prestatario</li>
                <li>Puede filtrar créditos por Nombre o DNI de clientes, total de créditos por mes, por créditos aceptados, rechazados, pendientes, crédito hogar / efectivo, filtro por usuario, por tipo de pago diario / semanal / quincenal / mensual</li>
                <li>Puede exportar en documento Excel filtro de créditos Nombre o DNI de clientes, total de créditos por mes, por créditos aceptados, rechazados, pendientes, crédito hogar / efectivo, filtro por usuario, por tipo de pago diario / semanal / quincenal / mensual</li>
                <li>Puede exportar Reporte de Créditos Diario por cobrar y atrasados</li>
                <li>Puede generar gastos / ingreso de efectivo</li>
                <li>Puede visualizar y generar comprobantes de pago emitidos Factura – Boleta a partir de la Nota de Venta generada por el crédito</li>
                <li>Puede visualizar monto de Cobros del día</li>
                <li>Historial de Cierres de Caja</li>
                <li>Visualizar saldo disponible para realizar créditos de efectivo</li>
                <li>Recepciona traslado de efectivo por parte de Usuario Arca</li>
            </ul>
        </div>

        <div class="creditos-rol-card">
            <h3><span class="creditos-rol-icon"><i class="fa-solid fa-cash-register"></i></span> CAJERO</h3>
            <ul>
                <li>Puede visualizar Cronograma de Pagos del prestatario</li>
                <li>Puede ingresar pago de cuotas y/o cancelación completa del prestatario</li>
                <li>Puede filtrar créditos por Nombre o DNI de clientes, total de créditos por mes, por créditos aceptados, rechazados, pendientes, crédito hogar / efectivo, filtro por usuario, por tipo de pago diario / semanal / quincenal / mensual</li>
                <li>Puede exportar en documento Excel filtro de créditos Nombre o DNI de clientes, total de créditos por mes, por créditos aceptados, rechazados, pendientes, crédito hogar / efectivo, filtro por usuario, por tipo de pago diario / semanal / quincenal / mensual</li>
                <li>Puede exportar Reporte de Créditos Diario por cobrar y atrasados</li>
                <li>Puede visualizar y generar comprobantes de pago emitidos Factura – Boleta a partir de la Nota de Venta generada por el crédito</li>
                <li>Puede visualizar monto de Cobros del día</li>
                <li>Historial de Cierres de Caja</li>
                <li>Visualizar saldo disponible para realizar créditos de efectivo</li>
            </ul>
        </div>
    </div>
</section>

<!-- FAQ -->
<section class="creditos-faq-wrapper">
    <div class="creditos-faq-section">
        <div class="creditos-faq-list">
            <h2>Preguntas Frecuentes</h2>

            <div class="creditos-faq-item active">
                <div class="creditos-faq-question">¿Qué es la facturación electrónica de créditos?</div>
                <div class="creditos-faq-answer">La facturación electrónica de créditos es el proceso de emitir y gestionar facturas electrónicas para las operaciones de crédito, en lugar de utilizar documentos en papel. Esto incluye la generación, transmisión y almacenamiento de facturas de forma digital.</div>
            </div>

            <div class="creditos-faq-item">
                <div class="creditos-faq-question">¿Cuáles son los beneficios de usar facturación electrónica para créditos?</div>
                <div class="creditos-faq-answer">Permite mayor eficiencia, cumplimiento fiscal, reducción de errores y mejor experiencia para el cliente.</div>
            </div>

            <div class="creditos-faq-item">
                <div class="creditos-faq-question">¿Cómo se realiza el seguimiento y control de las facturas electrónicas de crédito?</div>
                <div class="creditos-faq-answer">A través de reportes, filtros y cronogramas de pagos integrados en el sistema, que permiten monitorear el estado de cada crédito y sus comprobantes asociados.</div>
            </div>

            <div class="creditos-faq-item">
                <div class="creditos-faq-question">¿Cómo se archivan y conservan las facturas electrónicas de crédito?</div>
                <div class="creditos-faq-answer">El sistema almacena digitalmente todas las facturas, permitiendo su consulta, descarga y respaldo seguro en la nube o localmente.</div>
            </div>

            <div class="creditos-faq-item">
                <div class="creditos-faq-question">¿Qué son notas de venta?</div>
                <div class="creditos-faq-answer">Son documentos que respaldan operaciones comerciales previas a la emisión de una factura o boleta electrónica, útiles para control interno y seguimiento de ventas a crédito.</div>
            </div>
        </div>

        <div class="creditos-faq-img">
            <img src="assets/img/dragonCredito.png" alt="Créditos Preguntas Frecuentes">
        </div>
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.creditos-faq-question').forEach(function(q) {
        q.addEventListener('click', function() {
            var item = this.parentElement;
            var wasActive = item.classList.contains('active');

            document.querySelectorAll('.creditos-faq-item').forEach(function(i) {
                i.classList.remove('active');
            });

            if (!wasActive) item.classList.add('active');
        });
    });
});
</script>

<?php include("includes/footer.php"); ?>
</body>
</html>