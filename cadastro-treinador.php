<?php
session_start();

require_once '/xampp/htdocs/FITLIFE/fit-life/_dao/TreinadorDAO.php';
require_once '/xampp/htdocs/FITLIFE/fit-life/_dao/UsuarioDAO.php';

if (!isset($_SESSION['logado']) || $_SESSION['logado'] !== true || $_SESSION['tipo_usuario'] !== 'Treinador') {
    header("Location: login-cadastro.php");
    exit;
}

$usuarioId = $_SESSION['id_usuario'];
$treinadorDAO = new TreinadorDAO();
$usuarioDAO = new UsuarioDAO();
$treinador = $treinadorDAO->buscarPorId($usuarioId);
$usuario = $usuarioDAO->buscarPorId($usuarioId);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $email = $_POST['email'];

    // Atualizar Nome e Email do usuário caso tenham sido alterados
    if ($usuario['nome'] !== $nome || $usuario['email'] !== $email) {
        $usuarioAtualizado = new Usuario();
        $usuarioAtualizado->setId($usuarioId);
        $usuarioAtualizado->setNome($nome);
        $usuarioAtualizado->setEmail($email);
        $usuarioDAO->atualizar($usuarioAtualizado);
    }

    // Dados específicos do Treinador
    $cref = $_POST['cref'];
    $especialidade = $_POST['especialidade'];
    $tempoArea = $_POST['tempo_area'];
    $descricao = $_POST['descricao'];

    if ($treinador) {
        // Atualiza o registro existente
        $treinador->setCref($cref);
        $treinador->setEspecialidade($especialidade);
        $treinador->setTempoNaArea($tempoArea);
        $treinador->setDescricao($descricao);
        $treinadorDAO->atualizar($treinador);
    } else {
        // Cria um novo registro
        $treinador = new Treinador($usuarioId, $cref, $especialidade, $tempoArea, $descricao);
        $treinadorDAO->cadastrarTreinador($treinador);
    }

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
    <script src="js/sessao.js" defer></script>
    <title>Cadastro Treinador</title>
</head>
<body>
    <header>
        <?php include_once "/xampp/htdocs/FITLIFE/fit-life/componentes/header.html"; ?>
    </header>
    <main>
        <div class="form-container">
            <form id="trainer-cadastro" method="POST" action="">
                <h2>Cadastro do Treinador</h2>
                <label>Nome:</label>
                <input type="text" name="nome" value="<?php echo $usuario['nome'] ?? ''; ?>" required>
                <label>E-mail:</label>
                <input type="email" name="email" value="<?php echo $usuario['email'] ?? ''; ?>" required>
                <label>CREF:</label>
                <input type="text" name="cref" value="<?php echo $treinador ? $treinador->getCref() : ''; ?>" required>
                <label>Especialidade:</label>
                <input type="text" name="especialidade" value="<?php echo $treinador ? $treinador->getEspecialidade() : ''; ?>" required>
                <label>Tempo na Área:</label>
                <input type="text" name="tempo_area" value="<?php echo $treinador ? $treinador->getTempoNaArea() : ''; ?>" required>
                <label>Descrição:</label>
                <textarea name="descricao" required><?php echo $treinador ? $treinador->getDescricao() : ''; ?></textarea>
                <button type="submit">Salvar</button>
            </form>
        </div>
    </main>
    <footer>
        <?php include_once "/xampp/htdocs/FITLIFE/fit-life/componentes/footer.html"; ?>
    </footer>
</body>
</html>
