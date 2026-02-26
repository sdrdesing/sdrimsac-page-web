<?php
// validar_compra.php
include '../config/database.php';
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
    $sql = "UPDATE compras SET estado=?, notificado=0 WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $accion, $id);
    $stmt->execute();
}
header('Location: dashboard.php');
exit;
?>
