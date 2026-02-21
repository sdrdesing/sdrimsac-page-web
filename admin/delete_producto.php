<?php
require_once __DIR__ . '/../config/database.php';
session_start();

if(!isset($_SESSION['usuario'])){ header('Location: ../login.php'); exit; }
$nombre = $conn->real_escape_string($_SESSION['usuario']);
$r = $conn->query("SELECT is_admin FROM usuarios WHERE nombre='$nombre' LIMIT 1");
if(!$r || $r->num_rows == 0 || intval($r->fetch_assoc()['is_admin']) !== 1){ header('Location: ../index.php'); exit; }

if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])){
    $id = intval($_POST['id']);
    $conn->query("DELETE FROM productos WHERE id=$id");
}

header('Location: productos.php'); exit;
