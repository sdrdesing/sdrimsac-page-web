<?php
require_once __DIR__ . '/../../config/database.php';
include __DIR__ . '/includes/header_admin.php';

// Admin check
if(!isset($_SESSION['usuario'])){ header('Location: ../login.php'); exit; }
$nombre = $conn->real_escape_string($_SESSION['usuario']);
$r = $conn->query("SELECT is_admin FROM usuarios WHERE nombre='$nombre' LIMIT 1");
if(!$r || $r->num_rows == 0 || intval($r->fetch_assoc()['is_admin']) !== 1){ header('Location: ../index.php'); exit; }

// Handle delete action POST
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_id'])){
    $id = intval($_POST['delete_id']);
    $conn->query("DELETE FROM productos WHERE id=$id");
}
$productosPorPagina = 10;
$totalProductos = $conn->query("SELECT COUNT(*) as total FROM productos")->fetch_assoc()['total'];
$totalPaginas = ceil($totalProductos / $productosPorPagina);
$paginaActual = isset($_GET['pagina']) ? max(1, intval($_GET['pagina'])) : 1;
$offset = ($paginaActual - 1) * $productosPorPagina;
$res = $conn->query("SELECT * FROM productos ORDER BY id ASC LIMIT $productosPorPagina OFFSET $offset");
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
    

        <nav class="paginacion">
            <style>
                .paginacion {
                    display: flex;
                    justify-content: center;
                    gap: 8px;
                    margin-top: 20px;
                }
                .paginacion-btn {
                    display: inline-block;
                    padding: 8px 16px;
                    margin: 0 2px;
                    border-radius: 6px;
                    background: #f5f5f5;
                    color: #333;
                    text-decoration: none;
                    font-weight: 500;
                    box-shadow: 0 2px 8px rgba(0,0,0,0.04);
                    transition: background 0.2s, color 0.2s, box-shadow 0.2s;
                }
                .paginacion-btn:hover {
                    background: #e0e0e0;
                    color: #007bff;
                    box-shadow: 0 4px 12px rgba(0,123,255,0.08);
                }
                .paginacion-btn.activa {
                    background: #007bff;
                    color: #fff;
                    font-weight: 700;
                    box-shadow: 0 4px 12px rgba(0,123,255,0.15);
                }
            </style>
            <?php if($paginaActual > 1): ?>
                <a href="?pagina=<?= $paginaActual-1 ?>" class="paginacion-btn">&laquo; Anterior</a>
            <?php endif; ?>
            <?php for($i=1; $i<=$totalPaginas; $i++): ?>
                <a href="?pagina=<?= $i ?>" class="paginacion-btn <?= $i==$paginaActual ? 'activa' : '' ?>"> <?= $i ?> </a>
            <?php endfor; ?>
            <?php if($paginaActual < $totalPaginas): ?>
                <a href="?pagina=<?= $paginaActual+1 ?>" class="paginacion-btn">Siguiente &raquo;</a>
            <?php endif; ?>
        </nav>
</section>


