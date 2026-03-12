<?php
include("includes/header.php");
include(__DIR__ . "/../config/database.php");

// Validar y obtener el ID del producto
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
if ($id <= 0) {
    echo '<div class="dp-error-wrap"><div class="dp-error">Producto no encontrado.</div></div>';
    include("includes/footer.php");
    exit;
}

// Consultar el producto
$stmt = $conn->prepare("SELECT * FROM productos WHERE id = ? LIMIT 1");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$producto = $result->fetch_assoc();
$stmt->close();

if (!$producto) {
    echo '<div class="dp-error-wrap"><div class="dp-error">Producto no encontrado.</div></div>';
    include("includes/footer.php");
    exit;
}

$img = !empty($producto['imagen']) ? $producto['imagen'] : 'https://via.placeholder.com/600x500?text=Sin+Imagen';

if (!empty($producto['imagen']) && strpos($producto['imagen'], 'assets/img/productos/') === 0) {
    $img_path = __DIR__ . '/' . $producto['imagen'];
    if (!file_exists($img_path)) {
        $img = 'https://via.placeholder.com/600x500?text=Sin+Imagen';
    }
}

$stock = intval($producto['stock']);
$precio = number_format($producto['precio'], 2);
$nombre = htmlspecialchars($producto['nombre']);
$descripcion = nl2br(htmlspecialchars($producto['descripcion']));
?>

<link rel="stylesheet" href="assets/css/detalle-producto.css">

<section class="dp-section">
  <div class="dp-container">
    <div class="dp-card">

      <div class="dp-left">
        <div class="dp-img-panel">
          <div class="dp-img-wrap">
            <img src="<?= htmlspecialchars($img) ?>" alt="<?= $nombre ?>">
          </div>
        </div>
      </div>

      <div class="dp-right">
        <span class="dp-badge <?= $stock > 0 ? 'is-available' : 'is-out' ?>">
          <?= $stock > 0 ? 'Disponible' : 'Agotado' ?>
        </span>

        <h1 class="dp-title"><?= $nombre ?></h1>

        <p class="dp-subtitle">
          Producto ideal para ventas, inventario y uso comercial
        </p>

        <div class="dp-desc-box">
          <p class="dp-desc"><?= $descripcion ?></p>
        </div>

        <div class="dp-price-stock">
          <span class="dp-price">S/ <?= $precio ?></span>
          <span class="dp-stock <?= $stock > 0 ? 'in-stock' : 'out-stock' ?>">
            <?= $stock > 0 ? 'Stock: ' . $stock : 'Sin stock' ?>
          </span>
        </div>

        <?php if ($stock > 0): ?>
          <form method="post" action="agregar_carrito.php" class="dp-form" id="addCarritoForm">
            <input type="hidden" name="id" value="<?= $producto['id'] ?>">

            <div class="dp-cantidad-box">
              <button type="button" class="dp-qty-btn" id="qtyMinus" aria-label="Disminuir cantidad">−</button>
              <input
                type="number"
                name="cantidad"
                id="dpCantidad"
                value="1"
                min="1"
                max="<?= $stock ?>"
                class="dp-cantidad"
              >
              <button type="button" class="dp-qty-btn" id="qtyPlus" aria-label="Aumentar cantidad">+</button>
            </div>

            <button type="submit" class="dp-btn">Añadir al carrito 🛒</button>
          </form>
        <?php else: ?>
          <div class="dp-no-stock-box">
            <button class="dp-btn dp-btn-disabled" disabled>Producto agotado</button>
          </div>
        <?php endif; ?>

        <div class="dp-benefits">
          <span>✓ Compra segura</span>
          <span>✓ Atención rápida</span>
          <span>✓ Producto listo para despacho</span>
        </div>

        <div id="carritoMsg" class="dp-msg"></div>

        <div class="dp-specs">
          <h3>Especificaciones</h3>
          <ul>
            <li><strong>Nombre:</strong> <?= $nombre ?></li>
            <li><strong>Precio:</strong> S/ <?= $precio ?></li>
            <li><strong>Disponibilidad:</strong> <?= $stock > 0 ? $stock . ' unidades' : 'Agotado' ?></li>
            <li><strong>Uso recomendado:</strong> Comercio, almacén, inventario y operaciones diarias</li>
          </ul>
        </div>

        <a href="productos.php" class="dp-back">&larr; Volver a la tienda</a>
      </div>

    </div>
  </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function () {
  const form = document.getElementById('addCarritoForm');
  const carritoMsg = document.getElementById('carritoMsg');
  const cantidadInput = document.getElementById('dpCantidad');
  const qtyMinus = document.getElementById('qtyMinus');
  const qtyPlus = document.getElementById('qtyPlus');

  if (qtyMinus && qtyPlus && cantidadInput) {
    qtyMinus.addEventListener('click', function () {
      let valor = parseInt(cantidadInput.value) || 1;
      let min = parseInt(cantidadInput.min) || 1;
      if (valor > min) cantidadInput.value = valor - 1;
    });

    qtyPlus.addEventListener('click', function () {
      let valor = parseInt(cantidadInput.value) || 1;
      let max = parseInt(cantidadInput.max) || 9999;
      if (valor < max) cantidadInput.value = valor + 1;
    });
  }

  if (form) {
    form.addEventListener('submit', function(e) {
      e.preventDefault();

      const formData = new FormData(form);
      const btn = form.querySelector('button[type="submit"]');

      btn.disabled = true;
      carritoMsg.textContent = '';
      carritoMsg.className = 'dp-msg';

      fetch(form.action, {
        method: 'POST',
        body: formData
      })
      .then(response => response.text())
      .then(res => {
        btn.disabled = false;

        if (res.trim() === 'OK') {
          carritoMsg.textContent = '¡Producto añadido al carrito!';
          carritoMsg.classList.add('success');

          setTimeout(() => {
            carritoMsg.textContent = '';
            carritoMsg.className = 'dp-msg';
          }, 2500);
        } else if (res.trim() === '__LOGIN_REQUIRED__') {
          window.location.href = 'login.php';
        } else {
          carritoMsg.textContent = 'Error: ' + res;
          carritoMsg.classList.add('error');
        }
      })
      .catch(() => {
        btn.disabled = false;
        carritoMsg.textContent = 'Error de conexión.';
        carritoMsg.classList.add('error');
      });
    });
  }
});
</script>

<?php include("includes/footer.php"); ?>