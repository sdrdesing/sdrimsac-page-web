<?php
// migrar_carrito_sesion.php
// Ejecutar este script justo después de iniciar sesión exitosamente

session_start();
require_once __DIR__ . '/../config/database.php';

if (!isset($_SESSION['usuario'])) {
    echo 'No hay usuario logueado.';
    exit;
}

$nombre = $conn->real_escape_string($_SESSION['usuario']);
$q = $conn->query("SELECT id FROM usuarios WHERE nombre='$nombre' LIMIT 1");
if (!$q || !($row = $q->fetch_assoc())) {
    echo 'Usuario no encontrado.';
    exit;
}
$usuario_id = intval($row['id']);
$session_id = session_id();

// Migrar productos del carrito de session_id a usuario_id
$sql = "SELECT * FROM carrito WHERE session_id = '$session_id' AND (usuario_id IS NULL OR usuario_id = 0)";
$res = $conn->query($sql);
if ($res && $res->num_rows > 0) {
    while ($item = $res->fetch_assoc()) {
        $id_carrito = intval($item['id_carrito']);
        // Actualizar la fila para asignar el usuario_id y limpiar session_id
        $conn->query("UPDATE carrito SET usuario_id = $usuario_id, session_id = NULL WHERE id_carrito = $id_carrito");
    }
    echo 'Carrito migrado correctamente al usuario.';
} else {
    echo 'No hay productos de sesión para migrar.';
}