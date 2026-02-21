<?php 
include("includes/header.php"); 
include("config/database.php"); 
?>
<link rel="stylesheet" href="assets/css/productos/productos.css">

<!-- BANNER -->
<div class="page-banner">
    <img src="https://images.unsplash.com/photo-1556742049-0cfed4f6a45d?w=1400&q=80" alt="Tienda SDRIM">
    <div class="page-banner-overlay">
        <h1>Nuestra Tienda</h1>
        <p>Hardware y software para tu sistema de facturación electrónica</p>
    </div>
</div>

<section class="contenido">
<h2>Nuestros Productos</h2>

<div class="cards">

<?php
$sql = "SELECT * FROM productos";
$result = $conn->query($sql);

if($result->num_rows > 0){

    while($row = $result->fetch_assoc()){
?>

    <div class="card">
        <img src="<?php echo $row['imagen']; ?>" alt="<?php echo $row['nombre_producto']; ?>">
        <h3><?php echo $row['nombre_producto']; ?></h3>
        <p><?php echo $row['descripcion']; ?></p>
        <p><strong>Precio: S/ <?php echo $row['precio']; ?></strong></p>

        <!-- FORMULARIO PARA AGREGAR AL CARRITO -->
        <form method="post" action="agregar_carrito.php">
            <input type="hidden" name="id" value="<?php echo $row['id_producto']; ?>">
            <button type="submit" class="btn-card">Añadir al carrito 🛒</button>
        </form>
    </div>

<?php
    }

}else{
   
}
?>

</div>
</section>

<script>
// Enviar incrementos de vista para cada producto mostrado
document.addEventListener('DOMContentLoaded', function(){
    const cards = document.querySelectorAll('.card');
    cards.forEach(card => {
        const input = card.querySelector('input[name="id"]');
        if(input){
            const id = input.value;
            // Llamada POST silenciosa
            fetch('incrementar_vista.php', {
                method: 'POST',
                headers: {'Content-Type':'application/x-www-form-urlencoded'},
                body: 'id=' + encodeURIComponent(id)
            }).catch(()=>{});
        }
    });
});
</script>


<!-- CATEGORÍAS ADICIONALES -->
<!-- MÁS PRODUCTOS DE FACTURACIÓN ELECTRÓNICA -->
<section class="productos-section">
    <h2>PRODUCTOS DE FACTURACIÓN ELECTRÓNICA</h2>
    <div class="cards">

        <!-- Sistema de Facturación Electrónica -->
        <div class="card card-visual">
            <img src="https://encrypted-tbn3.gstatic.com/shopping?q=tbn:ANd9GcR_O169u8GnMWpRFM9KAUnSk8jBWWw8hV_tylkSkb80WOQKZkqujSPiQRKuC0ZgeEUGaw_G137AaWpbgqbs2jHFs30pK7rTbGomLiUQePD3Ts-xLYu0eLLkbv1Gv5VfRLNhSUtDjVg&usqp=CAc" alt="Sistema de Facturación Electrónica">
            <div class="card-body">
                <h3>All-in-One Lenovo IdeaCentre3 24IMB05 23.8" FHD IPS Corei3-10100T 3.0/3.8GHz 8GB DDR4-2666</h3>
                <p><strong>S/ 2,200.00</strong></p>

                <form method="post" action="agregar_carrito.php">
                    <input type="hidden" name="id_manual" value="101">
                    <input type="hidden" name="nombre_manual" value="Sistema de Facturación Electrónica SUNAT">
                    <input type="hidden" name="precio_manual" value="899.00">
                    <input type="hidden" name="imagen_manual" value="https://images.unsplash.com/photo-1554224155-6726b3ff858f?w=500&q=80">
                    <button type="submit" class="btn-card">Añadir al carrito 🛒</button>
                </form>
            </div>
        </div>

        <!-- Certificado Digital -->
        <div class="card card-visual">
            <img src="data:image/webp;base64,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" alt="Certificado Digital">
            <div class="card-body">
                <h3>Caja de 20 Rollos Papel Térmico 80mmx80mm - Contómetros</h3>

                <p><strong>Precio: S/ 110.00</strong></p>

                <form method="post" action="agregar_carrito.php">
                    <input type="hidden" name="id_manual" value="102">
                    <input type="hidden" name="nombre_manual" value="Certificado Digital Tributario">
                    <input type="hidden" name="precio_manual" value="350.00">
                    <input type="hidden" name="imagen_manual" value="https://images.unsplash.com/photo-1563986768609-322da13575f3?w=500&q=80">
                    <button type="submit" class="btn-card">Añadir al carrito 🛒</button>
                </form>
            </div>
        </div>

        <!-- Hosting para Facturación -->
        <div class="card card-visual">
            <img src="https://images.unsplash.com/photo-1544197150-b99a580bb7a8?w=500&q=80" alt="Hosting Empresarial">
            <div class="card-body">
                <h3>Caja de 20 Rollos Papel Térmico de 58x40mm - Contómetros</h3>
                
                <p><strong>Precio: S/ 75.00</strong></p>

                <form method="post" action="agregar_carrito.php">
                    <input type="hidden" name="id_manual" value="103">
                    <input type="hidden" name="nombre_manual" value="Hosting Empresarial para Facturación">
                    <input type="hidden" name="precio_manual" value="499.00">
                    <input type="hidden" name="imagen_manual" value="https://images.unsplash.com/photo-1544197150-b99a580bb7a8?w=500&q=80">
                    <button type="submit" class="btn-card">Añadir al carrito 🛒</button>
                </form>
            </div>
        </div>

        <!-- Soporte Técnico -->
        <div class="card card-visual">
            <img src="https://images.unsplash.com/photo-1581090700227-4c4f50a1d4d4?w=500&q=80" alt="Soporte Técnico">
            <div class="card-body">
                <h3>All In One Villacorp 23.8" FHD IPS Corei3 8GB, 256GB SSD M.2 - 12va Generación.</h3>
                <p><strong>Precio: SS/ 2,200.00</strong></p>

                <form method="post" action="agregar_carrito.php">
                    <input type="hidden" name="id_manual" value="104">
                    <input type="hidden" name="nombre_manual" value="Soporte Técnico Especializado">
                    <input type="hidden" name="precio_manual" value="199.00">
                    <input type="hidden" name="imagen_manual" value="https://images.unsplash.com/photo-1581090700227-4c4f50a1d4d4?w=500&q=80">
                    <button type="submit" class="btn-card">Añadir al carrito 🛒</button>
                </form>
            </div>
        </div>

    </div>
</section>
<?php include("includes/social.php"); ?>
<?php include("includes/footer.php"); ?>