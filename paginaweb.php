<?php
// Iniciar sesión solo si no hay una sesión activa (evita Notice por doble session_start)
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<?php
// Intentamos cargar la conexión a la base si existe (para contar productos en carrito DB)
$dbLoaded = false;
if(file_exists(__DIR__ . '/../config/database.php')){
    try {
        require_once __DIR__ . '/../config/database.php';
        $dbLoaded = isset($conn);
    } catch(Throwable $e){
        $dbLoaded = false;
    }
}
?>

<?php include("includes/header.php"); ?>

<section class="servicios-header" style="background:#18376b; color:#fff; padding:60px 0 40px 0; text-align:center;">
    <h1 style="font-size:3rem;font-weight:700;margin-bottom:12px;">Páginas Web</h1>
    <div style="font-size:1.5rem;font-weight:500;margin-bottom:8px;">Sdrim S.A.C.</div>
    <div style="font-size:1.1rem;color:#cfd8e3;">Servicios <span style="color:#fff;">:</span> Páginas Web</div>
</section>