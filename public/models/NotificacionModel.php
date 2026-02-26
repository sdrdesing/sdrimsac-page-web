<?php
// models/NotificacionModel.php
require_once __DIR__ . '/../../config/database.php';

class NotificacionModel {
    private $conn;

    public function __construct() {
        $this->conn = $this->getConnection();
    }

    private function getConnection() {
        return include __DIR__ . '/../config/database.php';
    }

    public function obtenerPorUsuario($usuario_id) {
        $stmt = $this->conn->prepare("SELECT * FROM notificaciones WHERE usuario_id = ?");
        $stmt->bind_param("i", $usuario_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $notificaciones = [];
        while ($row = $result->fetch_assoc()) {
            $notificaciones[] = $row;
        }
        return $notificaciones;
    }

    // Puedes agregar más métodos: crear, marcar como leída, eliminar
}
