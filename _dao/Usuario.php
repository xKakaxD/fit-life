<?php 

class Usuario {
    private $id;
    private $nome;
    private $email;
    private $senha;
    private $sexo;
    private $dt_nascimento;
    private $nacionalidade;
    private $endereco;
    private $tipo_usuario;
    private $foto;

    // Getters e Setters para cada atributo
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getNome() {
        return $this->nome;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function getSenha() {
        return $this->senha;
    }

    public function setSenha($senha) {
        $this->senha = $senha;
    }

    public function getSexo() {
        return $this->sexo;
    }

    public function setSexo($sexo) {
        $this->sexo = $sexo;
    }

    public function getDtNascimento() {
        return $this->dt_nascimento;
    }

    public function setDtNascimento($dt_nascimento) {
        $this->dt_nascimento = $dt_nascimento;
    }

    public function getNacionalidade() {
        return $this->nacionalidade;
    }

    public function setNacionalidade($nacionalidade) {
        $this->nacionalidade = $nacionalidade;
    }

    public function getEndereco() {
        return $this->endereco;
    }

    public function setEndereco($endereco) {
        $this->endereco = $endereco;
    }

    public function getTipoUsuario() {
        return $this->tipo_usuario;
    }

    public function setTipoUsuario($tipo_usuario) {
        $this->tipo_usuario = $tipo_usuario;
    }

    public function getFoto() {
        return $this->foto;
    }

    public function setFoto($foto) {
        $this->foto = $foto;
    }
}
?>
