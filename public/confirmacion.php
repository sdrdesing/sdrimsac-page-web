<?php
session_start();
// Solo mostrar si hay datos de compra en sesión
if (!isset($_SESSION['codigo_pedido']) || !isset($_SESSION['pin_compra'])) {
    header('Location: index.php');
    exit;
}
$codigo_pedido = $_SESSION['codigo_pedido'];
$pin_compra = $_SESSION['pin_compra'];
$usuario = isset($_SESSION['usuario']) ? $_SESSION['usuario'] : '';
$total = isset($_SESSION['total_compra']) ? $_SESSION['total_compra'] : '';
$metodo = isset($_SESSION['metodo_pago']) ? $_SESSION['metodo_pago'] : '';
?>
<?php include('includes/header.php'); ?>

<section class="contenido">
    <h2>Pago exitoso</h2>
    <p>Gracias, <?= htmlspecialchars($usuario) ?>. Tu pago (<?= htmlspecialchars($metodo) ?>) por S/ <?= number_format($total,2) ?> se ha registrado correctamente.</p>
    <div style="background:#f7f8fc;border:2px dashed #2a2aee;padding:16px 0;margin:18px 0 18px 0;border-radius:12px;font-size:1.15em;letter-spacing:1px;max-width:340px;margin-left:auto;margin-right:auto;text-align:center;">
        <span style="color:#2a2aee;font-weight:700;">Tu código de pedido:</span><br>
        <span style="font-size:1.4em;font-weight:900;letter-spacing:2px;"> <?= htmlspecialchars($codigo_pedido) ?> </span>
        <br><span style="font-size:0.98em;color:#444;">Guárdalo y preséntalo al recoger tu producto.</span>
        <br><br>
        <span style="color:#e91e63;font-weight:700;">PIN de recogida:</span><br>
        <span style="font-size:1.4em;font-weight:900;letter-spacing:2px;"> <?= htmlspecialchars($pin_compra) ?> </span>
        <br><span style="font-size:0.98em;color:#444;">Solo con este PIN podrás recoger tu pedido.</span>
        <br><br>
        <img src="generar_qr.php?codigo=<?= urlencode($codigo_pedido) ?>&pin=<?= urlencode($pin_compra) ?>" alt="QR Pedido" style="margin:12px auto;display:block;max-width:180px;">
        <div style="text-align:center;">
            <a href="generar_qr.php?codigo=<?= urlencode($codigo_pedido) ?>&pin=<?= urlencode($pin_compra) ?>&download=1" download="qr_<?= htmlspecialchars($codigo_pedido) ?>.png" style="display:inline-block;margin-top:8px;padding:7px 18px;background:#2a2aee;color:#fff;border-radius:8px;font-weight:600;text-decoration:none;">Descargar QR</a>
        </div>
    </div>
    <p>Recibirás un correo con los detalles (simulado). <a href="index.php">Volver al inicio</a></p>
</section>

<?php include('includes/footer.php'); ?>