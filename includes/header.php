<?php
// Iniciar sesión solo si no hay una sesión activa (evita Notice por doble session_start)
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<?php
// Intentamos cargar la conexión a la base si existe (para contar productos en carrito DB)
$dbLoaded = false;
if(file_exists(__DIR__ . '/../config/database.php')){
    try {
        require_once __DIR__ . '/../config/database.php';
        $dbLoaded = isset($conn);
    } catch(Throwable $e){
        $dbLoaded = false;
    }
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>sdrimsac - Facturación Electrónica</title>
<link rel="stylesheet" href="assets/css/estilo.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<script src="js/script.js" defer></script>
</head>
<body>

<div class="topbar">
    <span>📞 +51 995 764 963</span>
    <span>✉ contacto@sdrimsac.com</span>
</div>

<nav class="navbar">
    <div class="logo">
        <a href="index.php" aria-label="sdrimsac">
            <img src="assets/img/SDRIMSAC.png" alt="sdrimsac logo">
        </a>
    </div>

    <ul class="menu">
        <li class="dropdown">
            <a href="index.php"><i class="fa-solid fa-house"></i> Principal</a>
            <ul class="submenu">
                <li><a href="nosotros.php">Nosotros</a></li>
                <li><a href="contacto.php">Contacto</a></li>
            </ul>
        </li>

        <li class="dropdown">
            <a href="servicios.php"><i class="fa-solid fa-briefcase"></i> Servicios</a>
            <ul class="submenu">
                <li><a href="paginaweb.php">Página Web</a></li>
                <li><a href="tiendasvirtuales.php">Tiendas Virtuales</a></li>
                <li><a href="marketingdigital.php">Marketing Digital</a></li>
                <li><a href="instalacioncamaras.php">Instalación de Cámaras de Seguridad</a></li>
                <li><a href="instalacionluminarias.php">Instalación de Luminarias Solares</a></li>
                <li class="dropdown-sub">
                    <a href="servicios.php#facturacion-electronica">Facturación Electrónica</a>
                    <ul class="submenu sub-submenu">
                        <li><a href="facturacionchifa.php">Facturación Chifa</a></li>
                        <li><a href="facturacioncafeteria.php">Facturación Cafetería</a></li>
                        <li><a href="facturacioncevicheria.php">Facturación Cevichería</a></li>
                        <li><a href="facturacionkaraoke.php">Facturación Karaoke</a></li>
                        <li><a href="facturacionpizzeria.php">Facturación Pizzería</a></li>
                        <li><a href="facturacionrestaurant.php">Facturación Restaurant</a></li>
                        <li><a href="facturacionrecreos.php">Facturación Recreos</a></li>
                        <li><a href="facturacionhotel.php">Facturación Hotel</a></li>
                        <li><a href="facturacionfarmacia.php">Facturación Farmacia</a></li>
                        <li><a href="facturacionhoteles.php">Facturación Hoteles</a></li>
                        <li><a href="facturacionescolar.php">Facturación Escolar</a></li>
                        <li><a href="facturacioncreditos.php">Facturación Créditos</a></li>
                    </ul>
                </li>
            </ul>
        </li>

        <li><a href="productos.php"><i class="fa-solid fa-store"></i> Tienda</a></li>
        <li><a href="herramientas.php"><i class="fa-solid fa-wrench"></i> Herramientas</a></li>
        <li><a href="manuales.php"><i class="fa-solid fa-book"></i> Manuales</a></li>
        <li><a href="blog.php"><i class="fa-solid fa-blog"></i> Blog</a></li>
    </ul>

    <div class="icons">
        <a href="register.php" title="Registrarse"><i class="fa-solid fa-user"></i></a>

        <a href="carrito.php" class="cart-icon" title="Carrito">
            <i class="fa-solid fa-cart-shopping"></i>
            <span class="cart-count"><?php
                // Si la conexión a DB está disponible, sumar cantidades desde la tabla `carrito`
                $count = 0;
                if($dbLoaded){
                    $q = $conn->query("SELECT SUM(cantidad) AS total FROM carrito");
                    if($q){
                        $r = $q->fetch_assoc();
                        $count = intval($r['total']) ?: 0;
                    }
                } else {
                    // Fallback a session (array) si se usa ese método
                    $count = isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0;
                }
                echo $count;
            ?></span>
        </a>
    </div>
</nav>