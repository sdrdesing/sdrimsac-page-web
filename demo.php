<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Solicita tu Demo - SDRIMSAC</title>
    <link rel="stylesheet" href="assets/css/estilo.css">
    <link rel="stylesheet" href="assets/css/demo.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
<?php include("includes/header.php"); ?>
<section class="demo-hero">
    <div class="demo-bg"></div>
    <div class="demo-title">
        <h1>Solicita tu Demo</h1>
        <span>Sdrim S.A.C. &bull; Solicita tu Demo</span>
    </div>
</section>
<section class="demo-content">
    <div class="demo-info">
        <h2>Consigue tu Demo</h2>
        <p>¿Quieres conocer cómo nuestro producto puede transformar tu experiencia? ¡Consigue tu demo rellenando este formulario! En solo unos minutos, tendrás acceso a una demostración gratuita que te mostrará todas las funcionalidades y beneficios. No dejes pasar la oportunidad de descubrir cómo podemos ayudarte a alcanzar tus objetivos. ¡Rellena el formulario y empieza hoy mismo!</p>
    </div>
    <div class="demo-form-section">
        <form class="demo-form">
            <h3>¿Listo para empezar?</h3>
            <label>Nombre* <input type="text" name="nombre" required></label>
            <label>Apellido* <input type="text" name="apellido" required></label>
            <label>Correo electrónico* <input type="email" name="email" required></label>
            <label>Teléfono* <input type="tel" name="telefono" required></label>
            <label>RUC <input type="text" name="ruc"></label>
            <label>Nombre de tu negocio <input type="text" name="negocio"></label>
            <label>Seleccione el sistema que deseas:
                <select name="sistema">
                    <option value="">Selecciona un rubro</option>
                    <option value="chifa">Chifa</option>
                    <option value="cafeteria">Cafetería</option>
                    <option value="cevicheria">Cevichería</option>
                    <option value="karaoke">Karaoke</option>
                    <option value="pizzeria">Pizzería</option>
                    <option value="restaurant">Restaurant</option>
                    <option value="recreos">Recreos</option>
                    <option value="hotel">Hotel</option>
                    <option value="farmacia">Farmacia</option>
                    <option value="hoteles">Hoteles</option>
                    <option value="escolar">Escolar</option>
                    <option value="creditos">Créditos</option>
                </select>
            </label>
            <label class="demo-privacidad">
                <input type="checkbox" name="privacidad" required> Acepto la política de privacidad.
            </label>
            <button type="submit" class="demo-submit-btn">ENVIAR</button>
        </form>
        <div class="demo-img">
            <img src="assets/img/SDRIMSAC.png" alt="SDRIMSAC Mascota" style="max-width:320px;width:100%;">
            <div class="demo-mascota-text">FACTURA CON SDRIMSAC</div>
        </div>
    </div>
</section>
<?php include("includes/footer.php"); ?>
</body>
</html>
