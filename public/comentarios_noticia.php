<?php
require_once '../config/database.php';

if (session_status() === PHP_SESSION_NONE) {
	session_start();
}

$noticia_id = isset($_GET['noticia_id']) ? intval($_GET['noticia_id']) : 0;

$noticia = null;
if ($noticia_id > 0) {
	$stmt = $conn->prepare("SELECT titulo, resumen FROM noticias WHERE id = ? LIMIT 1");
	$stmt->bind_param("i", $noticia_id);
	$stmt->execute();
	$res = $stmt->get_result();
	$noticia = $res->fetch_assoc();
	$stmt->close();
}

function render_comentarios($noticia_id) {
	global $conn;

	if ($noticia_id <= 0) {
		return '<div style="color:#888;">No hay comentarios aún.</div>';
	}

	$html = "";

	$titulo = '';
	$stmtTitulo = $conn->prepare("SELECT titulo FROM noticias WHERE id = ? LIMIT 1");
	$stmtTitulo->bind_param("i", $noticia_id);
	$stmtTitulo->execute();
	$resTitulo = $stmtTitulo->get_result();
	if ($resTitulo && $rowTitulo = $resTitulo->fetch_assoc()) {
		$titulo = $rowTitulo['titulo'];
	}
	$stmtTitulo->close();

	$sql = "SELECT nombre, comentario, fecha FROM comentarios_noticias WHERE noticia_id = ? AND estado = 'aprobado' ORDER BY id DESC LIMIT 50";
	$stmt = $conn->prepare($sql);
	$stmt->bind_param("i", $noticia_id);
	$stmt->execute();
	$result = $stmt->get_result();

	if ($result && $result->num_rows > 0) {
		while ($row = $result->fetch_assoc()) {
			$nombre = $row['nombre'];
			$texto = $row['comentario'];
			$fecha = (int)$row['fecha'];
			$inicial = $nombre ? strtoupper(mb_substr($nombre, 0, 1)) : 'U';

			$html .= '<div class="comentario-item">';
			$html .= '<div class="avatar">' . htmlspecialchars($inicial) . '</div>';
			$html .= '<div class="comentario-content">';
			$html .= '<div class="comentario-header">' . htmlspecialchars($nombre) . '<span class="comentario-tiempo">' . tiempo_transcurrido($fecha) . '</span></div>';
			$html .= '<div class="comentario-noticia-ref" style="font-size:0.97em;color:#22396a;opacity:.7;margin-bottom:2px;">Sobre la noticia: <span style="font-weight:bold;">' . htmlspecialchars($titulo) . '</span></div>';
			$html .= '<div class="comentario-texto">' . nl2br(htmlspecialchars($texto)) . '</div>';
			$html .= '</div></div>';
		}
	} else {
		$html .= '<div style="color:#888;">No hay comentarios aún.</div>';
	}

	$stmt->close();
	return $html;
}

function tiempo_transcurrido($timestamp) {
	$diferencia = time() - (int)$timestamp;
	if ($diferencia < 60) return 'Hace unos segundos';
	if ($diferencia < 3600) return 'Hace ' . floor($diferencia / 60) . ' minutos';
	if ($diferencia < 86400) return 'Hace ' . floor($diferencia / 3600) . ' horas';
	return 'Hace ' . floor($diferencia / 86400) . ' días';
}

if (isset($_POST['ajax']) && $_POST['ajax'] === '1') {
	if (!isset($_SESSION['usuario_id'])) {
		echo '<div style="color:#888;">Solo los usuarios registrados pueden comentar.</div>';
		exit;
	}

	$nombre = isset($_POST['nombre']) ? trim(strip_tags($_POST['nombre'])) : '';
	$comentario = isset($_POST['comentario']) ? trim(strip_tags($_POST['comentario'])) : '';
	$fecha = time();
	$noticia_id = isset($_POST['noticia_id']) ? intval($_POST['noticia_id']) : 0;
	$usuario_id = isset($_SESSION['usuario_id']) ? intval($_SESSION['usuario_id']) : 0;

	$palabras_prohibidas = [
		'puta', 'puto', 'mierda', 'cabron', 'pendejo', 'culero', 'joder', 'coño', 'gilipollas', 'imbecil',
		'idiota', 'maldito', 'estupido', 'tonto', 'baboso', 'zorra', 'perra', 'marica', 'mamón', 'chinga',
		'chingar', 'cabrón', 'carajo', 'huevon', 'huevón', 'boludo', 'pelotudo', 'bastardo',
		'malparido', 'malnacido', 'asqueroso', 'sucio', 'desgraciado', 'despreciable',
		'malcriado', 'grosero', 'insolente', 'patán', 'bestia', 'animal', 'burro', 'bruto', 'tarado',
		'mongol', 'mongolo', 'subnormal', 'retardado', 'retrasado', 'inútil', 'inutil', 'feo', 'asno',
		'cerdo', 'rata', 'escoria', 'basura', 'cochinada'
	];

	$comentario_lower = strtolower($comentario);
	$comentario_filtrado = preg_replace('/[^a-záéíóúüñ]/u', '', $comentario_lower);

	foreach ($palabras_prohibidas as $palabra) {
		$patron = '/' . preg_replace('/[áéíóúüñ]/u', '[áéíóúüñ]?', $palabra) . '/iu';
		if (preg_match($patron, $comentario_filtrado)) {
			echo '<div style="color:#c00;">Tu comentario contiene palabras no permitidas.</div>';
			exit;
		}
	}

	if ($nombre && $comentario && $noticia_id > 0) {
		$estado = 'pendiente';

		$stmt = $conn->prepare("INSERT INTO comentarios_noticias (noticia_id, usuario_id, nombre, comentario, fecha, estado) VALUES (?, ?, ?, ?, ?, ?)");
		if (!$stmt) {
			http_response_code(500);
			echo 'Error al preparar el comentario.';
			exit;
		}

		$stmt->bind_param("iissis", $noticia_id, $usuario_id, $nombre, $comentario, $fecha, $estado);

		if (!$stmt->execute()) {
			http_response_code(500);
			echo 'Error al guardar el comentario.';
			$stmt->close();
			exit;
		}

		$stmt->close();
	}

	echo render_comentarios($noticia_id);
	exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Comentarios de Usuarios</title>
	<link rel="stylesheet" href="assets/css/comentarios_noticia.css">
</head>
<body>
<div class="comentarios-container" id="comentarios">
  <div class="comentarios-inner">
	<div class="comentarios-header-box">
	  <div class="comentarios-header-left">
		<h2>Comentarios de Usuarios</h2>
		<div style="font-size:1.1rem;margin-bottom:10px;opacity:.85;">Create Comment</div>

		<div id="comentarioNoticiaBox" style="background:#fff;color:#22396a;padding:16px 24px;border-radius:10px;margin-bottom:18px;box-shadow:0 2px 8px rgba(34,57,106,0.07);min-height:80px;">
			<?php if ($noticia): ?>
				<strong><?= htmlspecialchars($noticia['titulo']) ?></strong><br>
				<span style="font-size:1.05em;opacity:.8;"><?= htmlspecialchars($noticia['resumen']) ?></span>
			<?php else: ?>
				<strong>Selecciona una noticia</strong><br>
				<span style="font-size:1.05em;opacity:.8;">Haz clic en “Comentar” en una noticia para asociar el comentario.</span>
			<?php endif; ?>
		</div>

		<?php if (isset($_SESSION['usuario_id'])): ?>
			<form class="comentario-form" id="comentarioForm" action="comentarios_noticia.php" method="POST" autocomplete="off">
				<input type="hidden" name="noticia_id" value="<?= $noticia_id > 0 ? $noticia_id : '' ?>">
				<div class="avatar-form">A</div>
				<div class="comentario-form-fields">
					<input type="text" name="nombre" placeholder="Tu nombre" maxlength="50" required oninput="this.parentNode.parentNode.querySelector('.avatar-form').textContent = this.value ? this.value[0].toUpperCase() : 'A';">
					<textarea name="comentario" placeholder="Escribe tu comentario aquí (máx. 500 caracteres)" maxlength="500" required></textarea>
					<button type="submit">PUBLICAR</button>
				</div>
			</form>
		<?php else: ?>
			<div style="color:#888;">Solo los usuarios registrados pueden comentar. <a href="../mi_cuenta.php">Inicia sesión</a> o <a href="../register.php">regístrate</a>.</div>
		<?php endif; ?>
	  </div>

	  <div class="comentarios-header-right">
		<div class="comentarios-list" id="comentariosList">
			<?php echo render_comentarios($noticia_id); ?>
		</div>
	  </div>
	</div>
  </div>
</div>
</body>

<script>
const comentarioForm = document.getElementById('comentarioForm');

if (comentarioForm) {
	comentarioForm.addEventListener('submit', function(e) {
		e.preventDefault();

		const noticiaIdInput = this.querySelector('input[name="noticia_id"]');
		const noticiaId = noticiaIdInput ? noticiaIdInput.value.trim() : '';

		if (!noticiaId) {
			alert('Primero selecciona una noticia para comentar.');
			return;
		}

		const form = this;
		const formData = new FormData(form);
		formData.append('ajax', '1');

		fetch(form.action, {
			method: 'POST',
			body: formData
		})
		.then(response => {
			if (!response.ok) {
				throw new Error('Error HTTP: ' + response.status);
			}
			return response.text();
		})
		.then(html => {
			if (html.includes('<html') || html.includes('<body')) {
				throw new Error('La respuesta devolvió una página completa.');
			}

			document.getElementById('comentariosList').innerHTML = html;
			form.reset();
			form.querySelector('.avatar-form').textContent = 'A';

			const oldMsg = document.getElementById('comentarioMsg');
			if (oldMsg) oldMsg.remove();

			let msg = document.createElement('div');
			msg.id = 'comentarioMsg';
			msg.textContent = 'Tu comentario fue enviado y será visible cuando sea aprobado por un administrador.';
			msg.style = 'margin-top:10px;color:#22396a;background:#eaf2ff;padding:8px 14px;border-radius:6px;font-size:1em;';
			form.parentNode.insertBefore(msg, form.nextSibling);

			setTimeout(() => {
				if (msg) msg.remove();
			}, 6000);
		})
		.catch(error => {
			console.error('Error al publicar comentario:', error);
			alert('Hubo un error al publicar el comentario. Revisa la consola con F12.');
		});
	});
}
</script>
</html>