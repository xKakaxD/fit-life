<?php 

class Cliente {
    private $id;
    private $peso;
    private $altura;
    private $tmp_treino;
    private $lesao;
    private $pr_saude; //problema de saude
    private $habitos;

    // Getters e Setters para cada atributo
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getPeso() {
        return $this->peso;
    }

    public function setPeso($peso) {
        $this->peso = $peso;
    }

    public function getAltura() {
        return $this->altura;
    }

    public function setAltura($altura) {
        $this->altura = $altura;
    }

    public function getTempoTreino(){
        return $this->tmp_treino;
    }

    public function setTempoTreino($tmp_treino){
        $this->tmp_treino = $tmp_treino;
    }

    public function getLesao(){
        return $this->lesao;
    }

    public function setLesao($lesao){
        $this->lesao = $lesao;
    }

    public function getProblemaSaude(){
        return $this->pr_saude;
    }

    public function setProblemaSause($pr_saude){
        $this->pr_saude = $pr_saude;
    }

    public function getHabitos(){
        return $this->habitos;
    }

    public function setHabitos($habitos){
        $this->habitos = $habitos;
    }

}

?>