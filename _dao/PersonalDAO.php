<?php 

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

    public function inserir($personal) {
        $sql = "INSERT INTO Personal_Trainer (id, cref, especialidade, tmp_area, descricao) 
                VALUES (?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($this->conexao, $sql);
        mysqli_stmt_bind_param($stmt, "issis", 
            $personal->setId(), 
            $personal->setCref(), 
            $personal->setEspecialidade(), 
            $personal->setTempoNaArea(), 
            $personal->setDescricao()
        );
        return mysqli_stmt_execute($stmt);
    }

    public function buscarPorId($id) {
        $sql = "SELECT * FROM Personal_Trainer WHERE id = ?";
        $stmt = mysqli_prepare($this->conexao, $sql);
        mysqli_stmt_bind_param($stmt, "i", $id);
        mysqli_stmt_execute($stmt);
        $resultado = mysqli_stmt_get_result($stmt);
        return mysqli_fetch_assoc($resultado);
    }

    public function atualizar($personal) {
        $sql = "UPDATE Personal_Trainer SET cref = ?, especialidade = ?, tmp_area = ?, descricao = ? WHERE id = ?";
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
        $sql = "DELETE FROM Personal_Trainer WHERE id = ?";
        $stmt = mysqli_prepare($this->conexao, $sql);
        mysqli_stmt_bind_param($stmt, "i", $id);
        return mysqli_stmt_execute($stmt);
    }
}

?>