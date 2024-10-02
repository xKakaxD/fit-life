<?php 

class Personal{
    private $id;
    private $cref;
    private $especialidade;
    private $tmp_area;
    private $descricao;

    // Getters e Setters para cada atributo
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getCref() {
        return $this->cref;
    }

    public function setCref($cref) {
        $this->cref = $cref;
    }

    public function getEspecialidade() {
        return $this->especialidade;
    }

    public function setEspecialidade($especialidade) {
        $this->especialidade = $especialidade;
    }

    public function getTempoNaArea() {
        return $this->tmp_area;
    }

    public function setTempoNaArea($tmp_area) {
        $this->tmp_area = $tmp_area;
    }

    public function getDescricao() {
        return $this->descricao;
    }

    public function setDescricao($descricao) {
        $this->descricao = $descricao;
    }
}
?>