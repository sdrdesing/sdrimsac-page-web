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
<?php
// Detectar si estamos en una subcarpeta admin para ajustar la ruta del CSS
$cssPath = (strpos($_SERVER['PHP_SELF'], '/admin/') !== false) ? '../assets/css/estilo.css' : 'assets/css/estilo.css';
?>
<link rel="stylesheet" href="<?= $cssPath ?>">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<script src="assets/js/script.js" defer></script>
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
                        <li><a href="facturacionhospital.php">Facturación Hospital</a></li>
                        <li><a href="facturacionfarmacia.php">Facturación Farmacia</a></li>
                        <li><a href="facturacionhoteles.php">Facturación Hoteles</a></li>
                        <li><a href="facturacionescolar.php">Facturación Escolar</a></li>
                        <li><a href="facturacioncreditos.php">Facturación Créditos</a></li>
                        <li><a href="facturacionferreteria.php">Facturación Ferretería</a></li>
                    </ul>
                </li>
            </ul>
        </li>

        <li class="dropdown">
            <a href="productos.php"><i class="fa-solid fa-store"></i> Tienda</a>
            <ul class="submenu">
                <li><a href="productos.php">Productos</a></li>
                <li><a href="admin/administracion.php">Administración</a></li>
                <li><a href="admin/control.php">Control</a></li>
                <li><a href="admin/dashboard.php">Dashboard</a></li>
                <li><a href="admin/delete_producto.php">Eliminar Producto</a></li>
                <li><a href="admin/products.php">Products</a></li>
                <li><a href="admin/reportes.php">Reportes</a></li>
                <li><a href="admin/validar_compra.php">Validar Compra</a></li>
                <li><a href="admin/migrate_products.php">Migrar Productos</a></li>
                <li><a href="admin/producto_form.php">Formulario Producto</a></li>
            </ul>
        </li>

        <li class="dropdown">
            <a href="herramientas.php"><i class="fa-solid fa-wrench"></i> Herramientas</a>
            <ul class="submenu">
                <li><a href="src/utils/generar_hash.php">Generar Hash</a></li>
                <li><a href="src/utils/inspect_db.php">Inspeccionar DB</a></li>
                <li><a href="src/utils/marcar_notificaciones.php">Marcar Notificaciones</a></li>
                <li><a href="src/utils/ocultar_noti.php">Ocultar Notificación</a></li>
            </ul>
        </li>

        <li class="dropdown">
            <a href="manuales.php"><i class="fa-solid fa-book"></i> Manuales</a>
            <ul class="submenu">
                <li><a href="manuales.php">Manual General</a></li>
                <li><a href="admin/dashboard.php">Manual Admin</a></li>
                <li><a href="admin/reportes.php">Manual Reportes</a></li>
            </ul>
        </li>

        <li class="dropdown">
            <a href="blog.php"><i class="fa-solid fa-blog"></i> Blog</a>
            <ul class="submenu">
                <li><a href="blog.php">Blog General</a></li>
                <li><a href="admin/dashboard.php">Blog Admin</a></li>
            </ul>
        </li>
        <!-- <li><a href="mi_cuenta.php"><i class="fa-solid fa-user-circle"></i> Mi cuenta</a></li> -->
    </ul>


    <div class="icons">
        <!-- Campanita de notificación -->
        <?php
        // Notificación: mostrar punto rojo si hay compras pendientes o validadas/rechazadas no notificadas
        $noti = false;
        $noti_compras = [];
        if ($dbLoaded && isset($_SESSION['usuario'])) {
            $nombre = $conn->real_escape_string($_SESSION['usuario']);
            $q = $conn->query("SELECT id FROM usuarios WHERE nombre='$nombre' LIMIT 1");
            if ($q && $row = $q->fetch_assoc()) {
                $usuario_id = intval($row['id']);
                // Mostrar notificación por compras pendientes
                $sqlPend = "SELECT codigo_compra, estado FROM compras WHERE usuario_id=$usuario_id AND estado='pendiente' ORDER BY fecha DESC LIMIT 5";
                $resPend = $conn->query($sqlPend);
                if ($resPend && $resPend->num_rows > 0) {
                    $noti = true;
                    while($c = $resPend->fetch_assoc()) {
                        $noti_compras[] = $c + ['tipo'=>'pendiente'];
                    }
                }
                // Mostrar notificación por compras validadas/rechazadas no notificadas
                $sql = "SELECT codigo_compra, estado FROM compras WHERE usuario_id=$usuario_id AND estado IN ('validada','rechazada') AND notificado=0 ORDER BY fecha DESC LIMIT 5";
                $res = $conn->query($sql);
                if ($res && $res->num_rows > 0) {
                    $noti = true;
                    while($c = $res->fetch_assoc()) {
                        $noti_compras[] = $c + ['tipo'=>'resuelta'];
                    }
                }
            }
        }
        ?>

        <span class="noti-bell" id="notiBell" title="Notificaciones" tabindex="0" style="position:relative;cursor:pointer;">
            <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="#223" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="vertical-align:middle;"><path d="M18 8a6 6 0 0 0-12 0c0 7-3 9-3 9h18s-3-2-3-9"></path><path d="M13.73 21a2 2 0 0 1-3.46 0"></path></svg>
            <?php if($noti): ?>
            <span class="noti-dot"></span>
            <?php endif; ?>
            <div id="notiPanel" style="display:none;position:absolute;right:0;top:36px;min-width:260px;max-width:320px;background:#fff;border:1px solid #e2e8f0;box-shadow:0 8px 32px rgba(26,58,110,0.13);border-radius:12px;padding:18px 18px 14px 18px;z-index:9999;">
                <?php if($noti && count($noti_compras)>0): ?>
                    <div style="font-weight:600;color:#2a2aee;margin-bottom:7px;">Tus notificaciones de compras:</div>
                    <?php foreach($noti_compras as $nc): ?>
                        <div style="margin-bottom:8px;">
                            <span style="font-weight:600;">Compra <?= htmlspecialchars($nc['codigo_compra']) ?>:</span>
                            <?php if($nc['estado']==='pendiente'): ?>
                                <span style="color:#2255a4;font-weight:600;">Pendiente de validación ⏳</span>
                            <?php elseif($nc['estado']==='validada'): ?>
                                <span style="color:#2a8e2a;font-weight:600;">Validada 🎉</span>
                            <?php elseif($nc['estado']==='rechazada'): ?>
                                <span style="color:#e53935;font-weight:600;">Rechazada ❌</span>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                    <form method="post" action="marcar_notificaciones.php">
                        <button type="submit" name="marcar_leido" value="1" style="background:#2a2aee;color:#fff;padding:7px 18px;border:none;border-radius:8px;font-weight:600;cursor:pointer;">Marcar como leído</button>
                    </form>
                <?php else: ?>
                    <div style="font-size:1em;color:#888;">No tienes notificaciones nuevas.</div>
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
            if ($dbLoaded) {
                $q = $conn->query("SELECT is_admin FROM usuarios WHERE nombre='".$conn->real_escape_string($nombre)."' LIMIT 1");
                if ($q && $row = $q->fetch_assoc()) {
                    $is_admin = intval($row['is_admin']);
                }
            }
            if ($is_admin === 1) {
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

        <?php
        // Mostrar botón cerrar sesión solo si es admin
        if (isset($_SESSION['usuario'])) {
            $nombre = $_SESSION['usuario'];
            $is_admin = 0;
            if ($dbLoaded) {
                $q = $conn->query("SELECT is_admin FROM usuarios WHERE nombre='".$conn->real_escape_string($nombre)."' LIMIT 1");
                if ($q && $row = $q->fetch_assoc()) {
                    $is_admin = intval($row['is_admin']);
                }
            }
            if ($is_admin === 1) {
                echo '<a href="logout.php" title="Cerrar sesión"><i class="fa-solid fa-sign-out-alt"></i></a>';
            }
        }
        ?>

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

<?php
// Forzar logout si el usuario está bloqueado
if (isset($_SESSION['usuario']) && $dbLoaded) {
    $nombre = $_SESSION['usuario'];
    $q = $conn->query("SELECT is_blocked FROM usuarios WHERE nombre='".$conn->real_escape_string($nombre)."' LIMIT 1");
    if ($q && $row = $q->fetch_assoc()) {
        if (isset($row['is_blocked']) && intval($row['is_blocked']) === 1) {
            session_destroy();
            header('Location: login.php?error=bloqueado');
            exit;
        }
    }
}
?>