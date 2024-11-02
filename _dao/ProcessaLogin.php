<?php
session_start(); // Inicia a sessão
require_once '/xampp/htdocs/FITLIFE/fit-life/_dao/UsuarioDAO.php'; // Inclua seu DAO de usuário
require_once '/xampp/htdocs/FITLIFE/fit-life/_dao/DataBase.php'; // Acrescentou "/fit-life"

$database = new Database();
$conexao = $database->getConection();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $senha = hash('sha256', $_POST['senha']); // Criptografa a senha com SHA-256

    // Criar uma instância do DAO e buscar o usuário pelo email
    $usuarioDAO = new UsuarioDAO();
    $usuario = $usuarioDAO->buscarPorEmail($email);

    if ($usuario && $usuario['senha'] === $senha) {
        // Login bem-sucedido
        $_SESSION['logado'] = true;
        $_SESSION['id_usuario'] = $usuario['id'];
        $_SESSION['nome_usuario'] = $usuario['nome'];
        $_SESSION['tipo_usuario'] = $usuario['tipo_usuario']; // Admin, Treinador, Cliente
        $_SESSION['email'] = $usuario['email'];

        // Verificar qual o tipo de usuário e redirecionar para a página correta
        if ($usuario['tipo_usuario'] === 'Admin') {
            header("Location: ../gerir-academias.php");
            exit;
        } else {
            header("Location: ../perfil-management.php");
            exit;
        }
    } else {
        // Falha no login
        $_SESSION['erro_login'] = "Email ou senha incorretos";
        header("Location: ../login-cadastro.php");
        exit;
    }
}

// Debug temporário - para ver o que está acontecendo
if (!empty($_SESSION['erro_login'])) {
    echo $_SESSION['erro_login'];
    unset($_SESSION['erro_login']); // Limpa a mensagem de erro para não ser exibida em outras páginas
}
?>
