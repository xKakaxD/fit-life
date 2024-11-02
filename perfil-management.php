<?php
session_start();

// Tempo de expiração da sessão em segundos
$tempoExpiracao = 1800; // 30 minutos

// Verificar se a sessão está ativa e se passou do tempo de expiração
if (isset($_SESSION['ultima_atividade']) && (time() - $_SESSION['ultima_atividade'] > $tempoExpiracao)) {
    // Se a última atividade foi há mais de 30 minutos, destrói a sessão e redireciona para o login
    session_unset(); // Remove as variáveis de sessão
    session_destroy(); // Destrói a sessão
    header("Location: login-cadastro.php?session_expired=1");
    exit;
}

// Atualiza o tempo de última atividade para o momento atual
$_SESSION['ultima_atividade'] = time();

// Verifica se o usuário está logado
if (!isset($_SESSION['logado']) || $_SESSION['logado'] !== true || $_SESSION['tipo_usuario'] === null) {
    header("Location: login-cadastro.php");
    exit;
}

// Inclui as classes necessárias
require_once '/xampp/htdocs/FITLIFE/fit-life/_dao/UsuarioDAO.php';
require_once '/xampp/htdocs/FITLIFE/fit-life/_dao/ClienteDAO.php';
require_once '/xampp/htdocs/FITLIFE/fit-life/_dao/TreinadorDAO.php';

$tipoUsuario = $_SESSION['tipo_usuario'];
$id = $_SESSION['id_usuario'];

$cliente = null;
$treinador = null;

if ($tipoUsuario == 'Cliente') {
    $clienteDAO = new ClienteDAO();
    $cliente = $clienteDAO->buscarPorId($id);
} elseif ($tipoUsuario == 'Treinador') {
    $treinadorDAO = new TreinadorDAO();
    $treinador = $treinadorDAO->buscarPorId($id);
}

// O código HTML para o formulário virá aqui abaixo
?>

<!-- Conteúdo do formulário HTML -->


<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/fit-life.css">
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBaf9M9Dq77v7rMHGzJHL6Lp_bpAYJ7_Eo"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="js/mapa.js"></script>
        <title> FITLIFE - inicial </title>
    </head>
    <body>

        <header> <!--Para os componentes que ficam dentro da pasta componentes no projeto o caminho deve ser pego dessa forma e alterar o arquivo-->
            <?php include_once "/xampp/htdocs/FITLIFE/fit-life/componentes/header-logado.php" ?> <!--/xampp/htdocs/FITLIFE/fit-life/componentes/..-->
        </header>

        <main>
            <div class="conteudo-logado">
                <div class="menu-logado">
                    <?php include_once "/xampp/htdocs/FITLIFE/fit-life/componentes/sidebar-menu.php"?><!--Remove o "/Freelancer" e adiciona "/fit-life"-->

                    
                </div>
                <div class="conteudo-abas">
                    <?php include_once "/xampp/htdocs/FITLIFE/fit-life/componentes/conteudo-abas.php" ?><!--Remove o "/Freelancer" e adiciona "/fit-life"-->
                </div>
            </div>
        </main>

        <footer>
            <?php include_once "/xampp/htdocs/FITLIFE/fit-life/componentes/footer.html"?>
        </footer>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Corrigindo a obtenção do tipo de usuário para que não ocorra erro caso não esteja definido
                const tipoUsuario = "<?php echo isset($_SESSION['tipo_usuario']) ? $_SESSION['tipo_usuario'] : ''; ?>";

                if (tipoUsuario === "") {
                    console.error("Tipo de usuário não definido.");
                    return; // Se não houver tipo de usuário, saia do script
                }

                // Exibe apenas o sidebar correto com base no tipo de usuário
                document.querySelectorAll('.abas').forEach(element => {
                    if (element.getAttribute('name') === tipoUsuario) {
                        element.style.display = 'block'; // Exibe o sidebar correto
                    } else {
                        element.style.display = 'none'; // Esconde os outros sidebars
                    }
                });

                // Configura os botões para alternar entre as abas de conteúdo
                document.querySelectorAll('.sidebar-btn').forEach(button => {
                    button.addEventListener('click', function() {
                        document.querySelectorAll('.sidebar-btn').forEach(btn => btn.classList.remove('active'));
                        this.classList.add('active');

                        // Esconde todo o conteúdo
                        document.querySelectorAll('.conteudo-abas > div').forEach(content => content.style.display = 'none');

                        // Exibe o conteúdo associado ao botão clicado
                        const target = this.getAttribute('data-target');
                        if (document.querySelector(target)) {
                            document.querySelector(target).style.display = 'block';
                        } else {
                            console.error("Elemento alvo não encontrado: ", target);
                        }
                    });
                });

                // Exibe o primeiro botão ativo com base no tipo de usuário
                const firstButton = document.querySelector(`.abas[name="${tipoUsuario}"] .sidebar-btn`);
                if (firstButton) {
                    firstButton.classList.add('active'); // Marca o primeiro botão como ativo
                    const target = firstButton.getAttribute('data-target'); // Pega o target do botão
                    if (document.querySelector(target)) {
                        document.querySelector(target).style.display = 'block'; // Exibe o conteúdo correto
                    } else {
                        console.error("Elemento alvo não encontrado: ", target);
                    }
                }
            });
        </script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                if (document.getElementById('mapa-aluno')) {
                    // Inicializa a localização
                    const endereco = "<?= $cliente['endereco'] ?? '' ?>";
                    if (endereco) {
                        buscarCoordenadasPorEndereco(endereco);
                    } else if (navigator.geolocation) {
                        navigator.geolocation.getCurrentPosition(function(position) {
                            const userLocation = {
                                lat: position.coords.latitude,
                                lng: position.coords.longitude
                            };
                            initMap('mapa-aluno', userLocation, true);
                        }, function() {
                            // Caso o usuário negue a permissão, ou a geolocalização não esteja disponível
                            initMap('mapa-aluno', { lat: -23.5505, lng: -46.6333 }, false);
                        });
                    } else {
                        initMap('mapa-aluno', { lat: -23.5505, lng: -46.6333 }, false);
                    }
                }
            });

            function initMap(elementId, initialLocation, useUserLocation) {
                let map = new google.maps.Map(document.getElementById(elementId), {
                    center: initialLocation,
                    zoom: 15
                });

                let marker = new google.maps.Marker({
                    position: initialLocation,
                    map: map
                });

                // Preenche os campos de endereço e localiza o marcador
                if (useUserLocation) {
                    buscarEnderecoPorCoordenadas(initialLocation);
                }

                // Atualiza os campos de latitude, longitude e endereço
                function atualizarEndereco(location) {
                    buscarEnderecoPorCoordenadas(location);
                }

                map.addListener('click', function(e) {
                    marker.setPosition(e.latLng);
                    atualizarEndereco(e.latLng);
                });
            }

            // Função para buscar as coordenadas do endereço fornecido
            function buscarCoordenadasPorEndereco(endereco) {
                const geocodeUrl = `https://maps.googleapis.com/maps/api/geocode/json?address=${encodeURIComponent(endereco)}&key=YOUR_API_KEY`;

                $.get(geocodeUrl, function(data) {
                    if (data.status === 'OK') {
                        const location = data.results[0].geometry.location;
                        initMap('mapa-aluno', { lat: location.lat, lng: location.lng }, false);
                    } else {
                        console.warn('Não foi possível encontrar as coordenadas para o endereço fornecido.');
                        initMap('mapa-aluno', { lat: -23.5505, lng: -46.6333 }, false);
                    }
                });
            }

            // Função para buscar o endereço a partir das coordenadas
            function buscarEnderecoPorCoordenadas(location) {
                const geocodeUrl = `https://maps.googleapis.com/maps/api/geocode/json?latlng=${location.lat()},${location.lng()}&key=YOUR_API_KEY`;

                $.get(geocodeUrl, function(data) {
                    if (data.status === 'OK') {
                        const endereco = data.results[0].formatted_address;
                        document.getElementById('endereco').value = endereco;
                    }
                });
            }
        </script>

  


    </body>
</html>