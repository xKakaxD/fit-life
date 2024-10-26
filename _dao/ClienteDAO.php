<?php 
require_once 'Cliente.php';
require_once 'Database.php';

class ClienteDAO{

    private $conexao;

    public function __construct() {
        $db = new Database();
        $this->conexao = $db->getConection();
    }

    public function __destruct()
    {
        $this->conexao->close();
    }

    public function cadastrarCliente($cliente) {
        $sql = "INSERT INTO Clientes (id, peso, altura, tmp_treino, lesao, pr_saude, habitos) 
                VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($this->conexao, $sql);
        mysqli_stmt_bind_param($stmt, "idddsss", 
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
        $sql = "SELECT * FROM Clientes WHERE id = ?";
        $stmt = mysqli_prepare($this->conexao, $sql);
        mysqli_stmt_bind_param($stmt, "i", $id);
        mysqli_stmt_execute($stmt);
        $resultado = mysqli_stmt_get_result($stmt);
        return mysqli_fetch_assoc($resultado);
    }

    public function atualizar($cliente) {
        $sql = "UPDATE Clientes SET peso = ?, altura = ?, tmp_treino = ?, lesao = ?, pr_saude = ?, habitos = ? WHERE id = ?";
        $stmt = mysqli_prepare($this->conexao, $sql);
        mysqli_stmt_bind_param($stmt, "ddssssi", 
            $cliente->getPeso(), 
            $cliente->getAltura(), 
            $cliente->getTempoTreino(), 
            $cliente->getLesao(), 
            $cliente->getProblemaSaude(), 
            $cliente->getHabitos(),
            $cliente->getId()
        );
        return mysqli_stmt_execute($stmt);
    }

    public function deletar($id) {
        $sql = "DELETE FROM Clientes WHERE id = ?";
        $stmt = mysqli_prepare($this->conexao, $sql);
        mysqli_stmt_bind_param($stmt, "i", $id);
        return mysqli_stmt_execute($stmt);
    }
}

?>