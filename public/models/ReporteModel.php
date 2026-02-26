<?php
// models/ReporteModel.php
require_once __DIR__ . '/../../config/database.php';

class ReporteModel {
    private $conn;

    public function __construct() {
        $this->conn = $this->getConnection();
    }

    private function getConnection() {
        return include __DIR__ . '/../config/database.php';
    }

    public function obtenerTodos() {
        $sql = "SELECT * FROM reportes";
        $result = $this->conn->query($sql);
        $reportes = [];
        if ($result) {
            while ($row = $result->fetch_assoc()) {
                $reportes[] = $row;
            }
        }
        return $reportes;
    }

    // Puedes agregar más métodos según tus necesidades
}
