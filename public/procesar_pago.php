<?php
session_start();
include('config/database.php');

// Ensure user is logged
if(!isset($_SESSION['usuario'])){
    header('Location: register.php?next=checkout.php');
    exit;
}

if($_SERVER['REQUEST_METHOD'] !== 'POST'){
    header('Location: carrito.php');
    exit;
}

$metodo = isset($_POST['metodo']) ? $_POST['metodo'] : 'desconocido';
$total = isset($_POST['total']) ? floatval($_POST['total']) : 0;

// Simular procesamiento: en un sistema real integrar gateway (Stripe, PayPal, Culqi, etc.)
// Aquí registramos la orden mínima y limpiamos carrito

$usuario = $_SESSION['usuario'];

// Guardar orden simple en tabla `ordenes` si existe (no obligatorio)
if($conn){
    $cliente = $conn->real_escape_string($usuario);
    $met = $conn->real_escape_string($metodo);
    $t = $conn->real_escape_string($total);
    $conn->query("CREATE TABLE IF NOT EXISTS ordenes (
        id INT AUTO_INCREMENT PRIMARY KEY,
        cliente VARCHAR(150),
        metodo VARCHAR(60),
        total DECIMAL(10,2),
        creado TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;");



    $conn->query("INSERT INTO ordenes (cliente,metodo,total) VALUES ('$cliente','$met','$t')");
    $order_id = $conn->insert_id;
    $codigo_pedido = 'PED' . str_pad($order_id, 6, '0', STR_PAD_LEFT);
    // Guardar el código de pedido en la sesión para mostrarlo en la notificación
    $_SESSION['codigo_pedido'] = $codigo_pedido;

    // --- GUARDAR EN TABLA COMPRAS PARA VALIDACIÓN ADMIN ---
    // Obtener el id del usuario
    $usuario_id = 0;
    $q = $conn->query("SELECT id FROM usuarios WHERE nombre='$cliente' LIMIT 1");
    if ($q && $row = $q->fetch_assoc()) {
        $usuario_id = intval($row['id']);
    }
    // Insertar solo si se encontró el usuario
    if ($usuario_id > 0) {
        $codigo_compra = $codigo_pedido; // Usa el mismo código generado
        $sql = "INSERT INTO compras (usuario_id, codigo_compra, total) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("isd", $usuario_id, $codigo_compra, $total);
        $stmt->execute();

        // Notificación interna: marcar pedido pendiente en sesión
        $_SESSION['pedido_pendiente'] = true;
        $_SESSION['codigo_pedido'] = $codigo_compra;

        // Notificación por email (simulada)
        $email = '';
        $qmail = $conn->query("SELECT email FROM usuarios WHERE id=$usuario_id LIMIT 1");
        if ($qmail && $rowmail = $qmail->fetch_assoc()) {
            $email = $rowmail['email'];
        }
        if ($email) {
            $asunto = "Tu compra en SDRIMSAC: Código $codigo_compra";
            $mensaje = "Hola $usuario,\n\nGracias por tu compra. Tu código de validación es: $codigo_compra.\n\nTotal: S/ $total\n\nGuarda este código y preséntalo al recoger tu producto.\n\nSaludos,\nSDRIMSAC";
            // mail($email, $asunto, $mensaje); // Descomentar en producción
            // Para pruebas, puedes guardar el mensaje en un archivo o mostrarlo en pantalla
                file_put_contents(__DIR__.'/../logs/ultimo_mail_enviado.txt', "To: $email\nSubject: $asunto\n\n$mensaje");
        }
    }
    // --- FIN BLOQUE COMPRAS ---

    // Descontar stock de cada producto comprado
    $carrito = $conn->query("SELECT id_producto, cantidad FROM carrito");
    $sin_stock = [];
    if($carrito && $carrito->num_rows > 0){
        while($item = $carrito->fetch_assoc()){
            $idp = intval($item['id_producto']);
            $cant = intval($item['cantidad']);
            $conn->query("UPDATE productos SET stock = GREATEST(stock - $cant, 0) WHERE id = $idp");
            // Verificar si quedó sin stock
            $qstock = $conn->query("SELECT nombre, stock FROM productos WHERE id = $idp");
            if($qstock && $rowstock = $qstock->fetch_assoc()){
                if(intval($rowstock['stock']) == 0){
                    $sin_stock[] = $rowstock['nombre'];
                }
            }
        }
    }
    // Limpiar carrito
    $conn->query("DELETE FROM carrito");
    // Activar notificación de pedido pendiente para el usuario
    $_SESSION['pedido_pendiente'] = true;
}

// Mostrar confirmación simple
include('includes/header.php');
?>


<section class="contenido">
    <h2>Pago exitoso</h2>
    <p>Gracias, <?= htmlspecialchars($usuario) ?>. Tu pago (<?= htmlspecialchars($metodo) ?>) por S/ <?= number_format($total,2) ?> se ha registrado correctamente.</p>
    <div style="background:#f7f8fc;border:2px dashed #2a2aee;padding:16px 0;margin:18px 0 18px 0;border-radius:12px;font-size:1.15em;letter-spacing:1px;max-width:340px;margin-left:auto;margin-right:auto;text-align:center;">
        <span style="color:#2a2aee;font-weight:700;">Tu código de pedido:</span><br>
        <span style="font-size:1.4em;font-weight:900;letter-spacing:2px;"> <?= htmlspecialchars($codigo_pedido) ?> </span>
        <br><span style="font-size:0.98em;color:#444;">Guárdalo y preséntalo al recoger tu producto.</span>
    </div>
    <?php if(!empty($sin_stock)): ?>
        <div style="background:#ffeaea;color:#b30000;padding:14px 18px;border-radius:8px;margin:18px 0 10px 0;font-weight:600;">
            <span>¡Atención!</span> Los siguientes productos se han quedado sin stock:<br>
            <?= htmlspecialchars(implode(', ', $sin_stock)) ?>
        </div>
    <?php endif; ?>
    <p>Recibirás un correo con los detalles (simulado). <a href="index.php">Volver al inicio</a></p>
</section>

<?php include('includes/footer.php'); ?>
