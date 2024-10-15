<?php
session_start();

if (!isset($_SESSION["logado"]) || $_SESSION["logado"] != true) {
    if (basename($_SERVER['PHP_SELF']) != 'index.php') { // Verifica se não está na página de login
        header("location: index.php");
        exit;
    }
}
//pode se colocar mais validações tipo se o usuario tem um tipo definido, por exemplo caso não redirecionar sempre para a página que faça essa definição
?>
