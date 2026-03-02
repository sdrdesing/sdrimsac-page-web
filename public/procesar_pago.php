<?php
session_start();
include('../config/database.php');

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

// Incluir helper para PIN
require_once __DIR__ . '/helpers/PinHelper.php';
require_once __DIR__ . '/models/CompraModel.php';

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
        $pin = PinHelper::generarPin();
        // Guardar compra con PIN usando el modelo
        $compraModel = new CompraModel();
        $compra_id = $compraModel->registrarCompra($usuario_id, $codigo_compra, $total, null, $pin);

        // Notificación interna: marcar pedido pendiente en sesión
        $_SESSION['pedido_pendiente'] = true;
        $_SESSION['codigo_pedido'] = $codigo_compra;
        $_SESSION['pin_compra'] = $pin;
        $_SESSION['total_compra'] = $total;
        $_SESSION['metodo_pago'] = $metodo;

        // Notificación por email (simulada)
        $email = '';
        $qmail = $conn->query("SELECT email FROM usuarios WHERE id=$usuario_id LIMIT 1");
        if ($qmail && $rowmail = $qmail->fetch_assoc()) {
            $email = $rowmail['email'];
        }
        if ($email) {
            $asunto = "Tu compra en SDRIMSAC: Código $codigo_compra";
            $mensaje = "Hola $usuario,\n\nGracias por tu compra. Tu código de validación es: $codigo_compra.\n\nPIN de recogida: $pin\nTotal: S/ $total\n\nGuarda este PIN y preséntalo al recoger tu producto.\n\nSaludos,\nSDRIMSAC";
            // mail($email, $asunto, $mensaje); // Descomentar en producción
            // Para pruebas, puedes guardar el mensaje en un archivo o mostrarlo en pantalla
            file_put_contents(__DIR__.'/ultimo_mail_enviado.txt', "To: $email\nSubject: $asunto\n\n$mensaje");
        }

        // Descontar stock y actualizar vendidos antes de redirigir
        $usuario_id_pago = isset($_SESSION['usuario_id']) ? intval($_SESSION['usuario_id']) : 0;
        // LOG: Mostrar productos en el carrito antes de pagar
        $log = "\n--- Carrito antes de pagar (usuario_id: $usuario_id_pago) ---\n";
        $carrito_log = $conn->query("SELECT id_producto, cantidad FROM carrito WHERE usuario_id = $usuario_id_pago");
        if($carrito_log && $carrito_log->num_rows > 0){
            while($item = $carrito_log->fetch_assoc()){
                $log .= "Producto: " . $item['id_producto'] . " | Cantidad: " . $item['cantidad'] . "\n";
            }
        } else {
            $log .= "Carrito vacío\n";
        }
        file_put_contents(__DIR__.'/carrito_log.txt', $log, FILE_APPEND);
        $carrito = $conn->query("SELECT id_producto, cantidad FROM carrito WHERE usuario_id = $usuario_id_pago");
        $sin_stock = [];
        if($carrito && $carrito->num_rows > 0){
            while($item = $carrito->fetch_assoc()){
                $idp = intval($item['id_producto']);
                $cant = intval($item['cantidad']);
                $conn->query("UPDATE productos SET stock = GREATEST(stock - $cant, 0) WHERE id = $idp");
                $conn->query("UPDATE productos SET vendidos = vendidos + $cant WHERE id = $idp");
                $qstock = $conn->query("SELECT nombre, stock FROM productos WHERE id = $idp");
                if($qstock && $rowstock = $qstock->fetch_assoc()){
                    if(intval($rowstock['stock']) == 0){
                        $sin_stock[] = $rowstock['nombre'];
                    }
                }
            }
        }
        // Limpiar solo el carrito del usuario actual
        $conn->query("DELETE FROM carrito WHERE usuario_id = $usuario_id_pago");
        // LOG: Mostrar productos en el carrito después de pagar
        $log = "--- Carrito después de pagar (usuario_id: $usuario_id_pago) ---\n";
        $carrito_log = $conn->query("SELECT id_producto, cantidad FROM carrito WHERE usuario_id = $usuario_id_pago");
        if($carrito_log && $carrito_log->num_rows > 0){
            while($item = $carrito_log->fetch_assoc()){
                $log .= "Producto: " . $item['id_producto'] . " | Cantidad: " . $item['cantidad'] . "\n";
            }
        } else {
            $log .= "Carrito vacío\n";
        }
        file_put_contents(__DIR__.'/carrito_log.txt', $log, FILE_APPEND);
        // Registrar pago en la tabla pagos
        if ($usuario_id_pago > 0) {
            $metodo_pago = $conn->real_escape_string($metodo);
            $total_pago = $conn->real_escape_string($total);
            $codigo_pago = $conn->real_escape_string($codigo_pedido);
            $conn->query("INSERT INTO pagos (usuario_id, codigo_pago, metodo, total, fecha) VALUES ('$usuario_id_pago', '$codigo_pago', '$metodo_pago', '$total_pago', NOW())");
        }
        $_SESSION['pedido_pendiente'] = true;
        // Ahora sí redirigir
        header('Location: confirmacion.php');
        exit;
    }
    // --- FIN BLOQUE COMPRAS ---

    // Descontar stock de cada producto comprado
    // Filtrar carrito por usuario
    $usuario_id_pago = isset($_SESSION['usuario_id']) ? intval($_SESSION['usuario_id']) : 0;
    $carrito = $conn->query("SELECT id_producto, cantidad FROM carrito WHERE usuario_id = $usuario_id_pago");
    $sin_stock = [];
    if($carrito && $carrito->num_rows > 0){
        while($item = $carrito->fetch_assoc()){
            $idp = intval($item['id_producto']);
            $cant = intval($item['cantidad']);
            $conn->query("UPDATE productos SET stock = GREATEST(stock - $cant, 0) WHERE id = $idp");
                // Actualizar vendidos
                $conn->query("UPDATE productos SET vendidos = vendidos + $cant WHERE id = $idp");
            // Verificar si quedó sin stock
            $qstock = $conn->query("SELECT nombre, stock FROM productos WHERE id = $idp");
            if($qstock && $rowstock = $qstock->fetch_assoc()){
                if(intval($rowstock['stock']) == 0){
                    $sin_stock[] = $rowstock['nombre'];
                }
            }
        }
    }
    // Limpiar solo el carrito del usuario actual
    $conn->query("DELETE FROM carrito WHERE usuario_id = $usuario_id_pago");
        // Registrar pago en la tabla pagos
        if ($usuario_id_pago > 0) {
            $metodo_pago = $conn->real_escape_string($metodo);
            $total_pago = $conn->real_escape_string($total);
            $codigo_pago = $conn->real_escape_string($codigo_pedido);
            $conn->query("INSERT INTO pagos (usuario_id, codigo_pago, metodo, total, fecha) VALUES ('$usuario_id_pago', '$codigo_pago', '$metodo_pago', '$total_pago', NOW())");
        }
    // Activar notificación de pedido pendiente para el usuario
    $_SESSION['pedido_pendiente'] = true;
}