--alteração da estrutura do banco na tabela Usuarios para o tipo de usuário
ALTER TABLE USUARIOS
CHANGE tipo_usuario tipo_usuario ENUM('Admin', 'Treinador', 'Cliente');

 --fazer o insert para a tabela usuarios
INSERT INTO USUARIOS (nome, email, senha, sexo, dt_nascimento, nacionalidade, endereco, tipo_usuario)
VALUE ('Kaká D Moro', 'ti.demoro@gmail.com', 'ea955525832b0f4680dad7efd9183140381f5f02ef3f42fb61bc2c60ed7ce14d', 'M', '1999-10-08', 'Brasileiro', 'R Dr Cassiano','Cliente');


