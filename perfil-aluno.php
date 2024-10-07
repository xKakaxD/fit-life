<?php
session_start();
if (!isset($_SESSION['logado']) || $_SESSION['tipo_usuario'] !== 'Cliente') {
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
        <div class="menu-logado">
            <div class="abas" name="Cliente">
                <ul>
                    <li>Bem-vindo, <?php echo $_SESSION['nome_usuario']; ?>!</li>
                    <li><a href="#informacoes-aluno" class="aba-selected">Informações do Aluno</a></li>
                    <li><a href="#localizar-pt-academias">Localizar Personal Trainers e Academias</a></li>
                    <li><a href="#minhas-aulas-aulas-marcadas">Minhas Aulas e Aulas Marcadas</a></li>
                    <li><a href="#termos-de-uso">Termos de Uso</a></li>
                    <li><a href="./_dao/Logout.php">Realizar Logout</a></li>
                </ul>
            </div>

            <div class="conteudo-abas" name="Cliente">
            <div id="informacoes-aluno" style='display: block;'>
                <h2>Informações do Aluno</h2>
                <form>
                    <label for="nome">Nome:</label>
                    <input type="text" id="nome" value="nome do aluno">
                    <br>
                    <label for="email">E-mail:</label>
                    <input type="text" id="email" value="email@examplo.com">
                    <br>
                    <label for="telefone">Telefone:</label>
                    <input type="tel" id="telefone" value="(31) 98117-4041">
                    <br>
                    <button type="submit">Salvar Alterações</button>        
                </form>
            </div>

            <div id="localizar-pt-academias" name="Cliente">
                <h2>Localizar Personal Trainers e Academias</h2>
                <form>
                    <label for="localizacao">Localização:</label>
                    <input type="text" id="localizacao" placeholder="Digite sua localização">
                    <br>
                    <button type="submit">Buscar</button>
                </form>
                <div class="resultado-busca">
                    <h3>Resultados da Busca</h3>
                    <ul>
                        <li>Personal Trainer 1 - 2km de distância</li>
                        <li>Academia 1 - 3km de distância</li>
                        <li>Personal Trainer 2 - 5km de distância</li>
                    </ul>
                </div>
            </div>
            <div id="minhas-aulas-aulas-marcadas" name="Cliente">
                <h2>Minhas aulas e Aulas marcadas</h2>
                <div class="minhas-aulas">
                    <h3>Minhas aulas:</h3>
                    <ul>
                        <li>Aula 1 - Segunda-feira, 10h</li>
                        <li>Aula 2 - Quarta-feira, 14h</li>
                    </ul>
                    </div>
                    <div class="aulas-marcadas">
                    <h3>Aulas Marcadas:</h3>
                    <ul>
                        <li>Aula 3 - Sexta-feira, 16h</li>
                        <li>Aula 4 - Domingo, 10h</li>
                    </ul>
                    </div>
                </div>
                <div id="termos-de-uso" name="Cliente">
                    <!-- Conteúdo da aba Termos de Uso -->
                    <h2>Termos de Uso</h2>
                    <p>Termos de uso da plataforma...</p>
                </div>
                <div id="sair" name="geral">
                    <!-- Conteúdo da aba Sair da Tela de Perfil -->
                </div>
            </div>
        </div>
        </div>

        

        <script>
            document.querySelectorAll('.abas a').forEach(function(aba) {
                aba.addEventListener('click', function(event) {
                    event.preventDefault();
                    
                    // Remove a classe 'aba-selected' de todas as abas
                    document.querySelectorAll('.abas a').forEach(function(link) {
                        link.classList.remove('aba-selected');
                    });
                    
                    // Adiciona a classe 'aba-selected' à aba clicada
                    this.classList.add('aba-selected');
                    
                    // Oculta todo o conteúdo das abas
                    document.querySelectorAll('.conteudo-abas > div').forEach(function(conteudo) {
                        conteudo.style.display = 'none';
                    });
                    
                    // Exibe o conteúdo da aba clicada
                    document.querySelector(this.getAttribute('href')).style.display = 'block';
                });
            });

        </script>
    </main>

    <footer>
        <?php include_once "/xampp/htdocs/FreeLancer/FITLIFE/componentes/footer.html"?>
    </footer>