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
    tempo_de_preparo INT(11) NOT NULL,
    descricao TEXT NOT NULL,
    usuario_id INT,
    FOREIGN KEY (usuario_id) REFERENCES usuario(id)
);

CREATE TABLE ingredientes (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(255) NOT NULL,
    quantidade VARCHAR(50),
    -- unidade VARCHAR(50),
    receita_id INT,
    FOREIGN KEY (receita_id) REFERENCES receitas(id)
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

INSERT INTO receitas (nome, tempo_de_preparo, descricao, usuario_id)
VALUES ("Pão de queijo", 50, "Um delicioso pão de queijo", 1);

INSERT INTO ingredientes (nome, quantidade, receita_id)
VALUES ("Queijo", "2 fatias", 2);

INSERT INTO favoritos (id_usuario, id_receita, id_ingredientes)
VALUES (1, 1, 1);

SELECT receitas.nome, receitas.tempo_de_preparo, receitas.descricao, ingredientes.nome 
AS nome_ingrediente,
ingredientes.quantidade 
FROM favoritos
INNER JOIN usuario ON favoritos.id_usuario = usuario.id
INNER JOIN ingredientes ON favoritos.id_ingredientes = ingredientes.id
INNER JOIN receitas ON favoritos.id_receita = receitas.id
WHERE id_usuario = 1;

SELECT receitas.nome AS nome_receita, usuario.id AS id_usuario
  FROM receitas
  INNER JOIN ingredientes ON receitas.id = ingredientes.receita_id
  INNER JOIN usuario ON receitas.usuario_id = usuario.id
  WHERE receitas.usuario_id = 1;






    