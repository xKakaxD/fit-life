<?php 
require_once 'Usuario.php'; // Importando a classe Usuario
require_once 'Database.php'; //"Importa a conexão" com o banco

class UsuarioDAO {

    private $conexao;

    public function __construct() {
        $db = new Database();
        $this->conexao = $db->getConection();
    }

    public function __destruct()
    {
        $this->conexao->close();
    }

    public function inserir(Usuario $usuario) {
        $sql = "INSERT INTO Usuario (nome, email, senha, sexo, dt_nascimento, nacionalidade, endereco, tipo_usuario, foto) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($this->conexao, $sql);
        mysqli_stmt_bind_param($stmt, "sssssssss", 
            $usuario->getNome(), 
            $usuario->getEmail(), 
            $usuario->getSenha(), 
            $usuario->getSexo(), 
            $usuario->getDtNascimento(), 
            $usuario->getNacionalidade(), 
            $usuario->getEndereco(), 
            $usuario->getTipoUsuario(), 
            $usuario->getFoto()
        );
        return mysqli_stmt_execute($stmt);
    }

    public function buscarPorId($id) {
        $sql = "SELECT * FROM Usuario WHERE id = ?";
        $stmt = mysqli_prepare($this->conexao, $sql);
        mysqli_stmt_bind_param($stmt, "i", $id);
        mysqli_stmt_execute($stmt);
        $resultado = mysqli_stmt_get_result($stmt);
        return mysqli_fetch_assoc($resultado);
    }

    public function atualizar($usuario) {
        $sql = "UPDATE Usuario SET nome = ?, email = ?, senha = ?, sexo = ?, dt_nascimento = ?, nacionalidade = ?, endereco = ?, tipo_usuario = ?, foto = ? WHERE id = ?";
        $stmt = mysqli_prepare($this->conexao, $sql);
        mysqli_stmt_bind_param($stmt, "sssssssssi", 
        $usuario->getNome(),        //Getters são usados dentro do método update para acessar esses valores e salvá-los no banco
        $usuario->getEmail(),       
        $usuario->getSenha(),       
        $usuario->getSexo(),        
        $usuario->getDtNascimento(),
        $usuario->getNacionalidade(),
        $usuario->getEndereco(),     
        $usuario->getTipoUsuario(),  
        $usuario->getFoto(),        
        $usuario->getId()           
        );
        return mysqli_stmt_execute($stmt);
    }

    public function deletar($id) {
        $sql = "DELETE FROM Usuario WHERE id = ?";
        $stmt = mysqli_prepare($this->conexao, $sql);
        mysqli_stmt_bind_param($stmt, "i", $id);
        return mysqli_stmt_execute($stmt);
    }
}
?>