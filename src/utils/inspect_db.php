<?php
include(__DIR__ . '/../../config/database.php');

$res = $conn->query("SHOW TABLES LIKE 'usuarios'");
if($res->num_rows === 0){
    echo "Tabla 'usuarios' no encontrada\n"; exit;
}

$res = $conn->query("DESCRIBE usuarios");
if(!$res){
    echo "Error al describir la tabla: " . $conn->error . "\n"; exit;
}

while($row = $res->fetch_assoc()){
    echo $row['Field'] . "\t" . $row['Type'] . "\t" . $row['Null'] . "\t" . $row['Key'] . "\t" . $row['Default'] . "\n";
}
?>