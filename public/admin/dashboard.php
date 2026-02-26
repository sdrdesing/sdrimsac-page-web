<?php
require_once __DIR__ . '/../../config/database.php';
session_start();

if(!isset($_SESSION['usuario'])){ header('Location: ../login.php'); exit; }
$nombre = $conn->real_escape_string($_SESSION['usuario']);
$r = $conn->query("SELECT is_admin FROM usuarios WHERE nombre='$nombre' LIMIT 1");
if(!$r || $r->num_rows == 0 || intval($r->fetch_assoc()['is_admin']) !== 1){ header('Location: ../index.php'); exit; }

include __DIR__ . '/includes/header_admin.php';

$top_vistos = $conn->query("SELECT id,nombre,vistas FROM productos ORDER BY vistas DESC LIMIT 10");
$top_vendidos = $conn->query("SELECT id,nombre,vendidos FROM productos ORDER BY vendidos DESC LIMIT 10");
$top_favs = $conn->query("SELECT id,nombre,favoritos FROM productos ORDER BY favoritos DESC LIMIT 10");
?>
<link rel="stylesheet" href="../assets/css/dashboard.css">
<link rel="stylesheet" href="assets/css/compras_historial.css">
<link rel="stylesheet" href="assets/css/compras_pendientes.css">

<section class="dashboard-page">
    <div class="dashboard-container">
        <div class="dashboard-title">BIENVENIDO</div>
        <div class="dashboard-btns">
            <button onclick="location.href='producto_form.php'">Agregar Producto</button>
            <button onclick="location.href='productos.php'">Editar Productos</button>
            <button onclick="location.href='productos.php'">Actualizar Precios</button>
            <button onclick="location.href='productos.php'">Visualizar Productos</button>
            <button onclick="location.href='productos.php'">Gestionar Productos</button>
        </div>
        <div class="dashboard-metrics">
            <div class="dashboard-metric">
                <h3>Más vistos</h3>
                <ol>
                <?php if($top_vistos && $top_vistos->num_rows>0){ while($r = $top_vistos->fetch_assoc()): ?>
                    <li><?= htmlspecialchars($r['nombre']) ?> — <?= intval($r['vistas']) ?></li>
                <?php endwhile; } else { ?>
                    <li>No hay productos.</li>
                <?php } ?>
                </ol>
            </div>
            <div class="dashboard-metric">
                <h3>Más vendidos</h3>
                <ol>
                <?php if($top_vendidos && $top_vendidos->num_rows>0){ while($r = $top_vendidos->fetch_assoc()): ?>
                    <li><?= htmlspecialchars($r['nombre']) ?> — <?= intval($r['vendidos']) ?></li>
                <?php endwhile; } else { ?>
                    <li>No hay productos.</li>
                <?php } ?>
                </ol>
            </div>
            <div class="dashboard-metric">
                <h3>Favoritos</h3>
                <ol>
                <?php if($top_favs && $top_favs->num_rows>0){ while($r = $top_favs->fetch_assoc()): ?>
                    <li><?= htmlspecialchars($r['nombre']) ?> — <?= intval($r['favoritos']) ?></li>
                <?php endwhile; } else { ?>
                    <li>No hay productos.</li>
                <?php } ?>
                </ol>
            </div>
        </div>
    </div>
</section>

<?php
// Mostrar compras pendientes de validación SOLO si el usuario es admin (usando is_admin)
if (isset($_SESSION['usuario'])) {
    $nombre = $conn->real_escape_string($_SESSION['usuario']);
    $r = $conn->query("SELECT is_admin FROM usuarios WHERE nombre='$nombre' LIMIT 1");
    if ($r && $r->num_rows > 0 && intval($r->fetch_assoc()['is_admin']) === 1) {
        $sql = "SELECT c.id, c.codigo_compra, c.fecha, c.total, u.nombre 
                FROM compras c
                JOIN usuarios u ON c.usuario_id = u.id
                WHERE c.estado = 'pendiente'
                ORDER BY c.fecha DESC";
        $result = $conn->query($sql);
        ?>
        <section class="compras-pendientes">
          <h2>Compras Pendientes de Validación</h2>
          <table>
            <tr>
              <th>Código</th>
              <th>Usuario</th>
              <th>Fecha</th>
              <th>Total</th>
              <th>Acción</th>
            </tr>
            <?php while($row = $result->fetch_assoc()): ?>
            <tr>
              <td><?= htmlspecialchars($row['codigo_compra']) ?></td>
              <td><?= htmlspecialchars($row['nombre']) ?></td>
              <td><?= htmlspecialchars($row['fecha']) ?></td>
              <td>S/ <?= number_format($row['total'],2) ?></td>
              <td>
                <form method="post" action="validar_compra.php" style="display:inline;">
                  <input type="hidden" name="compra_id" value="<?= $row['id'] ?>">
                  <button type="submit" name="accion" value="validar">Validar</button>
                  <button type="submit" name="accion" value="rechazar">Rechazar</button>
                </form>
              </td>
            </tr>
            <?php endwhile; ?>
          </table>
        </section>
        <?php
    }
}

// Mostrar historial de compras para admin
if (isset($_SESSION['usuario'])) {
    $nombre = $conn->real_escape_string($_SESSION['usuario']);
    $r = $conn->query("SELECT is_admin FROM usuarios WHERE nombre='$nombre' LIMIT 1");
    if ($r && $r->num_rows > 0 && intval($r->fetch_assoc()['is_admin']) === 1) {
        $sql = "SELECT c.id, c.codigo_compra, c.fecha, c.total, c.estado, u.nombre 
                FROM compras c
                JOIN usuarios u ON c.usuario_id = u.id
                ORDER BY c.fecha DESC";
        $result = $conn->query($sql);
        ?>
        <section class="compras-historial">
          <h2>Historial de Compras</h2>
          <table>
            <tr>
              <th>Código</th>
              <th>Usuario</th>
              <th>Fecha</th>
              <th>Total</th>
              <th>Estado</th>
            </tr>
            <?php while($row = $result->fetch_assoc()): ?>
            <tr>
              <td><?= htmlspecialchars($row['codigo_compra']) ?></td>
              <td><?= htmlspecialchars($row['nombre']) ?></td>
              <td><?= htmlspecialchars($row['fecha']) ?></td>
              <td>S/ <?= number_format($row['total'],2) ?></td>
              <td class="estado-<?= htmlspecialchars($row['estado']) ?>">
                <?= ucfirst($row['estado']) ?>
              </td>
            </tr>
            <?php endwhile; ?>
          </table>
        </section>
        <?php
    }
}
?>

