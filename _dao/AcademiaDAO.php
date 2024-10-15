<?php
require_once '/xampp/htdocs/FITLIFE/fit-life/_dao/Academia.php';
require_once '/xampp/htdocs/FITLIFE/fit-life/_dao/DataBase.php';

class AcademiaDAO {
    private $conexao;

    public function __construct() {
        $db = new Database();
        $this->conexao = $db->getConection();
    }

    public function __destruct() {
        $this->conexao->close();
    }

    public function cadastrarAcademia(Academia $academia) {
        $sql = "INSERT INTO Academias (nome, rua, bairro, numero, cep, latitude, longitude) 
                VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($this->conexao, $sql);
        
        // Atribuir os valores a variáveis antes de passar ao bind_param
        $nome = $academia->getNome();
        $rua = $academia->getRua();
        $bairro = $academia->getBairro();
        $numero = $academia->getNumero();
        $cep = $academia->getCep();
        $latitude = $academia->getLatitude();
        $longitude = $academia->getLongitude();

        // Passar as variáveis para o bind_param
        mysqli_stmt_bind_param($stmt, "sssssss", 
            $nome, $rua, $bairro, $numero, $cep, $latitude, $longitude
        );

        return mysqli_stmt_execute($stmt);
    }

    public function buscarTodasAcademias() {
        $sql = "SELECT * FROM Academias";
        $result = mysqli_query($this->conexao, $sql);
        return $result;
    }
}
?>
