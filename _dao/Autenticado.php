<?php
session_start();

if (!isset($_SESSION["logado"]) || $_SESSION["logado"] != true) {
    if (basename($_SERVER['PHP_SELF']) != 'index.php') { // Verifica se não está na página de login
        header("location: index.php");
        exit;
    }
}

?>
