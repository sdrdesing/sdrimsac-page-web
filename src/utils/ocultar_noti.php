<?php
session_start();
unset($_SESSION['pedido_pendiente']);
unset($_SESSION['codigo_pedido']);
http_response_code(200);
exit;