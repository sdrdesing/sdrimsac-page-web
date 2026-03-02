<?php
// validar_compra.php
include '../../config/database.php';
session_start();
if (!isset($_SESSION['usuario'])) {
    header('Location: ../login.php');
    exit;
}
$nombre = $conn->real_escape_string($_SESSION['usuario']);
$r = $conn->query("SELECT is_admin FROM usuarios WHERE nombre='$nombre' LIMIT 1");
if (!$r || $r->num_rows == 0 || intval($r->fetch_assoc()['is_admin']) !== 1) {
    header('Location: ../index.php');
    exit;
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = intval($_POST['compra_id']);
    $accion = ($_POST['accion'] === 'validar') ? 'validada' : 'rechazada';
    // Actualiza estado y marca como no notificado (notificado=0)
    $sql = "UPDATE compras SET estado=?, notificado=0, fecha=NOW() WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $accion, $id);
    $stmt->execute();

    // Obtener datos del usuario y compra para el correo
    $q = $conn->query("SELECT c.codigo_compra, u.email, u.nombre FROM compras c JOIN usuarios u ON c.usuario_id = u.id WHERE c.id = $id LIMIT 1");
    if ($q && $row = $q->fetch_assoc()) {
        $codigo = $row['codigo_compra'];
        $email = $row['email'];
        $nombre_usuario = $row['nombre'];
        if ($accion === 'validada') {
            $asunto = '¡Tu compra ha sido validada!';
            $mensaje = "<p>¡Felicidades <b>$nombre_usuario</b>!</p><p>Tu pedido con código <b>$codigo</b> ha sido validado. Pronto recibirás más información sobre la entrega.</p>";
        } else {
            $asunto = 'Tu compra fue rechazada';
            $mensaje = "<p>Hola <b>$nombre_usuario</b>, lamentamos informarte que tu pedido con código <b>$codigo</b> ha sido rechazado. Si tienes dudas, contáctanos para más detalles.</p>";
        }
        // Enviar correo (usa mail simple, puedes mejorar con PHPMailer si lo deseas)
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $headers .= "From: SDRIMSAC <no-reply@sdrimsac.com>" . "\r\n";
        @mail($email, $asunto, $mensaje, $headers);
    }
}
header('Location: dashboard.php');
exit;
?>