<?php
session_start();

// Tempo de expiração da sessão em segundos
$tempoExpiracao = 1800; // 30 minutos

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
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/fit-life.css">
    <title> FITLIFE - sobre nós </title>
</head>
<body>
    <header> <!--Para os componentes que ficam dentro da pasta componentes no projeto o caminho deve ser pego dessa forma e alterar o arquivo-->
        <?php include_once "/xampp/htdocs/FITLIFE/fit-life/componentes/header.html" ?> <!--/xampp/htdocs/FITLIFE/fit-life/componentes/..-->
    </header>
    <main>
        <section class="sobre-nos">
            <div class="container">
                <h1>Quem Somos</h1>
                <p>Bem-vindo à FITLIFE, a plataforma inovadora que está redefinindo o mundo do treinamento personalizado!</p>
                <p>
                    Na FITLIFE, nossa paixão é ajudar você a transformar sua vida através do fitness. Criamos uma comunidade vibrante e conectada onde alunos e personal trainers podem se encontrar, interagir e alcançar objetivos de saúde e bem-estar de maneira flexível e personalizada. Acreditamos que o exercício deve ser acessível e adaptável a cada estilo de vida, e estamos aqui para tornar isso possível.
                </p>
                <h2>Nossa Missão</h2>
                <p>
                    Na FITLIFE, nossa missão é capacitar indivíduos a alcançar seus objetivos de fitness de maneira prática e eficiente. Trabalhamos incansavelmente para oferecer uma plataforma que:
                </p>
                <ul>
                    <li><strong>Conecte:</strong> Facilite a conexão entre alunos e personal trainers qualificados, permitindo que você encontre o profissional perfeito para suas necessidades e objetivos.</li>
                    <li><strong>Personalize:</strong> Ofereça planos de treino personalizados que se ajustem às suas metas e ao seu estilo de vida, seja você um iniciante ou um atleta experiente.</li>
                </ul>
                <h2>Nossa Visão</h2>
                <p>
                    Nossa visão é ser a plataforma líder global na conexão entre alunos e personal trainers, promovendo um mundo onde o fitness seja acessível, personalizado e integrado ao seu estilo de vida. Visualizamos um futuro onde:
                </p>
                <ul>
                    <li><strong>Inclusão:</strong> Todos tenham acesso a treinos e orientações de qualidade, independentemente de localização, condição física ou experiência prévia.</li>
                    <li><strong>Comunidade:</strong> Criamos uma rede de apoio e motivação, onde membros e profissionais compartilham experiências, conhecimentos e encorajamento para um desenvolvimento contínuo.</li>
                </ul>
            </div>
        </section>

<section class="resultados-quem-somos">
    <div class="container">
        <dv class="resultados-quem-somos-recursos">

            <div class="recurso">
                <div class="icone">
                    <img src="img/icon-flex.png" alt="flexibilidade">
                    <p>
                        <span> Flexibilidade e acessibilidade acessível 24/7, para que você treine no seu ritmo e no horário que quiser. </span>
                    </p>
                </div>
            </div>

            <div class="recurso">
                <div class="icone">
                    <img src="img/icon-treinos.png" alt="treinos">
                    <p>
                        <span> Variedade de treinos com uma vasta gama de modalidades e programas de treinos personalizados. </span>
                    </p>
                </div>
            </div>

            <div class="recurso">
                <div class="icone">
                    <img src="img/icon-comunic.png" alt="comunicacao">
                    <p>
                        <span> Comunicação ativa com uma comunidade engajada, sempre pronta para se apoiar e motivar. </span>
                    </p>
                </div>
            </div>

            <div class="cadastro-btn">
                <a href="cadastro" class="btn">Experimentar</a>
            </div>
        </dv>
    </div>
    </section>

<section class="links"> 
    <div class="link">
        <h2> Conecte-se conosco</h2>
        <p> Para mais informações, siga-nos nas redes sociais ou entre em contato através da nossa página de contato:</p>
        <ul class="social-links">
            <li><a href="https://www.facebook.com/fitlife" target="_blank">Facebook</a></li>
            <li><a href="https://www.twitter.com/fitlife" target="_blank">Twitter</a></li>
            <li><a href="https://www.instagram.com/fitlife" target="_blank">Instagram</a></li>
        </ul>
        <a href="contato.php" class="btn-contato">Visite nossa página de Contato</a>
    </div>
    

</section>

</main>

<   <footer>
        <?php include_once "/xampp/htdocs/FITLIFE/fit-life/componentes/footer.html"?>
    </footer>

<script src="#"></script>
    
</body>
</html>