

DELETE FROM usuario WHERE id >= 1;

CREATE TABLE receitas (
	receita_id INT NOT NULL AUTO_INCREMENT,
    receita_nome VARCHAR(60) NOT NULL,
    descricao VARCHAR(90) NOT NULL,
    PRIMARY KEY (receita_id)
);

CREATE TABLE medicao_unidades (
	medicao_id INT NOT NULL AUTO_INCREMENT,
    medicao_descricao VARCHAR(90) NOT NULL,
    PRIMARY KEY (medicao_id)
);

CREATE TABLE medicao_qty (
	medicao_qty_id INT NOT NULL AUTO_INCREMENT,
    qty_amount VARCHAR(90) NOT NULL,
    PRIMARY KEY (medicao_qty_id)
);

CREATE TABLE ingredientes (
	ingrediente_id INT NOT NULL AUTO_INCREMENT,
    ingrediente_nome VARCHAR(90) NOT NULL,
    PRIMARY KEY (ingrediente_id)
);

CREATE TABLE receita_ingredientes (
	receita_id INT NOT NULL,
    medicao_id INT NOT NULL,
    medicao_qty_id INT NOT NULL,
    ingrediente_id INT NOT NULL,
    FOREIGN KEY (receita_id) REFERENCES receitas(receita_id),
    FOREIGN KEY (medicao_id) REFERENCES medicao_unidades(medicao_id),
    FOREIGN KEY (medicao_qty_id) REFERENCES medicao_qty(medicao_qty_id),
    FOREIGN KEY (ingrediente_id) REFERENCES ingredientes(ingrediente_id)
);

INSERT INTO receitas(receita_nome, descricao) VALUES ("bolo de fubá", "bolo de fuba 
preparado com banho maria");

INSERT INTO medicao_unidades(medicao_descricao) VALUES ("utilizamos bastante ovos e farinha");
INSERT INTO medicao_qty(qty_amount) VALUES ("10 ovos e 1 saco de farinha de trigo");
INSERT INTO ingredientes(ingrediente_nome) VALUES ("farinha e ovos");


    