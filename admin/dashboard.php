<?php
require_once __DIR__ . '/../config/database.php';
session_start();

if(!isset($_SESSION['usuario'])){ header('Location: ../login.php'); exit; }
$nombre = $conn->real_escape_string($_SESSION['usuario']);
$r = $conn->query("SELECT is_admin FROM usuarios WHERE nombre='$nombre' LIMIT 1");
if(!$r || $r->num_rows == 0 || intval($r->fetch_assoc()['is_admin']) !== 1){ header('Location: ../index.php'); exit; }

include __DIR__ . '/../includes/header.php';

// Top vistos
$top_vistos = $conn->query("SELECT id,nombre,vistas FROM productos ORDER BY vistas DESC LIMIT 10");
// Top vendidos (rely on productos.vendidos field)
$top_vendidos = $conn->query("SELECT id,nombre,vendidos FROM productos ORDER BY vendidos DESC LIMIT 10");
// Top favoritos
$top_favs = $conn->query("SELECT id,nombre,favoritos FROM productos ORDER BY favoritos DESC LIMIT 10");

?>

<section class="contenido">
    <h2>Dashboard</h2>
    <div style="display:flex;gap:24px;flex-wrap:wrap;">
        <div style="flex:1;min-width:240px;">
            <h3>Más vistos</h3>
            <ol>
            <?php while($r = $top_vistos->fetch_assoc()): ?>
                <li><?= htmlspecialchars($r['nombre']) ?> — <?= intval($r['vistas']) ?></li>
            <?php endwhile; ?>
            </ol>
        </div>

        <div style="flex:1;min-width:240px;">
            <h3>Más vendidos</h3>
            <ol>
            <?php while($r = $top_vendidos->fetch_assoc()): ?>
                <li><?= htmlspecialchars($r['nombre']) ?> — <?= intval($r['vendidos']) ?></li>
            <?php endwhile; ?>
            </ol>
        </div>

        <div style="flex:1;min-width:240px;">
            <h3>Favoritos</h3>
            <ol>
            <?php while($r = $top_favs->fetch_assoc()): ?>
                <li><?= htmlspecialchars($r['nombre']) ?> — <?= intval($r['favoritos']) ?></li>
            <?php endwhile; ?>
            </ol>
        </div>
    </div>
</section>

<?php include __DIR__ . '/../includes/footer.php'; ?>
