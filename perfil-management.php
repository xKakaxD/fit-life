<?php
session_start();
if (!isset($_SESSION['logado']) || $_SESSION['logado'] != true) {
    header("Location: login-cadastro.php"); // Redireciona para login se não for cliente
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/fit-life.css">
    <title> FITLIFE - inicial </title>
</head>
<body>

    <header>
        <?php include_once "/xampp/htdocs/FreeLancer/FITLIFE/componentes/header-logado.php"?>
    </header>

    <main>
        <div class="conteudo-logado">
            <div class="menu-logado">
                <?php include_once "/xampp/htdocs/FreeLancer/FITLIFE/componentes/sidebar-menu.php"?>

                
            </div>
            <div class="conteudo-abas">
                <?php include_once "/xampp/htdocs/FreeLancer/FITLIFE/componentes/conteudo-abas.php" ?>
            </div>
        </div>

        

        <script>
            // Verifica o tipo de usuário pela sessão (exemplo com PHP)
            const tipoUsuario = "<?php echo $_SESSION['tipo_usuario']; ?>";

            // Exibir abas e conteúdos conforme o tipo de usuário
            document.querySelectorAll('.abas, .conteudo').forEach(element => {
                if (element.getAttribute('name') === tipoUsuario) {
                    element.style.display = 'block'; // Exibe as abas e conteúdos corretos
                } else {
                    element.style.display = 'none'; // Esconde os demais
                }
            });


        </script>
    </main>

    <footer>
        <?php include_once "/xampp/htdocs/FreeLancer/FITLIFE/componentes/footer.html"?>
    </footer>