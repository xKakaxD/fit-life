function openPlan(evt, planName) {
    var i, planoConteudo, tablinks;

    // Esconde todo o conteúdo de planos
    planoConteudo = document.getElementsByClassName("plano-conteudo");
    for (i = 0; i < planoConteudo.length; i++) {
        planoConteudo[i].style.display = "none";
    }

    // Remove a classe 'active' de todos os botões
    tablinks = document.getElementsByClassName("tablink");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].classList.remove("active");
    }

    // Mostra o conteúdo do plano clicado e adiciona a classe 'active' ao botão
    document.getElementById(planName).style.display = "block";
    evt.currentTarget.classList.add("active");
}
