<?php
$ch = curl_init("https://apiperu.dev/api/dni");
curl_setopt_array($ch, [
    CURLOPT_POST => true,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_HTTPHEADER => [
        "Content-Type: application/json",
        "Authorization: Bearer 291047653712ea14a2baf55e714095057fdccbe7f5a893db8d328877d259475a"
    ],
    CURLOPT_POSTFIELDS => json_encode(["dni" => "76424676"]),
]);
$response = curl_exec($ch);
$error = curl_error($ch);
curl_close($ch);

echo "<pre>";
echo "Respuesta:\n";
var_dump($response);
echo "\nError cURL:\n";
var_dump($error);
echo "</pre>";