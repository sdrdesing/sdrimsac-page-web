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
if ($id > 0) {
    $uid = intval($_SESSION['usuario_id']);
    // Evita duplicados
    $sql = "INSERT IGNORE INTO favoritos (usuario_id, producto_id) VALUES ($uid, $id)";
    if ($conn->query($sql)) {
        echo "OK";
    } else {
        echo "Error SQL: " . $conn->error;
    }
} else {
    echo "ID inválido";
}