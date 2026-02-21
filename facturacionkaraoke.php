<?php
?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Facturación Karaoke - SDRIMSAC</title>
<link rel="stylesheet" href="assets/css/estilo.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
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
            <span class="cart-count">0</span>
        </a>
    </div>
</nav>
<section class="servicios-header" style="background:#18376b; color:#fff; padding:60px 0 40px 0; text-align:center;">
    <h1 style="font-size:3rem;font-weight:700;margin-bottom:12px;">Facturación Karaoke</h1>
    <div style="font-size:1.5rem;font-weight:500;margin-bottom:8px;">Sdrim S.A.C.</div>
    <div style="font-size:1.1rem;color:#cfd8e3;">Servicios <span style="color:#fff;">:</span> Facturación Karaoke</div>
</section>
<div style="max-width:1200px;margin:40px auto 0 auto;padding:40px 0 80px 0;background:#fff;border-radius:18px;min-height:300px;box-shadow:0 2px 12px rgba(0,0,0,0.08);"></div>
<?php include("includes/footer.php"); ?>
</body>
</html>
