CREATE DATABASE livro_receita;
USE livro_receita;

CREATE TABLE usuarios (
  id_usuarios INT PRIMARY KEY AUTO_INCREMENT,
  nome_usuarios VARCHAR(250) NOT NULL,
  sobre_nome VARCHAR(250) NOT NULL,
  email VARCHAR(250) NOT NULL,
  senha VARCHAR(250) NOT NULL
);

CREATE TABLE receitas (
  id_receitas INT PRIMARY KEY AUTO_INCREMENT,
  nome_receitas TEXT NOT NULL,
  tempo_de_preparo INT NOT NULL,
  descricao TEXT NOT NULL
);

CREATE TABLE ingredientes (
  id_ingredientes INT PRIMARY KEY AUTO_INCREMENT,
  nome_ingredientes VARCHAR(255) NOT NULL
);

CREATE TABLE usuarios_receitas (
  id_usuarios_receitas INT AUTO_INCREMENT PRIMARY KEY,
  id_usuarios_ur INT,
  id_receitas_ur INT,
  FOREIGN KEY (id_usuarios_ur) REFERENCES usuarios(id_usuarios) ON DELETE CASCADE,
  FOREIGN KEY (id_receitas_ur) REFERENCES receitas(id_receitas) ON DELETE CASCADE
);

CREATE TABLE receitas_ingredientes (
	id_receitas_ingredientes INT AUTO_INCREMENT PRIMARY KEY,
	id_receitas_ri INT,
	id_ingredientes_ri INT,
	FOREIGN KEY (id_receitas_ri) REFERENCES receitas(id_receitas) ON DELETE CASCADE,
	FOREIGN KEY (id_ingredientes_ri) REFERENCES ingredientes(id_ingredientes) ON DELETE CASCADE
);

CREATE TABLE favoritos (
  id_favoritos INT PRIMARY KEY AUTO_INCREMENT,
  id_usuarios_fa INT,
  receitas_fa VARCHAR(255) NOT NULL,
  tempo_de_preparo_fa INT,
  ingredientes_fa TEXT NOT NULL,
  descricao_fa TEXT
);