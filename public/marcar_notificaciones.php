<?php
// marcar_notificaciones.php
include_once __DIR__ . '/../config/database.php';
session_start();
if (!isset($_SESSION['usuario'])) {
    if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest') {
        header('Content-Type: application/json');
        echo json_encode(['success' => false, 'error' => 'no_auth']);
        exit;
    } else {
        header('Location: login.php');
        exit;
    }
}
$nombre = $conn->real_escape_string($_SESSION['usuario']);
$q = $conn->query("SELECT id FROM usuarios WHERE nombre='$nombre' LIMIT 1");
if ($q && $row = $q->fetch_assoc()) {
    $usuario_id = intval($row['id']);
    // Marcar todas las compras validadas/rechazadas como notificadas
    $sql = "UPDATE compras SET notificado=1 WHERE usuario_id=$usuario_id AND estado IN ('validada','rechazada') AND notificado=0";
    $conn->query($sql);
    // Limpiar notificación de pedido pendiente en sesión si ya no hay compras pendientes
    $qPend = $conn->query("SELECT COUNT(*) as pendientes FROM compras WHERE usuario_id=$usuario_id AND estado='pendiente'");
    if ($qPend && $rowPend = $qPend->fetch_assoc()) {
        if (intval($rowPend['pendientes']) === 0) {
            unset($_SESSION['pedido_pendiente']);
        }
    }
}
if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest') {
    header('Content-Type: application/json');
    echo json_encode(['success' => true]);
    exit;
} else {
    header('Location: mi_cuenta.php');
    exit;
}
?>