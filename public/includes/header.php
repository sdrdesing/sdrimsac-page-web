<?php
// Iniciar sesión solo si no hay una sesión activa (evita Notice por doble session_start)
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
// ...existing code...
// Intentamos cargar la conexión a la base si existe (para contar productos en carrito DB)
$dbLoaded = false;

// ✅ FIX: ruta correcta desde public/includes/header.php hacia config/database.php
$pathDb = dirname(__DIR__, 2) . '/config/database.php';

if(file_exists($pathDb)){
    try {
        require_once $pathDb;
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
<?php
// Detectar si estamos en una subcarpeta admin para ajustar la ruta del CSS
$cssPath = (strpos($_SERVER['PHP_SELF'], '/admin/') !== false) ? '../assets/css/estilo.css' : 'assets/css/estilo.css';
?>
<link rel="stylesheet" href="<?= $cssPath ?>">
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
            <img src="assets/img/Animacion-de-Logo-SDRIM-SAC-GIF.gif" alt="sdrimsac logo">
            
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
                        <li><a href="facturacionhospital.php">Facturación Hospital</a></li>
                        <li><a href="facturacionfarmacia.php">Facturación Farmacia</a></li>
                        <li><a href="facturacionhoteles.php">Facturación Hoteles</a></li>
                        <li><a href="facturacionescolar.php">Facturación Escolar</a></li>
                        <li><a href="facturacioncreditos.php">Facturación Créditos</a></li>
                        <li><a href="facturacionferreteria.php">Facturación Ferretería</a></li>
                        <li><a href="facturacionapafa.php">Facturación Apafa</a></li>
                    </ul>
                </li>
            </ul>
        </li>

        <li><a href="productos.php"><i class="fa-solid fa-store"></i> Tienda</a></li>
        <li><a href="herramientas.php"><i class="fa-solid fa-wrench"></i> Herramientas</a></li>
        <li><a href="manuales.php"><i class="fa-solid fa-book"></i> Manuales</a></li>
        <li><a href="blog.php"><i class="fa-solid fa-blog"></i> Blog</a></li>
        <!-- <li><a href="mi_cuenta.php"><i class="fa-solid fa-user-circle"></i> Mi cuenta</a></li> -->
    </ul>


    <div class="icons">
        <!-- Campanita de notificación -->
        <?php
        // Notificación: mostrar punto rojo si hay compras pendientes o validadas/rechazadas no notificadas
        $noti = false;
$tiene_no_leidas = false;
$noti_compras = [];
        if ($dbLoaded && isset($_SESSION['usuario'])) {
            $nombre = $conn->real_escape_string($_SESSION['usuario']);
            $q = $conn->query("SELECT id FROM usuarios WHERE nombre='$nombre' LIMIT 1");
            if ($q && $row = $q->fetch_assoc()) {
                $usuario_id = intval($row['id']);
                // Eliminar notificaciones de compras con más de 1 mes
                $conn->query("DELETE FROM compras WHERE usuario_id=$usuario_id AND fecha < DATE_SUB(NOW(), INTERVAL 1 MONTH)");

                // Unificar todas las notificaciones y ordenarlas por fecha DESC
                $notificaciones = [];
                // Pendientes
                $sqlPend = "SELECT codigo_compra, estado, fecha, pin FROM compras WHERE usuario_id=$usuario_id AND estado='pendiente' AND notificado=0";
                $resPend = $conn->query($sqlPend);
                if ($resPend && $resPend->num_rows > 0) {
                    $noti = true;
                    while($c = $resPend->fetch_assoc()) {
                        $c['mensaje'] = 'Tu pedido está pendiente. Código: ' . $c['codigo_compra'] . ' | PIN: ' . $c['pin'];
                        $c['pin'] = $c['pin'];
                        $c['leido'] = false;
                        $c['tipo'] = 'pendiente';
                        $notificaciones[] = $c;
                    }
                }
                // Validadas/Rechazadas no notificadas
                $sql = "SELECT codigo_compra, estado, fecha, pin FROM compras WHERE usuario_id=$usuario_id AND estado IN ('validada','rechazada') AND notificado=0";
                $res = $conn->query($sql);
                if ($res && $res->num_rows > 0) {
                    $noti = true;
                    while($c = $res->fetch_assoc()) {
                        if($c['estado']==='validada'){
                            $c['mensaje'] = '¡Tu pedido fue validado! Código: ' . $c['codigo_compra'] . ' | PIN: ' . $c['pin'];
                        } else if($c['estado']==='rechazada'){
                            $c['mensaje'] = 'Tu pedido fue rechazado. Código: ' . $c['codigo_compra'] . ' | PIN: ' . $c['pin'];
                        }
                        $c['pin'] = $c['pin'];
                        $c['leido'] = true;
                        $c['tipo'] = 'resuelta';
                        $notificaciones[] = $c;
                    }
                }
                // Ordenar todas las notificaciones por fecha DESC
                usort($notificaciones, function($a, $b) {
                    return strtotime($b['fecha']) - strtotime($a['fecha']);
                });
                $noti_compras = $notificaciones;
            }
        }
            // Notificación
            $noti = false;
            $tiene_no_leidas = false;
            $noti_compras = [];

            if ($dbLoaded && isset($_SESSION['usuario'])) {
                $nombre = $conn->real_escape_string($_SESSION['usuario']);
                $q = $conn->query("SELECT id FROM usuarios WHERE nombre='$nombre' LIMIT 1");

                if ($q && $row = $q->fetch_assoc()) {
                    $usuario_id = intval($row['id']);

                    // Eliminar compras muy antiguas
                    $conn->query("DELETE FROM compras WHERE usuario_id=$usuario_id AND fecha < DATE_SUB(NOW(), INTERVAL 1 MONTH)");

                    // 1) CONSULTA SOLO PARA EL PUNTO ROJO
                    $sqlNoLeidas = "\n                    SELECT id\n                    FROM compras\n                    WHERE usuario_id = $usuario_id\n                      AND estado IN ('pendiente','validada','rechazada')\n                      AND notificado = 0\n                    LIMIT 1\n                ";
                    $resNoLeidas = $conn->query($sqlNoLeidas);
                    if ($resNoLeidas && $resNoLeidas->num_rows > 0) {
                        $tiene_no_leidas = true;
                    }

                    // 2) CONSULTA PARA MOSTRAR TODAS LAS NOTIFICACIONES EN EL PANEL
                    $sqlTodas = "\n                    SELECT codigo_compra, estado, fecha, pin, notificado\n                    FROM compras\n                    WHERE usuario_id = $usuario_id\n                      AND estado IN ('pendiente','validada','rechazada')\n                    ORDER BY fecha DESC\n                ";
                    $resTodas = $conn->query($sqlTodas);

                    if ($resTodas && $resTodas->num_rows > 0) {
                        $noti = true;

                        while ($c = $resTodas->fetch_assoc()) {
                            if ($c['estado'] === 'pendiente') {
                                $c['mensaje'] = 'Tu pedido está pendiente. Código: ' . $c['codigo_compra'] . ' | PIN: ' . $c['pin'];
                                $c['tipo'] = 'pendiente';
                            } elseif ($c['estado'] === 'validada') {
                                $c['mensaje'] = '¡Tu pedido fue validado! Código: ' . $c['codigo_compra'] . ' | PIN: ' . $c['pin'];
                                $c['tipo'] = 'resuelta';
                            } elseif ($c['estado'] === 'rechazada') {
                                $c['mensaje'] = 'Tu pedido fue rechazado. Código: ' . $c['codigo_compra'] . ' | PIN: ' . $c['pin'];
                                $c['tipo'] = 'resuelta';
                            }

                            $c['leido'] = intval($c['notificado']) === 1;
                            $noti_compras[] = $c;
                        }
                    }
                }
            }
        ?>

        <span class="noti-bell" id="notiBell" title="Notificaciones" tabindex="0" style="position:relative;cursor:pointer;">
            <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="#223" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="vertical-align:middle;"><path d="M18 8a6 6 0 0 0-12 0c0 7-3 9-3 9h18s-3-2-3-9"></path><path d="M13.73 21a2 2 0 0 1-3.46 0"></path></svg>
            <?php if($tiene_no_leidas): ?>
       <span class="noti-dot"></span>
            <?php endif; ?>
            <div id="notiPanel" style="display:none;position:absolute;right:0;top:36px;min-width:260px;max-width:320px;background:#fff;border:1px solid #e2e8f0;box-shadow:0 8px 32px rgba(26,58,110,0.13);border-radius:12px;padding:0;z-index:9999;overflow:hidden;">
                <?php if($noti && count($noti_compras)>0): ?>
                    <div style="font-weight:600;color:#2a2aee;margin:18px 18px 7px 18px;text-align:center;text-transform:uppercase;">Tus notificaciones de compras:</div>
                    <div id="notiScroll" style="max-height:220px;overflow-y:auto;padding:0 18px 0 18px;">
                        <?php foreach($noti_compras as $nc): ?>
                            <?php
                                $bg = '';
                                if ($nc['estado'] === 'validada') {
                                    $bg = 'background:rgba(42,142,42,0.12);';
                                } elseif ($nc['estado'] === 'rechazada') {
                                    $bg = 'background:rgba(229,57,53,0.12);';
                                }
                            ?>
                            <div style="margin-bottom:12px;padding-bottom:10px;border-bottom:1px solid #e2e8f0;<?= $bg ?>">
                                <span style="font-weight:<?= isset($nc['leido']) && $nc['leido'] ? 'normal' : '600' ?>;display:block;"><?= htmlspecialchars($nc['mensaje']) ?></span>
                                <?php if (!empty($nc['codigo_compra']) && !empty($nc['pin'])): ?>
                                    <img src="generar_qr.php?codigo=<?= urlencode($nc['codigo_compra']) ?>&pin=<?= urlencode($nc['pin']) ?>" alt="QR Pedido" style="margin:8px auto 4px auto;display:block;max-width:90px;">
                                    <div style="text-align:center;">
                                        <a href="generar_qr.php?codigo=<?= urlencode($nc['codigo_compra']) ?>&pin=<?= urlencode($nc['pin']) ?>&download=1" download="qr_<?= htmlspecialchars($nc['codigo_compra']) ?>.png" style="display:inline-block;margin-bottom:4px;padding:3px 10px;background:#2a2aee;color:#fff;border-radius:6px;font-weight:600;text-decoration:none;font-size:0.95em;">Descargar QR</a>
                                    </div>
                                <?php endif; ?>
                                <span style="font-size:0.92em;color:#888;display:block;margin-top:2px;">
                                    <?= date('d/m/Y H:i', strtotime($nc['fecha'])) ?>
                                </span>
                                <?php if($nc['estado']==='pendiente'): ?>
                                    <span style="color:#2255a4;font-weight:600;"> ⏳</span>
                                <?php elseif($nc['estado']==='validada'): ?>
                                    <span style="color:#2a8e2a;font-weight:600;"> 🎉</span>
                                <?php elseif($nc['estado']==='rechazada'): ?>
                                    <span style="color:#e53935;font-weight:600;"> ❌</span>
                                <?php endif; ?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <form id="formMarcarLeido" method="post" action="marcar_notificaciones.php" style="position:sticky;bottom:0;left:0;width:100%;background:#fff;padding:12px 18px 14px 18px;box-shadow:0 -2px 12px #2231;z-index:2;">
                        <button type="submit" id="marcarLeidoBtn" name="marcar_leido" value="1" style="background:#2a2aee;color:#fff;padding:7px 18px;border:none;border-radius:8px;font-weight:600;cursor:pointer;width:100%;">Marcar como leído</button>
                    </form>
                <?php else: ?>
                    <div style="font-size:1em;color:#888;padding:18px;">No tienes notificaciones nuevas.</div>
                <?php endif; ?>
            </div>
        </span>

        <a href="register.php" title="Registrarse"><i class="fa-solid fa-user"></i></a>

        <?php
        // Detectar si el usuario está logueado y si es admin
        $cuenta_url = 'login.php';
        if (isset($_SESSION['usuario'])) {
            $nombre = $_SESSION['usuario'];
            $is_admin = 0;
            // Si hay conexión a la base de datos, consulta el rol
            if ($dbLoaded) {
                $q = $conn->query("SELECT is_admin FROM usuarios WHERE nombre='".$conn->real_escape_string($nombre)."' LIMIT 1");
                if ($q && $row = $q->fetch_assoc()) {
                    $is_admin = intval($row['is_admin']);
                }
            }
            // Si la sesión es admin (nombre de usuario), forzar dashboard
            if ($is_admin === 1 || strtolower($nombre) === 'admin') {
                $cuenta_url = 'admin/dashboard.php';
            } else {
                $cuenta_url = 'mi_cuenta.php';
            }
        }
        ?>
        <a href="<?= $cuenta_url ?>" class="account-icon" title="Mi cuenta">
            <i class="fa-solid fa-user-circle"></i>
            <span class="account-text">Mi cuenta</span>
        </a>
<style>
.noti-bell {
    position: relative;
    display: inline-block;
    margin-right: 12px;
    cursor: pointer;
    background: #fff;
    border-radius: 50%;
    box-shadow: 0 2px 8px #2a2aee11;
    padding: 4px 4px 2px 4px;
    transition: box-shadow 0.18s;
}
.noti-bell:hover {
    box-shadow: 0 4px 18px #2a2aee22;
}
.noti-dot {
    position: absolute;
    top: 4px;
    right: 4px;
    width: 10px;
    height: 10px;
    background: #e53935;
    border-radius: 50%;
    border: 2px solid #fff;
    box-shadow: 0 0 6px #e5393555;
    z-index: 2;
}
</style>

       

        <a href="carrito.php" class="cart-icon" title="Carrito">
            <i class="fa-solid fa-cart-shopping"></i>
            <span class="cart-count"><?php
                // Si la conexión a DB está disponible, sumar cantidades desde la tabla `carrito`
                $count = 0;
                if($dbLoaded){
                    $usuario_id = isset($_SESSION['usuario_id']) ? intval($_SESSION['usuario_id']) : 0;
                    $q = $conn->query("SELECT SUM(cantidad) AS total FROM carrito WHERE usuario_id = $usuario_id");
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
        <?php
        // Mostrar botón cerrar sesión para cualquier usuario logueado
        if (isset($_SESSION['usuario'])) {
            echo '<a href="logout.php" title="Cerrar sesión" style="margin-left:8px;"><i class="fa-solid fa-sign-out-alt"></i></a>';
        }
        ?>
    </div>
</nav>

