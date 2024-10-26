<?php
session_start();
require_once '/xampp/htdocs/FITLIFE/fit-life/_dao/UsuarioDAO.php';
require_once '/xampp/htdocs/FITLIFE/fit-life/_dao/DataBase.php';

$mensagem_erro = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Dados básicos do usuário
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = hash('sha256', $_POST['senha']);
    $tipoUsuario = $_POST['tipo_usuario']; // 'Cliente' ou 'Treinador'

    // Cadastrar usuário
    $usuario = new Usuario();
    $usuario->setNome($nome);
    $usuario->setEmail($email);
    $usuario->setSenha($senha);
    $usuario->setTipoUsuario($tipoUsuario);

    $usuarioDAO = new UsuarioDAO();
    $usuarioId = $usuarioDAO->cadastrarUsuario($usuario);

    if ($usuarioId) {
        // Redireciona para a tela correspondente
        if ($tipoUsuario === 'Cliente') {
            header("Location: cadastrar-aluno.php?usuarioId=$usuarioId");
        } elseif ($tipoUsuario === 'Treinador') {
            header("Location: cadastrar-trainer.php?usuarioId=$usuarioId");
        }
        exit;
    } else {
        $mensagem_erro = "Erro ao cadastrar usuário. Tente novamente.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Usuário - FITLIFE</title>
    <link rel="stylesheet" href="css/fit-life.css">
</head>
<body>
    <header>
        <?php include_once "/xampp/htdocs/FITLIFE/fit-life/componentes/header.html"; ?>
    </header>
    <main>
        <div class="form-usuario-container">
            <h2>Cadastro de Usuário</h2>
                <?php if (!empty($mensagem_erro)) { echo "<p style='color:red;'>$mensagem_erro</p>"; } ?>
            <form method="POST" action="cadastrar-usuario.php">
                <label>Nome:</label>
                <input type="text" name="nome" required>
                <label>Email:</label>
                <input type="email" name="email" required>
                <label>Senha:</label>
                <input type="password" name="senha" required>
                <label>Tipo de Usuário:</label>
                <select name="tipo_usuario" required>
                    <option value="Cliente">Cliente</option>
                    <option value="Treinador">Treinador</option>
                </select>
                <button class="btn-second" type="submit">Cadastrar</button>
            </form>
        </div>
    </main>
    <footer>
        <?php include_once "/xampp/htdocs/FITLIFE/fit-life/componentes/footer.html"; ?>
    </footer>
</body>
</html>
