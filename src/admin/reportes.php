<?php
include __DIR__ . '/includes/header_admin.php';
require_once __DIR__ . '/../config/database.php';
?>
<link rel="stylesheet" href="reportes.css">
<section class="reportes-section">
    <h2>Reportes</h2>
    <p>Aquí podrás ver y descargar reportes de ventas, productos, usuarios, etc.</p>
    <ul>
        <li><a href="?reporte=ventas">Reporte de ventas</a></li>
        <li><a href="?reporte=productos">Reporte de productos</a></li>
        <li><a href="?reporte=usuarios">Reporte de usuarios</a></li>
    </ul>

    <?php
    if(isset($_GET['reporte'])){
        $tipo = $_GET['reporte'];
        if($tipo === 'ventas'){
            echo '<h3>Reporte de ventas (demo)</h3>';
            echo '<table><tr><th>ID</th><th>Cliente</th><th>Total</th><th>Fecha</th></tr>';
            // Demo: puedes cambiar por tu tabla real de ventas
            echo '<tr><td>1</td><td>Juan</td><td>S/ 120.00</td><td>2026-02-23</td></tr>';
            echo '<tr><td>2</td><td>María</td><td>S/ 80.00</td><td>2026-02-22</td></tr>';
            echo '</table>';
        }
        if($tipo === 'productos'){
            echo '<h3>Reporte de productos</h3>';
            $q = $conn->query("SELECT id, nombre, precio, stock FROM productos");
            echo '<table><tr><th>ID</th><th>Nombre</th><th>Precio</th><th>Stock</th></tr>';
            while($r = $q->fetch_assoc()){
                echo '<tr><td>'.intval($r['id']).'</td><td>'.htmlspecialchars($r['nombre']).'</td><td>S/ '.floatval($r['precio']).'</td><td>'.intval($r['stock']).'</td></tr>';
            }
            echo '</table>';
        }
        if($tipo === 'usuarios'){
            echo '<h3>Reporte de usuarios</h3>';
            $q = $conn->query("SELECT id, nombre, email, is_admin FROM usuarios ORDER BY id ASC");
            echo '<table><tr><th>N°</th><th>ID</th><th>Nombre</th><th>Email</th><th>Rol</th></tr>';
            $num = 1;
            while($r = $q->fetch_assoc()){
                echo '<tr><td>'.$num.'</td><td>'.intval($r['id']).'</td><td>'.htmlspecialchars($r['nombre']).'</td><td>'.htmlspecialchars($r['email']).'</td><td>'.($r['is_admin']?'Admin':'Cliente').'</td></tr>';
                $num++;
            }
            echo '</table>';
        }
    }
    ?>
</section>

