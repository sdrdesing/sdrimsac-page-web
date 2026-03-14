<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Aplicativo para Facturación Electrónica - Karaoke</title>
    <link rel="stylesheet" href="assets/css/estilo.css">
    <link rel="stylesheet" href="assets/css/facturacionkaraoke.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>

<?php include("includes/header.php"); ?>

<!-- BANNER MODERNO -->
<section class="karaoke-banner-modern">
    <img src="https://images.unsplash.com/photo-1486312338219-ce68d2c6f44d?w=1400&q=80" alt="Banner Karaoke">
    <div class="karaoke-banner-overlay"></div>

    <div class="karaoke-banner-content">
        <span class="karaoke-badge">Solución especializada para Karaoke</span>
        <h1>Aplicativo para Facturación Electrónica - Karaoke</h1>
        <p>Sdrim S.A.C. · Servicios · Facturación Electrónica para Karaoke</p>
    </div>
</section>

<!-- HERO PRINCIPAL -->
<section class="karaoke-hero">
    <div class="karaoke-hero-container">

        <div class="karaoke-hero-text">
            <span class="karaoke-tag">Solución integral</span>

            <h2>Desarrollo de Facturación Electrónica</h2>

            <p>
                Se instala un software de facturación electrónica en el sistema informático del karaoke.
                Este software está diseñado para generar facturas electrónicas de manera automatizada
                y asegurarse de que cumplan con todos los requisitos legales y fiscales.
                Además, contribuye a la modernización y digitalización de la operación del karaoke,
                lo que puede aumentar la eficiencia y la satisfacción del cliente.
            </p>

            <div class="karaoke-features">
                <div class="feature">
                    <i class="fa-solid fa-check"></i>
                    <span>Emisión rápida de comprobantes electrónicos</span>
                </div>

                <div class="feature">
                    <i class="fa-solid fa-check"></i>
                    <span>Control de caja, ventas y atención</span>
                </div>

                <div class="feature">
                    <i class="fa-solid fa-check"></i>
                    <span>Envío directo de comprobantes a SUNAT</span>
                </div>
            </div>
        </div>

        <div class="karaoke-hero-image">
            <div class="karaoke-banner-container">
                <img src="assets/img/banerkaraoke.png" alt="Sistema Karaoke" class="karaoke-banner">
                <img src="assets/img/karaoke.jpg" alt="App Karaoke" class="karaoke-card">
            </div>
        </div>

    </div>
</section>

<!-- MÓDULOS -->
<section class="karaoke-roles-section">
    <div class="karaoke-section-heading">
        <span class="karaoke-tag">Funciones principales</span>
        <h3>Módulos del sistema</h3>
        <p>
            Organiza la operación del karaoke con herramientas para administración, caja, atención, cocina y barra.
        </p>
    </div>

    <div class="karaoke-roles-grid">
        <div class="karaoke-role-card karaoke-role-large">
            <div class="role-icon"><i class="fa-solid fa-user-gear"></i></div>
            <h3>ADMINISTRADOR</h3>
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

        <div class="karaoke-role-card">
            <div class="role-icon"><i class="fa-solid fa-cash-register"></i></div>
            <h3>CAJA</h3>
            <ul>
                <li>Emisión de comprobantes electrónicos ilimitados libre de IGV (Factura, Boleta y Nota de Venta)</li>
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

        <div class="karaoke-role-card">
            <div class="role-icon"><i class="fa-solid fa-clock"></i></div>
            <h3>MOZO</h3>
            <ul>
                <li>Toma de pedidos por mesa (individual o pagos en grupo)</li>
                <li>Envíos directos a cocina a través de Pantalla o impresión de comandas con ticketera</li>
                <li>Unión de mesas</li>
                <li>Cambio de órdenes de mesa</li>
                <li>Check en pedido listo</li>
            </ul>
        </div>
    </div>

    <div class="karaoke-roles-bottom">
        <div class="karaoke-role-card">
            <div class="role-icon"><i class="fa-solid fa-utensils"></i></div>
            <h3>COCINA</h3>
            <ul>
                <li>Recepción de pedidos con Pc (sonido), Laptop, Tablet y/o Ticket</li>
                <li>Check en pedido listo</li>
            </ul>
        </div>

        <div class="karaoke-role-card">
            <div class="role-icon"><i class="fa-solid fa-table-cells-large"></i></div>
            <h3>BARRA</h3>
            <ul>
                <li>Recepción de pedidos con Pc (sonido), Laptop, Tablet y/o Ticket</li>
                <li>Pedido listo</li>
            </ul>
        </div>
    </div>
</section>

<!-- FAQ -->
<section class="karaoke-faq-wrapper">
    <div class="karaoke-faq-section">
        <div class="karaoke-faq">
            <h2>Preguntas Frecuentes</h2>

            <div class="faq-item active">
                <div class="faq-question">
                    <span class="faq-question-left">
                        <span class="faq-arrow"></span>
                        ¿Cómo puede ayudar la facturación electrónica a mi negocio de karaoke?
                    </span>
                </div>
                <div class="faq-answer" style="display:block;">
                    La facturación electrónica facilita la gestión de las facturas, reduce errores y costos asociados con el manejo de documentos físicos, y cumple con los requisitos fiscales establecidos. También puede ayudar a mejorar el flujo de caja y simplificar la contabilidad.
                </div>
            </div>

            <div class="faq-item">
                <div class="faq-question">
                    <span class="faq-question-left">
                        <span class="faq-arrow"></span>
                        ¿Cómo implemento un sistema de facturación electrónica para mi negocio de karaoke?
                    </span>
                </div>
                <div class="faq-answer">
                    Para implementar un sistema de facturación electrónica, es recomendable contar con un software especializado que se adapte a las necesidades de tu negocio y cumpla con las normativas fiscales vigentes. Nuestro equipo puede asesorarte en todo el proceso de instalación y capacitación.
                </div>
            </div>

            <div class="faq-item">
                <div class="faq-question">
                    <span class="faq-question-left">
                        <span class="faq-arrow"></span>
                        ¿Cómo garantizo que las facturas electrónicas sean válidas y cumplan con las normativas fiscales?
                    </span>
                </div>
                <div class="faq-answer">
                    Utilizando un software certificado y actualizado, que realice los envíos automáticos a SUNAT y genere comprobantes con todos los requisitos legales. Además, es importante mantener el sistema actualizado ante cambios normativos.
                </div>
            </div>

            <div class="faq-item">
                <div class="faq-question">
                    <span class="faq-question-left">
                        <span class="faq-arrow"></span>
                        ¿Qué beneficios adicionales ofrece la facturación electrónica para mi negocio de karaoke?
                    </span>
                </div>
                <div class="faq-answer">
                    La facturación electrónica contribuye a la modernización y digitalización del negocio, mejora la eficiencia operativa, reduce el uso de papel y facilita el acceso a reportes y estadísticas en tiempo real.
                </div>
            </div>
        </div>

        <div class="karaoke-faq-img">
            <img src="assets/img/dragonKaraoke.png" alt="Karaoke Preguntas Frecuentes">
        </div>
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.faq-question').forEach(function(q) {
        q.addEventListener('click', function() {
            var item = this.parentElement;
            var answer = item.querySelector('.faq-answer');
            var isOpen = item.classList.contains('active');

            document.querySelectorAll('.faq-item').forEach(function(i) {
                i.classList.remove('active');
                var ans = i.querySelector('.faq-answer');
                if (ans) ans.style.display = 'none';
            });

            if (!isOpen) {
                item.classList.add('active');
                answer.style.display = 'block';
            }
        });
    });
});
</script>

<?php include("includes/footer.php"); ?>
</body>
</html>