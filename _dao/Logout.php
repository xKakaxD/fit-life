<?php
session_start();
session_destroy(); // Destroi a sessão
header("Location: /FreeLancer/FITLIFE/login-cadastro.php"); // Redireciona para a página de login
exit;
?>
