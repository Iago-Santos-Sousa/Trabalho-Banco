INSERT INTO usuarios (nome_usuarios, sobre_nome, email, senha)
VALUES ("b", "b", "b@gmail.com", "123");

INSERT INTO receitas (nome_receitas, tempo_de_preparo, descricao)
VALUES ("Pão de queijo", 50, "Um delicioso pão de queijo");

INSERT INTO ingredientes (nome_ingredientes)
VALUES ("2 fatias de queijo");

INSERT INTO usuarios_receitas (id_usuarios_ur, id_receitas_ur) 
VALUES (1, 1);

INSERT INTO receitas_ingredientes (id_receitas_ri, id_ingredientes_ri) 
VALUES (1, 1);

INSERT INTO favoritos 
(id_usuarios_fa, receitas_fa, tempo_de_preparo_fa, ingredientes_fa, descricao_fa)
VALUES (1, "Pão de queijo", 20, "2 fatias de queijo", "misturar tudo");