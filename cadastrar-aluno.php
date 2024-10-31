<?php
session_start();
require_once '/xampp/htdocs/FITLIFE/fit-life/_dao/ClienteDAO.php';

// Tempo de expiração da sessão em segundos
$tempoExpiracao = 60; // 1800 = 30 minutos

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
if (!isset($_SESSION['logado']) || $_SESSION['logado'] !== true || $_SESSION['tipo_usuario'] !== 'Cliente') {
    header("Location: login-cadastro.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuarioId = $_POST['usuarioId'];
    $peso = $_POST['peso'];
    $altura = $_POST['altura'];
    $tempoTreino = $_POST['tempo_treino'];
    $lesao = $_POST['lesao'];
    $problemaSaude = $_POST['problema_saude'];
    $habitos = $_POST['habitos'];

    $clienteDAO = new ClienteDAO();
    $clienteDAO->cadastrarCliente($usuarioId, $peso, $altura, $tempoTreino, $lesao, $problemaSaude, $habitos);

    header("Location: perfil-management.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/fit-life.css">
    <title> Cadastro Aluno </title>
</head>
<body>

    <header> <!--Para os componentes que ficam dentro da pasta componentes no projeto o caminho deve ser pego dessa forma e alterar o arquivo-->
        <?php include_once "/xampp/htdocs/FITLIFE/fit-life/componentes/header.html" ?> <!--/xampp/htdocs/FITLIFE/fit-life/componentes/..-->
    </header>
    
    <main>
        <div class="form-container">
            <form id="aluno-cadastro">
                <h2>Cadastro do Aluno</h2>

                <!-- Nome e Sobrenome -->
                <div class="row">
                    <div class="form-group">
                        <label for="nome">Nome</label>
                        <input type="text" id="nome" name="nome" required>
                    </div>
                    <div class="form-group">
                        <label for="sobrenome">Sobrenome</label>
                        <input type="text" id="sobrenome" name="sobrenome" required>
                    </div>
                </div>

                <!-- E-mail -->
                <div class="row">
                    <div class="form-group full-width">
                        <label for="email">E-mail</label>
                        <input type="email" id="email" name="email" required>
                    </div>
                </div>

            <!-- Endereço -->
                <div class="row">
                    <div class="form-group full-width">
                        <label for="endereco">Endereço</label>
                        <input type="text" id="endereco" name="endereco" required>
                    </div>
                </div>

                <!-- Nacionalidade e Sexo -->
                <div class="row">
                    <div class="form-group">
                        <label for="nacionalidade">Nacionalidade</label>
                        <input type="text" id="nacionalidade" name="nacionalidade" required>
                </div>
                <div class="form-group">
                    <label for="sexo">Sexo</label>
                    <select id="sexo" name="sexo" required>
                        <option value="masculino">Masculino</option>
                        <option value="feminino">Feminino</option>
                        <option value="outro">Outro</option>
                    </select>
                </div>
            </div>

                <!-- Peso e Altura -->
                <div class="row">
                    <div class="form-group">
                        <label for="peso">Peso (kg)</label>
                        <input type="number" id="peso" name="peso" step="0.1" required>
                    </div>
                    <div class="form-group">
                        <label for="altura">Altura (cm)</label>
                        <input type="number" id="altura" name="altura" step="0.1" required>
                    </div>
                </div>

                <!-- Outras informações -->
                <div class="row">
                    <div class="form-group full-width">
                        <label for="tempo-treino">Há Quanto Tempo Treina</label>
                        <input type="text" id="tempo-treino" name="tempo-treino" required>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group full-width">
                        <label for="lesao">Possui Lesão</label>
                        <select id="lesao" name="lesao" required onchange="toggleLesaoInput()">
                            <option value="" disabled selected>Escolha uma opção</option>
                            <option value="sim">Sim</option>
                            <option value="nao">Não</option>
                        </select>
                    </div>
                </div>
        
                <!-- Descrição da Lesão (inicialmente oculta) -->
                <div class="row" id="lesao-descricao" style="display: none;">
                    <div class="form-group full-width">
                        <label for="descricao-lesao">Qual lesão?</label>
                        <textarea id="descricao-lesao" name="descricao-lesao" rows="4"></textarea>
                    </div>
                </div>
        
                <div class="row">
                    <div class="form-group full-width">
                        <label for="liberacao-medica">Liberação Médica (anexar documento)</label>
                        <input type="file" id="liberacao-medica" name="liberacao-medica" accept=".pdf,.doc,.docx,.jpg,.jpeg,.png" required>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group full-width">
                        <label for="habitos">Hábitos</label>
                        <textarea id="habitos" name="habitos" rows="4" required></textarea>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group full-width">
                        <label for="senha">Senha</label>
                        <input type="password" id="senha" name="senha" required>
                    </div>
                </div>

                <button type="submit">Cadastrar</button>
            </form>
        </div>


        <script>
            function toggleLesaoInput() {
                var lesaoSelect = document.getElementById('lesao');
                var descricaoDiv = document.getElementById('lesao-descricao');
                
                if (lesaoSelect.value === 'sim') {
                    descricaoDiv.style.display = 'block';
                } else {
                    descricaoDiv.style.display = 'none';
                }
            }
        </script>
    </main>

    <footer>
        <?php include_once "/xampp/htdocs/FITLIFE/fit-life/componentes/footer.html"?>
    </footer>

</body>
</html>

      
