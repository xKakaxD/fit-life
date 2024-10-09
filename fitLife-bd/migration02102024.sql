--alteração da estrutura do banco na tabela Usuarios para o tipo de usuário
ALTER TABLE USUARIOS
CHANGE tipo_usuario tipo_usuario ENUM('Admin', 'Treinador', 'Cliente');

 --fazer o insert para a tabela usuarios
INSERT INTO USUARIOS (nome, email, senha, sexo, dt_nascimento, nacionalidade, endereco, tipo_usuario)
VALUE ('Kaká D Moro', 'ti.demoro@gmail.com', 'ea955525832b0f4680dad7efd9183140381f5f02ef3f42fb61bc2c60ed7ce14d', 'M', '1999-10-08', 'Brasileiro', 'R Dr Cassiano','Cliente'),
('Kaká D Moro', 'xkakaxd@gmail.com', 'ea955525832b0f4680dad7efd9183140381f5f02ef3f42fb61bc2c60ed7ce14d', 'M', '1999-10-08', 'Brasileiro', 'R Dr Cassiano','Treinador'),
('Sarah', 'sarah@gmail.com', '55A5E9E78207B4DF8699D60886FA070079463547B095D1A05BC719BB4E6CD251', 'F', '2001-07-02', 'Brasileiro', 'R Servillo De Moro','Cliente')
;

--Pode copiar esse insert ao invés do de cima,  retirar os "--" para funcionar a senha está definida como: senha123
--INSERT INTO USUARIOS (nome, email, senha, sexo, dt_nascimento, nacionalidade, endereco, tipo_usuario)
--VALUE
--('Sarah G', 'sarahTrainer@gmail.com', '55A5E9E78207B4DF8699D60886FA070079463547B095D1A05BC719BB4E6CD251', 'F', '2001-07-02', 'Brasileiro', 'R Servillo De Moro','Treinador'),
--('Sarah', 'sarah@gmail.com', '55A5E9E78207B4DF8699D60886FA070079463547B095D1A05BC719BB4E6CD251', 'F', '2001-07-02', 'Brasileiro', 'R Servillo De Moro','Cliente')
--;


