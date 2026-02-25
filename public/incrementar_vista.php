<?php
// Endpoint sencillo para incrementar contador de vistas de un producto
include('config/database.php');

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $id = intval($_POST['id'] ?? 0);
    if($id>0){
        $stmt = $conn->prepare("UPDATE productos SET views = COALESCE(views,0) + 1 WHERE id_producto = ?");
        $stmt->bind_param('i',$id);
        $stmt->execute();
    }
}
// Responder vacío (no JSON necesario)
?>
