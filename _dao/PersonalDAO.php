<?php 
require_once 'Personal.php';
require_once 'Database.php';

class PersonalTrainerDAO {
    private $conexao;

    public function __construct() {
        $db = new Database();
        $this->conexao = $db->getConection();
    }

    public function __destruct()
    {
        $this->conexao->close();
    }

    public function cadastrarTreinador($personal) {
        $sql = "INSERT INTO Personal_Trainers (id, cref, especialidade, tmp_area, descricao) 
                VALUES (?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($this->conexao, $sql);
        mysqli_stmt_bind_param($stmt, "issis", 
            $usuarioId, 
            $cref, 
            $especialidade, 
            $tempoArea, 
            $descricao
        );
        return mysqli_stmt_execute($stmt);
    }

    public function buscarPorId($id) {
        $sql = "SELECT * FROM Personal_Trainers WHERE id = ?";
        $stmt = mysqli_prepare($this->conexao, $sql);
        mysqli_stmt_bind_param($stmt, "i", $id);
        mysqli_stmt_execute($stmt);
        $resultado = mysqli_stmt_get_result($stmt);
        return mysqli_fetch_assoc($resultado);
    }

    public function atualizar($personal) {
        $sql = "UPDATE Personal_Trainers SET cref = ?, especialidade = ?, tmp_area = ?, descricao = ? WHERE id = ?";
        $stmt = mysqli_prepare($this->conexao, $sql);
        mysqli_stmt_bind_param($stmt, "ssisi", 
            $personal->getCref(), 
            $personal->getEspecialidade(), 
            $personal->getTempoNaArea(), 
            $personal->getDescricao(),
            $personal->getId()
        );
        return mysqli_stmt_execute($stmt);
    }

    public function deletar($id) {
        $sql = "DELETE FROM Personal_Trainers WHERE id = ?";
        $stmt = mysqli_prepare($this->conexao, $sql);
        mysqli_stmt_bind_param($stmt, "i", $id);
        return mysqli_stmt_execute($stmt);
    }
}

?>