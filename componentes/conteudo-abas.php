<!--CONTEUDO PARA CLIENTES ALUNOS-->
    <div id="perfil-aluno" style="display: none;" name="Cliente">
        <h2>Informações do Aluno</h2>
        <form id="perfil-cliente-form" method="POST" action="atualizar-perfil-cliente.php" enctype="multipart/form-data">
            <!-- Informações Gerais -->
            <div class="informacoes-gerais">
                <label for="genero">Gênero</label>
                <select id="genero" name="genero">
                    <option value="Masculino" <?= ($cliente['genero'] ?? '') == 'Masculino' ? 'selected' : ''; ?>>Masculino</option>
                    <option value="Feminino" <?= ($cliente['genero'] ?? '') == 'Feminino' ? 'selected' : ''; ?>>Feminino</option>
                    <option value="Outro" <?= ($cliente['genero'] ?? '') == 'Outro' ? 'selected' : ''; ?>>Outro</option>
                </select>

                <label for="nome">Nome</label>
                <input type="text" id="nome" name="nome" value="<?= htmlspecialchars($cliente['nome'] ?? '', ENT_QUOTES); ?>" required>

                <label for="sobrenome">Sobrenome</label>
                <input type="text" id="sobrenome" name="sobrenome" value="<?= htmlspecialchars($cliente['sobrenome'] ?? '', ENT_QUOTES); ?>" required>

                <label for="data_nascimento">Data de Nascimento</label>
                <input type="date" id="data_nascimento" name="data_nascimento" value="<?= htmlspecialchars($cliente['data_nascimento'] ?? '', ENT_QUOTES); ?>">

                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="<?= htmlspecialchars($cliente['email'] ?? '', ENT_QUOTES); ?>" required>

                <label for="celular">Número de Celular</label>
                <input type="tel" id="celular" name="celular" value="<?= htmlspecialchars($cliente['celular'] ?? '', ENT_QUOTES); ?>">

                <!-- Endereço -->
                <div class="endereco">
                    <h3>Endereço</h3>
                    <input type="text" id="endereco" name="endereco" value="<?= htmlspecialchars($cliente['endereco'] ?? '', ENT_QUOTES); ?>" placeholder="Digite seu endereço">
                    <span id="endereco-indicativo" style="color: red; display: none;">Endereço diferente do registrado.</span>
                    <div id="mapa-aluno" style="height: 200px;"></div>
                </div>
                <!-- Foto de Perfil -->
                <div class="foto-perfil">
                    <h3>Foto de Perfil</h3>
                    <img src="imagens/<?= $cliente['foto_perfil'] ?? 'default.png'; ?>" alt="Foto de Perfil">
                    <input type="file" id="foto_perfil" name="foto_perfil">
                </div>

                <!-- Mudar Senha -->
                <div class="mudar-senha">
                    <h3>Mudar a Senha</h3>
                    <input type="password" name="senha_atual" placeholder="Senha Atual" required>
                    <input type="password" name="nova_senha" placeholder="Nova Senha" required>
                    <input type="password" name="confirmar_senha" placeholder="Confirmar Senha" required>
                </div>

                <button type="submit" name="Cliente">Salvar Alterações</button>
            </div>
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
            <form id="perfil-treinador-form" method="POST" action="atualizar-perfil-treinador.php" enctype="multipart/form-data">
                <!-- Informações Gerais -->
                <div class="informacoes-gerais">
                    <label for="genero">Gênero</label>
                    <select id="genero" name="genero">
                        <option value="Masculino">Masculino</option>
                        <option value="Feminino">Feminino</option>
                        <option value="Outro">Outro</option>
                    </select>

                    <label for="nome">Nome</label>
                    <input type="text" id="nome" name="nome" value="<?php echo $treinador['nome']; ?>" required>

                    <label for="sobrenome">Sobrenome</label>
                    <input type="text" id="sobrenome" name="sobrenome" value="<?php echo $treinador['sobrenome']; ?>" required>

                    <label for="data_nascimento">Data de Nascimento</label>
                    <input type="date" id="data_nascimento" name="data_nascimento" value="<?php echo $treinador['data_nascimento']; ?>">

                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" value="<?php echo $treinador['email']; ?>" required>

                    <label for="celular">Número de Celular</label>
                    <input type="tel" id="celular" name="celular" value="<?php echo $treinador['celular']; ?>">

                    <label for="cref">CREF</label>
                    <input type="text" id="cref" name="cref" value="<?php echo $treinador['cref']; ?>" required>

                    <label for="especialidade">Especialidade</label>
                    <input type="text" id="especialidade" name="especialidade" value="<?php echo $treinador['especialidade']; ?>" required>
                </div>

                <!-- Endereço -->
                <div class="endereco">
                    <h3>Endereço</h3>
                    <input type="text" id="endereco" name="endereco" value="<?php echo $treinador['endereco']; ?>" placeholder="Digite seu endereço">
                    <div id="mapa-treinador" style="height: 200px;"></div>
                </div>

                <!-- Foto de Perfil -->
                <div class="foto-perfil">
                    <h3>Foto de Perfil</h3>
                    <img src="imagens/<?php echo $treinador['foto_perfil'] ?: 'default.png'; ?>" alt="Foto de Perfil">
                    <input type="file" id="foto_perfil" name="foto_perfil">
                </div>

                <!-- Mudar Senha -->
                <div class="mudar-senha">
                    <h3>Mudar a Senha</h3>
                    <input type="password" name="senha_atual" placeholder="Senha Atual" required>
                    <input type="password" name="nova_senha" placeholder="Nova Senha" required>
                    <input type="password" name="confirmar_senha" placeholder="Confirmar Senha" required>
                </div>

                <button type="submit" name="Treinador">Salvar Alterações</button>
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

