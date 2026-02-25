<?php
include __DIR__ . '/includes/header_admin.php';
require_once __DIR__ . '/../config/database.php';
?>
<link rel="stylesheet" href="control.css">
<section class="control-section">
    <h2>Panel de Control</h2>
    <h3>📊 Control de Ventas</h3>
    <ul>
        <li><a href="reportes.php?tipo=ventas">Ver cuánto se vendió hoy</a></li>
        <li><a href="reportes.php?tipo=productos_mas_vendidos">Ver productos más adquiridos</a></li>
        <li><a href="reportes.php?tipo=productos_no_venden">Detectar productos que no se venden</a></li>
    </ul>
    <h3>📦 Control de Productos</h3>
    <ul>
        <li><a href="?stock_bajo=1">Ver stock bajo</a></li>
        <li><a href="?precios_mal=1">Detectar precios mal configurados</a></li>
        <li><a href="?sin_imagen=1">Revisar productos sin imagen</a></li>
    </ul>
    <h3>👥 Control de Usuarios</h3>
    <ul>
        <li><a href="?clientes=1">Ver clientes registrados</a></li>
        <li><a href="?inactivos=1">Detectar usuarios inactivos</a></li>
        <li><a href="?historial=1">Ver historial de compras</a></li>
    </ul>
    <h3>🔐 Control de Seguridad</h3>
    <ul>
        <li><a href="?login_intentos=1">Ver intentos de login</a></li>
        <li><a href="?bloquear=1">Bloquear usuarios sospechosos</a></li>
        <li><a href="?actividad=1">Ver actividad reciente</a></li>
    </ul>
    <hr>
    <?php
    // Funcionalidad básica de ejemplo para algunos controles
    if(isset($_GET['stock_bajo'])){
        echo '<div class="control-box"><h4>Productos con stock bajo (≤ 3):</h4>';
        $q = $conn->query("SELECT * FROM productos WHERE stock <= 3 ORDER BY stock ASC");
        if($q->num_rows > 0){
            echo '<table><tr><th>Nombre</th><th>Stock</th></tr>';
            while($r = $q->fetch_assoc()){
                echo '<tr><td>'.htmlspecialchars($r['nombre']).'</td><td>'.intval($r['stock']).'</td></tr>';
            }
            echo '</table>';
        } else {
            echo '<p>No hay productos con stock bajo.</p>';
        }
        echo '</div>';
    }
    if(isset($_GET['precios_mal'])){
        echo '<div class="control-box"><h4>Productos con precio mal configurado (≤ 0):</h4>';
        $q = $conn->query("SELECT * FROM productos WHERE precio <= 0");
        if($q->num_rows > 0){
            echo '<table><tr><th>Nombre</th><th>Precio</th></tr>';
            while($r = $q->fetch_assoc()){
                echo '<tr><td>'.htmlspecialchars($r['nombre']).'</td><td>S/ '.floatval($r['precio']).'</td></tr>';
            }
            echo '</table>';
        } else {
            echo '<p>No hay productos con precio mal configurado.</p>';
        }
        echo '</div>';
    }
    if(isset($_GET['sin_imagen'])){
        echo '<div class="control-box"><h4>Productos sin imagen:</h4>';
        $q = $conn->query("SELECT * FROM productos WHERE imagen IS NULL OR imagen = ''");
        if($q->num_rows > 0){
            echo '<table><tr><th>Nombre</th></tr>';
            while($r = $q->fetch_assoc()){
                echo '<tr><td>'.htmlspecialchars($r['nombre']).'</td></tr>';
            }
            echo '</table>';
        } else {
            echo '<p>No hay productos sin imagen.</p>';
        }
        echo '</div>';
    }
    if(isset($_GET['clientes'])){
        echo '<div class="control-box"><h4>Clientes registrados:</h4>';
        $q = $conn->query("SELECT nombre, email FROM usuarios WHERE is_admin = 0");
        if($q->num_rows > 0){
            echo '<table><tr><th>Nombre</th><th>Email</th></tr>';
            while($r = $q->fetch_assoc()){
                echo '<tr><td>'.htmlspecialchars($r['nombre']).'</td><td>'.htmlspecialchars($r['email']).'</td></tr>';
            }
            echo '</table>';
        } else {
            echo '<p>No hay clientes registrados.</p>';
        }
        echo '</div>';
    }
    // Puedes seguir agregando más controles según tus necesidades
    ?>
</section>
