<?php
// models/CompraModel.php
require_once __DIR__ . '/../../config/database.php';

class CompraModel {
    private $conn;

    public function __construct() {
        $this->conn = $this->getConnection();
    }

    private function getConnection() {
        include __DIR__ . '/../../config/database.php';
        return $conn;
    }

    public function obtenerPorUsuario($usuario_id) {
        $stmt = $this->conn->prepare("SELECT * FROM compras WHERE usuario_id = ?");
        $stmt->bind_param("i", $usuario_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $compras = [];
        while ($row = $result->fetch_assoc()) {
            $compras[] = $row;
        }
        return $compras;
    }

    // Método para registrar una compra con PIN
    public function registrarCompra($usuario_id, $codigo_compra, $total, $observaciones = null, $pin) {
        $stmt = $this->conn->prepare("INSERT INTO compras (usuario_id, codigo_compra, total, observaciones, pin) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("isdss", $usuario_id, $codigo_compra, $total, $observaciones, $pin);
        $stmt->execute();
        return $this->conn->insert_id;
    }

    // Puedes agregar más métodos: obtenerPorId, etc.
}


