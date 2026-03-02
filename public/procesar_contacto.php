<?php

require_once __DIR__ . "/../config/database.php";
require_once __DIR__ . "/../config/apiperu.php";
require_once __DIR__ . "/../helpers/ApiPeruClient.php";
require_once __DIR__ . "/../models/LeadContactoModel.php";

$apiperu = require __DIR__ . "/../config/apiperu.php";

function onlyDigits(string $s): string {
    return preg_replace('/\D+/', '', $s);
}

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    http_response_code(405);
    exit("Método no permitido");
}

$tipo_doc = strtoupper(trim($_POST["tipo_doc"] ?? "")); // DNI o RUC
$doc      = onlyDigits($_POST["doc"] ?? "");
$telefono = trim($_POST["telefono"] ?? "");
$empresa  = trim($_POST["empresa"] ?? "");
$mensaje  = trim($_POST["mensaje"] ?? "");

// Validación
$errors = [];
if (!in_array($tipo_doc, ["DNI","RUC"], true)) $errors[] = "Tipo de documento inválido";
if ($tipo_doc === "DNI" && strlen($doc) !== 8) $errors[] = "DNI debe tener 8 dígitos";
if ($tipo_doc === "RUC" && strlen($doc) !== 11) $errors[] = "RUC debe tener 11 dígitos";
if (strlen(onlyDigits($telefono)) !== 9) $errors[] = "Teléfono inválido: debe tener 9 dígitos";
if ($empresa === "") $errors[] = "Empresa es obligatoria";
if ($mensaje === "") $errors[] = "Mensaje es obligatorio";

if ($errors) {
    http_response_code(422);
    exit(implode("<br>", $errors));
}

// Consultar API
$client = new ApiPeruClient($apiperu["token"]);

$apiResp = ($tipo_doc === "DNI")
    ? $client->consultarDni($doc)
    : $client->consultarRuc($doc);

$api_estado = "error";
$nombres = $apellidos = $razon_social = null;

if ($apiResp["ok"] && is_array($apiResp["data"])) {
    $data = $apiResp["data"];

    // Ajusta si tu API devuelve campos con otra estructura
    if ($tipo_doc === "DNI") {
        $nombres = $data["nombres"] ?? ($data["data"]["nombres"] ?? null);
        $ap1 = $data["apellido_paterno"] ?? ($data["data"]["apellido_paterno"] ?? null);
        $ap2 = $data["apellido_materno"] ?? ($data["data"]["apellido_materno"] ?? null);
        $apellidos = trim(($ap1 ?? "") . " " . ($ap2 ?? "")) ?: null;
    } else {
        $razon_social = $data["razon_social"] ?? ($data["data"]["razon_social"] ?? null);
    }

    $api_estado = "ok";
} else {
    $api_estado = ($apiResp["http_code"] === 404) ? "no_encontrado" : "error";
}

// Guardar en BD (aunque API falle)
$lead = [
    "tipo_doc" => $tipo_doc,
    "dni" => ($tipo_doc === "DNI") ? $doc : null,
    "ruc" => ($tipo_doc === "RUC") ? $doc : null,
    "nombres" => $nombres,
    "apellidos" => $apellidos,
    "razon_social" => $razon_social,
    "telefono" => $telefono,
    "empresa" => $empresa,
    "mensaje" => $mensaje,
    "api_estado" => $api_estado,
    "api_raw" => $apiResp["raw"],
    "ip" => $_SERVER["REMOTE_ADDR"] ?? null,
    "user_agent" => substr($_SERVER["HTTP_USER_AGENT"] ?? "", 0, 255),
];

$model = new LeadContactoModel($conn);
$ok = $model->crear($lead);

if (!$ok) {
    http_response_code(500);
    exit("No se pudo guardar en la base de datos");
}

// Redirección (o puedes responder JSON)
header("Location: contacto.php?ok=1");
exit;