<?php
class Academia {
    private $id;
    private $nome;
    private $rua;
    private $bairro;
    private $numero;
    private $cep;
    private $latitude;
    private $longitude;


    public function __construct($nome, $rua, $bairro, $numero, $cep, $latitude, $longitude) {
        $this->nome = $nome;
        $this->rua = $rua;
        $this->bairro = $bairro;
        $this->numero = $numero;
        $this->cep = $cep;
        $this->latitude = $latitude;
        $this->longitude = $longitude;
    }

    // Getters e setters
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
    public function getRua() { 
        return $this->rua; 
    }
    public function setRua($rua) { 
        $this->rua = $rua; 
    }
    public function getBairro() { 
        return $this->bairro; 
    }
    public function setBairro($bairro) { 
        $this->bairro = $bairro; 
    }
    public function getNumero() { 
        return $this->numero; 
    }
    public function setNumero($numero) { 
        $this->numero = $numero; 
    }
    public function getCep() { 
        return $this->cep; 
    }
    public function setCep($cep) { 
        $this->cep = $cep; 
    }
    public function getLatitude() { 
        return $this->latitude; 
    }
    public function setLatitude($latitude) { 
        $this->latitude = $latitude; 
    }
    public function getLongitude() { 
        return $this->longitude; 
    }
    public function setLongitude($longitude) { 
        $this->longitude = $longitude; 
    }
}
?>
