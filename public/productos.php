<?php 
include("includes/header.php"); 
include(__DIR__ . "/../config/database.php"); 
?>
<link rel="stylesheet" href="assets/css/productos.css">

<!-- BANNER -->
<div class="page-banner">
    <img src="https://images.unsplash.com/photo-1556742049-0cfed4f6a45d?w=1400&q=80" alt="Tienda SDRIM">
    <div class="page-banner-overlay">
        <h1>Nuestra Tienda</h1>
        <p>Hardware y software para tu sistema de facturación electrónica</p>
    </div>
</div>

<!-- PAGINACIÓN -->
<?php
// Paginación
$productosPorPagina = 8;
$totalProductos = $conn->query("SELECT COUNT(*) as total FROM productos")->fetch_assoc()['total'];
$totalPaginas = ceil($totalProductos / $productosPorPagina);
$paginaActual = isset($_GET['pagina']) ? max(1, intval($_GET['pagina'])) : 1;
$offset = ($paginaActual - 1) * $productosPorPagina;
$sql = "SELECT * FROM productos LIMIT $offset, $productosPorPagina";
$result = $conn->query($sql);
?>

<nav class="paginacion">
  <?php if($paginaActual > 1): ?>
    <a href="?pagina=<?php echo $paginaActual-1; ?>" class="paginacion-btn">&laquo; Anterior</a>
  <?php endif; ?>
  <?php for($i=1; $i<=$totalPaginas; $i++): ?>
    <a href="?pagina=<?php echo $i; ?>" class="paginacion-btn <?php if($i==$paginaActual) echo 'activa'; ?>"> <?php echo $i; ?> </a>
  <?php endfor; ?>
  <?php if($paginaActual < $totalPaginas): ?>
    <a href="?pagina=<?php echo $paginaActual+1; ?>" class="paginacion-btn">Siguiente &raquo;</a>
  <?php endif; ?>
</nav>



<script>
document.addEventListener('DOMContentLoaded', function(){
    // Incrementar vista
    const cards = document.querySelectorAll('.card');
    cards.forEach(card => {
        const input = card.querySelector('input[name="id"]');
        if(input){
            const id = input.value;
            fetch('incrementar_vista.php', {
                method: 'POST',
                headers: {'Content-Type':'application/x-www-form-urlencoded'},
                body: 'id=' + encodeURIComponent(id)
            }).catch(()=>{});
        }
    });

    // AJAX para agregar al carrito y mostrar botón Ver carrito
    document.querySelectorAll('.form-agregar-carrito').forEach(form => {
        const btnAdd = form.querySelector('.btn-card');
        const btnVer = form.querySelector('.btn-ver-carrito');
        btnAdd.addEventListener('click', function(){
            const formData = new FormData(form);
            fetch('agregar_carrito.php', {
                method: 'POST',
                body: formData
            }).then(res => res.ok ? res.text() : Promise.reject()).then(() => {
                btnAdd.style.display = 'none';
                btnVer.style.display = 'inline-block';
            });
        });
        btnVer.addEventListener('click', function(){
            window.location.href = 'carrito.php';
        });
    });
});
</script>





<script>
document.addEventListener('DOMContentLoaded', () => {

  // 1) Manejo para las cards del loop (ya tienes btnAdd y btnVer)
  document.querySelectorAll('.form-agregar-carrito').forEach(form => {
    if (form.dataset.ready === "1") return; // evita doble listener
    form.dataset.ready = "1";

    const btnAdd = form.querySelector('.btn-card');
    const btnVer = form.querySelector('.btn-ver-carrito');

    const setAddedUI = () => {
      // Convertir "Añadir" en "Añadido ✓"
      btnAdd.classList.add('is-added');
      btnAdd.innerHTML = '<i class="fa-solid fa-check"></i> Añadido';
      btnAdd.disabled = true;

      // Mostrar botón Ver carrito
      if (btnVer) btnVer.style.display = 'inline-flex';
    };

    btnAdd.addEventListener('click', async () => {
      try{
        btnAdd.disabled = true;
        btnAdd.innerHTML = 'Agregando...';

        const formData = new FormData(form);
        const res = await fetch('agregar_carrito.php', { method:'POST', body: formData });

        if(!res.ok) throw new Error('Error al agregar');

        setAddedUI();
      }catch(e){
        btnAdd.disabled = false;
        btnAdd.innerHTML = '<i class="fa-solid fa-cart-plus"></i> Añadir al carrito';
        console.error(e);
      }
    });

    if (btnVer){
      btnVer.addEventListener('click', () => {
        window.location.href = 'carrito.php';
      });
    }
  });

  // 2) Para los forms que NO tienen btn-ver-carrito (segunda sección)
  //    No tocamos tu HTML: creamos el botón "Ver carrito" con JS.
  document.querySelectorAll('form[action="agregar_carrito.php"]').forEach(form => {
    // Si ya es .form-agregar-carrito, ya lo manejamos arriba
    if (form.classList.contains('form-agregar-carrito')) return;
    if (form.dataset.ready === "1") return;
    form.dataset.ready = "1";

    const btnAdd = form.querySelector('.btn-card, button[type="submit"]');
    if (!btnAdd) return;

    // Creamos botón "Ver carrito" al lado sin tocar tu HTML
    const btnVer = document.createElement('button');
    btnVer.type = 'button';
    btnVer.className = 'btn-ver-carrito';
    btnVer.innerHTML = '<i class="fa-solid fa-check"></i> Añadido &nbsp; <span style="font-weight:600; color:#2e8bff;">|</span> &nbsp; Ver carrito';
    btnVer.style.marginLeft = '10px';
    btnAdd.insertAdjacentElement('afterend', btnVer);

    const setAddedUI = () => {
      btnAdd.classList.add('is-added');
      btnAdd.innerHTML = '<i class="fa-solid fa-check"></i> Añadido';
      btnAdd.disabled = true;
      btnVer.style.display = 'inline-flex';
    };

    // Interceptamos submit (para que no recargue)
    form.addEventListener('submit', async (e) => {
      e.preventDefault();
      try{
        btnAdd.disabled = true;
        btnAdd.innerHTML = 'Agregando...';

        const formData = new FormData(form);
        const res = await fetch('agregar_carrito.php', { method:'POST', body: formData });

        if(!res.ok) throw new Error('Error al agregar');

        setAddedUI();
      }catch(err){
        btnAdd.disabled = false;
        // si tu botón tenía emoji, lo dejamos
        btnAdd.innerHTML = 'Añadir al carrito 🛒';
        console.error(err);
      }
    });

    btnVer.addEventListener('click', () => {
      window.location.href = 'carrito.php';
    });
  });

});
</script>

<!-- CATEGORÍAS ADICIONALES -->
<!-- MÁS PRODUCTOS DE FACTURACIÓN ELECTRÓNICA (DINÁMICO) -->
<section class="productos-section">
  <h2>PRODUCTOS DE FACTURACIÓN ELECTRÓNICA</h2>
  <div class="cards">
  <?php
  // Mostrar todos los productos de la base de datos en tarjetas
  $res = $conn->query("SELECT * FROM productos ORDER BY id DESC");
  if($res && $res->num_rows > 0):
    while($row = $res->fetch_assoc()):
      $img = !empty($row['imagen']) ? $row['imagen'] : 'https://via.placeholder.com/300x200?text=Sin+Imagen';
  ?>
    <div class="card card-visual">
      <img src="<?= htmlspecialchars($img) ?>" alt="<?= htmlspecialchars($row['nombre']) ?>" class="producto-card-img">
      <div class="card-body">
        <h3><?= htmlspecialchars($row['nombre']) ?></h3>
        <p><?= htmlspecialchars($row['descripcion']) ?></p>
        <p><strong>Precio: S/ <?= number_format($row['precio'],2) ?></strong></p>
        <form method="post" action="agregar_carrito.php">
          <input type="hidden" name="id" value="<?= $row['id'] ?>">
                    <input type="number" name="cantidad" value="1" min="1" max="<?= intval($row['stock']) ?>" class="input-cantidad" style="width:60px; margin-right:8px; border-radius:6px; border:1px solid #bcd; padding:6px 10px; font-size:1.1em; text-align:center; box-shadow:0 1px 3px #0001; transition:border-color .2s; outline:none;">
          <button type="submit" class="btn-card">Añadir al carrito 🛒</button>
        </form>
      </div>
    </div>
  <?php endwhile; endif; ?>
  </div>
</section>
<?php include("includes/social.php"); ?>
<?php include("includes/footer.php"); ?>