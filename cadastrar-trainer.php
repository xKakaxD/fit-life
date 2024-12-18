<?php
session_start();
require_once '/xampp/htdocs/FITLIFE/fit-life/_dao/PersonalDAO.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuarioId = $_POST['usuarioId'];
    $cref = $_POST['cref'];
    $especialidade = $_POST['especialidade'];
    $tempoArea = $_POST['tempo_area'];
    $descricao = $_POST['descricao'];

    $personalDAO = new PersonalTrainerDAO();
    $personalDAO->cadastrarTreinador($usuarioId, $cref, $especialidade, $tempoArea, $descricao);

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
    <title> Cadastro Personal Trainer </title>
</head>
<body>

    <header> <!--Para os componentes que ficam dentro da pasta componentes no projeto o caminho deve ser pego dessa forma e alterar o arquivo-->
        <?php include_once "/xampp/htdocs/FITLIFE/fit-life/componentes/header.html" ?> <!--/xampp/htdocs/FITLIFE/fit-life/componentes/..-->
    </header>

    <main>
        <div class="form-container">
            <form id="ptrainer-cadastro">
                <h2>Cadastro do Personal Trainer</h2>

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
                        <label for="tempo-treino">Há Quanto Tempo Atua na Área</label>
                        <input type="text" id="tempo-treino" name="tempo-treino" required>
                    </div>
                </div>

                <!--CREF e Especialidade -->
                <div class="row">
                    <div class="form-group">
                        <label for="cref">CREF</label>
                        <input type="number" id="cref" name="cref" step="0.1" required>
                    </div>
                    <div class="form-group">
                        <label for="especialidade">Especialidade</label>
                        <input type="text" id="especialidade" name="especialidade" step="0.1" required>
                    </div>
                </div>

                <!--Descrição -->
                <div class="row">
                    <div class="form-group full-width">
                        <label for="descricao">Monte sua descrição</label>
                        <textarea id="descricao" name="descricao" rows="4" required></textarea>
                    </div>
                </div>

                <button type="submit">Cadastrar</button>
            </form>
        </div>
    </main>

    <footer>
        <?php include_once "/xampp/htdocs/FITLIFE/fit-life/componentes/footer.html"?>
    </footer>
</body>
</html>
