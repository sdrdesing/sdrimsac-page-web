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

        if(password_verify($pass,$user["password"])){
            $_SESSION["usuario"] = $user["nombre"];
            header("Location: index.php");
        }else{
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

<?php include("includes/footer.php"); ?>