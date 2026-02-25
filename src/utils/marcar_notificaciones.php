<?php
// marcar_notificaciones.php
include __DIR__ . '/../../config/database.php';
session_start();
if (!isset($_SESSION['usuario'])) {
    header('Location: login.php');
    exit;
}
$nombre = $conn->real_escape_string($_SESSION['usuario']);
$q = $conn->query("SELECT id FROM usuarios WHERE nombre='$nombre' LIMIT 1");
if ($q && $row = $q->fetch_assoc()) {
    $usuario_id = intval($row['id']);
    // Marcar todas las compras validadas/rechazadas como notificadas
    $sql = "UPDATE compras SET notificado=1 WHERE usuario_id=$usuario_id AND estado IN ('validada','rechazada') AND notificado=0";
    $conn->query($sql);
}
header('Location: mi_cuenta.php');
exit;
?>
