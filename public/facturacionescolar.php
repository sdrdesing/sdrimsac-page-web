<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Facturación Escolar - SDRIMSAC</title>
    <link rel="stylesheet" href="assets/css/estilo.css">
    <link rel="stylesheet" href="assets/css/facturacionescolar.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="js/script.js" defer></script>
</head>
<body>

<?php include("includes/header.php"); ?>

<!-- BANNER MODERNO -->
<section class="escolar-banner-modern">
    <img src="https://images.unsplash.com/photo-1486312338219-ce68d2c6f44d?w=1400&q=80" alt="Servicios SDRIM">
    <div class="escolar-banner-overlay"></div>

    <div class="escolar-banner-content">
        <span class="escolar-badge">Solución especializada para Escolar</span>
        <h1>Aplicativo para Facturación Electrónica - Escolar</h1>
        <p>Sdrim S.A.C. · Soluciones integrales para gestión educativa y facturación</p>
    </div>
</section>

<!-- HERO PRINCIPAL -->
<section class="escolar-hero">
    <div class="escolar-hero-container">

        <div class="escolar-hero-text">
            <span class="escolar-tag">Solución integral</span>

            <h2>Desarrollo de Facturación Electrónica</h2>

            <p>
                Un sistema para colegio es una herramienta esencial que agiliza la administración escolar, mejora la comunicación entre todas las partes involucradas y contribuye al éxito académico y operativo de la institución educativa. Facilita la toma de decisiones basadas en datos y permite un enfoque más eficiente y efectivo en la gestión educativa.
            </p>

            <div class="escolar-features">
                <div class="feature">
                    <i class="fa-solid fa-check"></i>
                    <span>Emisión rápida de comprobantes electrónicos</span>
                </div>

                <div class="feature">
                    <i class="fa-solid fa-check"></i>
                    <span>Gestión de matrículas, salones y apoderados</span>
                </div>

                <div class="feature">
                    <i class="fa-solid fa-check"></i>
                    <span>Envío directo de comprobantes a SUNAT</span>
                </div>
            </div>
        </div>

        <div class="escolar-hero-image">
            <div class="escolar-banner-container">
                <img src="assets/img/banerescolar.png" alt="Facturación Electrónica Escolar" class="escolar-banner">
                <img src="assets/img/ESCOLAR.png" alt="Sistema Escolar" class="escolar-card">
            </div>
        </div>

    </div>
</section>

<!-- ROLES -->
<section class="escolar-roles-section">
    <div class="escolar-section-heading">
        <span class="escolar-tag">Funciones principales</span>
        <h3>Módulos del sistema</h3>
        <p>
            Organiza la institución educativa con herramientas especializadas para administración, caja, matrículas, útiles escolares y control académico-administrativo.
        </p>
    </div>

    <div class="escolar-roles-grid">
        <div class="escolar-role-card escolar-role-large">
            <div class="role-icon"><i class="fa-solid fa-user-gear"></i></div>
            <h3>ADMINISTRADOR</h3>
            <ul>
                <li>Mantenimiento de Usuarios, Clientes, Categorías, Marcas, Registro de número de Cuentas de Banco</li>
                <li>Compras – Listado de Compras</li>
                <li>Creación de Productos y Servicios</li>
                <li>Ventas Administrativas (Factura, Boletas y Notas de Venta) envíos de Factura, Boleta directos a SUNAT</li>
                <li>Anulación de comprobantes (Interno y Externo) – Nota de Crédito</li>
                <li>Ingresos y Gastos de Efectivo</li>
                <li>Reporte de Caja</li>
                <li>Reporte de Cierre de Caja por usuarios</li>
                <li>Reporte de Ganancia</li>
                <li>Reporte de Stock de Productos</li>
                <li>Reporte Productos Vendidos</li>
                <li>Reporte Valorizado</li>
                <li>Reporte de Stock Mínimo</li>
                <li>Reporte de Métodos de Pago</li>
                <li>Reporte de Kardex</li>
                <li>Contabilidad (Compras y Ventas)</li>
                <li>Configuración de Suscripción Escolar</li>
                <li>Crear Salones – Niveles/Grados/Sección/Turno – Planes – Periodos – Penalidades</li>
                <li>Registro de Apoderados (Padre – Madre – Abuel@/s) e Hijos (alumnos)</li>
                <li>Registro de Multimatrículas</li>
                <li>Registro de Almacén de Útiles</li>
            </ul>
        </div>

        <div class="escolar-role-card">
            <div class="role-icon"><i class="fa-solid fa-cash-register"></i></div>
            <h3>CAJA</h3>
            <ul>
                <li>Vista en Tarjeta (con imagen) de los Productos (Útiles escolares – Uniforme – Libros) dispuestos para la Venta</li>
                <li>Emisión de comprobantes electrónicos ilimitados con y sin IGV (Factura, Boleta y Nota de Venta) para el cobro de inscripción y cobro de matrículas, con envíos directos al WhatsApp del cliente</li>
                <li>Emisión de comprobantes electrónicos ilimitados con diferentes métodos de pago</li>
                <li>Campo de observaciones</li>
                <li>Envío de Facturas y Boletas directo a SUNAT</li>
                <li>Anulación de comprobantes (Interno y Externo) Notas de Crédito</li>
                <li>Registro de Matrículas y Multimatrículas</li>
                <li>Reporte de ventas diarias en pdf (con envíos directo a WhatsApp de la administración)</li>
                <li>Ingresos y Gastos de Efectivo</li>
            </ul>
        </div>
    </div>
</section>

<!-- FAQ -->
<section class="escolar-faq-wrapper">
    <div class="escolar-faq-section">
        <div class="faq-escolar">
            <h2 class="faq-title">Preguntas Frecuentes</h2>

            <div class="faq-item">
                <div class="faq-question">
                    ¿Qué es la facturación electrónica escolar?
                    <span class="faq-arrow"></span>
                </div>
                <div class="faq-answer">
                    La facturación electrónica escolar se refiere al proceso de emitir y recibir facturas electrónicas en el entorno educativo, como en escuelas o instituciones educativas, para gestionar pagos y otros trámites administrativos de manera digital.
                </div>
            </div>

            <div class="faq-item">
                <div class="faq-question">
                    ¿Por qué es importante implementar la facturación electrónica en las escuelas?
                    <span class="faq-arrow"></span>
                </div>
                <div class="faq-answer">
                    Permite mayor eficiencia administrativa, reducción de errores, cumplimiento normativo, integración con sistemas de gestión escolar y mejora la atención a padres y alumnos al agilizar procesos de cobro y facturación.
                </div>
            </div>

            <div class="faq-item">
                <div class="faq-question">
                    ¿Qué información debe incluir una factura electrónica escolar?
                    <span class="faq-arrow"></span>
                </div>
                <div class="faq-answer">
                    Debe incluir datos del colegio, datos del alumno o apoderado, concepto de pago, monto, fecha, número de comprobante, y cumplir con los requisitos fiscales vigentes.
                </div>
            </div>

            <div class="faq-item">
                <div class="faq-question">
                    ¿Qué ventajas tiene la facturación electrónica para los padres o tutores?
                    <span class="faq-arrow"></span>
                </div>
                <div class="faq-answer">
                    Facilita el acceso a comprobantes, reduce trámites presenciales, permite pagos en línea y mejora la transparencia y control de los pagos escolares.
                </div>
            </div>
        </div>

        <div class="faq-img-escolar">
            <img src="assets/img/dragonEscolar.png" alt="Escolar Preguntas Frecuentes">
        </div>
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.faq-item').forEach(function(item) {
        var question = item.querySelector('.faq-question');

        question.addEventListener('click', function() {
            var wasActive = item.classList.contains('active');

            document.querySelectorAll('.faq-item').forEach(function(i) {
                i.classList.remove('active');
                i.querySelector('.faq-answer').style.display = 'none';
            });

            if (!wasActive) {
                item.classList.add('active');
                item.querySelector('.faq-answer').style.display = 'block';
            }
        });
    });

    document.querySelectorAll('.faq-answer').forEach(function(ans) {
        ans.style.display = 'none';
    });
});
</script>

<?php include("includes/footer.php"); ?>
</body>
</html>