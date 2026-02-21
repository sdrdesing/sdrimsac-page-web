<?php
session_start();
if(isset($_SESSION['is_admin']) && $_SESSION['is_admin'] === true){
    header('Location: index.php'); exit;
}

$error = '';
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $user = $_POST['user'] ?? '';
    $pass = $_POST['pass'] ?? '';
    // Credenciales por defecto — cámbialas en producción
    if($user === 'admin' && $pass === 'admin123'){
        $_SESSION['is_admin'] = true;
        header('Location: index.php'); exit;
    }else{
        $error = 'Usuario o contraseña incorrectos.';
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Admin Login</title>
    <link rel="stylesheet" href="../assets/css/estilo.css">
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
