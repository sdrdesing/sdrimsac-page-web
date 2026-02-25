<?php
?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Facturación Cevichería - SDRIMSAC</title>
<link rel="stylesheet" href="assets/css/estilo.css">
<link rel="stylesheet" href="assets/css/facturacioncevicheria.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
<?php include("includes/header.php"); ?>
<section class="servicios-header" style="background:#18376b; color:#fff; padding:60px 0 40px 0; text-align:center;">
    <h1 style="font-size:3rem;font-weight:700;margin-bottom:12px;">Aplicativo para Facturación Electrónica - Cevichería</h1>
    <div style="font-size:1.5rem;font-weight:500;margin-bottom:8px;">Sdrim S.A.C.</div>
    <div style="font-size:1.1rem;color:#cfd8e3;">Servicios <span style="color:#fff;">:</span> Facturación Cevichería</div>
</section>


<!-- BANNER IMAGEN -->
<section class="fact-banner">
    <img src="assets/img/cevicheria.jpg" alt="Facturación Cevichería" style="max-width:900px;width:100%;height:auto;display:block;margin:40px auto 0 auto;">
</section>

<!-- DESARROLLO -->
<section class="fact-desarrollo">
    <h2>DESARROLLO DE FACTURACIÓN ELECTRÓNICA</h2>
    <p>
        El servicio de desarrollo de facturación electrónica para una CEVICHERÍA
        busca simplificar y agilizar el proceso de emisión de facturas,
        garantizando la legalidad y eficiencia en la gestión financiera.
        El sistema permite personalizar comprobantes electrónicos
        con identidad visual del negocio y envío directo a SUNAT.
    </p>
</section>

<!-- MODULOS -->
<section class="fact-modulos">

    <div class="modulo">
        <h3><i class="fa-solid fa-user-gear"></i> ADMINISTRADOR</h3>
        <ul>
            <li>Mantenimiento de Usuarios y Clientes</li>
            <li>Compras y Registro de Cuentas</li>
            <li>Creación de Productos y Servicios</li>
            <li>Ventas Administrativas</li>
            <li>Reporte de Caja</li>
            <li>Reporte de Stock</li>
            <li>Reporte de Ganancias</li>
        </ul>
    </div>

    <div class="modulo">
        <h3><i class="fa-solid fa-cash-register"></i> CAJA</h3>
        <ul>
            <li>Emisión de Boletas y Facturas</li>
            <li>Diferentes métodos de pago</li>
            <li>Toma de pedidos por mesa</li>
            <li>Delivery</li>
            <li>Ventas Aparcadas</li>
            <li>Envío directo a SUNAT</li>
        </ul>
    </div>

    <div class="modulo">
        <h3><i class="fa-solid fa-utensils"></i> MOZO</h3>
        <ul>
            <li>Toma de pedidos por mesa</li>
            <li>Envíos directos a cocina</li>
            <li>Unión de mesas</li>
            <li>Cambio de órdenes</li>
            <li>Check de pedido listo</li>
        </ul>
    </div>

    <div class="modulo">
        <h3><i class="fa-solid fa-fire-burner"></i> COCINA</h3>
        <ul>
            <li>Recepción de pedidos con sonido</li>
            <li>Check pedido listo</li>
        </ul>
    </div>

    <div class="modulo">
        <h3><i class="fa-solid fa-martini-glass"></i> BARRA</h3>
        <ul>
            <li>Recepción de pedidos con sonido</li>
            <li>Pedido listo</li>
        </ul>
    </div>

</section>

<!-- PREGUNTAS FRECUENTES -->
<section class="faq-section">
    <h2>Preguntas Frecuentes</h2>

    <div class="faq-item">
        <button class="faq-question">
            ¿Cómo debo almacenar y conservar las facturas electrónicas?
        </button>
        <div class="faq-answer">
            Debes almacenarlas en formato digital seguro (PDF y XML),
            con respaldo en la nube o servidor seguro.
        </div>
    </div>

    <div class="faq-item">
        <button class="faq-question">
            ¿Cómo puedo proporcionar copias a mis clientes?
        </button>
        <div class="faq-answer">
            Puedes enviarlas por correo electrónico o WhatsApp directamente
            desde el sistema.
        </div>
    </div>

    <div class="faq-item">
        <button class="faq-question">
            ¿Qué información debe incluir la factura electrónica?
        </button>
        <div class="faq-answer">
            Datos del cliente, RUC, detalle de productos, IGV,
            método de pago y validación SUNAT.
        </div>
    </div>

    <div class="faq-item">
        <button class="faq-question">
            ¿Cómo evitar pérdida de datos?
        </button>
        <div class="faq-answer">
            Implementando copias de seguridad automáticas
            y almacenamiento en la nube.
        </div>
    </div>
</section>

<script>
document.querySelectorAll(".faq-question").forEach(btn => {
    btn.addEventListener("click", () => {
        btn.classList.toggle("active");
        const answer = btn.nextElementSibling;
        answer.style.display =
            answer.style.display === "block" ? "none" : "block";
    });
});
</script> 
<?php include("includes/footer.php"); ?>
</body>
</html>

<?php
?><!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Facturación Cevichería - SDRIMSAC</title>
    <link rel="stylesheet" href="../public/assets/css/estilo.css">
    <link rel="stylesheet" href="../public/assets/css/facturacioncevicheria.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="../public/assets/js/script.js" defer></script>
</head>
<body>
    <?php include(__DIR__ . '/../includes/header.php'); ?>
    <section class="servicios-header" style="background:#18376b; color:#fff; padding:60px 0 40px 0; text-align:center;">
        <h1 style="font-size:3rem;font-weight:700;margin-bottom:12px;">Aplicativo para Facturación Electrónica - Cevichería</h1>
        <div style="font-size:1.5rem;font-weight:500;margin-bottom:8px;">Sdrim S.A.C.</div>
        <div style="font-size:1.1rem;color:#cfd8e3;">Servicios <span style="color:#fff;">:</span> Facturación Cevichería</div>
    </section>

    <!-- BANNER IMAGEN -->
    <section class="fact-banner">
        <img src="../public/assets/img/cevicheria.jpg" alt="Facturación Cevichería" style="max-width:900px;width:100%;height:auto;display:block;margin:40px auto 0 auto;">
    </section>

    <!-- DESARROLLO -->
    <section class="fact-desarrollo">
        <h2>DESARROLLO DE FACTURACIÓN ELECTRÓNICA</h2>
        <p>
            El servicio de desarrollo de facturación electrónica para una CEVICHERÍA
            busca simplificar y agilizar el proceso de emisión de facturas,
            garantizando la legalidad y eficiencia en la gestión financiera.
            El sistema permite personalizar comprobantes electrónicos
            con identidad visual del negocio y envío directo a SUNAT.
        </p>
    </section>

    <!-- MODULOS -->
    <section class="fact-modulos">

        <div class="modulo">
            <h3><i class="fa-solid fa-user-gear"></i> ADMINISTRADOR</h3>
            <ul>
                <li>Mantenimiento de Usuarios y Clientes</li>
                <li>Compras y Registro de Cuentas</li>
                <li>Creación de Productos y Servicios</li>
                <li>Ventas Administrativas</li>
                <li>Reporte de Caja</li>
                <li>Reporte de Stock</li>
                <li>Reporte de Ganancias</li>
            </ul>
        </div>

        <div class="modulo">
            <h3><i class="fa-solid fa-cash-register"></i> CAJA</h3>
            <ul>
                <li>Emisión de Boletas y Facturas</li>
                <li>Diferentes métodos de pago</li>
                <li>Toma de pedidos por mesa</li>
                <li>Delivery</li>
                <li>Ventas Aparcadas</li>
                <li>Envío directo a SUNAT</li>
            </ul>
        </div>

        <div class="modulo">
            <h3><i class="fa-solid fa-utensils"></i> MOZO</h3>
            <ul>
                <li>Toma de pedidos por mesa</li>
                <li>Envíos directos a cocina</li>
                <li>Unión de mesas</li>
                <li>Cambio de órdenes</li>
                <li>Check de pedido listo</li>
            </ul>
        </div>

        <div class="modulo">
            <h3><i class="fa-solid fa-fire-burner"></i> COCINA</h3>
            <ul>
                <li>Recepción de pedidos con sonido</li>
                <li>Check pedido listo</li>
            </ul>
        </div>

        <div class="modulo">
            <h3><i class="fa-solid fa-martini-glass"></i> BARRA</h3>
            <ul>
                <li>Recepción de pedidos con sonido</li>
                <li>Pedido listo</li>
            </ul>
        </div>

    </section>

    <!-- PREGUNTAS FRECUENTES -->
    <section class="faq-section">
        <h2>Preguntas Frecuentes</h2>

        <div class="faq-item">
            <button class="faq-question">
                ¿Cómo debo almacenar y conservar las facturas electrónicas?
            </button>
            <div class="faq-answer">
                Debes almacenarlas en formato digital seguro (PDF y XML),
                con respaldo en la nube o servidor seguro.
            </div>
        </div>

        <div class="faq-item">
            <button class="faq-question">
                ¿Cómo puedo proporcionar copias a mis clientes?
            </button>
            <div class="faq-answer">
                Puedes enviarlas por correo electrónico o WhatsApp directamente
                desde el sistema.
            </div>
        </div>

        <div class="faq-item">
            <button class="faq-question">
                ¿Qué información debe incluir la factura electrónica?
            </button>
            <div class="faq-answer">
                Datos del cliente, RUC, detalle de productos, IGV,
                método de pago y validación SUNAT.
            </div>
        </div>

        <div class="faq-item">
            <button class="faq-question">
                ¿Cómo evitar pérdida de datos?
            </button>
            <div class="faq-answer">
                Implementando copias de seguridad automáticas
                y almacenamiento en la nube.
            </div>
        </div>
    </section>

    <script>
    document.querySelectorAll(".faq-question").forEach(btn => {
        btn.addEventListener("click", () => {
            btn.classList.toggle("active");
            const answer = btn.nextElementSibling;
            answer.style.display =
                answer.style.display === "block" ? "none" : "block";
        });
    });
    </script> 
    <?php include(__DIR__ . '/../includes/footer.php'); ?>
    </body>
    </html>
<?php
?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Facturación Cevichería - SDRIMSAC</title>
<link rel="stylesheet" href="../public/assets/css/estilo.css">
<link rel="stylesheet" href="../public/assets/css/facturacioncevicheria.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
<?php include(__DIR__ . '/../includes/header.php'); ?>
<section class="servicios-header" style="background:#18376b; color:#fff; padding:60px 0 40px 0; text-align:center;">
    <h1 style="font-size:3rem;font-weight:700;margin-bottom:12px;">Aplicativo para Facturación Electrónica - Cevichería</h1>
    <div style="font-size:1.5rem;font-weight:500;margin-bottom:8px;">Sdrim S.A.C.</div>
    <div style="font-size:1.1rem;color:#cfd8e3;">Servicios <span style="color:#fff;">:</span> Facturación Cevichería</div>
</section>


<!-- BANNER IMAGEN -->
<section class="fact-banner">
    <img src="../public/assets/img/cevicheria.jpg" alt="Facturación Cevichería" style="max-width:900px;width:100%;height:auto;display:block;margin:40px auto 0 auto;">
</section>

<!-- DESARROLLO -->
<section class="fact-desarrollo">
    <h2>DESARROLLO DE FACTURACIÓN ELECTRÓNICA</h2>
    <p>
        El servicio de desarrollo de facturación electrónica para una CEVICHERÍA
        busca simplificar y agilizar el proceso de emisión de facturas,
        garantizando la legalidad y eficiencia en la gestión financiera.
        El sistema permite personalizar comprobantes electrónicos
        con identidad visual del negocio y envío directo a SUNAT.
    </p>
</section>

<!-- MODULOS -->
<section class="fact-modulos">

    <div class="modulo">
        <h3><i class="fa-solid fa-user-gear"></i> ADMINISTRADOR</h3>
        <ul>
            <li>Mantenimiento de Usuarios y Clientes</li>
            <li>Compras y Registro de Cuentas</li>
            <li>Creación de Productos y Servicios</li>
            <li>Ventas Administrativas</li>
            <li>Reporte de Caja</li>
            <li>Reporte de Stock</li>
            <li>Reporte de Ganancias</li>
        </ul>
    </div>

    <div class="modulo">
        <h3><i class="fa-solid fa-cash-register"></i> CAJA</h3>
        <ul>
            <li>Emisión de Boletas y Facturas</li>
            <li>Diferentes métodos de pago</li>
            <li>Toma de pedidos por mesa</li>
            <li>Delivery</li>
            <li>Ventas Aparcadas</li>
            <li>Envío directo a SUNAT</li>
        </ul>
    </div>

    <div class="modulo">
        <h3><i class="fa-solid fa-utensils"></i> MOZO</h3>
        <ul>
            <li>Toma de pedidos por mesa</li>
            <li>Envíos directos a cocina</li>
            <li>Unión de mesas</li>
            <li>Cambio de órdenes</li>
            <li>Check de pedido listo</li>
        </ul>
    </div>

    <div class="modulo">
        <h3><i class="fa-solid fa-fire-burner"></i> COCINA</h3>
        <ul>
            <li>Recepción de pedidos con sonido</li>
            <li>Check pedido listo</li>
        </ul>
    </div>

    <div class="modulo">
        <h3><i class="fa-solid fa-martini-glass"></i> BARRA</h3>
        <ul>
            <li>Recepción de pedidos con sonido</li>
            <li>Pedido listo</li>
        </ul>
    </div>

</section>

<!-- PREGUNTAS FRECUENTES -->
<section class="faq-section">
    <h2>Preguntas Frecuentes</h2>

    <div class="faq-item">
        <button class="faq-question">
            ¿Cómo debo almacenar y conservar las facturas electrónicas?
        </button>
        <div class="faq-answer">
            Debes almacenarlas en formato digital seguro (PDF y XML),
            con respaldo en la nube o servidor seguro.
        </div>
    </div>

    <div class="faq-item">
        <button class="faq-question">
            ¿Cómo puedo proporcionar copias a mis clientes?
        </button>
        <div class="faq-answer">
            Puedes enviarlas por correo electrónico o WhatsApp directamente
            desde el sistema.
        </div>
    </div>

    <div class="faq-item">
        <button class="faq-question">
            ¿Qué información debe incluir la factura electrónica?
        </button>
        <div class="faq-answer">
            Datos del cliente, RUC, detalle de productos, IGV,
            método de pago y validación SUNAT.
        </div>
    </div>

    <div class="faq-item">
        <button class="faq-question">
            ¿Cómo evitar pérdida de datos?
        </button>
        <div class="faq-answer">
            Implementando copias de seguridad automáticas
            y almacenamiento en la nube.
        </div>
    </div>
</section>

<script>
document.querySelectorAll(".faq-question").forEach(btn => {
    btn.addEventListener("click", () => {
        btn.classList.toggle("active");
        const answer = btn.nextElementSibling;
        answer.style.display =
            answer.style.display === "block" ? "none" : "block";
    });
});
</script> 
<?php include(__DIR__ . '/../includes/footer.php'); ?>
</body>
</html>
