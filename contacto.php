<?php
include("includes/header.php");
include("config/database.php");

if(isset($_POST['enviar'])){
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $mensaje = $_POST['mensaje'];

    $sql = "INSERT INTO mensajes (nombre, correo, mensaje)
            VALUES ('$nombre','$correo','$mensaje')";
    $conn->query($sql);

    echo "<p style='color:green'>Mensaje enviado correctamente</p>";
}
?>

<!-- IMAGEN BANNER ADICIONAL -->
<div class="page-banner">
    <img src="https://images.unsplash.com/photo-1486312338219-ce68d2c6f44d?w=1400&q=80" alt="Contacto SDRIM">
    <div class="page-banner-overlay">
        <h1>Contáctanos</h1>
        <p>Estamos aquí para ayudarte con tu sistema de facturación</p>
    </div>
</div>

<section class="contenido">
<h2>Contacto</h2>

<form method="POST" class="formulario">
<input type="text" name="nombre" placeholder="Nombre" required>
<input type="email" name="correo" placeholder="Correo" required>
<textarea name="mensaje" placeholder="Mensaje"></textarea>
<button name="enviar">Enviar</button>
</form>

</section>

<!-- INFO DE CONTACTO ADICIONAL -->
<section class="contacto-info-section">
    <div class="contacto-info-grid">
        <div class="info-card">
            <span class="info-icon">📞</span>
            <h4>Teléfono</h4>
            <p>+51 995 764 963</p>
            <p>Lun - Vie, 9am - 6pm</p>
        </div>
        <div class="info-card">
            <span class="info-icon">✉️</span>
            <h4>Correo</h4>
            <p>contacto@sdrimsac.com</p>
            <p>Respuesta en 24 horas</p>
        </div>
        <div class="info-card">
            <span class="info-icon">💬</span>
            <h4>WhatsApp</h4>
            <p>+51 995 764 963</p>
            <p>Respuesta inmediata</p>
        </div>
        <div class="info-card">
            <span class="info-icon">📍</span>
            <h4>Ubicación</h4>
            <p>Lima, Perú</p>
            <p>Atención presencial y remota</p>
        </div>
    </div>
</section>

<?php include("includes/social.php"); ?>
<?php include("includes/footer.php"); ?>
