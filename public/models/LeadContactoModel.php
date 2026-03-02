<?php

class LeadContactoModel
{
    private mysqli $conn;

    public function __construct(mysqli $conn)
    {
        $this->conn = $conn;
    }

    public function crear(array $lead): bool
    {
        $sql = "INSERT INTO leads_contacto
        (tipo_doc, dni, ruc, nombres, apellidos, razon_social, telefono, empresa, mensaje,
         api_estado, api_raw, ip, user_agent)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt = $this->conn->prepare($sql);
        if (!$stmt) return false;

        $stmt->bind_param(
            "sssssssssssss",
            $lead["tipo_doc"],
            $lead["dni"],
            $lead["ruc"],
            $lead["nombres"],
            $lead["apellidos"],
            $lead["razon_social"],
            $lead["telefono"],
            $lead["empresa"],
            $lead["mensaje"],
            $lead["api_estado"],
            $lead["api_raw"],
            $lead["ip"],
            $lead["user_agent"]
        );

        $ok = $stmt->execute();
        $stmt->close();
        return $ok;
    }
}