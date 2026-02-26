<?php
// Run this script once from browser or CLI to create products table and add is_admin to usuarios
require_once __DIR__ . '/../config/database.php';

$queries = [];

$queries[] = "CREATE TABLE IF NOT EXISTS productos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(255) NOT NULL,
    descripcion TEXT,
    precio DECIMAL(10,2) DEFAULT 0,
    stock INT DEFAULT 0,
    imagen VARCHAR(255) DEFAULT '',
    vistas INT DEFAULT 0,
    vendidos INT DEFAULT 0,
    favoritos INT DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";

$queries[] = "ALTER TABLE usuarios ADD COLUMN IF NOT EXISTS is_admin TINYINT(1) DEFAULT 0";

echo "Running migrations...<br>";
foreach($queries as $q){
    if($conn->query($q) === TRUE){
        echo "OK: " . htmlspecialchars(substr($q,0,80)) . "...<br>";
    } else {
        echo "Error: " . htmlspecialchars($conn->error) . "<br>";
    }
}

echo "<p>Done. If you need to make a user admin, run SQL: UPDATE usuarios SET is_admin=1 WHERE email='tu@correo.com';</p>";

?>
