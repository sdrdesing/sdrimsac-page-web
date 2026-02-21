<?php
include("config/database.php");

$id = $_POST['id'];

$sql = "DELETE FROM carrito WHERE id_carrito = $id";
$conn->query($sql);

header("Location: carrito.php");
exit();
?>