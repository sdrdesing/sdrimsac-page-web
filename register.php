<?php
include("config/database.php");
session_start();

$next = isset($_GET['next']) ? basename($_GET['next']) : null;

if(isset($_POST["registrar"])){

    $nombre = $_POST["nombre"];
    $email  = $_POST["email"];
    $pass   = password_hash($_POST["password"], PASSWORD_DEFAULT);

    $sql = "INSERT INTO usuarios(nombre,email,password)
            VALUES('$nombre','$email','$pass')";

    if($conn->query($sql)){
        // auto-login after register and redirect to next if provided
        $_SESSION["usuario"] = $nombre;
        if(!empty($next)){
            header("Location: {$next}");
            exit;
        }
        $mensaje = "Registro exitoso ✔";
    }else{
        $mensaje = "Error: " . $conn->error;
    }
}
?>

<?php include("includes/header.php"); ?>

<section class="form-section">
<form method="POST" class="formulario">

<h2>Crear Cuenta</h2>

<input type="text" name="nombre" placeholder="Nombre completo" required>
<input type="email" name="email" placeholder="Correo electrónico" required>
<input type="password" name="password" placeholder="Contraseña" required>

<p class="legal">
Tus datos personales se utilizarán para procesar tu pedido, mejorar tu experiencia en esta web, gestionar el acceso a tu cuenta y otros propósitos descritos en nuestra política de privacidad.
</p>

<button type="submit" name="registrar">Registrarse</button>

<?php if(isset($mensaje)) echo "<p>$mensaje</p>"; ?>

</form>
</section>

<?php include("includes/footer.php"); ?>
