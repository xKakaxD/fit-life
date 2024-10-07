--alteração da estrutura do banco na tabela Usuarios para o tipo de usuário
ALTER TABLE USUARIOS
CHANGE tipo_usuario tipo_usuario ENUM('Admin', 'Treinador', 'Cliente');

 --fazer o insert para a tabela usuarios
INSERT INTO USUARIOS (nome, email, senha, sexo, dt_nascimento, nacionalidade, endereco, tipo_usuario)
VALUE ('Kaká D Moro', 'ti.demoro@gmail.com', 'ea955525832b0f4680dad7efd9183140381f5f02ef3f42fb61bc2c60ed7ce14d', 'M', '1999-10-08', 'Brasileiro', 'R Dr Cassiano','Cliente'),
('Kaká D Moro', 'xkakaxd@gmail.com', 'ea955525832b0f4680dad7efd9183140381f5f02ef3f42fb61bc2c60ed7ce14d', 'M', '1999-10-08', 'Brasileiro', 'R Dr Cassiano','Treinador'),
('Sarah', 'sarah@gmail.com', 'A665A45920422F9D417E4867EFDC4FB8A04A1F3FFF1FA07E998E86F7F7A27AE3', 'F', '2001-07-02', 'Brasileiro', 'R Servillo De Moro','Cliente')
;


