<?php

class ApiPeruClient
{
    private string $token;

    public function __construct(string $token)
    {
        $this->token = $token;
    }

    public function consultarDni(string $dni): array
    {
        return $this->postJson("https://apiperu.dev/api/dni", ["dni" => $dni]);
    }

    public function consultarRuc(string $ruc): array
    {
        return $this->postJson("https://apiperu.dev/api/ruc", ["ruc" => $ruc]);
    }

    private function postJson(string $url, array $payload): array
    {

        $ch = curl_init($url);
        curl_setopt_array($ch, [
            CURLOPT_POST => true,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTPHEADER => [
                "Content-Type: application/json",
                "Authorization: Bearer " . $this->token,
                "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36"
            ],
            CURLOPT_POSTFIELDS => json_encode($payload),
            CURLOPT_TIMEOUT => 20,
        ]);

        $body = curl_exec($ch);
        $err  = curl_error($ch);
        $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        // Logging detallado para depuración
        $log = [
            'url' => $url,
            'payload' => $payload,
            'http_code' => $code,
            'curl_error' => $err,
            'response' => $body,
            'timestamp' => date('Y-m-d H:i:s')
        ];
        file_put_contents(__DIR__ . '/apiperu_debug.log', print_r($log, true) . "\n---\n", FILE_APPEND);

        curl_close($ch);

        if ($body === false) {
            return [
                "ok" => false,
                "http_code" => 0,
                "error" => $err ?: "curl_error",
                "raw" => null,
                "data" => null
            ];
        }

        $json = json_decode($body, true);

        // Considerar exitosa si success=true aunque el código HTTP no sea 2xx
        $ok = ($code >= 200 && $code < 300);
        if (isset($json['success']) && $json['success'] === true) {
            $ok = true;
        }

        return [
            "ok" => $ok,
            "http_code" => $code,
            "error" => $ok ? null : ($json["message"] ?? $json["error"] ?? "http_error"),
            "raw" => $body,
            "data" => $json["data"] ?? $json
        ];
    }
}