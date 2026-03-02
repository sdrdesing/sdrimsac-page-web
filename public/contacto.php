<?php
include("includes/header.php");
include("../config/database.php");

if (!function_exists('h')) {
    function h($value) {
        return htmlspecialchars((string)$value, ENT_QUOTES, 'UTF-8');
    }
}

$statusMessage = "";
$statusType = "";

if(isset($_POST['enviar'])){
    $dni = trim($_POST['dni'] ?? '');
    $nombres = trim($_POST['nombres'] ?? '');
    $apellidos = trim($_POST['apellidos'] ?? '');
    $telefono = trim($_POST['telefono'] ?? '');
    $correo = trim($_POST['correo'] ?? '');
    $mensaje = trim($_POST['mensaje'] ?? '');
    $errors = [];

    if (!preg_match('/^\d{8}$/', $dni)) {
        $errors[] = 'El DNI debe tener 8 dígitos.';
    }
    if ($nombres === '') {
        $errors[] = 'El campo nombres es obligatorio.';
    }
    if ($apellidos === '') {
        $errors[] = 'El campo apellidos es obligatorio.';
    }
    if (strlen(preg_replace('/\D/', '', $telefono)) !== 9) {
        $errors[] = 'El teléfono es obligatorio y debe tener exactamente 9 dígitos.';
    }
    if ($correo !== '' && !filter_var($correo, FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'El correo no tiene un formato válido.';
    }

    if (empty($errors)) {
        $nombre = trim($nombres . ' ' . $apellidos);
        $correoGuardar = $correo !== '' ? $correo : 'sin-correo@sdrimsac.local';
        $mensajeGuardar = "DNI: {$dni}\nTeléfono: {$telefono}";
        if ($mensaje !== '') {
            $mensajeGuardar .= "\nMensaje: {$mensaje}";
        }

        $stmt = $conn->prepare("INSERT INTO mensajes (nombre, correo, mensaje) VALUES (?, ?, ?)");
        if ($stmt) {
            $stmt->bind_param('sss', $nombre, $correoGuardar, $mensajeGuardar);
            if ($stmt->execute()) {
                $statusType = 'success';
                $statusMessage = 'Mensaje enviado correctamente';
                $_POST = [];
            } else {
                $statusType = 'error';
                $statusMessage = 'No se pudo enviar el mensaje. Inténtalo nuevamente.';
            }
            $stmt->close();
        } else {
            $statusType = 'error';
            $statusMessage = 'No se pudo preparar el envío. Inténtalo nuevamente.';
        }
    } else {
        $statusType = 'error';
        $statusMessage = implode(' ', $errors);
    }
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

<?php if ($statusMessage !== ''): ?>
    <p style="color:<?= $statusType === 'success' ? 'green' : '#c53030' ?>;margin-bottom:12px;"><?= h($statusMessage) ?></p>
<?php endif; ?>

<form method="POST" class="formulario">
<div class="doc-row">
    <input type="text" name="dni" id="contacto-dni" placeholder="DNI" maxlength="8" value="<?= h($_POST['dni'] ?? '') ?>" required>
    <button type="button" id="contacto-buscar-dni" aria-label="Buscar DNI"><i class="fa fa-search"></i></button>
</div>
<input type="text" name="nombres" id="contacto-nombres" placeholder="Nombres" value="<?= h($_POST['nombres'] ?? '') ?>" required>
<input type="text" name="apellidos" id="contacto-apellidos" placeholder="Apellidos" value="<?= h($_POST['apellidos'] ?? '') ?>" required>
<input type="text" name="telefono" id="contacto-telefono" placeholder="Teléfono" inputmode="numeric" maxlength="9" pattern="\d{9}" value="<?= h($_POST['telefono'] ?? '') ?>" required>
<input type="email" name="correo" placeholder="Correo (opcional)" value="<?= h($_POST['correo'] ?? '') ?>">
<textarea name="mensaje" placeholder="Mensaje (opcional)"><?= h($_POST['mensaje'] ?? '') ?></textarea>
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

<script>
document.addEventListener('DOMContentLoaded', function() {
    const dniInput = document.getElementById('contacto-dni');
    const buscarBtn = document.getElementById('contacto-buscar-dni');
    const nombresInput = document.getElementById('contacto-nombres');
    const apellidosInput = document.getElementById('contacto-apellidos');
    const telefonoInput = document.getElementById('contacto-telefono');

    dniInput.addEventListener('input', function() {
        this.value = this.value.replace(/\D/g, '').slice(0, 8);

        nombresInput.readOnly = false;
        apellidosInput.readOnly = false;

        if (this.value.trim() === '') {
            nombresInput.value = '';
            apellidosInput.value = '';
        }
    });

    telefonoInput.addEventListener('input', function() {
        this.value = this.value.replace(/\D/g, '').slice(0, 9);
    });

    buscarBtn.addEventListener('click', function() {
        const dni = dniInput.value.trim();
        if (dni.length !== 8) {
            alert('Ingresa un DNI válido de 8 dígitos.');
            return;
        }

        fetch(`helpers/apiperu.php?tipo=dni&numero=${dni}`)
            .then(response => response.json())
            .then(data => {
                if (data.ok && data.data) {
                    nombresInput.value = data.data.nombres || '';
                    apellidosInput.value = `${data.data.apellido_paterno || ''} ${data.data.apellido_materno || ''}`.trim();
                    nombresInput.readOnly = true;
                    apellidosInput.readOnly = true;
                } else {
                    nombresInput.readOnly = false;
                    apellidosInput.readOnly = false;
                    alert('No se encontraron datos para el DNI ingresado.');
                }
            })
            .catch(() => {
                nombresInput.readOnly = false;
                apellidosInput.readOnly = false;
                alert('Error consultando el DNI.');
            });
    });
});
</script>