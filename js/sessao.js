window.onload = function() {
    const urlParams = new URLSearchParams(window.location.search);
    if (urlParams.has('session_expired')) {
        alert('Sua sessão expirou. Por favor, faça login novamente.');

        // Remove o parâmetro 'session_expired' da URL após exibir o alerta
        urlParams.delete('session_expired');
        const newUrl = window.location.pathname + '?' + urlParams.toString();
        window.history.replaceState({}, document.title, newUrl);
    }
};
