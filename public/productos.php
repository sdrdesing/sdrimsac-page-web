<?php 
include("includes/header.php"); 
include(__DIR__ . "/../config/database.php"); 
$usuarioLogueado = isset($_SESSION['usuario']) && !empty($_SESSION['usuario']);
?>
<!-- SweetAlert2 CDN -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
function mostrarAlertaSesion() {
  Swal.fire({
    title: 'Error',
    text: 'Debes iniciar sesión',
    icon: 'warning',
    confirmButtonText: 'Aceptar'
  });
}
<?php if(!$usuarioLogueado): ?>
// Llama a la función solo cuando el usuario no ha iniciado sesión
mostrarAlertaSesion();
<?php endif; ?>
</script>
<link rel="stylesheet" href="assets/css/productos.css">

<script>
function marcarFavorito(productoId) {
  fetch('marcar_favorito.php', {
    method: 'POST',
    headers: {'Content-Type': 'application/x-www-form-urlencoded'},
    body: 'id=' + productoId
  })
  .then(res => res.text())
  .then(txt => {
    if(txt.trim() === 'OK') {
      alert('¡Producto marcado como favorito!');
    } else {
      alert('Error al marcar favorito: ' + txt);
    }
  });
}

function actualizarContadorCarrito() {
  fetch('carrito_count.php')
    .then(res => res.text())
    .then(num => {
      var cartCount = document.getElementById('cart-count');
      if (cartCount) cartCount.textContent = num;
    });
}
</script>

<div class="page-banner">
    <img src="https://images.unsplash.com/photo-1556742049-0cfed4f6a45d?w=1400&q=80" alt="Tienda SDRIM">
    <div class="page-banner-overlay">
        <h1>Nuestra Tienda</h1>
        <p>Hardware y software para tu sistema de facturación electrónica</p>
    </div>
</div>

<?php
$productosPorPagina = 6;
$totalProductos = $conn->query("SELECT COUNT(*) as total FROM productos")->fetch_assoc()['total'];
$totalPaginas = ceil($totalProductos / $productosPorPagina);
$paginaActual = isset($_GET['pagina']) ? max(1, intval($_GET['pagina'])) : 1;
$offset = ($paginaActual - 1) * $productosPorPagina;
$sql = "SELECT * FROM productos ORDER BY id DESC LIMIT $offset, $productosPorPagina";
$result = $conn->query($sql);
?>

<nav class="paginacion">
  <?php if($paginaActual > 1): ?>
    <a href="?pagina=<?php echo $paginaActual-1; ?>" class="paginacion-btn">&laquo; Anterior</a>
  <?php endif; ?>
  <?php for($i=1; $i<=$totalPaginas; $i++): ?>
    <a href="?pagina=<?php echo $i; ?>" class="paginacion-btn <?php if($i==$paginaActual) echo 'activa'; ?>"><?php echo $i; ?></a>
  <?php endfor; ?>
  <?php if($paginaActual < $totalPaginas): ?>
    <a href="?pagina=<?php echo $paginaActual+1; ?>" class="paginacion-btn">Siguiente &raquo;</a>
  <?php endif; ?>
</nav>

<script>
document.addEventListener('DOMContentLoaded', () => {

  document.querySelectorAll('.form-agregar-carrito').forEach(form => {
    if (form.dataset.ready === "1") return;
    form.dataset.ready = "1";

    const btnAdd = form.querySelector('.btn-card');
    const btnVer = form.querySelector('.btn-ver-carrito');

    const setAddedUI = () => {
      btnAdd.classList.add('is-added');
      btnAdd.innerHTML = '<i class="fa-solid fa-check"></i> Añadido';
      btnAdd.disabled = true;
      if (btnVer) btnVer.style.display = 'inline-flex';
    };

    form.addEventListener('submit', async (e) => {
      e.preventDefault();
      try{
        btnAdd.disabled = true;
        btnAdd.innerHTML = 'Agregando...';
        const formData = new FormData(form);
        const res = await fetch('agregar_carrito.php', { method:'POST', body: formData });
        const text = await res.text();
        if (text.trim() === '__LOGIN_REQUIRED__') {
          window.location.href = 'login.php';
          return;
        }
        if(!res.ok) throw new Error('Error al agregar');
        setAddedUI();
        actualizarContadorCarrito();
      }catch(e){
        btnAdd.disabled = false;
        btnAdd.innerHTML = '<i class="fa-solid fa-cart-plus"></i> Añadir al carrito';
        console.error(e);
      }
    });

    btnAdd.addEventListener('click', (e) => {
      e.preventDefault();
      form.requestSubmit();
    });

    if (btnVer){
      btnVer.addEventListener('click', (e) => {
        e.preventDefault();
        window.location.href = 'carrito.php';
      });
    }
  });

  document.querySelectorAll('form[action="agregar_carrito.php"]').forEach(form => {
    if (form.classList.contains('form-agregar-carrito')) return;
    if (form.dataset.ready === "1") return;
    form.dataset.ready = "1";

    const btnAdd = form.querySelector('.btn-card, button[type="submit"]');
    if (!btnAdd) return;

    const btnVer = document.createElement('button');
    btnVer.type = 'button';
    btnVer.className = 'btn-ver-carrito';
    btnVer.innerHTML = '<i class="fa-solid fa-check"></i> Añadido &nbsp; <span style="font-weight:600; color:#2e8bff;">|</span> &nbsp; Ver carrito';
    btnVer.style.marginLeft = '10px';
    btnVer.style.display = 'none';
    btnAdd.insertAdjacentElement('afterend', btnVer);

    const setAddedUI = () => {
      btnAdd.classList.add('is-added');
      btnAdd.innerHTML = '<i class="fa-solid fa-check"></i> Añadido';
      btnAdd.disabled = true;
      btnVer.style.display = 'inline-flex';
    };

    form.addEventListener('submit', async (e) => {
      e.preventDefault();

      try{
        btnAdd.disabled = true;
        btnAdd.innerHTML = 'Agregando...';

        const formData = new FormData(form);
        const res = await fetch('agregar_carrito.php', { method:'POST', body: formData });
        const text = await res.text();

        if (text.trim() === '__LOGIN_REQUIRED__') {
          window.location.href = 'login.php';
          return;
        }

        if(!res.ok) throw new Error('Error al agregar');

        setAddedUI();
        actualizarContadorCarrito();
      }catch(err){
        btnAdd.disabled = false;
        btnAdd.innerHTML = 'Añadir al carrito 🛒';
        console.error(err);
      }
    });

    btnVer.addEventListener('click', (e) => {
      e.preventDefault();
      window.location.href = 'carrito.php';
    });
  });

});
</script>

<section class="productos-section">
  <div class="productos-heading">
    <span class="productos-kicker">Catálogo empresarial</span>
    <h2>PRODUCTOS DE FACTURACIÓN ELECTRÓNICA</h2>
    <p>Equipos y suministros confiables para puntos de venta, control comercial y operación diaria.</p>
  </div>

  <div class="cards">
  <?php
  if($result && $result->num_rows > 0):
    while($row = $result->fetch_assoc()):
      $img = !empty($row['imagen']) ? $row['imagen'] : 'https://via.placeholder.com/300x200?text=Sin+Imagen';
      if (!empty($row['imagen']) && strpos($row['imagen'], 'assets/img/productos/') === 0) {
        $img_path = __DIR__ . '/' . $row['imagen'];
        if (!file_exists($img_path)) {
          $img = 'https://via.placeholder.com/300x200?text=Sin+Imagen';
        }
      }
  ?>
      <div class="card card-visual producto-card">
  <div class="producto-imagen-box">
    <a href="detalle_producto.php?id=<?= $row['id'] ?>">
      <img src="<?= htmlspecialchars($img) ?>" alt="<?= htmlspecialchars($row['nombre']) ?>" class="producto-card-img">
    </a>
  </div>
  <div class="card-body producto-card-body">
          <h3 class="producto-card-text-marquee" title="<?= htmlspecialchars($row['nombre']) ?>">
            <a href="detalle_producto.php?id=<?= $row['id'] ?>" style="color:inherit;text-decoration:none;">
              <span class="producto-card-text-marquee-inner"><?= htmlspecialchars($row['nombre']) ?></span>
            </a>
          </h3>

          <p class="producto-precio"><strong>Precio: S/ <?= number_format($row['precio'],2) ?></strong></p>

          <div class="producto-card-buttons">
            <?php if ((int)$row['stock'] > 0): ?>
            <form method="post" action="agregar_carrito.php" class="form-agregar-carrito">
              <input type="hidden" name="id" value="<?= $row['id'] ?>">

              <div class="producto-meta-row">
                <input type="number" name="cantidad" value="1" min="1" max="<?= intval($row['stock']) ?>" class="input-cantidad">

                <span class="stock-info">
                  Stock: <?= intval($row['stock']) ?>
                  <button type="button" class="btn-fav" data-id="<?= $row['id'] ?>" aria-label="Favorito">
                    <span class="fav-star">★</span>
                  </button>
                </span>
              </div>

              <button type="submit" class="btn-card">Añadir al carrito 🛒</button>

              <script>
              document.addEventListener('DOMContentLoaded', function() {
                document.querySelectorAll('.btn-fav').forEach(btn => {
                  btn.addEventListener('click', function() {
                    const id = btn.getAttribute('data-id');
                    const isFav = btn.style.color === 'rgb(255, 215, 0)' || btn.style.color === '#FFD700';

                    fetch(isFav ? 'quitar_favorito.php' : 'marcar_favorito.php', {
                      method: 'POST',
                      headers: {'Content-Type': 'application/x-www-form-urlencoded'},
                      body: 'id=' + id
                    })
                    .then(res => res.text())
                    .then(txt => {
                      if(txt.trim() === 'OK') {
                        btn.style.color = isFav ? '#b8bfd1' : '#FFD700';
                      } else {
                        if(txt.trim() === 'Debes iniciar sesión') {
                          mostrarAlertaSesion();
                        } else {
                          alert('Error: ' + txt);
                        }
                      }
                    });
                  });
                });
              });
              </script>
            </form>
            <?php else: ?>
              <div class="agotado-watermark">AGOTADO</div>
            <?php endif; ?>
          </div>
        </div>
      </div>
  <?php endwhile; endif; ?>
  </div>
</section>

<?php include("includes/social.php"); ?>
<?php include("includes/footer.php"); ?>