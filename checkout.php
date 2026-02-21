<?php
session_start();
include("config/database.php");

// Require login: if not logged, redirect to register with next=checkout.php
if(!isset($_SESSION['usuario'])){
    header('Location: register.php?next=checkout.php');
    exit;
}

// Calculate cart total
$total = 0;
$items = [];
$q = $conn->query("SELECT * FROM carrito");
if($q){
    while($r = $q->fetch_assoc()){
        $r['subtotal'] = $r['precio'] * $r['cantidad'];
        $total += $r['subtotal'];
        $items[] = $r;
    }
}

include('includes/header.php');
?>

<section class="contenido">
    <h2>Checkout — Método de Pago</h2>

    <?php if(empty($items)): ?>
        <p>No hay productos en el carrito. <a href="productos.php">Ver productos</a></p>
    <?php else: ?>

    <div class="checkout-grid">
        <div class="checkout-items">
            <h3>Tu Pedido</h3>
            <?php foreach($items as $it): ?>
                <div class="cart-item">
                    <div class="product-image"><img src="<?= htmlspecialchars($it['imagen']) ?>" alt="<?= htmlspecialchars($it['nombre_producto']) ?>"></div>
                    <div class="product-info">
                        <h4><?= htmlspecialchars($it['nombre_producto']) ?></h4>
                        <p>Precio: S/ <?= number_format($it['precio'],2) ?> x <?= intval($it['cantidad']) ?></p>
                        <p>Subtotal: S/ <?= number_format($it['subtotal'],2) ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <aside class="checkout-summary">
            <h3>Resumen</h3>
            <p><strong>Total:</strong> S/ <?= number_format($total,2) ?></p>

            <form method="POST" action="procesar_pago.php">
                <input type="hidden" name="total" value="<?= htmlspecialchars($total) ?>">

                <label><input type="radio" name="metodo" value="tarjeta" required> Pago con Tarjeta (simulado)</label><br>
                <label><input type="radio" name="metodo" value="transferencia"> Depósito / Transferencia</label><br>
                <label><input type="radio" name="metodo" value="contra"> Pagar en Tienda (contra entrega)</label>

                <div id="tarjeta-campos" style="margin-top:12px;display:none;">
                    <input type="text" name="titular" placeholder="Nombre en la tarjeta"><br>
                    <input type="text" name="numero" placeholder="Número de tarjeta"><br>
                    <input type="text" name="vencimiento" placeholder="MM/AA"><br>
                    <input type="text" name="cvv" placeholder="CVV"><br>
                </div>

                <button type="submit" class="btn btn-primary" style="margin-top:12px;">Confirmar y Pagar</button>
            </form>
        </aside>
    </div>

    <script>
    // Mostrar campos de tarjeta solo si se selecciona tarjeta
    document.addEventListener('change', function(e){
        if(e.target.name === 'metodo'){
            var f = document.getElementById('tarjeta-campos');
            if(e.target.value === 'tarjeta') f.style.display = 'block'; else f.style.display = 'none';
        }
    });
    </script>

    <?php endif; ?>

</section>

<?php include('includes/footer.php'); ?>

