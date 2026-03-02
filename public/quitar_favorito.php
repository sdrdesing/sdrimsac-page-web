<?php
include("../config/database.php");
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['usuario_id'])) {
    echo "Debes iniciar sesión";
    exit;
}
$id = isset($_POST['id']) ? intval($_POST['id']) : 0;
$uid = intval($_SESSION['usuario_id']);
if ($id > 0) {
    $sql = "DELETE FROM favoritos WHERE usuario_id = $uid AND producto_id = $id";
    if ($conn->query($sql)) {
        echo "OK";
    } else {
        echo "Error SQL: " . $conn->error;
    }
} else {
    echo "ID inválido";
}