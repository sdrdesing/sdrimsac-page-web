<?php
include("../config/database.php");
session_start();
if (!isset($_SESSION['usuario_id'])) {
    echo "0";
    exit;
}
$usuario_id = intval($_SESSION['usuario_id']);
$sql = "SELECT SUM(cantidad) AS total FROM carrito WHERE usuario_id = $usuario_id";
$result = $conn->query($sql);
$total = 0;
if ($result && $row = $result->fetch_assoc()) {
    $total = intval($row['total']);
}
echo $total;
