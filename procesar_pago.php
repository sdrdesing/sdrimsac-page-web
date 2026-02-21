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

    // Limpiar carrito
    $conn->query("DELETE FROM carrito");
}

// Mostrar confirmación simple
include('includes/header.php');
?>

<section class="contenido">
    <h2>Pago exitoso</h2>
    <p>Gracias, <?= htmlspecialchars($usuario) ?>. Tu pago (<?= htmlspecialchars($metodo) ?>) por S/ <?= number_format($total,2) ?> se ha registrado correctamente.</p>
    <p>Recibirás un correo con los detalles (simulado). <a href="index.php">Volver al inicio</a></p>
</section>

<?php include('includes/footer.php'); ?>
