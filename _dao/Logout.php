<?php
session_start();
session_destroy(); // Destroi a sessão
header("Location: /FITLIFE/fit-life/login-cadastro.php"); // Redireciona para a página de login
exit;
?>
