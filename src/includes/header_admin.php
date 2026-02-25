<?php
// Header exclusivo para el panel de administración
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel de Administración - SDRIMSAC</title>
    <link rel="stylesheet" href="../assets/css/dashboard.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
    .admin-navbar {
        background: #1a237e;
        color: #fff;
        padding: 0.5em 2em;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }
    .admin-navbar .admin-logo {
        font-weight: bold;
        font-size: 1.3em;
        letter-spacing: 1px;
        display: flex;
        align-items: center;
        gap: 10px;
    }
    .admin-navbar .admin-menu {
        display: flex;
        gap: 2em;
    }
    .admin-navbar .admin-menu a {
        color: #fff;
        text-decoration: none;
        font-weight: 500;
        transition: color .2s;
    }
    .admin-navbar .admin-menu a:hover {
        color: #ffb300;
    }
    .admin-navbar .admin-user {
        font-size: 1em;
        margin-left: 2em;
    }
    </style>
</head>
<body>
<nav class="admin-navbar">
    <div class="admin-logo">
        <img src="../assets/img/SDRIMSAC.png" alt="SDRIMSAC" style="height:36px;vertical-align:middle;"> Panel Admin
    </div>
    <div class="admin-menu">
        <a href="dashboard.php"><i class="fa-solid fa-chart-line"></i> Dashboard</a>
        <a href="productos.php"><i class="fa-solid fa-box"></i> Gestión Productos</a>
        <a href="reportes.php"><i class="fa-solid fa-file-alt"></i> Reportes</a>
        <a href="administracion.php"><i class="fa-solid fa-cogs"></i> Administración</a>
        <a href="../index.php"><i class="fa-solid fa-globe"></i> Ver Sitio</a>
        <a href="logout.php" style="color:#ff5252"><i class="fa-solid fa-sign-out-alt"></i> Salir</a>
    </div>
    <div class="admin-user">
        <?php if(isset($_SESSION['usuario'])): ?>
            <i class="fa-solid fa-user"></i> <?= htmlspecialchars($_SESSION['usuario']) ?>
        <?php endif; ?>
    </div>
</nav>
<!-- El resto del contenido del admin irá debajo -->
