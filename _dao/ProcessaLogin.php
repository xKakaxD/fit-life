<?php
session_start(); // Inicia a sessão
require_once '/xampp/htdocs/FreeLancer/FITLIFE/_dao/UsuarioDAO.php'; // Inclua seu DAO de usuário
require_once '/xampp/htdocs/FreeLancer/FITLIFE/_dao/DataBase.php';

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
    
        // Redireciona todos os usuários para perfil-management.php
        header("Location: ../perfil-management.php");
        exit;
    } else {
        // Falha no login
        $_SESSION['erro_login'] = "Email ou senha incorretos";
        header("Location: ../login-cadastro.php");
        exit;
    }
    
}
?>
