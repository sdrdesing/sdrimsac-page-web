<?php
// models/PagoModel.php
require_once __DIR__ . '/../../config/database.php';

class PagoModel {
    private $conn;

    public function __construct() {
        $this->conn = $this->getConnection();
    }

    private function getConnection() {
        return include __DIR__ . '/../config/database.php';
    }

    public function obtenerPorUsuario($usuario_id) {
        $stmt = $this->conn->prepare("SELECT * FROM pagos WHERE usuario_id = ?");
        $stmt->bind_param("i", $usuario_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $pagos = [];
        while ($row = $result->fetch_assoc()) {
            $pagos[] = $row;
        }
        return $pagos;
    }

    public function registrarPago($usuario_id, $metodo, $total) {
        $stmt = $this->conn->prepare("INSERT INTO pagos (usuario_id, metodo, total, fecha) VALUES (?, ?, ?, NOW())");
        $stmt->bind_param("isd", $usuario_id, $metodo, $total);
        $stmt->execute();
        return $this->conn->insert_id;
    }
    // Puedes agregar más métodos: registrarPago, obtenerPorId, etc.
}
