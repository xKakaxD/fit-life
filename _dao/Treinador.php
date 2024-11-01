<?php 

class Treinador {
    private $usuarioId;
    private $cref;
    private $especialidade;
    private $tmp_area;
    private $descricao;

    // Construtor
    public function __construct($usuarioId, $cref, $especialidade, $tmp_area, $descricao) {
        $this->usuarioId = $usuarioId;
        $this->cref = $cref;
        $this->especialidade = $especialidade;
        $this->tmp_area = $tmp_area;
        $this->descricao = $descricao;
    }

    // Getters para cada atributo
    public function getId() {
        return $this->usuarioId;
    }

    public function getCref() {
        return $this->cref;
    }

    public function getEspecialidade() {
        return $this->especialidade;
    }

    public function getTempoNaArea() {
        return $this->tmp_area;
    }

    public function getDescricao() {
        return $this->descricao;
    }

    // Setters para cada atributo (adicionados para permitir a atualização)
    public function setCref($cref) {
        $this->cref = $cref;
    }

    public function setEspecialidade($especialidade) {
        $this->especialidade = $especialidade;
    }

    public function setTempoNaArea($tmp_area) {
        $this->tmp_area = $tmp_area;
    }

    public function setDescricao($descricao) {
        $this->descricao = $descricao;
    }
}
?>
