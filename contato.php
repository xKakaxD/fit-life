<?php
session_start();

// Tempo de expiração da sessão em segundos
$tempoExpiracao = 10; // 30 minutos

// Verificar se a sessão está ativa e se passou do tempo de expiração
if (isset($_SESSION['ultima_atividade']) && (time() - $_SESSION['ultima_atividade'] > $tempoExpiracao)) {
    // Se a última atividade foi há mais de 30 minutos, destrói a sessão e redireciona para o login com um aviso
    session_unset(); // Remove as variáveis de sessão
    session_destroy(); // Destrói a sessão
    header("Location: login-cadastro.php?session_expired=1");
    exit;
}

// Atualiza o tempo de última atividade para o momento atual se o usuário estiver logado
if (isset($_SESSION['logado']) && $_SESSION['logado'] === true) {
    $_SESSION['ultima_atividade'] = time();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/fit-life.css">
    <script src="js/sessao.js" defer></script>
    <title> FITLIFE - contato </title>
</head>
<body>
    <header> <!--Para os componentes que ficam dentro da pasta componentes no projeto o caminho deve ser pego dessa forma e alterar o arquivo-->
        <?php include_once "/xampp/htdocs/FITLIFE/fit-life/componentes/header.html" ?> <!--/xampp/htdocs/FITLIFE/fit-life/componentes/..-->
    </header>
    <main>
        <section class="contato">
            <div class="container">
                <div class="contato-texto">
                    <h2>Fale Conosco</h2>
                    <p>Entre em contato com a FITLIFE para dúvidas, sugestões ou suporte.</p>
                </div>
                <form class="formulario-contato">
                    <div class="form-group">
                        <label for="nome">Nome:</label>
                        <input type="text" id="nome" name="nome" required>
                    </div>
                    <div class="form-group">
                        <label for="email">E-mail:</label>
                        <input type="email" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label>Você é:</label>
                        <label><input type="radio" name="tipo_usuario" value="cliente" required> Cliente</label>
                        <label><input type="radio" name="tipo_usuario" value="personal" required> Personal Trainer</label>
                    </div>
                    <div class="form-group">
                        <label for="cpf">CPF:</label>
                        <input type="text" id="cpf" name="cpf" required>
                    </div>
                    <div class="form-group">
                        <label for="telefone">Telefone:</label>
                        <input type="text" id="telefone" name="telefone" required>
                    </div>
                    <div class="form-group">
                        <label for="estado">Estado:</label>
                        <select id="estado" name="estado" required>
                            <option value="">Selecione seu estado</option>
                            <option value="AC">Acre</option>
                            <option value="AL">Alagoas</option>
                            <option value="AP">Amapá</option>
                            <option value="AM">Amazonas</option>
                            <option value="BA">Bahia</option>
                            <option value="CE">Ceará</option>
                            <option value="DF">Distrito Federal</option>
                            <option value="ES">Espírito Santo</option>
                            <option value="GO">Goiás</option>
                            <option value="MA">Maranhão</option>
                            <option value="MT">Mato Grosso</option>
                            <option value="MS">Mato Grosso do Sul</option>
                            <option value="MG">Minas Gerais</option>
                            <option value="PA">Pará</option>
                            <option value="PB">Paraíba</option>
                            <option value="PR">Paraná</option>
                            <option value="PE">Pernambuco</option>
                            <option value="PI">Piauí</option>
                            <option value="RJ">Rio de Janeiro</option>
                            <option value="RN">Rio Grande do Norte</option>
                            <option value="RS">Rio Grande do Sul</option>
                            <option value="RO">Rondônia</option>
                            <option value="RR">Roraima</option>
                            <option value="SC">Santa Catarina</option>
                            <option value="SP">São Paulo</option>
                            <option value="SE">Sergipe</option>
                            <option value="TO">Tocantins</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="cidade">Cidade:</label>
                        <input type="text" id="cidade" name="cidade" required>
                    </div>
                    <div class="form-group">
                        <label for="tipo_contato">Tipo de Contato:</label>
                        <select id="tipo_contato" name="tipo_contato" required>
                            <option value="">Selecione o tipo de contato</option>
                            <option value="suporte">Suporte</option>
                            <option value="duvidas">Dúvidas</option>
                            <option value="sugestoes">Sugestões</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="assunto">Assunto:</label>
                        <input type="text" id="assunto" name="assunto" required>
                    </div>
                    <div class="form-group">
                        <label for="mensagem">Mensagem:</label>
                        <textarea id="mensagem" name="mensagem" required></textarea>
                    </div>
                    <button type="submit" class="btn-enviar-contato">Enviar</button>
                </form>
            </div>
        </section>    
    </main>
    <footer>
        <?php include_once "/xampp/htdocs/FITLIFE/fit-life/componentes/footer.html"?>
    </footer>
</body>
</html>