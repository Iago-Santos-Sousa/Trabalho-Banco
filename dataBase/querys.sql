-- query com as receitas
SELECT *
FROM usuarios
INNER JOIN usuarios_receitas ON usuarios.id_usuarios = usuarios_receitas.id_usuarios_ur
INNER JOIN receitas ON usuarios_receitas.id_receitas_ur = receitas.id_receitas
INNER JOIN receitas_ingredientes 
ON receitas.id_receitas = receitas_ingredientes.id_receitas_ri
INNER JOIN ingredientes 
ON receitas_ingredientes.id_ingredientes_ri = ingredientes.id_ingredientes
WHERE usuarios.id_usuarios = 1;

-- query delete receitas
DELETE receitas
FROM receitas
JOIN usuarios ON usuarios.id_usuarios = usuarios.id_usuarios
WHERE receitas.id_receitas = 1 AND usuarios.id_usuarios = 1;

DELETE ingredientes
FROM ingredientes
JOIN usuarios ON usuarios.id_usuarios = usuarios.id_usuarios
WHERE ingredientes.id_ingredientes = 1 AND usuarios.id_usuarios = 1;

-- query update receitas
UPDATE receitas AS T1
JOIN receitas_ingredientes AS TJ ON T1.id_receitas = TJ.id_receitas_ingredientes
JOIN ingredientes AS T2 ON TJ.id_ingredientes_ri = T2.id_ingredientes
JOIN usuarios_receitas AS T3 ON T3.id_receitas_ur = T1.id_receitas
SET T1.nome_receitas = "teste2", T1.tempo_de_preparo = 3, T1.descricao = "teste2",
T2.nome_ingredientes = 3
WHERE T1.id_receitas = 13 AND T3.id_usuarios_ur = 1;

-- query favoritos
SELECT *
FROM favoritos
INNER JOIN usuarios ON usuarios.id_usuarios = 1
WHERE favoritos.id_usuarios_fa = 1; 

-- query delete favoritos
DELETE FROM favoritos WHERE id_favoritos = 1 AND id_usuarios_fa = 1;