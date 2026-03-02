<?php include("includes/header.php"); ?>


<!-- BANNER ADICIONAL -->
<div class="page-banner">
    <img src="https://images.unsplash.com/photo-1551288049-bebda4e38f71?w=1400&q=80" alt="Herramientas Digitales">
    <div class="page-banner-overlay">
        <h1>Herramientas Digitales</h1>
        <p>Todo lo que necesitas para tu facturación electrónica</p>
    </div>
</div>

<link rel="stylesheet" href="assets/css/herramientas.css">

<div class="herramientas-main">
    <!-- Menú principal siempre visible -->
    <div class="herramientas-menu-bar">
        <a href="herramientas.php?seccion=programas"><button class="btn-herramientas-menu">Programas</button></a>
        <a href="herramientas.php?seccion=drivers_ticketera"><button class="btn-herramientas-menu">Drivers Ticketera</button></a>
        <a href="herramientas.php?seccion=sistema"><button class="btn-herramientas-menu">Sistema</button></a>
        <a href="herramientas.php?seccion=driver_all_in_one"><button class="btn-herramientas-menu">Driver All in One</button></a>
    </div>
    <div class="herramientas-menu-info">
        <p>Selecciona una categoría para ver las herramientas disponibles.</p>
    </div>
    <!-- Contenido dinámico debajo del menú principal -->
    <div class="herramientas-content">
    <?php
    // Detectar la sección y herramienta seleccionada
    $seccion = $_GET['seccion'] ?? null;
    $herramienta = $_GET['herramienta'] ?? null;

    if (!$seccion) {
        // Nada más, solo el menú principal
    } else if ($seccion && !$herramienta) {
        // Mostrar menú de la sección
        $menuFile = "herramientas/menus/{$seccion}.php";
        if (file_exists($menuFile)) {
            include $menuFile;
        } else {
            echo '<div class="herramientas-error">Sección no encontrada.</div>';
        }
    } else if ($seccion && $herramienta) {
        // Mostrar herramienta específica
        $toolFile = "herramientas/{$seccion}/{$herramienta}.php";
        if (file_exists($toolFile)) {
            include $toolFile;
        } else {
            echo '<div class="herramientas-error">Herramienta no encontrada.</div>';
        }
    }
    ?>
    </div>
</div>

<?php include("includes/social.php"); ?>
<?php include("includes/footer.php"); ?>