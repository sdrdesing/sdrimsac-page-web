<?php
include("config/database.php");

// SI VIENE DE PRODUCTOS DE BASE DE DATOS
if(isset($_POST['id'])){
    $id = intval($_POST['id']);
    $cantidad = isset($_POST['cantidad']) ? max(1, intval($_POST['cantidad'])) : 1;

    $sql = "SELECT * FROM productos WHERE id = $id";
    $result = $conn->query($sql);
    $producto = $result->fetch_assoc();

    $nombre = $producto['nombre'];
    $precio = $producto['precio'];
    $imagen = $producto['imagen'];
    $id_producto = $producto['id'];
    $stock = isset($producto['stock']) ? intval($producto['stock']) : 0;

    // Verificar stock actual en carrito
    $verificar = "SELECT * FROM carrito WHERE id_producto = $id_producto";
    $resultado = $conn->query($verificar);
    if($resultado->num_rows > 0){
        $rowCarrito = $resultado->fetch_assoc();
        $cantidad_total = $rowCarrito['cantidad'] + $cantidad;
        if($cantidad_total > $stock) $cantidad_total = $stock;
        $update = "UPDATE carrito SET cantidad = $cantidad_total WHERE id_producto = $id_producto";
        $conn->query($update);
    } else {
        if($cantidad > $stock) $cantidad = $stock;
        $insertar = "INSERT INTO carrito (id_producto, nombre_producto, precio, imagen, cantidad) VALUES ('$id_producto', '$nombre', '$precio', '$imagen', $cantidad)";
        $conn->query($insertar);
    }
    header("Location: carrito.php");
    exit();
}

// SI VIENE DE PRODUCTOS MANUALES
elseif(isset($_POST['id_manual'])){

    $id_producto = intval($_POST['id_manual']);
    $nombre = $_POST['nombre_manual'];
    $precio = $_POST['precio_manual'];
    $imagen = $_POST['imagen_manual'];

}else{
    die("Error: No se recibió producto.");
}


// 🔥 VERIFICAR SI YA EXISTE EN EL CARRITO
$verificar = "SELECT * FROM carrito WHERE id_producto = $id_producto";
$resultado = $conn->query($verificar);

if($resultado->num_rows > 0){
    // Si existe, aumentar cantidad
    $update = "UPDATE carrito 
               SET cantidad = cantidad + 1 
               WHERE id_producto = $id_producto";
    $conn->query($update);
} else {
    // Si no existe, insertar
    $insertar = "INSERT INTO carrito 
                (id_producto, nombre_producto, precio, imagen, cantidad) 
                VALUES 
                ('$id_producto', '$nombre', '$precio', '$imagen', 1)";
    $conn->query($insertar);
}

// Redirigir al carrito
header("Location: carrito.php");
exit();
?>