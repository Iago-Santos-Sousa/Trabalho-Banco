CREATE DATABASE livro_receita;
USE livro_receita;

CREATE TABLE usuario (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(250) NOT NULL,
    sobre_nome VARCHAR(250) NOT NULL,
    email VARCHAR(250) NOT NULL,
    senha VARCHAR(250) NOT NULL
);

CREATE TABLE receitas (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(255) NOT NULL,
    tempo_de_preparo INT NOT NULL,
    descricao TEXT NOT NULL
);

CREATE TABLE ingredientes (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(255) NOT NULL,
    quantidade VARCHAR(50)
);

CREATE TABLE usuarios_receitas (
  id INT AUTO_INCREMENT PRIMARY KEY,
  id_usuario INT,
  id_receita INT,
  FOREIGN KEY (id_usuario) REFERENCES usuario(id) ON DELETE CASCADE,
  FOREIGN KEY (id_receita) REFERENCES receitas(id) ON DELETE CASCADE
);

CREATE TABLE receitas_ingredientes (
	id INT AUTO_INCREMENT PRIMARY KEY,
	id_receita INT,
	id_ingrediente INT,
	FOREIGN KEY (id_receita) REFERENCES receitas(id) ON DELETE CASCADE,
	FOREIGN KEY (id_ingrediente) REFERENCES ingredientes(id) ON DELETE CASCADE
);

CREATE TABLE favoritos (
    id INT PRIMARY KEY AUTO_INCREMENT,
    -- nome_receita VARCHAR(255) NOT NULL,
    id_usuario INT,
    id_receita INT,
    id_ingredientes INT,
    FOREIGN KEY (id_usuario) REFERENCES usuario(id),
    FOREIGN KEY (id_receita) REFERENCES receitas(id),
    FOREIGN KEY (id_ingredientes) REFERENCES ingredientes(id)
);

INSERT INTO usuario (nome, sobre_nome, email, senha)
VALUES ("b", "b", "b@gmail.com", "123");

INSERT INTO receitas (nome, tempo_de_preparo, descricao)
VALUES ("Bolo", 50, "Um delicioso bolo");

INSERT INTO ingredientes (nome, quantidade)
VALUES ("chocolate", "5 barras");

INSERT INTO usuarios_receitas (id_usuario, id_receita) 
VALUES (1, 1);

INSERT INTO receitas_ingredientes (id_receita, id_ingrediente) 
VALUES (1, 1);

INSERT INTO favoritos (id_usuario, id_receita, id_ingredientes)
VALUES (1, 1, 1);

-- query favoritos
SELECT favoritos.id, receitas.nome, receitas.tempo_de_preparo, ingredientes.nome AS 
nome_ingrediente, ingredientes.quantidade, receitas.descricao
FROM favoritos
INNER JOIN usuario ON favoritos.id_usuario = usuario.id
INNER JOIN ingredientes ON favoritos.id_ingredientes = ingredientes.id
INNER JOIN receitas ON favoritos.id_receita = receitas.id
WHERE id_usuario = 1;

-- query com as receitas
SELECT usuario.id AS id_usuario, receitas.nome AS nome_receita, receitas.tempo_de_preparo 
AS tempo_preparo, ingredientes.nome AS nome_ingrediente, ingredientes.quantidade 
AS ingredientes_qtd, receitas.descricao AS modo_preparo, receitas.id AS id_receita,
ingredientes.id AS id_ingrediente, receitas.id AS receita_id, ingredientes.id AS
receita_ingrediente
FROM usuario
INNER JOIN usuarios_receitas ON usuario.id = usuarios_receitas.id_usuario
INNER JOIN receitas ON usuarios_receitas.id = receitas.id
INNER JOIN receitas_ingredientes ON receitas.id = receitas_ingredientes.id_receita
INNER JOIN ingredientes ON receitas_ingredientes.id_ingrediente = ingredientes.id
WHERE usuario.id = 1;

-- query delete
-- DELETE FROM usuarios_receitas WHERE id_receita = 1 AND id_usuario = 1;
-- DELETE FROM receitas_ingredientes WHERE id_receita = 2 AND id_ingrediente = 2;
-- DELETE FROM receitas WHERE id = 2;
-- DELETE FROM ingredientes WHERE id = 2;
DELETE receitas
FROM receitas
JOIN usuario ON usuario.id = usuario.id
WHERE receitas.id = 1 AND usuario.id = 1;

DELETE ingredientes
FROM ingredientes
JOIN usuario ON usuario.id = usuario.id
WHERE ingredientes.id = 1 AND usuario.id = 1;

-- query update
UPDATE receitas AS T1
JOIN receitas_ingredientes AS TJ ON T1.id = TJ.id_receita
JOIN ingredientes AS T2 ON TJ.id_ingrediente = T2.id
JOIN usuarios_receitas AS T3 ON T3.id_receita = T1.id
SET T1.nome = 3, T1.tempo_de_preparo = 3, T1.descricao = 3,
T2.nome = 3, T2.quantidade = 3
WHERE T1.id = 6 AND T3.id_usuario = 1;

-- query delete favoritos
DELETE FROM favoritos WHERE id > 0;












    