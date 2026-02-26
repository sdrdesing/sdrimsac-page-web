<?php
// models/UsuarioModel.php
require_once __DIR__ . '/../../config/database.php';

class UsuarioModel {
    private $conn;

    public function __construct() {
        $this->conn = $this->getConnection();
    }

    private function getConnection() {
        return include __DIR__ . '/../config/database.php';
    }

    public function obtenerTodos() {
        $sql = "SELECT * FROM usuarios";
        $result = $this->conn->query($sql);
        $usuarios = [];
        if ($result) {
            while ($row = $result->fetch_assoc()) {
                $usuarios[] = $row;
            }
        }
        return $usuarios;
    }

    public function obtenerPorId($id) {
        $stmt = $this->conn->prepare("SELECT * FROM usuarios WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    // Puedes agregar más métodos: crear, actualizar, eliminar
}
