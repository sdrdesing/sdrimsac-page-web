<?php
session_start();
if(!isset($_SESSION['is_admin']) || $_SESSION['is_admin'] !== true){
    header('Location: login.php'); exit;
}
include('../config/database.php');

$message = '';
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'add'){
    $nombre = $conn->real_escape_string($_POST['nombre'] ?? '');
    $descripcion = $conn->real_escape_string($_POST['descripcion'] ?? '');
    $precio = floatval($_POST['precio'] ?? 0);
    $imagen = $conn->real_escape_string($_POST['imagen'] ?? '');
    $sql = "INSERT INTO productos (nombre_producto, descripcion, precio, imagen, views) VALUES ('$nombre','$descripcion',$precio,'$imagen',0)";
    if($conn->query($sql)) $message = 'Producto agregado correctamente.'; else $message = 'Error: ' . $conn->error;
}

$res = $conn->query("SELECT * FROM productos ORDER BY id_producto DESC");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Admin — Productos</title>
    <link rel="stylesheet" href="../assets/css/estilo.css">
    <style>.wrap{padding:28px;max-width:1100px;margin:24px auto}.form-row{display:flex;gap:8px;margin-bottom:8px}</style>
</head>
<body>
<div class="wrap">
    <a href="index.php" class="btn-hero-secondary">Volver al dashboard</a>
    <h2 style="margin-top:12px">Gestión de Productos</h2>
    <?php if($message): ?><p><?=htmlspecialchars($message)?></p><?php endif; ?>

    <h3>Agregar producto</h3>
    <form method="post">
        <input type="hidden" name="action" value="add">
        <div class="form-row">
            <input name="nombre" placeholder="Nombre" required style="flex:2;padding:8px">
            <input name="precio" placeholder="Precio" required style="width:120px;padding:8px">
        </div>
        <div style="margin-bottom:8px">
            <input name="imagen" placeholder="URL de la imagen" style="width:100%;padding:8px">
        </div>
        <div style="margin-bottom:12px">
            <textarea name="descripcion" placeholder="Descripción" style="width:100%;padding:8px"></textarea>
        </div>
        <button class="icons" type="submit" style="background:var(--azul);color:#fff;padding:10px;border-radius:8px;border:none">Agregar</button>
    </form>

    <h3 style="margin-top:18px">Listado</h3>
    <table style="width:100%;border-collapse:collapse;margin-top:8px">
        <thead><tr style="text-align:left;border-bottom:1px solid #e2e8f0"><th>ID</th><th>Nombre</th><th>Precio</th><th>Vistas</th></tr></thead>
        <tbody>
        <?php if($res && $res->num_rows>0){ while($r=$res->fetch_assoc()){ ?>
            <tr>
                <td><?=htmlspecialchars($r['id_producto'])?></td>
                <td><?=htmlspecialchars($r['nombre_producto'])?></td>
                <td>S/ <?=htmlspecialchars($r['precio'])?></td>
                <td><?=htmlspecialchars($r['views'] ?? 0)?></td>
            </tr>
        <?php } } else { ?>
            <tr><td colspan="4">No hay productos.</td></tr>
        <?php } ?>
        </tbody>
    </table>

</div>
</body>
</html>
