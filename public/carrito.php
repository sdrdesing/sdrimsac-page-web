<?php include("includes/header.php"); ?>
<?php include("../config/database.php"); ?>
<link rel="stylesheet" href="assets/css/carrito.css">

<section class="contenido cart-page">
    <div class="cart-grid">
        <div class="cart-list">
            <h2>Carrito de Compras</h2>
            <?php
            $usuario_id = isset($_SESSION['usuario_id']) ? intval($_SESSION['usuario_id']) : 0;
            $sql = "SELECT * FROM carrito WHERE usuario_id = $usuario_id";
            $result = $conn->query($sql);
            $total = 0;
            $num_productos = 0;
            if($result && $result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    $subtotal = $row['precio'] * $row['cantidad'];
                    $total += $subtotal;
                    $num_productos++;
                    echo "
                    <div class='cart-item'>
                        <div class='product-image'><img src='{$row['imagen']}' alt='{$row['nombre_producto']}'></div>
                        <div class='product-info'>
                            <h3>{$row['nombre_producto']}</h3>
                            <p class='price'>S/ {$row['precio']} <span class='qty'>x {$row['cantidad']}</span></p>
                        </div>
                        <div class='product-actions'>
                            <p class='subtotal'>Subtotal: S/ {$subtotal}</p>
                            <form method='post' action='eliminar_carrito.php'>
                                <input type='hidden' name='id' value='{$row['id_carrito']}'>
                                <button type='submit' class='btn btn-danger'>Eliminar</button>
                            </form>
                        </div>
                    </div>
                    ";
                }
            } else {
                echo "<p class='empty'>No hay productos en el carrito.</p>";
            }
            ?>
        </div>

        <aside class="cart-summary">
            <h3>Resumen de Pedido</h3>
            <p class="summary-line"><span>Productos:</span><span class="value"><?php echo $num_productos; ?></span></p>
            <p class="summary-line"><strong>Total:</strong><strong class="value">S/ <?php echo number_format($total,2); ?></strong></p>
            <a href="checkout.php" class="btn btn-primary">Proceder al Pago</a>
        </aside>
    </div>
</section>

<?php include("includes/footer.php"); ?>