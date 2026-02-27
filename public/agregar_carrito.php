<?php
include("../config/database.php");

// Iniciar sesión solo si no existe
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

/* ============================================================
   ✅ SI NO ESTÁ LOGUEADO → devolver señal para que JS redirija
   ============================================================ */
if (!isset($_SESSION['usuario']) || empty($_SESSION['usuario'])) {

    // Guardar intento para reintentar después del login
    $_SESSION['pending_add_to_cart'] = [
        'id' => $_REQUEST['id'] ?? null,
        'cantidad' => $_REQUEST['cantidad'] ?? 1,
        'id_manual' => $_REQUEST['id_manual'] ?? null,
        'nombre_manual' => $_REQUEST['nombre_manual'] ?? null,
        'precio_manual' => $_REQUEST['precio_manual'] ?? null,
        'imagen_manual' => $_REQUEST['imagen_manual'] ?? null,
    ];

    $_SESSION['redirect_after_login'] = 'carrito.php';

    // Como viene por fetch (AJAX), devolvemos señal
    echo "__LOGIN_REQUIRED__";
    exit;
}

/* ============================================================
   ✅ Si venimos del login (replay), reconstruir POST
   ============================================================ */
if (isset($_GET['replay']) && $_GET['replay'] == '1' && isset($_SESSION['pending_add_to_cart'])) {
    $p = $_SESSION['pending_add_to_cart'];
    unset($_SESSION['pending_add_to_cart']);

    foreach ($p as $k => $v) {
        if ($v !== null) {
            $_POST[$k] = $v;
        }
    }
}

/* ============================================================
   🔥 AGREGAR PRODUCTO DESDE BASE DE DATOS
   ============================================================ */
if(isset($_REQUEST['id'])){

    $id = intval($_REQUEST['id']);
    $cantidad = isset($_REQUEST['cantidad']) ? max(1, intval($_REQUEST['cantidad'])) : 1;

    $sql = "SELECT * FROM productos WHERE id = $id";
    $result = $conn->query($sql);

    if(!$result || $result->num_rows == 0){
        echo "Error: Producto no encontrado.";
        exit;
    }

    $producto = $result->fetch_assoc();

    $nombre = $producto['nombre'];
    $precio = $producto['precio'];
    $imagen = $producto['imagen'];
    $id_producto = $producto['id'];
    $stock = isset($producto['stock']) ? intval($producto['stock']) : 0;

    $usuario_id = intval($_SESSION['usuario_id']);

    // Verificar si ya existe en carrito
    $verificar = "SELECT * FROM carrito WHERE id_producto = $id_producto AND usuario_id = $usuario_id";
    $resultado = $conn->query($verificar);

    if($resultado && $resultado->num_rows > 0){

        $rowCarrito = $resultado->fetch_assoc();
        $cantidad_total = $rowCarrito['cantidad'] + $cantidad;

        if($cantidad_total > $stock) $cantidad_total = $stock;

        $update = "UPDATE carrito 
                   SET cantidad = $cantidad_total 
                   WHERE id_producto = $id_producto 
                   AND usuario_id = $usuario_id";

        if (!$conn->query($update)) {
            echo "Error SQL UPDATE: " . $conn->error;
            exit;
        }

    } else {

        if($cantidad > $stock) $cantidad = $stock;

        $insertar = "INSERT INTO carrito 
                    (usuario_id, id_producto, nombre_producto, precio, imagen, cantidad) 
                    VALUES 
                    ('$usuario_id', '$id_producto', '$nombre', '$precio', '$imagen', $cantidad)";

        if (!$conn->query($insertar)) {
            echo "Error SQL INSERT: " . $conn->error;
            exit;
        }
    }

    echo "OK";
    exit;
}

/* ============================================================
   🔥 PRODUCTOS MANUALES (si usas esta parte)
   ============================================================ */
elseif(isset($_REQUEST['id_manual'])){

    $id_producto = intval($_REQUEST['id_manual']);
    $nombre = $_REQUEST['nombre_manual'];
    $precio = $_REQUEST['precio_manual'];
    $imagen = $_REQUEST['imagen_manual'];
    $usuario_id = intval($_SESSION['usuario_id']);

    $verificar = "SELECT * FROM carrito WHERE id_producto = $id_producto AND usuario_id = $usuario_id";
    $resultado = $conn->query($verificar);

    if($resultado && $resultado->num_rows > 0){

        $update = "UPDATE carrito 
                   SET cantidad = cantidad + 1 
                   WHERE id_producto = $id_producto 
                   AND usuario_id = $usuario_id";

        if (!$conn->query($update)) {
            echo "Error SQL UPDATE: " . $conn->error;
            exit;
        }

    } else {

        $insertar = "INSERT INTO carrito 
                    (usuario_id, id_producto, nombre_producto, precio, imagen, cantidad) 
                    VALUES 
                    ('$usuario_id', '$id_producto', '$nombre', '$precio', '$imagen', 1)";

        if (!$conn->query($insertar)) {
            echo "Error SQL INSERT: " . $conn->error;
            exit;
        }
    }

    echo "OK";
    exit;
}

else{
    echo "Error: No se recibió producto.";
    exit;
}
?>