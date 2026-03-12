<?php
require_once __DIR__ . '/../../config/database.php';
session_start();

if(!isset($_SESSION['usuario'])){ header('Location: ../login.php'); exit; }
$nombre = $conn->real_escape_string($_SESSION['usuario']);
$r = $conn->query("SELECT is_admin FROM usuarios WHERE nombre='$nombre' LIMIT 1");
if(!$r || $r->num_rows == 0 || intval($r->fetch_assoc()['is_admin']) !== 1){ header('Location: ../index.php'); exit; }

include __DIR__ . '/includes/header_admin.php';

$top_vendidos = $conn->query("SELECT id, nombre, vendidos FROM productos WHERE vendidos > 0 ORDER BY vendidos DESC LIMIT 10");
$top_favs = $conn->query("SELECT p.id, p.nombre, COUNT(f.id) AS total_favoritos FROM productos p JOIN favoritos f ON p.id = f.producto_id GROUP BY p.id, p.nombre HAVING total_favoritos > 0 ORDER BY total_favoritos DESC LIMIT 10");
?>
<link rel="stylesheet" href="../assets/css/dashboard.css">
<link rel="stylesheet" href="assets/css/compras_historial.css">
<link rel="stylesheet" href="assets/css/compras_pendientes.css">
<link rel="stylesheet" href="admin/assets/css/compras_scroll.css">

<section class="dashboard-page">
    <div class="dashboard-container">
      <div class="dashboard-title">BIENVENIDO</div>
      <div class="dashboard-metrics" style="display:flex; gap:40px;">
        <div class="dashboard-metric" style="flex:1;">
          <h3>Más vendidos</h3>
          <ol class="scroll-list">
          <?php if($top_vendidos && $top_vendidos->num_rows>0){ while($r = $top_vendidos->fetch_assoc()): ?>
            <li><?= htmlspecialchars($r['nombre']) ?> — <?= intval($r['vendidos']) ?></li>
          <?php endwhile; } else { ?>
            <li>No hay productos.</li>
          <?php } ?>
          </ol>
        </div>
        <div class="dashboard-metric" style="flex:1;">
          <h3 style="color:#2a2ed6;">Favoritos <span style="color:#FFD700; font-size:1.2em;">★</span></h3>
          <ol class="scroll-list">
          <?php if($top_favs && $top_favs->num_rows>0){ while($r = $top_favs->fetch_assoc()): ?>
            <li><span style="color:#FFD700; font-size:1.1em;">★</span> <?= htmlspecialchars($r['nombre']) ?> — <?= intval($r['total_favoritos']) ?></li>
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
          // PAGINACIÓN
          $itemsPorPagina = 5;
          $paginaActual = isset($_GET['pendientes_page']) ? max(1, intval($_GET['pendientes_page'])) : 1;
          $sqlCount = "SELECT COUNT(*) as total FROM compras WHERE estado = 'pendiente'";
          $totalRows = $conn->query($sqlCount)->fetch_assoc()['total'];
          $totalPaginas = ceil($totalRows / $itemsPorPagina);
          $offset = ($paginaActual - 1) * $itemsPorPagina;
          $sqlPaginado = $sql . " LIMIT $itemsPorPagina OFFSET $offset";
          $result = $conn->query($sqlPaginado);
        ?>
        <section class="compras-pendientes">
          <h2>Compras Pendientes de Validación</h2>
          <table>
            <thead>
              <tr>
                <th>Código</th>
                <th>Usuario</th>
                <th>Fecha</th>
                <th>Total</th>
                <th>Acción</th>
              </tr>
            </thead>
            <tbody>
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
            </tbody>
          </table>
            <!-- PAGINACIÓN -->
            <div style="text-align:center; margin-top:15px;">
              <?php if($totalPaginas > 1): ?>
                <?php for($i=1; $i<=$totalPaginas; $i++): ?>
                  <a href="?pendientes_page=<?= $i ?>" style="padding:6px 12px; margin:2px; background:<?= $i==$paginaActual?'#2a2ed6':'#eee' ?>; color:<?= $i==$paginaActual?'#fff':'#333' ?>; border-radius:4px; text-decoration:none; font-weight:bold;">
                    <?= $i ?>
                  </a>
                <?php endfor; ?>
              <?php endif; ?>
            </div>
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
          // PAGINACIÓN HISTORIAL
          $itemsPorPaginaHist = 5;
          $paginaActualHist = isset($_GET['historial_page']) ? max(1, intval($_GET['historial_page'])) : 1;
          $sqlCountHist = "SELECT COUNT(*) as total FROM compras";
          $totalRowsHist = $conn->query($sqlCountHist)->fetch_assoc()['total'];
          $totalPaginasHist = ceil($totalRowsHist / $itemsPorPaginaHist);
          $offsetHist = ($paginaActualHist - 1) * $itemsPorPaginaHist;
          $sqlPaginadoHist = $sql . " LIMIT $itemsPorPaginaHist OFFSET $offsetHist";
          $result = $conn->query($sqlPaginadoHist);
        ?>
        <section class="compras-historial">
          <h2>Historial de Compras</h2>
          <table>
            <thead>
              <tr>
                <th>Código</th>
                <th>Usuario</th>
                <th>Fecha</th>
                <th>Total</th>
                <th>Estado</th>
              </tr>
            </thead>
            <tbody>
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
            </tbody>
          </table>
            <!-- PAGINACIÓN HISTORIAL -->
            <div style="text-align:center; margin-top:15px;">
              <?php if($totalPaginasHist > 1): ?>
                <?php for($i=1; $i<=$totalPaginasHist; $i++): ?>
                  <a href="?historial_page=<?= $i ?>" style="padding:6px 12px; margin:2px; background:<?= $i==$paginaActualHist?'#2a2ed6':'#eee' ?>; color:<?= $i==$paginaActualHist?'#fff':'#333' ?>; border-radius:4px; text-decoration:none; font-weight:bold;">
                    <?= $i ?>
                  </a>
                <?php endfor; ?>
              <?php endif; ?>
            </div>
        </section>
        <?php
    }
}

// Sección: Comentarios pendientes de aprobación
if (isset($_SESSION['usuario'])) {
    $nombre = $conn->real_escape_string($_SESSION['usuario']);
    $r = $conn->query("SELECT is_admin FROM usuarios WHERE nombre='$nombre' LIMIT 1");
    if ($r && $r->num_rows > 0 && intval($r->fetch_assoc()['is_admin']) === 1) {
        $sql = "SELECT c.id, c.nombre, c.comentario, c.fecha, n.titulo FROM comentarios_noticias c JOIN noticias n ON c.noticia_id = n.id WHERE c.estado = 'pendiente' ORDER BY c.fecha DESC";
        $itemsPorPaginaCom = 5;
        $paginaActualCom = isset($_GET['comentarios_page']) ? max(1, intval($_GET['comentarios_page'])) : 1;
        $sqlCountCom = "SELECT COUNT(*) as total FROM comentarios_noticias WHERE estado = 'pendiente'";
        $totalRowsCom = $conn->query($sqlCountCom)->fetch_assoc()['total'];
        $totalPaginasCom = ceil($totalRowsCom / $itemsPorPaginaCom);
        $offsetCom = ($paginaActualCom - 1) * $itemsPorPaginaCom;
        $sqlPaginadoCom = $sql . " LIMIT $itemsPorPaginaCom OFFSET $offsetCom";
        $resultCom = $conn->query($sqlPaginadoCom);
        ?>
        <section class="comentarios-pendientes">
          <h2>Comentarios Pendientes de Moderación</h2>
          <table>
            <thead>
              <tr>
                <th>Noticia</th>
                <th>Usuario</th>
                <th>Comentario</th>
                <th>Fecha</th>
                <th>Acción</th>
              </tr>
            </thead>
            <tbody>
            <?php while($row = $resultCom->fetch_assoc()): ?>
            <tr>
              <td><?= htmlspecialchars($row['titulo']) ?></td>
              <td><?= htmlspecialchars($row['nombre']) ?></td>
              <td><?= nl2br(htmlspecialchars($row['comentario'])) ?></td>
              <td><?= date('Y-m-d H:i', $row['fecha']) ?></td>
              <td>
                <form method="post" action="validar_comentario.php" style="display:inline;">
                  <input type="hidden" name="comentario_id" value="<?= $row['id'] ?>">
                  <button type="submit" name="accion" value="aprobar">Aprobar</button>
                  <button type="submit" name="accion" value="rechazar">Rechazar</button>
                </form>
              </td>
            </tr>
            <?php endwhile; ?>
            </tbody>
          </table>
            <!-- PAGINACIÓN -->
            <div style="text-align:center; margin-top:15px;">
              <?php if($totalPaginasCom > 1): ?>
                <?php for($i=1; $i<=$totalPaginasCom; $i++): ?>
                  <a href="?comentarios_page=<?= $i ?>" style="padding:6px 12px; margin:2px; background:<?= $i==$paginaActualCom?'#2a2ed6':'#eee' ?>; color:<?= $i==$paginaActualCom?'#fff':'#333' ?>; border-radius:4px; text-decoration:none; font-weight:bold;">
                    <?= $i ?>
                  </a>
                <?php endfor; ?>
              <?php endif; ?>
            </div>
        </section>
        <?php
    }
}
?>

