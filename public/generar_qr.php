<?php
require_once __DIR__ . '/../vendor/autoload.php';

use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;
use Endroid\QrCode\ErrorCorrectionLevel\ErrorCorrectionLevelHigh;


$url = $_GET['url'] ?? '';
$codigo = $_GET['codigo'] ?? '';
$pin = $_GET['pin'] ?? '';

if ($url) {
    // Generar QR de la URL
    $qr = QrCode::create($url)
        ->setErrorCorrectionLevel(new ErrorCorrectionLevelHigh());
    $result = (new PngWriter())->write($qr);
    header('Content-Type: image/png');
    echo $result->getString();
    exit;
}

if ($codigo && $pin) {
    $data = "Pedido: $codigo\nPIN: $pin";
    $qr = QrCode::create($data)
        ->setErrorCorrectionLevel(new ErrorCorrectionLevelHigh());
    $result = (new PngWriter())->write($qr);
    header('Content-Type: image/png');
    echo $result->getString();
    exit;
}

http_response_code(400);
echo 'Faltan datos para generar el QR.';
exit;