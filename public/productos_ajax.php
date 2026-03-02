<?php
include(__DIR__ . '/../config/database.php');

$productosPorPagina = 6;
$paginaActual = isset($_GET['pagina']) ? max(1, intval($_GET['pagina'])) : 1;
$offset = ($paginaActual - 1) * $productosPorPagina;

$totalProductos = $conn->query("SELECT COUNT(*) as total FROM productos")->fetch_assoc()['total'];
$totalPaginas = ceil($totalProductos / $productosPorPagina);

$sql = "SELECT * FROM productos ORDER BY id DESC LIMIT $offset, $productosPorPagina";
$result = $conn->query($sql);
$productos = [];
while($row = $result->fetch_assoc()) {
    $productos[] = $row;
}

header('Content-Type: application/json');
echo json_encode([
    'productos' => $productos,
    'totalPaginas' => $totalPaginas,
    'paginaActual' => $paginaActual
]);