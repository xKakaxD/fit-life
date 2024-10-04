CREATE DATABASE FIT_LIFE;

-- Criação da tabela Usuario
CREATE TABLE Usuarios (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    senha VARCHAR(255) NOT NULL,
    sexo CHAR(1),
    dt_nascimento DATE,
    nacionalidade VARCHAR(100),
    endereco VARCHAR(255),
    tipo_usuario CHAR(1) NOT NULL,  -- 'C' para Cliente, 'P' para Personal Trainer, 'G' para Gestor
    foto BLOB
);

-- Tabela Cliente (FK de Usuario)
CREATE TABLE Clientes (
    id INT PRIMARY KEY,
    peso DECIMAL(5,2),
    altura DECIMAL(5,2),
    tmp_treino INT,  -- tempo de treino em meses
    lesao VARCHAR(255),
    pr_saude VARCHAR(255),  -- problemas de saúde
    habitos TEXT,
    CONSTRAINT fk_cliente_usuario FOREIGN KEY (id) REFERENCES usuarios(id)
);

-- Tabela Personal Trainer (FK de Usuario)
CREATE TABLE Personal_Trainers (
    id INT PRIMARY KEY,
    cref VARCHAR(50) NOT NULL,
    especialidade VARCHAR(255),
    tmp_area INT,  -- tempo na área em anos
    descricao TEXT,
    CONSTRAINT fk_personal_usuario FOREIGN KEY (id) REFERENCES usuarios(id)
);

-- Tabela Gestor (FK de Usuario)
CREATE TABLE Gestores (
    id INT PRIMARY KEY,
    data_contratacao DATE,
    nivel_acesso INT,  -- nível de acesso administrativo
    CONSTRAINT fk_gestor_usuario FOREIGN KEY (id) REFERENCES usuarios(id)
);

-- Tabela Academia
CREATE TABLE Academias (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(255) NOT NULL,
    rua VARCHAR(255),
    bairro VARCHAR(100),
    numero VARCHAR(10),
    cep VARCHAR(15),
    latitude FLOAT(10, 6),  -- Para integração com Google Maps
    longitude FLOAT(10, 6), -- Para integração com Google Maps
    id_personal INT,  -- FK para Personal_Trainer
    id_usuarios INT,  -- FK para Cliente
    CONSTRAINT fk_academia_personal FOREIGN KEY (id_personal) REFERENCES Personal_Trainers(id),
    CONSTRAINT fk_academia_cliente FOREIGN KEY (id_usuarios) REFERENCES Clientes(id)
);

-- Tabela para Avaliação de Academias ou Personal Trainers
CREATE TABLE Avaliacoes (
    id INT PRIMARY KEY AUTO_INCREMENT,
    id_usuario INT NOT NULL,  -- FK para Usuario
    id_avaliado INT,  -- FK para a entidade avaliada (pode ser Personal Trainer ou Academia)
    tipo_avaliado CHAR(1),  -- 'A' para Academia, 'P' para Personal Trainer
    nota INT CHECK (nota BETWEEN 1 AND 5),  -- Avaliação de 1 a 5
    comentario TEXT,
    CONSTRAINT fk_avaliacao_usuario FOREIGN KEY (id_usuario) REFERENCES Usuarios(id)
);

-- Tabela para Agendamento de Aulas
CREATE TABLE Aulas (
    id INT PRIMARY KEY AUTO_INCREMENT,
    id_cliente INT,  -- FK para Cliente
    id_personal INT,  -- FK para Personal Trainer
    id_academia INT,  -- FK para Academia
    data_aula DATE,
    hora_inicio TIME,
    hora_fim TIME,
    status_aula VARCHAR(50),  -- Ex: Confirmada, Cancelada
    CONSTRAINT fk_aula_cliente FOREIGN KEY (id_cliente) REFERENCES Clientes(id),
    CONSTRAINT fk_aula_personal FOREIGN KEY (id_personal) REFERENCES Personal_Trainers(id),
    CONSTRAINT fk_aula_academia FOREIGN KEY (id_academia) REFERENCES Academias(id)
);

-- Tabela Planos de Assinatura
CREATE TABLE Plano_Assinaturas (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nome_plano VARCHAR(255) NOT NULL,
    descricao TEXT,  -- Descrição detalhada do plano
    valor DECIMAL(10, 2) NOT NULL,  -- Valor do plano
    duracao INT,  -- Duração do plano em meses
    tipo_plano VARCHAR(50),  -- Ex: Mensal, Anual
    ativo BOOLEAN DEFAULT TRUE  -- Indica se o plano está ativo ou não
);

-- Tabela para associar Cliente com Plano de Assinatura
CREATE TABLE Cliente_Plano (
    id INT PRIMARY KEY AUTO_INCREMENT,
    id_cliente INT NOT NULL,  -- FK para Cliente
    id_plano INT NOT NULL,  -- FK para Plano de Assinatura
    data_inicio DATE NOT NULL,
    data_fim DATE,
    status_plano VARCHAR(50),  -- Ex: Ativo, Cancelado, Expirado
    CONSTRAINT fk_cliente_plano_cliente FOREIGN KEY (id_cliente) REFERENCES Clientes(id),
    CONSTRAINT fk_cliente_plano_assinado FOREIGN KEY (id_plano) REFERENCES Plano_Assinaturas(id)
);

