<?php
session_start();
if ($_SESSION['tipo_usuario'] !== 'Admin') {
    header("Location: login-cadastro.php");
    exit;
}
require_once '/xampp/htdocs/FITLIFE/fit-life/_dao/AcademiaDAO.php'; //escreva o path ou caminho para o academiaDAO

$mensagem = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $academia = new Academia();
    $academia->setNome($_POST['nome']);
    $academia->setRua($_POST['rua']);
    $academia->setBairro($_POST['bairro']);
    $academia->setNumero($_POST['numero']);
    $academia->setCep($_POST['cep']);
    $academia->setLatitude($_POST['latitude']);
    $academia->setLongitude($_POST['longitude']);

    $academiaDAO = new AcademiaDAO();
    if ($academiaDAO->cadastrarAcademia($academia)) {
        $mensagem = "Academia cadastrada com sucesso!";
    } else {
        $mensagem = "Erro ao cadastrar academia.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/fit-life.css">
    <title>Cadastrar Academia</title>
</head>
<body>
    <header>
        <?php include_once "/xampp/htdocs/FITLIFE/fit-life/componentes/header-logado.php"; ?> <!--/path/to/header-logado.php-->
    </header>

    <main>
        <h2>Cadastrar Academia</h2>
        <?php if (!empty($mensagem)): ?>
            <p><?php echo $mensagem; ?></p>
        <?php endif; ?>
        <form method="POST" action="">
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" required>
            <br>
            <label for="rua">Rua:</label>
            <input type="text" id="rua" name="rua" required>
            <br>
            <label for="bairro">Bairro:</label>
            <input type="text" id="bairro" name="bairro" required>
            <br>
            <label for="numero">Número:</label>
            <input type="text" id="numero" name="numero" required>
            <br>
            <label for="cep">CEP:</label>
            <input type="text" id="cep" name="cep" required>
            <br>
            <label for="latitude">Latitude:</label>
            <input type="text" id="latitude" name="latitude" required>
            <br>
            <label for="longitude">Longitude:</label>
            <input type="text" id="longitude" name="longitude" required>
            <br>
            <button type="submit">Cadastrar Academia</button>
        </form>
    </main>

    <footer>
        <?php include_once "/xampp/htdocs/FITLIFE/fit-life/componentes/footer.html"; ?> <!--/path/to/footer.html-->
    </footer>
</body>
</html>
