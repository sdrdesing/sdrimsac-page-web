<?php
// Endpoint para consultas AJAX de DNI/RUC desde el frontend
header('Content-Type: application/json');


require_once __DIR__ . '/../../config/apiperu.php';
require_once __DIR__ . '/ApiPeruClient.php';

$tipo = $_GET['tipo'] ?? $_POST['tipo'] ?? '';
$numero = $_GET['numero'] ?? $_POST['numero'] ?? '';

// Cargar token correctamente desde config/apiperu.php
$config = require __DIR__ . '/../../config/apiperu.php';
$apiperu_token = $config['token'] ?? null;
if (!$apiperu_token) {
    echo json_encode(['ok' => false, 'error' => 'Token no configurado']);
    exit;
}

$api = new ApiPeruClient($apiperu_token);

if ($tipo === 'dni') {
    $result = $api->consultarDni($numero);
    error_log('DNI API result: ' . json_encode($result));
    // Adaptar la respuesta para compatibilidad con el frontend
    $ok = isset($result['success']) ? $result['success'] : ($result['ok'] ?? false);
    $data = $result['data'] ?? null;
    $error = $result['error'] ?? ($result['mensaje_api'] ?? null);
    $out = [
        'ok' => $ok,
        'data' => $data,
    ]; 
    if (!$ok) {
        $out['mensaje_api'] = $error;
    }
    echo json_encode($out);
} elseif ($tipo === 'ruc') {
    $result = $api->consultarRuc($numero);
    error_log('RUC API result: ' . json_encode($result));
    $ok = isset($result['success']) ? $result['success'] : ($result['ok'] ?? false);
    $data = $result['data'] ?? null;
    $error = $result['error'] ?? ($result['mensaje_api'] ?? null);
    $out = [
        'ok' => $ok,
        'data' => $data,
    ]; 
    if (!$ok) {
        $out['mensaje_api'] = $error;
    }
    echo json_encode($out);
} else {
    error_log('Tipo no válido o no recibido: ' . $tipo);
    echo json_encode(['ok' => false, 'error' => 'Tipo no válido']);
}
