<div id="gerir-academias" style="display: none;" name="Admin">
    <h1>Gerir Academias</h1>

                <?php if (!empty($mensagem)): ?>
                    <p><?php echo $mensagem; ?></p>
                <?php endif; ?>

                <!-- Formulário para adicionar/editar academia -->
                <form method="POST" action="gerir-academias.php">
                    <input type="hidden" id="id" name="id">
                    <label for="nome">Nome:</label>
                    <input type="text" id="nome" name="nome" required><br><br>

                    <label for="rua">Rua:</label>
                    <input type="text" id="rua" name="rua" required><br><br>

                    <label for="bairro">Bairro:</label>
                    <input type="text" id="bairro" name="bairro" required><br><br>

                    <label for="numero">Número:</label>
                    <input type="text" id="numero" name="numero" required><br><br>

                    <label for="cep">CEP:</label>
                    <input type="text" id="cep" name="cep" required><br><br>

                    <label for="latitude">Latitude:</label>
                    <input type="text" id="latitude" name="latitude" readonly><br><br>

                    <label for="longitude">Longitude:</label>
                    <input type="text" id="longitude" name="longitude" readonly><br><br>

                    <div id="map" style="height: 400px; width: 100%;"></div><br>

                    <button type="submit">Salvar Academia</button>
                </form>

                <h2>Lista de Academias</h2>
                <table border="1">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Endereço</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($academias as $academia) { ?>
                            <tr>
                                <td><?php echo $academia['id']; ?></td>
                                <td><?php echo $academia['nome']; ?></td>
                                <td><?php echo $academia['rua'] . ', ' . $academia['numero'] . ' - ' . $academia['bairro'] . ', ' . $academia['cep']; ?></td>
                                <td>
                                    <button onclick="editarAcademia(<?php echo htmlspecialchars(json_encode($academia)); ?>)">Editar</button>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
</div>