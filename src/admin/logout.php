<?php
session_start();
unset($_SESSION['is_admin']);
session_destroy();
	include __DIR__ . '/../includes/header_admin.php';
header('Location: ../login.php'); exit;
?>
