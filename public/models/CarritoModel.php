
<?php
// models/CarritoModel.php
require_once __DIR__ . '/../../config/database.php';

class CarritoModel {
    private $conn;

    public function __construct() {
        global $conn;
        $this->conn = $conn;
    }

    public function obtenerPorUsuario($usuario_id = null) {
        // Si hay usuario, buscar en DB
        if ($usuario_id !== null) {
            $stmt = $this->conn->prepare("SELECT * FROM carrito WHERE usuario_id = ?");
            $stmt->bind_param("i", $usuario_id);
            $stmt->execute();
            $result = $stmt->get_result();
            $carrito = [];
            while ($row = $result->fetch_assoc()) {
                $carrito[] = $row;
            }
            return $carrito;
        }
        // Si no hay usuario, buscar en sesión
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        if (isset($_SESSION['cart']) && is_array($_SESSION['cart'])) {
            return $_SESSION['cart'];
        }
        return [];
    }

    public function obtenerPorProducto($id_producto) {
        $stmt = $this->conn->prepare("SELECT * FROM carrito WHERE id_producto = ?");
        $stmt->bind_param("i", $id_producto);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public function agregarProducto($id_producto, $nombre, $precio, $imagen, $cantidad, $stock) {
        $existente = $this->obtenerPorProducto($id_producto);
        if($existente) {
            $cantidad_total = $existente['cantidad'] + $cantidad;
            if($cantidad_total > $stock) $cantidad_total = $stock;
            $stmt = $this->conn->prepare("UPDATE carrito SET cantidad = ? WHERE id_producto = ?");
            $stmt->bind_param("ii", $cantidad_total, $id_producto);
            $stmt->execute();
        } else {
            if($cantidad > $stock) $cantidad = $stock;
            $stmt = $this->conn->prepare("INSERT INTO carrito (id_producto, nombre_producto, precio, imagen, cantidad) VALUES (?, ?, ?, ?, ?)");
            $stmt->bind_param("isdsi", $id_producto, $nombre, $precio, $imagen, $cantidad);
            $stmt->execute();
        }
    }
}
