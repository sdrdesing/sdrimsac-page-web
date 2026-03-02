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

    // Insertar notificación solo para el usuario actual
    $comprasNotif = $conn->query("SELECT codigo_compra, estado FROM compras WHERE usuario_id=$usuario_id AND estado IN ('validada','rechazada') AND notificado=1");
    if($comprasNotif && $comprasNotif->num_rows > 0){
        while($rowNotif = $comprasNotif->fetch_assoc()){
            $codigo = $conn->real_escape_string($rowNotif['codigo_compra']);
            $estado = $conn->real_escape_string($rowNotif['estado']);
            $mensaje = ($estado === 'validada') ? "Tu compra $codigo fue validada." : "Tu compra $codigo fue rechazada.";
            // Evitar duplicados: solo insertar si no existe notificación para ese código y usuario
            $qExiste = $conn->query("SELECT id FROM notificaciones WHERE usuario_id=$usuario_id AND codigo_compra='$codigo' AND estado='$estado' LIMIT 1");
            if(!$qExiste || $qExiste->num_rows === 0){
                $conn->query("INSERT INTO notificaciones (usuario_id, mensaje, estado, codigo_compra, fecha) VALUES ($usuario_id, '$mensaje', 'nueva', '$codigo', NOW())");
            }
        }
    }
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