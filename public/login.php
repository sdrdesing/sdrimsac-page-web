<?php
include("config/database.php");
session_start();

if(isset($_POST["login"])){

    $email = $_POST["email"];
    $pass  = $_POST["password"];

    $sql = "SELECT * FROM usuarios WHERE email='$email'";
    $result = $conn->query($sql);

    if($result->num_rows > 0){
        $user = $result->fetch_assoc();

        if(isset($user['is_blocked']) && intval($user['is_blocked']) === 1){
            $error = "Usuario bloqueado. Contacte al administrador.";
        } elseif(password_verify($pass,$user["password"])) {
            $_SESSION["usuario"] = $user["nombre"];
            header("Location: index.php");
            exit;
        } else {
            $error="Contraseña incorrecta";
        }
    }else{
        $error="Usuario no encontrado";
    }
}
?>

<?php include("includes/header.php"); ?>

<!-- FONDO DIVIDIDO: imagen izquierda + formulario derecha -->
<section class="auth-section">
    <div class="auth-image">
        <img src="https://images.unsplash.com/photo-1573164713988-8665fc963095?w=800&q=80" alt="Facturación Electrónica SDRIM">
        <div class="auth-image-overlay">
            <h2>Bienvenido a SDRIM</h2>
            <p>Tu sistema de facturación electrónica certificado por SUNAT</p>
            <ul>
                <li>✓ Emisión instantánea</li>
                <li>✓ 100% en la nube</li>
                <li>✓ Soporte 24/7</li>
            </ul>
        </div>
    </div>

    <div class="auth-form">
<section class="form-section">
<form method="POST" class="formulario">
<h2>Iniciar Sesión</h2>
<input type="email" name="email" placeholder="Correo" required>
<input type="password" name="password" placeholder="Contraseña" required>
<button type="submit" name="login">Ingresar</button>
<?php if(isset($error)) echo "<p class='error'>$error</p>"; ?>
</form>
</section>
        <p style="text-align:center;margin-top:16px;color:var(--gris);font-size:14px;">¿No tienes cuenta? <a href="register.php" style="color:var(--acento);">Regístrate aquí</a></p>
    </div>
</section>

<?php include("includes/footer.php"); ?><?php
session_start();
require_once __DIR__ . '/../../config/database.php';
if(isset($_SESSION['usuario']) && isset($_SESSION['is_admin']) && $_SESSION['is_admin'] === 1){
    header('Location: dashboard.php'); exit;
}

$error = '';
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $user = $_POST['user'] ?? '';
    $pass = $_POST['pass'] ?? '';
    $sql = "SELECT * FROM usuarios WHERE nombre=? OR email=? LIMIT 1";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ss', $user, $user);
    $stmt->execute();
    $result = $stmt->get_result();
    if($result && $result->num_rows > 0){
        $row = $result->fetch_assoc();
        if(isset($row['is_blocked']) && intval($row['is_blocked']) === 1){
            $error = 'Usuario bloqueado. Contacte al administrador.';
        } elseif(password_verify($pass, $row['password'])){
            if(intval($row['is_admin']) === 1){
                $_SESSION['usuario'] = $row['nombre'];
                $_SESSION['is_admin'] = 1;
                header('Location: dashboard.php'); exit;
            }else{
                $error = 'No tienes permisos de administrador.';
            }
        }else{
            $error = 'Contraseña incorrecta.';
        }
    }else{
        $error = 'Usuario no encontrado.';
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Admin Login</title>
    <link rel="stylesheet" href="../../public/assets/css/estilo.css">
    <style>body{display:flex;align-items:center;justify-content:center;height:100vh;background:#f4f6fa}.admin-login{background:#fff;padding:28px;border-radius:12px;box-shadow:0 8px 30px rgba(0,0,0,0.06);width:360px}</style>
</head>
<body>
<div class="admin-login">
    <h2>Iniciar sesión — Admin</h2>
    <?php if($error): ?><p style="color:#c0392b"><?=htmlspecialchars($error)?></p><?php endif; ?>
    <form method="post">
        <label>Usuario</label>
        <input type="text" name="user" required style="width:100%;padding:8px;margin:6px 0 12px;border-radius:6px;border:1px solid #ddd">
        <label>Contraseña</label>
        <input type="password" name="pass" required style="width:100%;padding:8px;margin:6px 0 12px;border-radius:6px;border:1px solid #ddd">
        <button type="submit" class="icons" style="padding:10px 14px;background:var(--azul);color:#fff;border-radius:10px;border:none">Entrar</button>
    </form>
</div>
</body>
</html>