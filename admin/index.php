<?php
require_once __DIR__ . '/../config/database.php';
session_start();

// Check admin by matching session nombre
if(!isset($_SESSION['usuario'])){
    header('Location: ../login.php'); exit;
}
$nombre = $conn->real_escape_string($_SESSION['usuario']);
$r = $conn->query("SELECT is_admin FROM usuarios WHERE nombre='$nombre' LIMIT 1");
if(!$r || $r->num_rows == 0){ header('Location: ../index.php'); exit; }
$row = $r->fetch_assoc();
if(intval($row['is_admin']) !== 1){ header('Location: ../index.php'); exit; }

include __DIR__ . '/../includes/header.php';
?>

<section class="contenido">
    <h1>Panel de Administración</h1>
    <p>Bienvenido, <?= htmlspecialchars($_SESSION['usuario']) ?></p>
    <ul>
        <li><a href="productos.php">Gestionar Productos</a></li>
        <li><a href="dashboard.php">Dashboard / Métricas</a></li>
            <li><a href="../../paginaweb.php">Página Web</a></li>
    </ul>
</section>

<?php include __DIR__ . '/../includes/footer.php'; ?>
<?php
session_start();
if(!isset($_SESSION['is_admin']) || $_SESSION['is_admin'] !== true){
    header('Location: login.php'); exit;
}
include('../config/database.php');

$sql = "SELECT * FROM productos ORDER BY views DESC LIMIT 20";
$res = $conn->query($sql);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Admin — Dashboard</title>
    <link rel="stylesheet" href="../assets/css/estilo.css">
    <style>.wrap{padding:28px;max-width:1100px;margin:24px auto}.top{display:flex;justify-content:space-between;align-items:center;margin-bottom:18px}</style>
</head>
<body>
<div class="wrap">
    <div class="top">
        <h2>Panel de Administración</h2>
        <div>
            <a href="products.php" class="btn-hero-secondary">Gestionar productos</a>
            <a href="logout.php" class="btn-hero-secondary" style="margin-left:8px">Cerrar sesión</a>
        </div>
    </div>

    <h3>Productos más vistos</h3>
    <table style="width:100%;border-collapse:collapse;margin-top:12px">
        <thead>
            <tr style="text-align:left;border-bottom:1px solid #e2e8f0">
                <th>Id</th><th>Nombre</th><th>Vistas</th><th>Precio</th>
            </tr>
        </thead>
        <tbody>
        <?php if($res && $res->num_rows>0){ while($r=$res->fetch_assoc()){ ?>
            <tr>
                <td><?=htmlspecialchars($r['id_producto'])?></td>
                <td><?=htmlspecialchars($r['nombre_producto'])?></td>
                <td><?=htmlspecialchars($r['views'] ?? 0)?></td>
                <td>S/ <?=htmlspecialchars($r['precio'])?></td>
            </tr>
        <?php } } else { ?>
            <tr><td colspan="4">No hay productos.</td></tr>
        <?php } ?>
        </tbody>
    </table>

</div>
</body>
</html>
