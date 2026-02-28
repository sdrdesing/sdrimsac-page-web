<?php include("includes/header.php"); ?>

<!-- BANNER -->
<div class="page-banner">
    <img src="https://images.unsplash.com/photo-1517842645767-c639042777db?w=1400&q=80" alt="Manuales SDRIM">
    <div class="page-banner-overlay">
        <h1>Centro de Ayuda</h1>
        <p>Guías y documentación para tu sistema de facturación</p>
    </div>
</div>

<link rel="stylesheet" href="assets/css/manuales.css">

<div class="manuales-titulo">
    <h1>Bienvenido a la Sección de Manuales</h1>
    <p>A continuación encontrarás una lista completo de los manuales disponibles. Estos manuales están diseñados para proporcionar guías paso a paso sobre diversos aspectos de nuestros sistemas y procedimientos</p>
</div>


<?php
$pagina = isset($_GET['pagina']) ? intval($_GET['pagina']) : 1;
if ($pagina < 1) $pagina = 1;
$totalPaginas = 3;

// Página 1: manuales de la imagen
if ($pagina === 1) {
  $manuales = [
    [
      'img' => 'assets/img/manualchifa.png',
      'titulo' => 'Sistema Chifa',
      'desc' => 'Un sistema de facturación para un Chifa gestiona pedidos, genera facturas y controla ventas e inventarios, optimizando la operación del restaurante.'
    ],
    [
      'img' => 'assets/img/manualcafeteria.png',
      'titulo' => 'Sistema Cafetería',
      'desc' => 'Un sistema de facturación para una Cafetería gestiona pedidos, genera facturas y controla ventas e inventarios, optimizando la operación del restaurante.'
    ],
    [
      'img' => 'assets/img/manualcevicheria.png',
      'titulo' => 'Sistema Cevichería',
      'desc' => 'Un sistema de facturación para una Cevichería gestiona pedidos, genera facturas y controla ventas e inventarios, optimizando la operación del restaurante.'
    ],
    [
      'img' => 'assets/img/manualkaraoke.png',
      'titulo' => 'Sistema Karaoke',
      'desc' => 'Un sistema de facturación para un Karaoke gestiona pedidos, genera facturas y controla ventas e inventarios, optimizando la operación del restaurante.'
    ],
    [
      'img' => 'assets/img/manualpizzeria.png',
      'titulo' => 'Sistema Pizzería',
      'desc' => 'Un sistema de facturación para una Pizzería gestiona pedidos, genera facturas y controla ventas e inventarios, optimizando la operación del restaurante.'
    ],
    [
      'img' => 'assets/img/manualrecreo.png',
      'titulo' => 'Sistema Recreo',
      'desc' => 'Un sistema de facturación para un Recreo gestiona pedidos, genera facturas y controla ventas e inventarios, optimizando la operación del restaurante.'
    ],
  ];
} else if ($pagina === 2) {
  $manuales = [
    [
      'img' => 'assets/img/manualRestaurante.png',
      'titulo' => 'Sistema Restaurante',
      'desc' => 'Un sistema de facturación para una Restaurante gestiona pedidos, genera facturas y controla ventas e inventarios, optimizando la operación del restaurante.'
    ],
    [
      'img' => 'assets/img/manualFerreteria.png',
      'titulo' => 'Sistema Ferretería',
      'desc' => 'Un sistema de facturación para una Ferretería gestiona pedidos, genera facturas y controla ventas e inventarios, optimizando la operación de la Ferretería.'
    ],
    [
      'img' => 'assets/img/manualEscolar.png',
      'titulo' => 'Sistema Escolar',
      'desc' => 'Un sistema de facturación para un Colegio gestiona pedidos, genera facturas y controla ventas e inventarios, optimizando la operación de la Institución.'
    ],
    [
      'img' => 'assets/img/manualHotelero.png',
      'titulo' => 'Sistema Hotelero',
      'desc' => 'Un sistema de facturación para un Hotel cafetería gestiona pedidos, genera facturas y controla ventas e inventarios, optimizando la operación del Hotel.'
    ],
    [
      'img' => 'assets/img/manualFarmacia.png',
      'titulo' => 'Sistema Farmacia',
      'desc' => 'Un sistema de facturación para una Farmacia gestiona pedidos, genera facturas y controla ventas e inventarios, optimizando la operación de la Farmacia.'
    ],
    [
      'img' => 'assets/img/manualHospital.png',
      'titulo' => 'Sistema Hospital',
      'desc' => 'Un sistema de facturación para un Hospital gestiona pedidos, genera facturas y controla ventas e inventarios, optimizando la operación del Hospital.'
    ],
  ];

} else if ($pagina === 3) {
  $manuales = [
    [
      'img' => 'assets/img/manualCredito.png',
      'titulo' => 'Sistema Crédito',
      'desc' => 'Un sistema de facturación para un Créditos gestiona pedidos, genera facturas y controla ventas e inventarios, optimizando la operación del servicio de Crédito.'
    ],
  ];
} else {
  $manuales = [];
}

echo '<section class="manuales-section">';
echo '<div class="manuales-grid">';
foreach ($manuales as $m) {
  echo '<div class="manual-card">';
  echo '<img src="' . htmlspecialchars($m['img']) . '" alt="' . htmlspecialchars($m['titulo']) . '">';
  echo '<div class="manual-card-body">';
  echo '<h3>' . htmlspecialchars($m['titulo']) . '</h3>';
  echo '<p>' . htmlspecialchars($m['desc']) . '</p>';
  echo '<div class="manual-card-btns">';
  echo '<a href="#" class="manual-btn">VER VIDEO</a>';
  echo '<a href="https://www.canva.com/design/DAGPpgOXGwI/OcpWRosz7TCYs3maSNdlbw/edit?utm_content=DAGPpgOXGwI&utm_campaign=designshare&utm_medium=link2&utm_source=sharebutton" class="manual-btn" target="_blank">LEER MANUAL</a>';
  echo '</div></div></div>';
}
echo '</div>';
echo '<div class="manuales-paginacion">';
for ($i = 1; $i <= $totalPaginas; $i++) {
  $active = ($i == $pagina) ? 'pagina-activa' : '';
  echo '<a href="?pagina=' . $i . '" class="' . $active . '">' . $i . '</a>';
}
echo '</div>';
echo '</section>';
?>

<section class="faq-section">
    <h2 class="faq-title">Preguntas Frecuentes</h2>
    <div class="faq-container">
        <div class="faq-list">
            <details open>
                <summary>¿Cuáles son los beneficios de utilizar los manuales de facturación electrónicos?</summary>
                <ul>
                    <li><b>Facilitan la adopción del sistema</b> y reducen el tiempo de aprendizaje.</li>
                    <li><b>Mejoran la precisión</b> y disminuyen errores en la emisión de facturas.</li>
                    <li><b>Ahorro de tiempo</b> al resolver dudas rápidamente sin depender de soporte externo.</li>
                    <li><b>Estandarizan los procesos</b>, asegurando uniformidad en la empresa.</li>
                    <li><b>Facilitan la capacitación</b> de nuevos empleados.</li>
                    <li><b>Aseguran el cumplimiento normativo</b> para evitar sanciones.</li>
                    <li><b>Apoyan auditorías</b>, mostrando prácticas estandarizadas.</li>
                    <li><b>Mejoran la seguridad</b> en el manejo de datos sensibles.</li>
                    <li><b>Ayudan a resolver problemas comunes</b> de forma rápida.</li>
                    <li><b>Mantienen actualizados</b> los procedimientos con cambios normativos o del software.</li>
                </ul>
            </details>
            <details>
                <summary>¿El manual de facturación de hospital con farmacia son iguales ?</summary>
                <p>No, cada manual está adaptado a las particularidades de cada sistema y sus módulos. El de hospital incluye gestión de farmacia, mientras que el de farmacia es específico para ese rubro.</p>
            </details>
            <details>
                <summary>¿Qué tipo de apoyo brinda el manual de facturación electrónico?</summary>
                <p>Brinda guías paso a paso, ejemplos prácticos y recomendaciones para resolver incidencias frecuentes, facilitando la operación diaria y el cumplimiento normativo.</p>
            </details>
        </div>
        <div class="faq-img">
            <img src="assets/img/manuales/faq-ilustracion.png" alt="FAQ Ilustración" style="max-width:220px;">
        </div>
    </div>
</section>

<?php include("includes/social.php"); ?>
<?php include("includes/footer.php"); ?>