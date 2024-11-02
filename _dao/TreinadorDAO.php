<?php
require_once 'Treinador.php';
require_once 'Database.php';

class TreinadorDAO {
    private $conexao;

    public function __construct() {
        $db = new Database();
        $this->conexao = $db->getConection();
    }

    public function __destruct() {
        $this->conexao->close();
    }

    public function cadastrarTreinador($treinador) {
        $sql = "INSERT INTO Treinadores (id, cref, especialidade, tmp_area, descricao) 
                VALUES (?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($this->conexao, $sql);
        mysqli_stmt_bind_param($stmt, "issss",
            $treinador->getId(),
            $treinador->getCref(),
            $treinador->getEspecialidade(),
            $treinador->getTempoNaArea(),
            $treinador->getDescricao()
        );
        return mysqli_stmt_execute($stmt);
    }

    public function buscarPorId($id) {
        $sql = "SELECT * FROM Treinadores WHERE id = ?";
        $stmt = mysqli_prepare($this->conexao, $sql);
        mysqli_stmt_bind_param($stmt, "i", $id);
        mysqli_stmt_execute($stmt);
        $resultado = mysqli_stmt_get_result($stmt);
        $dados = mysqli_fetch_assoc($resultado);

        if ($dados) {
            return new Treinador(
                $dados['id'],
                $dados['cref'],
                $dados['especialidade'],
                $dados['tmp_area'],
                $dados['descricao']
            );
        }

        return null; // Retorna null se não encontrar nenhum registro
    }

    public function atualizar($treinador) {
        $sql = "UPDATE Treinadores SET cref = ?, especialidade = ?, tmp_area = ?, descricao = ? WHERE id = ?";
        $stmt = mysqli_prepare($this->conexao, $sql);
        mysqli_stmt_bind_param($stmt, "ssssi",
            $treinador->getCref(),
            $treinador->getEspecialidade(),
            $treinador->getTempoNaArea(),
            $treinador->getDescricao(),
            $treinador->getId()
        );
        return mysqli_stmt_execute($stmt);
    }

    public function deletar($id) {
        $sql = "DELETE FROM Treinadores WHERE id = ?";
        $stmt = mysqli_prepare($this->conexao, $sql);
        mysqli_stmt_bind_param($stmt, "i", $id);
        return mysqli_stmt_execute($stmt);
    }
}
?>
