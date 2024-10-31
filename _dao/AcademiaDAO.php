<?php
require_once 'Academia.php';
require_once 'Database.php';

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
        $query = "INSERT INTO academias (nome, rua, bairro, numero, cep, latitude, longitude) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($this->conexao, $query);

        $nome = $academia->getNome();
        $rua = $academia->getRua();
        $bairro = $academia->getBairro();
        $numero = $academia->getNumero();
        $cep = $academia->getCep();
        $latitude = $academia->getLatitude();
        $longitude = $academia->getLongitude();

        mysqli_stmt_bind_param($stmt, "sssssss", $nome, $rua, $bairro, $numero, $cep, $latitude, $longitude);
        mysqli_stmt_execute($stmt);
    }

    public function listarAcademias() {
        $query = "SELECT * FROM academias";
        $stmt = mysqli_prepare($this->conexao, $query);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    public function atualizarAcademia(Academia $academia) {
        $query = "UPDATE academias SET nome = ?, rua = ?, bairro = ?, numero = ?, cep = ?, latitude = ?, longitude = ? WHERE id = ?";
        $stmt = mysqli_prepare($this->conexao, $query);

        $nome = $academia->getNome();
        $rua = $academia->getRua();
        $bairro = $academia->getBairro();
        $numero = $academia->getNumero();
        $cep = $academia->getCep();
        $latitude = $academia->getLatitude();
        $longitude = $academia->getLongitude();
        $id = $academia->getId();

        mysqli_stmt_bind_param($stmt, "sssssssi", $nome, $rua, $bairro, $numero, $cep, $latitude, $longitude, $id);
        mysqli_stmt_execute($stmt);
    }

    public function deletarAcademia($id) {
        $query = "DELETE FROM academias WHERE id = ?";
        $stmt = mysqli_prepare($this->conexao, $query);
        mysqli_stmt_bind_param($stmt, "i", $id);
        mysqli_stmt_execute($stmt);
    }

    // Método para vincular um cliente a uma academia
    public function vincularClienteAcademia($idCliente, $idAcademia) {
        $query = "INSERT INTO clientes_academias (id_cliente, id_academia) VALUES (?, ?)";
        $stmt = mysqli_prepare($this->conexao, $query);
        mysqli_stmt_bind_param($stmt, "ii", $idCliente, $idAcademia);
        mysqli_stmt_execute($stmt);
    }

    // Método para vincular um personal trainer a uma academia
    public function vincularPersonalAcademia($idPersonal, $idAcademia) {
        $query = "INSERT INTO personais_academias (id_personal, id_academia) VALUES (?, ?)";
        $stmt = mysqli_prepare($this->conexao, $query);
        $idPersonalVar = $idPersonal;
        $idAcademiaVar = $idAcademia;
        mysqli_stmt_bind_param($stmt, "ii", $idPersonalVar, $idAcademiaVar);
        mysqli_stmt_execute($stmt);
    }
}
?>
