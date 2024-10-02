<?php

class Database 
{
    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "fit_life";
    private $conexao = null; 

    public function __construct()
    {          
        $this->conect();
    }

    public function getConection()
    {
        return $this->conexao;
    }

    private function conect() 
    {
        $this->conexao = mysqli_connect(
                  $this->host, 
                  $this->username, 
                  $this->password, 
                  $this->database
        );

        if (!$this->conexao) {
            die("Connection failed: " . mysqli_connect_error());
        }
    }

    public function closeConnection()
    {
        // Fecha a conexão (definindo como null) apenas se houver conexao aberta
        if ($this->conexao) {
            mysqli_close($this->conexao);
            $this->conexao = null;
        }
    }
}

?>