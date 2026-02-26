
<?php
require_once __DIR__ . '/../../config/database.php';
session_start();

// Admin check
if(!isset($_SESSION['usuario'])){ header('Location: ../login.php'); exit; }
$nombre = $conn->real_escape_string($_SESSION['usuario']);
$r = $conn->query("SELECT is_admin FROM usuarios WHERE nombre='$nombre' LIMIT 1");
if(!$r || $r->num_rows == 0 || intval($r->fetch_assoc()['is_admin']) !== 1){ header('Location: ../index.php'); exit; }

include __DIR__ . '/includes/header_admin.php';

// Handle delete action POST
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_id'])){
    $id = intval($_POST['delete_id']);
    $conn->query("DELETE FROM productos WHERE id=$id");
}

$res = $conn->query("SELECT * FROM productos ORDER BY id DESC");
?>
<link rel="stylesheet" href="assets/css/productos.css">
<section class="productos-section">
    <h2>Gestión de Productos</h2>
    <a href="producto_form.php" class="btn-nuevo-producto">+ Nuevo Producto</a>
    <table class="productos-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Stock</th>
                <th>Vistas</th>
                <th>Vendidos</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
        <?php while($row = $res->fetch_assoc()): ?>
            <tr>
                <td><?= $row['id'] ?></td>
                <td><?= htmlspecialchars($row['nombre']) ?></td>
                <td>S/ <?= number_format($row['precio'],2) ?></td>
                <td><?= intval($row['stock']) ?></td>
                <td><?= intval($row['vistas']) ?></td>
                <td><?= intval($row['vendidos']) ?></td>
                <td class="productos-actions">
                    <a href="producto_form.php?id=<?= $row['id'] ?>">Editar</a>
                    <form method="POST" style="display:inline-block;margin-left:8px;" onsubmit="return confirm('Eliminar producto?');">
                        <input type="hidden" name="delete_id" value="<?= $row['id'] ?>">
                        <button type="submit">Eliminar</button>
                    </form>
                </td>
            </tr>
        <?php endwhile; ?>
        </tbody>
    </table>
</section>


