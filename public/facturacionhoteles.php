<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Facturación Hoteles - SDRIMSAC</title>
    <link rel="stylesheet" href="assets/css/facturacionhoteles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="js/script.js" defer></script>
</head>
<body>

<?php include("includes/header.php"); ?>

<!-- BANNER MODERNO -->
<section class="hoteles-banner-modern">
    <img src="https://images.unsplash.com/photo-1486312338219-ce68d2c6f44d?w=1400&q=80" alt="Servicios SDRIM">
    <div class="hoteles-banner-overlay"></div>

    <div class="hoteles-banner-content">
        <span class="hoteles-badge">Solución especializada para Hoteles</span>
        <h1>Aplicativo para Facturación Electrónica - Hoteles</h1>
        <p>Sdrim S.A.C. · Servicios · Facturación Hoteles</p>
    </div>
</section>

<!-- HERO PRINCIPAL -->
<section class="hoteles-hero">
    <div class="hoteles-hero-container">

        <div class="hoteles-hero-text">
            <span class="hoteles-tag">Solución integral</span>

            <h2>Desarrollo de Facturación Electrónica</h2>

            <p>
                El servicio de desarrollo de facturación electrónica para NEGOCIO – HOTEL es una herramienta integral que facilita la administración de operaciones diarias de un hotel o establecimiento de hospedaje. Este sistema está diseñado para mejorar la eficiencia operativa, optimizar la experiencia del huésped y aumentar la rentabilidad.
            </p>

            <div class="hoteles-features">
                <div class="feature">
                    <i class="fa-solid fa-check"></i>
                    <span>Emisión rápida de comprobantes electrónicos</span>
                </div>

                <div class="feature">
                    <i class="fa-solid fa-check"></i>
                    <span>Gestión de habitaciones y reservas</span>
                </div>

                <div class="feature">
                    <i class="fa-solid fa-check"></i>
                    <span>Envío directo de comprobantes a SUNAT</span>
                </div>
            </div>
        </div>

        <div class="hoteles-hero-image">
            <div class="hoteles-banner-container">
                <img src="assets/img/banerhoteles.png" alt="App Hoteles Facturación Electrónica" class="hoteles-banner">
                <img src="assets/img/hotel.png" alt="Sistema Hoteles" class="hoteles-card">
            </div>
        </div>

    </div>
</section>

<!-- PREVIEW -->
<section class="hoteles-preview-section">
    <div class="hoteles-preview-container">
        <div class="hoteles-section-heading">
            <span class="hoteles-tag">Vista del sistema</span>
            <h3>Módulo de Atención y Operación</h3>
            <p>
                Visualiza una solución diseñada para controlar atención, habitaciones, reservas y operación diaria del hotel.
            </p>
        </div>

        <div class="hoteles-preview-card">
            <img src="assets/img/hotel1.png" alt="Zona de Atención Hotel" class="hoteles-preview-img">
        </div>
    </div>
</section>

<!-- ROLES -->
<section class="hoteles-roles-section">
    <div class="hoteles-section-heading">
        <span class="hoteles-tag">Funciones principales</span>
        <h3>Módulos del sistema</h3>
        <p>
            Organiza el hotel con herramientas especializadas para administración, caja, reservas, habitaciones y operación diaria.
        </p>
    </div>

    <div class="hoteles-roles">
        <div class="hoteles-roles-col hoteles-roles-col-large">
            <div class="role-icon"><i class="fa-solid fa-user-gear"></i></div>
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
            <div class="role-icon"><i class="fa-solid fa-cash-register"></i></div>
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
</section>

<!-- FAQ -->
<section class="hoteles-faq-wrapper">
    <div class="hoteles-faq-section">
        <div class="hoteles-faq">
            <h2>Preguntas Frecuentes</h2>

            <div class="hoteles-faq-item">
                <div class="hoteles-faq-question">
                    ¿Por qué es importante la facturación electrónica en el sector hotelero?
                    <span class="hoteles-faq-toggle">&#9654;</span>
                </div>
                <div class="hoteles-faq-answer">
                    La facturación electrónica simplifica el proceso administrativo, reduce errores, acelera la gestión de pagos y facilita el cumplimiento de las normativas fiscales.
                </div>
            </div>

            <div class="hoteles-faq-item">
                <div class="hoteles-faq-question">
                    ¿Qué información debe contener una factura electrónica hotelera?
                    <span class="hoteles-faq-toggle">&#9654;</span>
                </div>
                <div class="hoteles-faq-answer">
                    Debe contener datos del huésped, detalles de la habitación, servicios consumidos, impuestos aplicados y método de pago.
                </div>
            </div>

            <div class="hoteles-faq-item">
                <div class="hoteles-faq-question">
                    ¿Qué beneficios ofrece la facturación electrónica para los hoteles?
                    <span class="hoteles-faq-toggle">&#9654;</span>
                </div>
                <div class="hoteles-faq-answer">
                    Ofrece mayor control, reducción de errores, acceso rápido a reportes y cumplimiento normativo, además de mejorar la experiencia del huésped y la gestión interna.
                </div>
            </div>

            <div class="hoteles-faq-item">
                <div class="hoteles-faq-question">
                    ¿Qué es el Housekeeper?
                    <span class="hoteles-faq-toggle">&#9654;</span>
                </div>
                <div class="hoteles-faq-answer">
                    Es el personal encargado de la limpieza y mantenimiento de las habitaciones, asegurando que estén en óptimas condiciones para los huéspedes.
                </div>
            </div>
        </div>

        <div class="hoteles-faq-img">
            <img src="assets/img/dragonHotel.png" alt="Hoteles Preguntas Frecuentes">
        </div>
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.hoteles-faq-question').forEach(function(q) {
        q.addEventListener('click', function() {
            var item = this.parentElement;
            var wasActive = item.classList.contains('active');

            document.querySelectorAll('.hoteles-faq-item').forEach(function(i) {
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