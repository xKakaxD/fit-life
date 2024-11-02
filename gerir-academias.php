<?php
session_start();

// Conexão com o banco de dados
require_once '/xampp/htdocs/FITLIFE/fit-life/_dao/DataBase.php';
require_once '/xampp/htdocs/FITLIFE/fit-life/_dao/AcademiaDAO.php';
require_once '/xampp/htdocs/FITLIFE/fit-life/_dao/Academia.php';

$db = new Database();
$conn = $db->getConection();
$academiaDAO = new AcademiaDAO($conn);

$mensagem = "";

// Tratamento de inserção, atualização e exclusão de academias
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $rua = $_POST['rua'];
    $bairro = $_POST['bairro'];
    $numero = $_POST['numero'];
    $cep = $_POST['cep'];
    $latitude = $_POST['latitude'];
    $longitude = $_POST['longitude'];
    
    if (isset($_POST['id']) && !empty($_POST['id'])) {
        if (isset($_POST['delete'])) {
            // Deletar academia existente
            $academiaDAO->deletarAcademia($_POST['id']);
            $mensagem = "Academia deletada com sucesso!";
        } else {
            // Atualizar academia existente
            $academia = new Academia($nome, $rua, $bairro, $numero, $cep, $latitude, $longitude);
            $academia->setId($_POST['id']);
            $academiaDAO->atualizarAcademia($academia);
            $mensagem = "Academia atualizada com sucesso!";
        }
    } else {
        // Cadastrar nova academia
        $academia = new Academia($nome, $rua, $bairro, $numero, $cep, $latitude, $longitude);
        $academiaDAO->cadastrarAcademia($academia);
        $mensagem = "Academia cadastrada com sucesso!";
    }
}

// Listar academias para exibição
$academias = $academiaDAO->listarAcademias();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/fit-life.css">
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBaf9M9Dq77v7rMHGzJHL6Lp_bpAYJ7_Eo&callback=initMap" async defer></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="js/mapa.js"></script> <!-- Arquivo JS externo para o mapa -->
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }

        main {
            max-width: 900px;
            margin: 20px auto;
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #333;
        }

        form {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
        }

        form label {
            font-weight: bold;
            margin-bottom: 5px;
        }

        form input[type="text"], form input[type="hidden"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        form button {
            grid-column: span 2;
            padding: 10px;
            background-color: #ff6600;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        form button:hover {
            background-color: #e65c00;
        }

        #map {
            grid-column: span 2;
            height: 400px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        table th, table td {
            padding: 12px;
            text-align: center;
        }

        table th {
            background-color: #ff6600;
            color: white;
        }

        table tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        table tr:hover {
            background-color: #f1f1f1;
        }

        button {
            background-color: #ff6600;
            color: #fff;
            padding: 8px 12px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #e65c00;
        }
    </style>
</head>
<body>
    <header>
        <?php include_once "/xampp/htdocs/FITLIFE/fit-life/componentes/header-logado.php"?>
    </header>
    <main>
        <h1>Gerir Academias</h1>

        <?php if (!empty($mensagem)): ?>
            <p><?php echo $mensagem; ?></p>
        <?php endif; ?>

        <!-- Formulário para adicionar/editar academia -->
        <form method="POST" action="gerir-academias.php">
            <input type="hidden" id="id" name="id">
            <div>
                <label for="nome">Nome:</label>
                <input type="text" id="nome" name="nome" required>
            </div>

            <div>
                <label for="rua">Rua:</label>
                <input type="text" id="rua" name="rua" required>
            </div>

            <div>
                <label for="bairro">Bairro:</label>
                <input type="text" id="bairro" name="bairro" required>
            </div>

            <div>
                <label for="numero">Número:</label>
                <input type="text" id="numero" name="numero" required>
            </div>

            <div>
                <label for="cep">CEP:</label>
                <input type="text" id="cep" name="cep" required onblur="validarCep()">
            </div>

            <div>
                <label for="latitude">Latitude:</label>
                <input type="text" id="latitude" name="latitude" readonly>
            </div>

            <div>
                <label for="longitude">Longitude:</label>
                <input type="text" id="longitude" name="longitude" readonly>
            </div>

            <div id="map"></div>

            <button type="submit">Salvar Academia</button>
            <button type="button" onclick="limparFormulario()">Limpar</button>
            <button type="submit" name="delete" onclick="return confirm('Tem certeza que deseja excluir esta academia?')">Deletar Academia</button>
        </form>

        <h2>Lista de Academias</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Endereço</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($academias as $academia) { ?>
                    <tr>
                        <td><?php echo $academia['id']; ?></td>
                        <td><?php echo $academia['nome']; ?></td>
                        <td><?php echo $academia['rua'] . ', ' . $academia['numero'] . ' - ' . $academia['bairro'] . ', ' . $academia['cep']; ?></td>
                        <td>
                            <button onclick="editarAcademia(<?php echo htmlspecialchars(json_encode($academia)); ?>)">Editar</button>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </main>

    <footer>
        <?php include_once "/xampp/htdocs/FITLIFE/fit-life/componentes/footer.html"?>
    </footer>
</body>
</html>
