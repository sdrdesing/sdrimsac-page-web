<?php
// models/FacturacionModel.php
require_once __DIR__ . '/../../config/database.php';

class FacturacionModel {
    private $conn;

    public function __construct() {
        $this->conn = $this->getConnection();
    }

    private function getConnection() {
        return include __DIR__ . '/../config/database.php';
    }

    public function obtenerPorUsuario($usuario_id) {
        $stmt = $this->conn->prepare("SELECT * FROM facturas WHERE usuario_id = ?");
        $stmt->bind_param("i", $usuario_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $facturas = [];
        while ($row = $result->fetch_assoc()) {
            $facturas[] = $row;
        }
        return $facturas;
    }

    // Puedes agregar más métodos: crearFactura, obtenerPorId, etc.
}
