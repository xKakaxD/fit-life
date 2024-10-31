<?php
    session_start();
    // Tempo de expiração da sessão em segundos
    $tempoExpiracao = 1800; // 30 minutos

    // Verificar se a sessão está ativa e se passou do tempo de expiração
    if (isset($_SESSION['ultima_atividade']) && (time() - $_SESSION['ultima_atividade'] > $tempoExpiracao)) {
        // Se a última atividade foi há mais de 30 minutos, destrói a sessão e redireciona para o login
        session_unset(); // Remove as variáveis de sessão
        session_destroy(); // Destrói a sessão
        header("Location: login-cadastro.php?session_expired=1");
        exit;
    }

    // Atualiza o tempo de última atividade para o momento atual
    $_SESSION['ultima_atividade'] = time();

    // Verifica se o usuário está logado
    if (!isset($_SESSION['logado']) || $_SESSION['logado'] !== true || $_SESSION['tipo_usuario'] === null) {
        header("Location: login-cadastro.php");
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

        <header> <!--Para os componentes que ficam dentro da pasta componentes no projeto o caminho deve ser pego dessa forma e alterar o arquivo-->
            <?php include_once "/xampp/htdocs/FITLIFE/fit-life/componentes/header-logado.php" ?> <!--/xampp/htdocs/FITLIFE/fit-life/componentes/..-->
        </header>

        <main>
            <div class="conteudo-logado">
                <div class="menu-logado">
                    <?php include_once "/xampp/htdocs/FITLIFE/fit-life/componentes/sidebar-menu.php"?><!--Remove o "/Freelancer" e adiciona "/fit-life"-->

                    
                </div>
                <div class="conteudo-abas">
                    <?php include_once "/xampp/htdocs/FITLIFE/fit-life/componentes/conteudo-abas.php" ?><!--Remove o "/Freelancer" e adiciona "/fit-life"-->
                </div>
            </div>
        </main>

        <footer>
            <?php include_once "/xampp/htdocs/FITLIFE/fit-life/componentes/footer.html"?>
        </footer>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const tipoUsuario = "<?php echo $tipoUsuario; ?>";

                // Exibe apenas o sidebar correto com base no tipo de usuário
                document.querySelectorAll('.abas').forEach(element => {
                    if (element.getAttribute('name') === tipoUsuario) {
                        element.style.display = 'block'; // Exibe o sidebar correto
                    } else {
                        element.style.display = 'none'; // Esconde os outros sidebars
                    }
                });

                // Configura os botões para alternar entre as abas de conteúdo
                document.querySelectorAll('.sidebar-btn').forEach(button => {
                    button.addEventListener('click', function() {
                        document.querySelectorAll('.sidebar-btn').forEach(btn => btn.classList.remove('active'));
                        this.classList.add('active');

                        // Esconde todo o conteúdo
                        document.querySelectorAll('.conteudo-abas > div').forEach(content => content.style.display = 'none');

                        // Exibe o conteúdo associado ao botão clicado
                        const target = this.getAttribute('data-target');
                        document.querySelector(target).style.display = 'block';
                    });
                });

                // Exibe o primeiro botão ativo com base no tipo de usuário
                const firstButton = document.querySelector(`.abas[name="${tipoUsuario}"] .sidebar-btn`);
                if (firstButton) {
                    firstButton.classList.add('active'); // Marca o primeiro botão como ativo
                    const target = firstButton.getAttribute('data-target'); // Pega o target do botão
                    document.querySelector(target).style.display = 'block'; // Exibe o conteúdo correto
                }
            });
        </script>
    </body>
</html>