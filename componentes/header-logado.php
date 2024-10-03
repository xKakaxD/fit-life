<?php
if (isset($_SESSION['logado'])) {
    echo "Bem-vindo, " . $_SESSION['nome_usuario']; // Exibe o nome do usuário logado
} else {
    echo "<a href='login-cadastro.php'>Login</a>";
}
?>

<div class="background-menu" name="background-menu">
    <div class="container-header" name="container-header">
        <nav>
            <div class="logo">
                <a href="index.php">FITLIFE</a> 
            </div>
            <ul class="ul-header">
                <li> <a href="index.php">Inicio</a></li>
                <li> <a href="quemsomos.php">Sobre nós</a></li>
                <li> <a href="contato.php">Contato</a></li>
                <li> <a href="./_dao/Logout.php"> <img src="img/icon-pessoa.png" alt="conectar" class="icon-conectar"></a></li>  
            </ul>
            <div class="menu-icon">
                <img src="img/menu-icon.png" alt="icon menu">
            </div>
        </nav>
    </div>
</div>