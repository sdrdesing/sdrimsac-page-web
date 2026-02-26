<?php
include(__DIR__ . "/../config/database.php");
session_start();

$next = isset($_GET['next']) ? basename($_GET['next']) : null;

if(isset($_POST["registrar"])){
    $username = $_POST["username"];
    $email    = $_POST["email"];
    $pass     = password_hash($_POST["password"], PASSWORD_DEFAULT);

    $sql = "INSERT INTO usuarios(nombre,email,password)
            VALUES('$username','$email','$pass')";

    if($conn->query($sql)){
        $_SESSION["usuario"] = $username;
        header("Location: mi_cuenta.php");
        exit;
    }else{
        $mensaje = "Error: " . $conn->error;
    }
}
?>

<?php include("includes/header.php"); ?>

<section class="form-section">
<form method="POST" class="formulario">

<h2>Crear Cuenta</h2>

<input type="text" name="username" placeholder="Nombre de usuario" required>
<input type="email" name="email" placeholder="Correo electrónico" required>
<input type="password" name="password" placeholder="Contraseña" required>

<p class="legal">
Tus datos personales se utilizarán para procesar tu pedido, mejorar tu experiencia en esta web, gestionar el acceso a tu cuenta y otros propósitos descritos en nuestra política de privacidad.
</p>


<button type="submit" name="registrar">Registrarse</button>

<a href="login.php" style="display:block;margin:18px auto 0 auto;width:100%;text-align:center;background:#f7f8fc;color:#2a2aee;font-weight:600;padding:12px 0;border-radius:10px;text-decoration:none;box-shadow:0 2px 12px #2a2aee11;transition:background 0.18s,color 0.18s;">¿Ya tienes una cuenta? Iniciar sesión</a>

<?php if(isset($mensaje)) echo "<p>$mensaje</p>"; ?>

</form>
</section>

<?php include("includes/footer.php"); ?>
