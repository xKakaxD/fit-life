<!--CONTEUDO PARA CLIENTES ALUNOS-->
    <div id="perfil-aluno" style="display: none;" name="Cliente">
        <h2>Informações do Aluno</h2>
        <form>
            <label for="nome">Nome:</label>
            <input type="text" id="nome" value="nome do aluno">
            <br>
            <label for="email">E-mail:</label>
            <input type="text" id="email" value="email@examplo.com">
            <br>
            <label for="telefone">Telefone:</label>
            <input type="tel" id="telefone" value="(31) 98117-4041">
            <br>
            <button type="submit">Salvar Alterações</button>        
        </form>
    </div>

    <div id="localizar-personal-academia" style="display: none;" name="Cliente">
        <h2>Localizar Personal Trainers e Academias</h2>
        <form>
            <label for="localizacao">Localização:</label>
            <input type="text" id="localizacao" placeholder="Digite sua localização">
            <br>
            <button type="submit">Buscar</button>
        </form>
        <div class="resultado-busca">
            <h3>Resultados da Busca</h3>
            <ul>
                <li>Personal Trainer 1 - 2km de distância</li>
                <li>Academia 1 - 3km de distância</li>
                <li>Personal Trainer 2 - 5km de distância</li>
            </ul>
        </div>
    </div>
    <div id="treinos" style="display: none;" name="Cliente">
        <h2>Minhas aulas e Aulas marcadas</h2>
        <div class="minhas-aulas">
            <h3>Minhas aulas:</h3>
            <ul>
                <li>Aula 1 - Segunda-feira, 10h</li>
                <li>Aula 2 - Quarta-feira, 14h</li>
            </ul>
        </div>
        <div class="aulas-marcadas">
            <h3>Aulas Marcadas:</h3>
            <ul>
                <li>Aula 3 - Sexta-feira, 16h</li>
                <li>Aula 4 - Domingo, 10h</li>
            </ul>
        </div>
    </div>
    <div id="termos" style="display: none;" name="Cliente">
        <!-- Conteúdo da aba Termos de Uso -->
        <h2>Termos de Uso</h2>
        <p>Termos de uso da plataforma...</p>
    </div>
    <!--<div id="sair" style="display: none;" name="geral">
         Conteúdo da aba Sair da Tela de Perfil 
    </div> --> <!-- FINAL ALUNOS-->

<!--CONTEUDO PARA CLIENTES TREINADORES-->
    <div id="perfil-treinador" style="display: none;" name="Treinador">
        <h2>Informações do Treinador</h2>
        <form>
            <label for="nome">Nome:</label>
            <input type="text" id="nome" value="nome do aluno">
            <br>
            <label for="email">E-mail:</label>
            <input type="text" id="email" value="email@examplo.com">
            <br>
            <label for="telefone">Telefone:</label>
            <input type="tel" id="telefone" value="(31) 98117-4041">
            <br>
            <button type="submit">Salvar Alterações</button>        
        </form>
    </div> 
    <div id="progresso-alunos" style="display: none;" name="Treinador">
        <h2>Progresso dos Alunos</h2>
        <!-- Conteúdo de progresso dos alunos -->
    </div>

    <div id="aulas-agendadas" style="display: none;" name="Treinador">
        <h2>Aulas Agendadas</h2>
        <!-- Conteúdo de aulas agendadas -->
    </div> 
    
    <!-- FINAL TREINADORES-->