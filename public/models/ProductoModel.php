<?php
// models/ProductoModel.php
require_once __DIR__ . '/../../config/database.php';

class ProductoModel {
    private $conn;

    public function __construct() {
        global $conn;
        $this->conn = $conn;
    }

    public function obtenerTodos() {
        $sql = "SELECT * FROM productos";
        $result = $this->conn->query($sql);
        $productos = [];
        if ($result) {
            while ($row = $result->fetch_assoc()) {
                $productos[] = $row;
            }
        }
        return $productos;
    }

    public function obtenerPorId($id) {
        $stmt = $this->conn->prepare("SELECT * FROM productos WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    // Puedes agregar más métodos: crear, actualizar, eliminar
}
