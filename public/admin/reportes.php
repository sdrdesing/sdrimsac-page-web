<?php
include __DIR__ . '/includes/header_admin.php';
require_once __DIR__ . '/../../config/database.php';
?>
<link rel="stylesheet" href="assets/css/reportes.css">
<section class="reportes-section">
    <h2>Reportes</h2>
    <p>Aquí podrás ver y descargar reportes de ventas, productos, usuarios, etc.</p>

    <ul>
        <li><a href="?reporte=ventas" class="report-btn">Reporte de ventas</a></li>
        <li><a href="?reporte=productos" class="report-btn">Reporte de productos</a></li>
        <li><a href="?reporte=usuarios" class="report-btn">Reporte de usuarios</a></li>
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
            $productosPorPagina = 10;
            $totalProductos = $conn->query("SELECT COUNT(*) as total FROM productos")->fetch_assoc()['total'];
            $totalPaginas = ceil($totalProductos / $productosPorPagina);
            $paginaActual = isset($_GET['pagina']) ? max(1, intval($_GET['pagina'])) : 1;
            $offset = ($paginaActual - 1) * $productosPorPagina;
            $q = $conn->query("SELECT id, nombre, precio, stock FROM productos ORDER BY id ASC LIMIT $productosPorPagina OFFSET $offset");
            echo '<table><tr><th>ID</th><th>Nombre</th><th>Precio</th><th>Stock</th></tr>';
            while($r = $q->fetch_assoc()){
                echo '<tr><td>'.intval($r['id']).'</td><td>'.htmlspecialchars($r['nombre']).'</td><td>S/ '.floatval($r['precio']).'</td><td>'.intval($r['stock']).'</td></tr>';
            }
            echo '</table>';
            echo '<div class="pagination">';
            if($paginaActual > 1){
                echo '<a href="?reporte=productos&pagina='.($paginaActual-1).'">&laquo; Anterior</a>';
            }
            for($i=1; $i<=$totalPaginas; $i++){
                echo '<a href="?reporte=productos&pagina='.$i.'" class="'.($i==$paginaActual?'active':'').'"> '.$i.' </a>';
            }
            if($paginaActual < $totalPaginas){
                echo '<a href="?reporte=productos&pagina='.($paginaActual+1).'">Siguiente &raquo;</a>';
            }
            echo '</div>';
        }
        if($tipo === 'usuarios'){
            echo '<h3>Reporte de usuarios</h3>';
            $usuariosPorPagina = 10;
            $totalUsuarios = $conn->query("SELECT COUNT(*) as total FROM usuarios")->fetch_assoc()['total'];
            $totalPaginas = ceil($totalUsuarios / $usuariosPorPagina);
            $paginaActual = isset($_GET['pagina']) ? max(1, intval($_GET['pagina'])) : 1;
            $offset = ($paginaActual - 1) * $usuariosPorPagina;
            $q = $conn->query("SELECT id, nombre, email, is_admin FROM usuarios ORDER BY id ASC LIMIT $usuariosPorPagina OFFSET $offset");
            echo '<table><tr><th>N°</th><th>ID</th><th>Nombre</th><th>Email</th><th>Rol</th></tr>';
            $num = $offset + 1;
            while($r = $q->fetch_assoc()){
                echo '<tr><td>'.$num.'</td><td>'.intval($r['id']).'</td><td>'.htmlspecialchars($r['nombre']).'</td><td>'.htmlspecialchars($r['email']).'</td><td>'.($r['is_admin']?'Admin':'Cliente').'</td></tr>';
                $num++;
            }
            echo '</table>';
            echo '<div class="pagination">';
            if($paginaActual > 1){
                echo '<a href="?reporte=usuarios&pagina='.($paginaActual-1).'">&laquo; Anterior</a>';
            }
            for($i=1; $i<=$totalPaginas; $i++){
                echo '<a href="?reporte=usuarios&pagina='.$i.'" class="'.($i==$paginaActual?'active':'').'"> '.$i.' </a>';
            }
            if($paginaActual < $totalPaginas){
                echo '<a href="?reporte=usuarios&pagina='.($paginaActual+1).'">Siguiente &raquo;</a>';
            }
            echo '</div>';
        }
    }
    ?>
</section>

