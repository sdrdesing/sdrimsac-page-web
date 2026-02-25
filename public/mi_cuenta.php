<?php
session_start();
if(!isset($_SESSION['usuario'])){
    header('Location: login.php');
    exit;
}
$usuario = htmlspecialchars($_SESSION['usuario']);
$tab = isset($_GET['tab']) ? $_GET['tab'] : 'main';
include("includes/header.php");
include("config/database.php");

// ...existing code...
$mensaje = '';
if($tab=='user' && $_SERVER['REQUEST_METHOD']=='POST'){
    $nombre = trim($_POST['nombre']);
    $apellidos = trim($_POST['apellidos']);
    $display_name = trim($_POST['display_name']);
    $email = trim($_POST['email']);
    $current_password = $_POST['current_password'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    // Buscar usuario actual
    $sql = "SELECT * FROM usuarios WHERE nombre='$usuario' LIMIT 1";
    $result = $conn->query($sql);
    $row = $result ? $result->fetch_assoc() : null;
    if($row){
        $updateFields = [];
        // Actualizar campos básicos
        $updateFields[] = "nombre='".$conn->real_escape_string($nombre)."'";
        $updateFields[] = "apellidos='".$conn->real_escape_string($apellidos)."'";
        $updateFields[] = "display_name='".$conn->real_escape_string($display_name)."'";
        $updateFields[] = "email='".$conn->real_escape_string($email)."'";

        // Actualizar contraseña si corresponde
        if($new_password && $new_password==$confirm_password){
            if(password_verify($current_password, $row['password'])){
                $updateFields[] = "password='".password_hash($new_password, PASSWORD_DEFAULT)."'";
            }else{
                $mensaje = "Contraseña actual incorrecta.";
            }
        }elseif($new_password || $confirm_password){
            $mensaje = "Las contraseñas nuevas no coinciden.";
        }

        if(!$mensaje){
            $sqlUpdate = "UPDATE usuarios SET ".implode(",", $updateFields)." WHERE nombre='$usuario'";
            if($conn->query($sqlUpdate)){
                $_SESSION['usuario'] = $nombre;
                $_SESSION['email'] = $email;
                $usuario = htmlspecialchars($nombre);
                $mensaje = "Datos actualizados correctamente.";
            }else{
                $mensaje = "Error al actualizar: ".$conn->error;
            }
        }
    }else{
        $mensaje = "Usuario no encontrado.";
    }
}
?>
<link rel="stylesheet" href="assets/css/mi_cuenta.css">
<body>
<div class="mi-cuenta-banner">
    <h1>Mi Cuenta</h1>
</div>
<div class="mi-cuenta-panel">
    <div class="mi-cuenta-menu">
        <a href="mi_cuenta.php?tab=main"<?= $tab=='main'?' style="border:2px solid #1a3a6e;"':'' ?>>Principal</a>
        <a href="mi_cuenta.php?tab=orders"<?= $tab=='orders'?' style="border:2px solid #1a3a6e;"':'' ?>>Órdenes</a>
        <a href="mi_cuenta.php?tab=user"<?= $tab=='user'?' style="border:2px solid #1a3a6e;"':'' ?>>Detalle de Usuario</a>
        <a href="logout.php">Cerrar Sesión</a>
    </div>
    <div class="mi-cuenta-content">
        <?php if($tab=='main'): ?>
            <strong>Hola <?= $usuario ?>!</strong> <span>(¿no eres <?= $usuario ?>? <a href="logout.php">Cerrar sesión</a>)</span>
            <p>Desde el escritorio de tu cuenta puedes ver tus <a href="mi_cuenta.php?tab=orders">pedidos recientes</a>, gestionar tus <a href="#">direcciones de envío y facturación</a> y editar tu contraseña y los detalles de tu cuenta.</p>
            <p class="legal">
                Tus datos personales se utilizarán para procesar tu pedido, mejorar tu experiencia en esta web, gestionar el acceso a tu cuenta y otros propósitos descritos en nuestra política de privacidad.
            </p>
        <?php elseif($tab=='orders'): ?>
            <div style="border-top:2px solid #1a3a6e;padding-top:12px;">
                <span style="display:flex;align-items:center;gap:8px;">
                    <input type="checkbox" disabled>
                    No order has been made yet.
                    <a href="productos.php" style="margin-left:auto;background:#f4f6fa;padding:6px 18px;border-radius:6px;color:#2255a4;font-weight:600;">Browse products</a>
                </span>
            </div>
        <?php elseif($tab=='user'): ?>
            <?php
            // Obtener datos actuales del usuario
            $sql = "SELECT * FROM usuarios WHERE nombre='$usuario' LIMIT 1";
            $result = $conn->query($sql);
            $row = $result ? $result->fetch_assoc() : null;
            $nombre = $row ? htmlspecialchars($row['nombre']) : $usuario;
            $apellidos = $row ? htmlspecialchars($row['apellidos'] ?? '') : '';
            $display_name = $row ? htmlspecialchars($row['display_name'] ?? $nombre) : $nombre;
            $email = $row ? htmlspecialchars($row['email'] ?? (isset($_SESSION['email']) ? $_SESSION['email'] : '')) : (isset($_SESSION['email']) ? $_SESSION['email'] : '');
            ?>
            <?php if($mensaje): ?><div style="color:#2255a4;font-weight:600;margin-bottom:12px;"><?= $mensaje ?></div><?php endif; ?>
            <form method="POST" class="mi-cuenta-user-form" style="display:flex;flex-direction:column;gap:18px;border:2px solid #1a3a6e;border-radius:16px;padding:32px 24px;background:#fff;max-width:700px;margin:auto;">
                <div style="display:flex;gap:18px;">
                    <div style="flex:1;">
                        <label>Nombre *</label>
                        <input type="text" name="nombre" value="<?= $nombre ?>" required>
                    </div>
                    <div style="flex:1;">
                        <label>Apellidos *</label>
                        <input type="text" name="apellidos" value="<?= $apellidos ?>" required>
                    </div>
                </div>
                <div>
                    <label>Display name *</label>
                    <input type="text" name="display_name" value="<?= $display_name ?>" required>
                    <small style="color:#888;">This will be how your name will be displayed in the account section and in reviews</small>
                </div>
                <div>
                    <label>Dirección de correo electrónico *</label>
                    <input type="email" name="email" value="<?= $email ?>" required>
                </div>
                <div style="margin-top:18px;">
                    <strong>Password change</strong>
                    <div style="display:flex;gap:18px;margin-top:8px;">
                        <div style="flex:1;">
                            <label>Current password (leave blank to leave unchanged)</label>
                            <input type="password" name="current_password">
                        </div>
                        <div style="flex:1;">
                            <label>New password (leave blank to leave unchanged)</label>
                            <input type="password" name="new_password">
                        </div>
                        <div style="flex:1;">
                            <label>Confirm new password</label>
                            <input type="password" name="confirm_password">
                        </div>
                    </div>
                </div>
                <button type="submit" style="background:#1a3a6e;color:#fff;font-weight:600;padding:12px 0;border-radius:10px;border:none;font-size:16px;">SAVE CHANGES</button>
            </form>
        <?php endif; ?>
    </div>
</div>
</body>
</html>
