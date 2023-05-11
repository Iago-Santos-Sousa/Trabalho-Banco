CREATE DATABASE livro_receita;
USE livro_receita;

CREATE TABLE usuario (
    id INT NOT NULL AUTO_INCREMENT,
    nome VARCHAR(60) NOT NULL,
    sobre_nome VARCHAR(60) NOT NULL,
    email VARCHAR(60) NOT NULL,
    senha VARCHAR(60) NOT NULL,
    PRIMARY KEY (id)
);

CREATE TABLE receitas (
    id INT(11) NOT NULL AUTO_INCREMENT,
    nome VARCHAR(255) NOT NULL,
    tempo_de_preparo INT(11) NOT NULL,
    modo_de_preparo TEXT NOT NULL,
    PRIMARY KEY (id)
);


CREATE TABLE ingredientes (
    id INT(11) NOT NULL AUTO_INCREMENT,
    nome VARCHAR(255) NOT NULL,
    PRIMARY KEY (id)
);

CREATE TABLE quantidades (
    id INT(11) NOT NULL AUTO_INCREMENT,
    quantidade INT(11) NOT NULL,
    unidade_de_medida VARCHAR(255) NOT NULL,
    PRIMARY KEY (id)
);

CREATE TABLE receitas_ingredientes (
    id INT(11) NOT NULL AUTO_INCREMENT,
    id_receita INT(11) NOT NULL,
    id_ingrediente INT(11) NOT NULL,
    id_quantidade INT(11) NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (id_receita) REFERENCES receitas(id),
    FOREIGN KEY (id_ingrediente) REFERENCES ingredientes(id),
    FOREIGN KEY (id_quantidade) REFERENCES quantidades(id)
);






    