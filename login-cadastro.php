<?php
session_start();
if (isset($_SESSION['erro_login'])) {
    echo "<p style='color:red'>" . $_SESSION['erro_login'] . "</p>";
    unset($_SESSION['erro_login']); // Limpa a mensagem após exibir
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/fit-life.css">
    <link rel="stylesheet" href="js/app.js">
    <title> FITLIFE - conectar </title>
</head>
<body>

    <header> <!--Para os componentes que ficam dentro da pasta componentes no projeto o caminho deve ser pego dessa forma e alterar o arquivo-->
        <?php include_once "/xampp/htdocs/FITLIFE/fit-life/componentes/header.html" ?> <!--/xampp/htdocs/FITLIFE/fit-life/componentes/..-->
    </header>
    <main>
        <div class="container-co">
            <div class="content first-content">
                <div class="first-column">
                <h2 class="title title-primary">Bem Vindo!</h2>
                <p class="description description-primary">Para se manter conectado conosco</p>
                <p class="description description-primary">por favor logue com suas informações pessoais</p>
                <button id="signin" class="btn-login-cadastro btn-primary">Entrar</button>
            </div>

            <div class="second-column">
                <h2 class="title title-second">Criar conta</h2>
                <div class="social-midia">
                    <ul class="list-social-midia">
                        <a class="link-social-midia" href="#">
                            <li class="item-social-midia"><i class="fab fa-facebook-f"></i></li>
                        </a><!-- FACEBOOK -->
                        <a class="link-social-midia" href="#">
                            <li class="item-social-midia"><i class="fab fa-google"></i></li>
                        </a><!-- GOOGLE -->
                        <a class="link-social-midia" href="#">
                            <li class="item-social-midia"><i class="fab fa-linkedin-in"></i></li>
                        </a><!-- LINKEDIN -->
                    </ul>
                </div>
                <p class="description description-second">Registre-se com seu e-mail</p>                   
                    
                    </label>
                    <button class="btn-login-cadastro btn-second">Registre-se</button>
                </form>
                </div>
            </div>

        <div class="content second-content">

        <div class="first-column">
            <h2 class="title title-primary">Olá,bem vindo!</h2>
            <p class="description description-primary">Insira seu dados pessoais</p>
            <p class="description description-primary">e comece sua jornada conosco.</p>
            <button id="signup" class="btn-login-cadastro btn-primary">Registre-se</button>
        </div><!-- FIRST-COLUMN -->

        <div class="second-column">
            <h2 class="title title-second">Entre na sua conta</h2>
            <div class="social-midia">
                <ul class="list-social-midia">
                    <a class="link-social-midia" href="#">
                        <li class="item-social-midia"><i class="fab fa-facebook-f"></i></li>
                    </a><!-- FACEBOOK -->
                    <a class="link-social-midia" href="#">
                        <li class="item-social-midia"><i class="fab fa-google"></i></li>
                    </a><!-- GOOGLE -->
                    <a class="link-social-midia" href="#">
                        <li class="item-social-midia"><i class="fab fa-linkedin-in"></i></li>
                    </a><!-- LINKEDIN -->
                </ul>
            </div><!-- SOCIAL-MIDIA -->
            <p class="description description-second">Conectar-se com seu email</p>
            <form class="form" action="_dao/ProcessaLogin.php" method="POST"> <!--Provavelmente estará o caminho correto, se não possível alteração de caminho para a pasta _dao-->
                <label class="label-input icon-modify" for="email">
                    <i class="fas fa-envelope"></i>
                    <input type="email" name="email" placeholder="Email" required>
                </label>
                <label class="label-input icon-modify" for="senha">
                    <i class="fas fa-lock"></i>
                    <input type="password" name="senha" placeholder="Senha" required>
                </label>
                <a class="password" href="#">Esqueceu a senha?</a>
                <button class="btn-login-cadastro btn-second" type="submit">Entrar</button>
            </form>
        </div><!-- SECOND-COLUMN -->

        </div><!-- CONTENT SECOND-CONTENT -->

        </div><!-- CONTAINER -->

        <!-- IMPORT JAVASCRIPT -->

        <script src="js/app.js"></script>
    </main>  
    <footer>
        <?php include_once "/xampp/htdocs/FITLIFE/fit-life/componentes/footer.html"?>
    </footer>

</body>
</html>
