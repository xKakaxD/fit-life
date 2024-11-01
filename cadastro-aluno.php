<?php
session_start();

require_once '/xampp/htdocs/FITLIFE/fit-life/_dao/ClienteDAO.php';
require_once '/xampp/htdocs/FITLIFE/fit-life/_dao/UsuarioDAO.php';

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
if (!isset($_SESSION['logado']) || $_SESSION['logado'] !== true || $_SESSION['tipo_usuario'] !== 'Cliente') {
    header("Location: login-cadastro.php");
    exit;
}

$usuarioId = $_SESSION['id_usuario'];
$clienteDAO = new ClienteDAO();
$clienteData = $clienteDAO->buscarPorId($usuarioId);

// Converte o array em um objeto Cliente se encontrar os dados
if ($clienteData) {
    $cliente = new Cliente(
        $clienteData['id_usuario'], 
        $clienteData['peso'], 
        $clienteData['altura'], 
        $clienteData['tmp_treino'], 
        $clienteData['lesao'], 
        $clienteData['pr_saude'], 
        $clienteData['habitos']
    );
} else {
    $cliente = null;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $peso = $_POST['peso'];
    $altura = $_POST['altura'];
    $tempoTreino = $_POST['tempo_treino'];
    $lesao = $_POST['lesao'];
    $problemaSaude = $_POST['problema_saude'];
    $habitos = $_POST['habitos'];

    if ($cliente) {
        // Atualiza os dados do cliente
        $cliente->setPeso($peso);
        $cliente->setAltura($altura);
        $cliente->setTempoTreino($tempoTreino);
        $cliente->setLesao($lesao);
        $cliente->setProblemaSaude($problemaSaude);
        $cliente->setHabitos($habitos);
        $clienteDAO->atualizar($cliente);
    } else {
        // Cria um novo cliente
        $cliente = new Cliente($usuarioId, $peso, $altura, $tempoTreino, $lesao, $problemaSaude, $habitos);
        $clienteDAO->cadastrarCliente($cliente);
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
    <title>Cadastro Cliente</title>
</head>
<body>

    <header>
        <?php include_once "/xampp/htdocs/FITLIFE/fit-life/componentes/header.html" ?>
    </header>

    <main>
        <div class="form-container">
            <form id="cliente-cadastro" method="POST" action="">
                <h2>Cadastro do Cliente</h2>

                <!-- Nome -->
                <div class="row">
                    <div class="form-group full-width">
                        <label for="nome">Nome</label>
                        <input type="text" id="nome" name="nome" value="<?php echo $usuario['nome'] ?? ''; ?>" required>
                    </div>
                </div>

                <!-- E-mail -->
                <div class="row">
                    <div class="form-group full-width">
                        <label for="email">E-mail</label>
                        <input type="email" id="email" name="email" value="<?php echo $usuario['email'] ?? ''; ?>" required>
                    </div>
                </div>

                <!-- Peso e Altura -->
                <div class="row">
                    <div class="form-group">
                        <label for="peso">Peso (kg)</label>
                        <input type="number" id="peso" name="peso" value="<?php echo $cliente ? $cliente->getPeso() : ''; ?>" step="0.1" required>
                    </div>
                    <div class="form-group">
                        <label for="altura">Altura (cm)</label>
                        <input type="number" id="altura" name="altura" value="<?php echo $cliente ? $cliente->getAltura() : ''; ?>" step="0.1" required>
                    </div>
                </div>

                <!-- Tempo de Treino -->
                <div class="row">
                    <div class="form-group full-width">
                        <label for="tempo_treino">Há Quanto Tempo Treina</label>
                        <input type="text" id="tempo_treino" name="tempo_treino" value="<?php echo $cliente ? $cliente->getTempoTreino() : ''; ?>" required>
                    </div>
                </div>

                <!-- Lesão -->
                <div class="row">
                    <div class="form-group full-width">
                        <label for="lesao">Possui Lesão</label>
                        <select id="lesao" name="lesao" required>
                            <option value="sim" <?php echo ($cliente && $cliente->getLesao() === 'sim') ? 'selected' : ''; ?>>Sim</option>
                            <option value="nao" <?php echo ($cliente && $cliente->getLesao() === 'nao') ? 'selected' : ''; ?>>Não</option>
                        </select>
                    </div>
                </div>

                <!-- Problema de Saúde -->
                <div class="row">
                    <div class="form-group full-width">
                        <label for="problema_saude">Problemas de Saúde</label>
                        <textarea id="problema_saude" name="problema_saude" rows="4"><?php echo $cliente ? $cliente->getProblemaSaude() : ''; ?></textarea>
                    </div>
                </div>

                <!-- Hábitos -->
                <div class="row">
                    <div class="form-group full-width">
                        <label for="habitos">Hábitos</label>
                        <textarea id="habitos" name="habitos" rows="4"><?php echo $cliente ? $cliente->getHabitos() : ''; ?></textarea>
                    </div>
                </div>

                <button type="submit">Salvar</button>
            </form>
        </div>
    </main>

    <footer>
        <?php include_once "/xampp/htdocs/FITLIFE/fit-life/componentes/footer.html" ?>
    </footer>
</body>
</html>
