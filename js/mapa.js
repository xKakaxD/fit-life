// mapa.js - Código atualizado com InfoWindow mais visual

let map;
let marker;
let infoWindow; // Variável para a janela de informações

function initMap() {
    // Inicializa o mapa com um ponto padrão (São Paulo)
    map = new google.maps.Map(document.getElementById('map'), {
        center: { lat: -23.5505, lng: -46.6333 },
        zoom: 13
    });

    // Solicita a localização do usuário
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function (position) {
            const userLocation = {
                lat: position.coords.latitude,
                lng: position.coords.longitude
            };
            map.setCenter(userLocation);
            placeMarker(userLocation);
        }, function () {
            // Caso o usuário não permita a localização, mantém a posição padrão
            handleLocationError(true);
        });
    } else {
        // Caso o navegador não suporte Geolocalização
        handleLocationError(false);
    }

    // Evento para adicionar marcador ao clicar no mapa
    map.addListener('click', function (e) {
        placeMarker(e.latLng);
        buscarEnderecoPorCoordenadas(e.latLng); // Busca o endereço ao clicar no mapa
    });

    // Inicializa a janela de informações
    infoWindow = new google.maps.InfoWindow();
}

function handleLocationError(browserHasGeolocation) {
    console.warn(browserHasGeolocation ? "Erro: Permissão de Geolocalização negada." : "Erro: Seu navegador não suporta Geolocalização.");
}

// Função para posicionar o marcador e definir latitude e longitude
function placeMarker(location) {
    if (marker) {
        marker.setPosition(location);
    } else {
        marker = new google.maps.Marker({
            position: location,
            map: map
        });

        // Adiciona evento para exibir infoWindow ao clicar no marcador
        marker.addListener('click', function () {
            infoWindow.setContent(`<div style="max-width: 200px;"><strong>Local Selecionado</strong><br>Latitude: ${location.lat().toFixed(5)}<br>Longitude: ${location.lng().toFixed(5)}</div>`);
            infoWindow.open(map, marker);
        });
    }
    document.getElementById('latitude').value = location.lat();
    document.getElementById('longitude').value = location.lng();
    atualizarCentralizacaoMapa(location); // Atualiza a centralização do mapa
}

// Função para validar o CEP e buscar dados via Google Maps
function validarCep() {
    const cep = document.getElementById('cep').value.trim();

    if (cep) {
        const geocodeUrl = `https://maps.googleapis.com/maps/api/geocode/json?address=${cep}&key=AIzaSyBaf9M9Dq77v7rMHGzJHL6Lp_bpAYJ7_Eo`;

        $.get(geocodeUrl, function (data) {
            if (data.status === 'OK') {
                const result = data.results[0];
                const endereco = result.address_components;
                const location = result.geometry.location;

                // Preencher os campos do formulário com os dados retornados
                endereco.forEach(component => {
                    if (component.types.includes('route')) {
                        document.getElementById('rua').value = component.long_name;
                    }
                    if (component.types.includes('sublocality') || component.types.includes('locality')) {
                        document.getElementById('bairro').value = component.long_name;
                    }
                    if (component.types.includes('street_number')) {
                        document.getElementById('numero').value = component.long_name;
                    }
                    if (component.types.includes('postal_code')) {
                        document.getElementById('cep').value = component.long_name;
                    }
                });

                // Preencher latitude e longitude e posicionar o marcador no mapa
                document.getElementById('latitude').value = location.lat;
                document.getElementById('longitude').value = location.lng;
                placeMarker(new google.maps.LatLng(location.lat, location.lng));
                atualizarCentralizacaoMapa(location); // Atualizar centralização do mapa após validar o CEP
            } else {
                alert('Não foi possível encontrar o endereço para o CEP informado.');
            }
        }).fail(function () {
            alert('Erro ao se conectar à API do Google Maps. Verifique sua conexão.');
        });
    }
}

// Atualiza a centralização do mapa para o marcador
function atualizarCentralizacaoMapa(location) {
    map.setCenter(location);
    map.setZoom(15); // Ajuste o nível de zoom conforme necessário
}

// Função para buscar dados de endereço via coordenadas do Google Maps
function buscarEnderecoPorCoordenadas(location) {
    const geocodeUrl = `https://maps.googleapis.com/maps/api/geocode/json?latlng=${location.lat()},${location.lng()}&key=AIzaSyBaf9M9Dq77v7rMHGzJHL6Lp_bpAYJ7_Eo`;

    $.get(geocodeUrl, function (data) {
        if (data.status === 'OK') {
            const result = data.results[0];
            const endereco = result.address_components;

            let enderecoFormatado = '';

            // Preencher os campos do formulário com os dados retornados
            endereco.forEach(component => {
                if (component.types.includes('route')) {
                    document.getElementById('rua').value = component.long_name;
                    enderecoFormatado += component.long_name + ', ';
                }
                if (component.types.includes('sublocality') || component.types.includes('locality')) {
                    document.getElementById('bairro').value = component.long_name;
                    enderecoFormatado += component.long_name + ', ';
                }
                if (component.types.includes('street_number')) {
                    document.getElementById('numero').value = component.long_name;
                    enderecoFormatado += 'Nº ' + component.long_name + ', ';
                }
                if (component.types.includes('postal_code')) {
                    document.getElementById('cep').value = component.long_name;
                }
            });

            // Formatar o conteúdo da InfoWindow como o Google Maps faz
            let conteudoInfoWindow = `
                <div style="max-width: 300px; padding: 10px; font-family: Arial, sans-serif;">
                    <h4 style="margin: 0 0 8px; font-size: 16px;">${result.formatted_address}</h4>
                    <p style="margin: 0; font-size: 14px; line-height: 1.4;">
                        ${enderecoFormatado}<br>
                        Latitude: ${location.lat().toFixed(5)}, Longitude: ${location.lng().toFixed(5)}
                    </p>
                    <a href="https://www.google.com/maps/search/?api=1&query=${location.lat()},${location.lng()}" target="_blank" style="color: #1a73e8; text-decoration: none; font-size: 14px;">Visualize no Google Maps</a>
                </div>`;

            // Exibe a janela de informações no local clicado
            infoWindow.setContent(conteudoInfoWindow);
            infoWindow.setPosition(location);
            infoWindow.open(map);
        } else {
            alert('Não foi possível encontrar o endereço para a localização informada.');
        }
    }).fail(function () {
        alert('Erro ao se conectar à API do Google Maps. Verifique sua conexão.');
    });
}

// Função para preencher o formulário com dados da academia a ser editada
function editarAcademia(academia) {
    document.getElementById('id').value = academia.id;
    document.getElementById('nome').value = academia.nome;
    document.getElementById('rua').value = academia.rua;
    document.getElementById('bairro').value = academia.bairro;
    document.getElementById('numero').value = academia.numero;
    document.getElementById('cep').value = academia.cep;
    document.getElementById('latitude').value = academia.latitude;
    document.getElementById('longitude').value = academia.longitude;
    const location = new google.maps.LatLng(parseFloat(academia.latitude), parseFloat(academia.longitude));
    placeMarker(location);
    atualizarCentralizacaoMapa(location); // Atualizar centralização do mapa ao editar
    buscarEnderecoPorCoordenadas(location); // Buscar e atualizar informações ao editar
}

// Função para limpar o formulário
function limparFormulario() {
    document.getElementById('id').value = "";
    document.getElementById('nome').value = "";
    document.getElementById('rua').value = "";
    document.getElementById('bairro').value = "";
    document.getElementById('numero').value = "";
    document.getElementById('cep').value = "";
    document.getElementById('latitude').value = "";
    document.getElementById('longitude').value = "";
    if (marker) {
        marker.setMap(null);
        marker = null;
    }
    if (infoWindow) {
        infoWindow.close();
    }
}
