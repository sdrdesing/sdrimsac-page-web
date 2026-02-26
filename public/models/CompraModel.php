<?php
// models/CompraModel.php
require_once __DIR__ . '/../../config/database.php';

class CompraModel {
    private $conn;

    public function __construct() {
        $this->conn = $this->getConnection();
    }

    private function getConnection() {
        return include __DIR__ . '/../config/database.php';
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

    // Puedes agregar más métodos: registrarCompra, obtenerPorId, etc.
}
