-- Remover as colunas de vínculo direto (se já existirem)
ALTER TABLE academias DROP FOREIGN KEY fk_academia_personal;
ALTER TABLE academias DROP COLUMN id_personal;
ALTER TABLE academias DROP FOREIGN KEY fk_academia_cliente;
ALTER TABLE academias DROP COLUMN id_usuarios;


-- Criar tabela de relacionamento clientes_academias
CREATE TABLE clientes_academias (
    id INT PRIMARY KEY AUTO_INCREMENT,
    id_cliente INT NOT NULL,
    id_academia INT NOT NULL,
    FOREIGN KEY (id_cliente) REFERENCES Clientes(id),
    FOREIGN KEY (id_academia) REFERENCES academias(id)
);

-- Criar tabela de relacionamento personais_academias
CREATE TABLE personais_academias (
    id INT PRIMARY KEY AUTO_INCREMENT,
    id_personal INT NOT NULL,
    id_academia INT NOT NULL,
    FOREIGN KEY (id_personal) REFERENCES Personal_Trainers(id),
    FOREIGN KEY (id_academia) REFERENCES academias(id)
);
