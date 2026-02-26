
<?php
require_once __DIR__ . '/../config/database.php';
session_start();

// Admin check
include __DIR__ . '/includes/header_admin.php';

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$producto = ['nombre'=>'','descripcion'=>'','precio'=>0,'stock'=>0,'imagen'=>''];
if($id){
    $q = $conn->query("SELECT * FROM productos WHERE id=$id LIMIT 1");
    if($q && $q->num_rows) $producto = $q->fetch_assoc();
}

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $nombrep = $conn->real_escape_string($_POST['nombre']);
    $descripcion = $conn->real_escape_string($_POST['descripcion']);
    $precio = floatval($_POST['precio']);
    $stock = intval($_POST['stock']);
    $imagen = $conn->real_escape_string($_POST['imagen']);

    if(!empty($_POST['id'])){
        $idup = intval($_POST['id']);
        $conn->query("UPDATE productos SET nombre='$nombrep', descripcion='$descripcion', precio=$precio, stock=$stock, imagen='$imagen' WHERE id=$idup");
        header('Location: productos.php'); exit;
    } else {
        $conn->query("INSERT INTO productos (nombre,descripcion,precio,stock,imagen) VALUES ('$nombrep','$descripcion',$precio,$stock,'$imagen')");
        header('Location: productos.php'); exit;
    }
}

?>
<?php if($id): ?>
<link rel="stylesheet" href="editar_producto.css">
<section class="editar-producto-section">
    <h2>Editar Producto</h2>
    <form method="POST">
        <input type="hidden" name="id" value="<?= $id ?>">
        <label>Nombre<br><input type="text" name="nombre" value="<?= htmlspecialchars($producto['nombre']) ?>" required></label>
        <label>Descripción<br><textarea name="descripcion"><?= htmlspecialchars($producto['descripcion']) ?></textarea></label>
        <label>Precio (S/)<br><input type="number" step="0.01" name="precio" value="<?= htmlspecialchars($producto['precio']) ?>" required></label>
        <label>Stock<br><input type="number" name="stock" value="<?= htmlspecialchars($producto['stock']) ?>" required></label>
        <label>Imagen (URL)<br><input type="text" name="imagen" value="<?= htmlspecialchars($producto['imagen']) ?>"></label>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</section>
<?php else: ?>
<link rel="stylesheet" href="producto_form.css">
<section class="producto-form-section">
    <h2>Nuevo Producto</h2>
    <form method="POST">
        <input type="hidden" name="id" value="">
        <label>Nombre<br><input type="text" name="nombre" value="" required></label>
        <label>Descripción<br><textarea name="descripcion"></textarea></label>
        <label>Precio (S/)<br><input type="number" step="0.01" name="precio" value="0" required></label>
        <label>Stock<br><input type="number" name="stock" value="0" required></label>
        <label>Imagen (URL)<br><input type="text" name="imagen" value=""></label>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</section>
<?php endif; ?>


