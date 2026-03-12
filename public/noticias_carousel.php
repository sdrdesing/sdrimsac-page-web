<?php
// Ejemplo: obtener noticias desde la base de datos
// Reemplaza con tu propia consulta y estructura
include_once '../config/database.php';
$noticias = [];
if (isset($conn)) {
    $sql = "SELECT id, titulo, resumen, imagen FROM noticias ORDER BY fecha DESC LIMIT 20";
    $result = $conn->query($sql);
    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $noticias[] = $row;
        }
    }
}
?>
<div class="noticias-carousel">
    <div class="noticias-track">
        <?php foreach ($noticias as $noticia): ?>
        <div class="noticia-slide" style="background-image:url('<?php echo htmlspecialchars($noticia['imagen']); ?>');">
            <div class="noticia-overlay">
                <h3><?php echo htmlspecialchars($noticia['titulo']); ?></h3>
                <p><?php echo htmlspecialchars($noticia['resumen']); ?></p>
                <a href="#" class="comentar-btn" data-id="<?php echo $noticia['id']; ?>" style="display:inline-block;margin-top:10px;padding:6px 16px;background:#22396a;color:#fff;border-radius:6px;font-size:0.95em;text-decoration:none;">Comentar</a>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
    <button class="noticias-prev">&#10094;</button>
    <button class="noticias-next">&#10095;</button>
</div>
<script src="assets/js/noticias-carousel.js"></script>
<!-- Incluye el CSS en tu HTML principal -->
