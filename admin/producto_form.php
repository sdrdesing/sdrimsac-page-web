<?php
require_once __DIR__ . '/../config/database.php';
session_start();

// Admin check
if(!isset($_SESSION['usuario'])){ header('Location: ../login.php'); exit; }
$nombre = $conn->real_escape_string($_SESSION['usuario']);
$r = $conn->query("SELECT is_admin FROM usuarios WHERE nombre='$nombre' LIMIT 1");
if(!$r || $r->num_rows == 0 || intval($r->fetch_assoc()['is_admin']) !== 1){ header('Location: ../index.php'); exit; }

// Defaults
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$producto = ['nombre'=>'','descripcion'=>'','precio'=>0,'stock'=>0,'imagen'=>''];

if($id){
    $q = $conn->query("SELECT * FROM productos WHERE id=$id LIMIT 1");
    if($q && $q->num_rows) $producto = $q->fetch_assoc();
}

// Handle POST (create or update)
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

include __DIR__ . '/../includes/header.php';
?>

<section class="contenido">
    <h2><?= $id ? 'Editar Producto' : 'Nuevo Producto' ?></h2>
    <form method="POST">
        <input type="hidden" name="id" value="<?= $id ?>">
        <label>Nombre<br><input type="text" name="nombre" value="<?= htmlspecialchars($producto['nombre']) ?>" required></label><br>
        <label>Descripción<br><textarea name="descripcion"><?= htmlspecialchars($producto['descripcion']) ?></textarea></label><br>
        <label>Precio (S/)<br><input type="number" step="0.01" name="precio" value="<?= htmlspecialchars($producto['precio']) ?>" required></label><br>
        <label>Stock<br><input type="number" name="stock" value="<?= htmlspecialchars($producto['stock']) ?>" required></label><br>
        <label>Imagen (URL)<br><input type="text" name="imagen" value="<?= htmlspecialchars($producto['imagen']) ?>"></label><br>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</section>

<?php include __DIR__ . '/../includes/footer.php'; ?>
