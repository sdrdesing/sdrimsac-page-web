<?php include("includes/header.php"); ?>
<?php include("../config/database.php"); ?>
<link rel="stylesheet" href="assets/css/carrito.css">

<section class="contenido cart-page">
    <div class="cart-container">
        <div class="cart-grid">
            <div class="cart-list">
                <div class="cart-header">
                    <h2>Carrito de Compras</h2>
                    <p>Revisa tus productos antes de proceder al pago.</p>
                </div>

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
                            <div class='product-image-box'>
                                <div class='product-image'>
                                    <img src='{$row['imagen']}' alt='{$row['nombre_producto']}'>
                                </div>
                            </div>

                            <div class='product-info'>
                                <h3>{$row['nombre_producto']}</h3>
                                <p class='price'>S/ " . number_format($row['precio'], 2) . " <span class='qty'>x {$row['cantidad']}</span></p>
                            </div>

                            <div class='product-actions'>
                                <p class='subtotal-label'>Subtotal</p>
                                <p class='subtotal'>S/ " . number_format($subtotal, 2) . "</p>
                                <form method='post' action='eliminar_carrito.php'>
                                    <input type='hidden' name='id' value='{$row['id_carrito']}'>
                                    <button type='submit' class='btn btn-danger'>Eliminar</button>
                                </form>
                            </div>
                        </div>
                        ";
                    }
                } else {
                    echo "<div class='empty-box'><p class='empty'>No hay productos en el carrito.</p></div>";
                }
                ?>
            </div>

            <aside class="cart-summary">
                <div class="summary-top">
                    <h3>Resumen de Pedido</h3>
                    <p>Detalle de tu compra</p>
                </div>

                <div class="summary-content">
                    <p class="summary-line">
                        <span>Productos:</span>
                        <span class="value"><?php echo $num_productos; ?></span>
                    </p>

                    <div class="summary-divider"></div>

                    <p class="summary-line total-line">
                        <strong>Total:</strong>
                        <strong class="value">S/ <?php echo number_format($total,2); ?></strong>
                    </p>
                </div>

                <a href="checkout.php" class="btn btn-primary">Proceder al Pago</a>

                <div class="summary-note">
                    Compra segura y atención rápida.
                </div>
            </aside>
        </div>
    </div>
</section>

<?php include("includes/footer.php"); ?>