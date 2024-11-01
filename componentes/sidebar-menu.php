<div class="abas" name="Cliente" style="display: none;">
    <ul>
        <li>Bem-vindo, <?php echo $_SESSION['nome_usuario']; ?>!</li>
        <li><a class="sidebar-btn" data-target="#perfil-aluno">Informações do Aluno</a></li>
        <li><a class="sidebar-btn" data-target="#localizar-personal-academia">Localizar Personal Trainers e Academias</a></li>
        <li><a class="sidebar-btn" data-target="#treinos">Minhas Aulas e Aulas Marcadas</a></li>
        <li><a class="sidebar-btn" data-target="#termos">Termos de Uso</a></li>
        <li><a class="sidebar-btn" href="/FITLIFE/fit-life/_dao/Logout.php">Realizar Logout</a></li> <!--Pode precisar de correção-->
    </ul>
</div>
<div class="abas" name="Treinador" style="display: none;">
    <ul>
        <li>Bem-vindo, <?php echo $_SESSION['nome_usuario']; ?>!</li>
        <li><a  class="sidebar-btn" data-target="#perfil-treinador">Informações do Treinador</a></li>
        <li><a class="sidebar-btn" data-target="#progresso-alunos">Progressos Alunos</a></li>
        <li><a class="sidebar-btn" data-target="#aulas-agendadas">Aulas Marcadas</a></li>
        <li><a class="sidebar-btn" data-target="#termos">Termos de Uso</a></li>
        <li><a class="sidebar-btn" href="/FITLIFE/fit-life/_dao/Logout.php">Realizar Logout</a></li> <!--Pode precisar de correção-->
    </ul>
</div>
<div class="abas" name="Admin" style="display: none;">
    <ul>
        <li>Bem-vindo, <?php echo $_SESSION['nome_usuario']; ?>!</li>
        <li><a  class="sidebar-btn" data-target="#gerir-academias">Gerir Academias</a></li>
        <li><a class="sidebar-btn" href="/FITLIFE/fit-life/_dao/Logout.php">Realizar Logout</a></li> <!--Pode precisar de correção-->
    </ul>
</div>