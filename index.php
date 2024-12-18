<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/fit-life.css">
    <title> FITLIFE - inicial </title>
</head>
<body>

<header> <!--Para os componentes que ficam dentro da pasta componentes no projeto o caminho deve ser pego dessa forma e alterar o arquivo-->
    <?php include_once "/xampp/htdocs/FITLIFE/fit-life/componentes/header.html" ?> <!--/xampp/htdocs/FITLIFE/fit-life/componentes/..-->
</header>

<main>
    <div class="image-container">
        <img src="img/imginicial.jpg" alt="pesos">
    </div>
    
    <section class="resultados-index">
        <h2 class="titulo">O verdadeiro treino começa quando você quer parar!</h2>
        <div class="container">
            <dv class="resultados-index-recursos">
                <div class="recurso">
                    <div class="icone">
                        <img src="img/icon-peso.png" alt="peso">
                        <p>
                            <span> Aprimore sua força e sua resistência com treinos de diversas modalidades. Conecte-se com Personal Trainers especializados e alcance seus objetivos. </span>
                        </p>
                    </div>
                </div>

                <div class="recurso">
                    <div class="icone">
                        <img src="img/icon-clock.png" alt="clock">
                        <p>
                            <span> Flexibilidade TOTAL! Agende treinos a qualquer hora, em qualquer lugar, com Personal Trainers disponíveis 24/7 para se adequar à sua rotina. </span>
                        </p>
                    </div>
                </div>

                <div class="recurso">
                    <div class="icone">
                        <img src="img/icon-saudebestar.png" alt="saudebemestar">
                        <p>
                            <span> Mantenha o foco na sua saúde. Treinadores dedicados à sua jornada fitness, oferecendo treinos equilibrados para melhorar sua qualidade de vida. </span>
                        </p>
                    </div>
                </div>
            </section>

            <section class="planos">
                <div class="container-planos">
                    <!-- Coluna da esquerda com as opções -->
                    <div class="opcoes">
                        <button class="tablink active" onclick="openPlan(event, 'Aluno')">ALUNO</button>
                        <button class="tablink" onclick="openPlan(event, 'PersonalTrainer')">PERSONAL TRAINER</button>
                    </div>
        
                    <!-- Coluna da direita com os planos -->
                    <div class="conteudo-planos">
                        <!-- Planos para Alunos -->
                        <div id="Aluno" class="plano-conteudo" style="display: none;">
                            <h2>Planos para Alunos</h2>
                            <p>Escolha o plano que melhor atende suas necessidades e alcance seus objetivos com nossos personal trainers.</p>
                            <div class="plano">
                                <h3>Plano Básico</h3>
                                <p class="preco">R$ 99,00</p>
                                <ul>
                                    <li>Acesso a treinos básicos</li>
                                    <li>Monitoramento semanal</li>
                                    <li>Suporte via e-mail</li>
                                </ul>
                            </div>
                            <div class="plano">
                                <h3>Plano Premium</h3>
                                <p class="preco">R$ 199,00</p>
                                <ul>
                                    <li>Acesso ilimitado a Personal Trainers</li>
                                    <li>Treinos personalizados e monitoramento</li>
                                    <li>Suporte 24/7</li>
                                </ul>
                            </div>
                            <div class="plano">
                                <h3>Plano Avançado</h3>
                                <p class="preco">R$ 299,00</p>
                                <ul>
                                    <li>Acesso a todos os recursos Premium</li>
                                    <li>Consultas nutricionais incluídas</li>
                                    <li>Acesso a workshops exclusivos</li>
                                </ul>
                            </div>
                        </div>
            
                        <!-- Planos para Personal Trainers -->
                        <div id="PersonalTrainer" class="plano-conteudo" style="display:none;">
                            <h2>Planos para Personal Trainers</h2>
                            <p>Escolha um plano para expandir seus serviços e obter ferramentas adicionais para melhorar seu trabalho.</p>
                            <div class="plano">
                                <h3>Plano Inicial</h3>
                                <p class="preco">R$ 149,00</p>
                                <ul>
                                    <li>Cadastro básico de clientes</li>
                                    <li>Ferramentas básicas de agendamento</li>
                                    <li>Suporte técnico básico</li>
                                </ul>
                            </div>
                            <div class="plano">
                                <h3>Plano Profissional</h3>
                                <p class="preco">R$ 249,00</p>
                                <ul>
                                    <li>Gestão completa de clientes</li>
                                    <li>Agendamento avançado e monitoramento</li>
                                    <li>Suporte técnico e marketing digital</li>
                                </ul>
                            </div>
                            <div class="plano">
                                <h3>Plano Especial</h3>
                                <p class="preco">R$ 349,00</p>
                                <ul>
                                    <li>Funcionalidades avançadas e personalizadas</li>
                                    <li>Consultoria para expansão de negócios</li>
                                    <li>Acesso a eventos e workshops exclusivos</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        
            <!-- JavaScript -->
            <script>
                function openPlan(evt, planName) {
                    // Oculta todos os planos
                    var i, planoConteudo, tablinks;
                    planoConteudo = document.getElementsByClassName("plano-conteudo");
                    for (i = 0; i < planoConteudo.length; i++) {
                        planoConteudo[i].style.display = "none";
                    }
        
                    // Remove a classe 'active' de todos os botões
                    tablinks = document.getElementsByClassName("tablink");
                    for (i = 0; i < tablinks.length; i++) {
                        tablinks[i].className = tablinks[i].className.replace(" active", "");
                    }
        
                    // Exibe o plano clicado e adiciona a classe 'active' ao botão
                    document.getElementById(planName).style.display = "block";
                    evt.currentTarget.className += " active";
                }
        
                // Exibe o plano de Aluno por padrão ao carregar a página
                document.getElementById("Aluno").style.display = "block";
            </script>
        

        <section class="trainers-section">
            <h2>Conheça alguns treinadores</h2>
            <div class="trainers-container">
                <div class="trainer">
                    <img src="img/personaltrainer.jpg" alt="Personal Trainer 1">
                    <h3>Personal Trainer 1</h3>
                    <p>Especialista em musculação e treino funcional.</p>
                </div>
                <div class="trainer">
                    <img src="img/personaltrainerM.jpg" alt="Personal Trainer 2">
                    <h3>Personal Trainer 2</h3>
                    <p>Focado em treinos de alta performance e hipertrofia.</p>
                </div>
                <div class="trainer">
                    <img src="img/ptrainerbox.jpg" alt="Personal Trainer 3">
                    <h3>Personal Trainer 3</h3>
                    <p>Treinadora com experiência em emagrecimento e condicionamento físico.</p>
                </div>
                <div class="trainer">
                    <img src="img/personaltrainerMM.jpg" alt="Personal Trainer 4">
                    <h3>Personal Trainer 4</h3>
                    <p>Especializado em treinos de força e reabilitação física.</p>
                </div>
            </div>
        </section>

        <section class="imc-section">
            <div class="imc-container">
                <div class="imc">
                    <h2>Calcule seu IMC</h2>
                    <p>Índice de Massa Corporal (IMC) é um cálculo que indica se uma pessoa está com um peso saudável em relação à sua altura.</p>
                    <p>Muitas pessoas buscam descobrir seu IMC quando iniciam uma dieta específica ou uma atividade física.</p>
                    <p>Para realizar o cálculo, basta dividir o peso pela altura ao quadrado. É importante ter as medidas exatas antes do cálculo, pois o resultado final representa o quanto a pessoa tem de massa muscular + massa de gordura + massa óssea.</p>
                </div>

                <div class="imc-calculator">
                    <h2>Faça o cálculo abaixo</h2>
                    <label for="altura">Altura (M):</label>
                    <input type="number" id="altura" placeholder="ex: 1.70" step="0.01">

                    <label for="peso">Peso (KG):</label>
                    <input type="number" id="peso" placeholder="ex: 70" step="0.1">

                    <button onclick="calcularIMC()">Calcular</button>

                    <div id="resultadoIMC" class="resultado-imc"></div>
                </div>
            </div>
        </section>

        <script>

        function calcularIMC() {
            // Obter os valores dos campos de altura e peso
            const altura = parseFloat(document.getElementById('altura').value);
            const peso = parseFloat(document.getElementById('peso').value);
            const resultadoDiv = document.getElementById('resultadoIMC');

            // Verificar se os valores de entrada são válidos
            if (isNaN(altura) || isNaN(peso) || altura <= 0 || peso <= 0) {
                resultadoDiv.innerHTML = 'Por favor, insira valores válidos.';
                return;
            }

            // Calcular o IMC
            const imc = peso / (altura * altura);

            // Definir a categoria do IMC
            let categoria = '';
            if (imc < 18.5) {
                categoria = 'Abaixo do peso';
            } else if (imc >= 18.5 && imc < 24.9) {
                categoria = 'Peso normal';
            } else if (imc >= 25 && imc < 29.9) {
                categoria = 'Sobrepeso';
            } else {
                categoria = 'Obesidade';
            }

            // Exibir o resultado
            resultadoDiv.innerHTML = `Seu IMC é ${imc.toFixed(2)} (${categoria}).`;
        }

    </script>
</main>

    <footer>
        <?php include_once "/xampp/htdocs/FITLIFE/fit-life/componentes/footer.html"?>
    </footer>

    
</body>
</html>


