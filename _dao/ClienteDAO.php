<?php 
require_once 'Cliente.php';
require_once 'Database.php';

class ClienteDAO {

    private $conexao;

    public function __construct() {
        $db = new Database();
        $this->conexao = $db->getConection();
    }

    public function __destruct() {
        $this->conexao->close();
    }

    public function cadastrarCliente($cliente) {
        // SQL para inserir um cliente
        $sql = "INSERT INTO Clientes (id_usuario, peso, altura, tmp_treino, lesao, pr_saude, habitos) 
                VALUES (?, ?, ?, ?, ?, ?, ?)";

        $stmt = mysqli_prepare($this->conexao, $sql);

        // Pegando os dados do cliente usando os getters
        $usuarioId = $cliente->getId();
        $peso = $cliente->getPeso();
        $altura = $cliente->getAltura();
        $tempoTreino = $cliente->getTempoTreino();
        $lesao = $cliente->getLesao();
        $problemaSaude = $cliente->getProblemaSaude();
        $habitos = $cliente->getHabitos();

        // Corrigido o tipo dos parâmetros
        mysqli_stmt_bind_param($stmt, "idsssss", 
            $usuarioId, 
            $peso, 
            $altura, 
            $tempoTreino, 
            $lesao, 
            $problemaSaude, 
            $habitos
        );

        return mysqli_stmt_execute($stmt);
    }

    public function buscarPorId($id) {
        // SQL para buscar um cliente pelo ID
        $sql = "SELECT * FROM Clientes WHERE id_usuario = ?";
        $stmt = mysqli_prepare($this->conexao, $sql);
        mysqli_stmt_bind_param($stmt, "i", $id);
        mysqli_stmt_execute($stmt);
        $resultado = mysqli_stmt_get_result($stmt);
        return mysqli_fetch_assoc($resultado);
    }

    public function atualizar($cliente) {
        // SQL para atualizar os dados de um cliente
        $sql = "UPDATE Clientes SET peso = ?, altura = ?, tmp_treino = ?, lesao = ?, pr_saude = ?, habitos = ? WHERE id_usuario = ?";
        $stmt = mysqli_prepare($this->conexao, $sql);

        // Pegando os dados do cliente usando os getters
        $peso = $cliente->getPeso();
        $altura = $cliente->getAltura();
        $tempoTreino = $cliente->getTempoTreino();
        $lesao = $cliente->getLesao();
        $problemaSaude = $cliente->getProblemaSaude();
        $habitos = $cliente->getHabitos();
        $usuarioId = $cliente->getId();

        // Corrigido o tipo dos parâmetros
        mysqli_stmt_bind_param($stmt, "sssssi", 
            $peso, 
            $altura, 
            $tempoTreino, 
            $lesao, 
            $problemaSaude, 
            $habitos,
            $usuarioId
        );

        return mysqli_stmt_execute($stmt);
    }

    public function deletar($id) {
        // SQL para deletar um cliente pelo ID
        $sql = "DELETE FROM Clientes WHERE id_usuario = ?";
        $stmt = mysqli_prepare($this->conexao, $sql);
        mysqli_stmt_bind_param($stmt, "i", $id);
        return mysqli_stmt_execute($stmt);
    }
}

?>