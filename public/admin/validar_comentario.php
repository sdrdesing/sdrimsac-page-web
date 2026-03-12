<?php
require_once __DIR__ . '/../../config/database.php';
session_start();

// Solo admin puede moderar
if(!isset($_SESSION['usuario'])){ header('Location: ../login.php'); exit; }
$nombre = $conn->real_escape_string($_SESSION['usuario']);
$r = $conn->query("SELECT is_admin FROM usuarios WHERE nombre='$nombre' LIMIT 1");
if(!$r || $r->num_rows == 0 || intval($r->fetch_assoc()['is_admin']) !== 1){ header('Location: ../index.php'); exit; }

if(isset($_POST['comentario_id'], $_POST['accion'])){
    $comentario_id = intval($_POST['comentario_id']);
    $accion = $_POST['accion'];
    if($accion === 'aprobar'){
        $conn->query("UPDATE comentarios_noticias SET estado='aprobado' WHERE id=$comentario_id LIMIT 1");
    } elseif($accion === 'rechazar'){
        $conn->query("UPDATE comentarios_noticias SET estado='rechazado' WHERE id=$comentario_id LIMIT 1");
    }
}
header('Location: dashboard.php');
exit;
