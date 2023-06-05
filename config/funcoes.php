<?php

include_once("conn.php");

// Retorna todos os registros
function allRegistros($userID, $conn) {
  $query= "SELECT usuario.id AS id_usuario, receitas.nome AS nome_receita, receitas.tempo_de_preparo 
  AS tempo_preparo, ingredientes.nome AS nome_ingrediente, ingredientes.quantidade 
  AS ingredientes_qtd, receitas.descricao AS modo_preparo, receitas.id AS id_receita,
  ingredientes.id AS id_ingrediente, receitas.id AS receita_id, ingredientes.id AS
  receita_ingrediente
  FROM usuario
  INNER JOIN usuarios_receitas ON usuario.id = usuarios_receitas.id_usuario
  INNER JOIN receitas ON usuarios_receitas.id = receitas.id
  INNER JOIN receitas_ingredientes ON receitas.id = receitas_ingredientes.id_receita
  INNER JOIN ingredientes ON receitas_ingredientes.id_ingrediente = ingredientes.id
  WHERE usuario.id = :userID";
  $stmt= $conn->prepare($query);
  $stmt->bindParam(":userID",$userID, PDO::PARAM_INT);
  $stmt->execute();
  return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function umRegistro($id, $receitaID, $conn) {
  $query= "SELECT usuario.id AS id_usuario, receitas.nome AS receita_nome, receitas.tempo_de_preparo 
  AS tempo_preparo, ingredientes.nome AS nome_ingrediente, ingredientes.quantidade 
  AS ingredientes_qtd, receitas.descricao AS modo_preparo, receitas.id AS id_receita,
  ingredientes.id AS id_ingrediente, receitas.id AS receita_id, ingredientes.id AS
  receita_ingrediente
  FROM usuario
  INNER JOIN usuarios_receitas ON usuario.id = usuarios_receitas.id_usuario
  INNER JOIN receitas ON usuarios_receitas.id = receitas.id
  INNER JOIN receitas_ingredientes ON receitas.id = receitas_ingredientes.id_receita
  INNER JOIN ingredientes ON receitas_ingredientes.id_ingrediente = ingredientes.id
  WHERE usuario.id = :id AND receitas.id = :receitaID";
  // AND receitas.id = :receitaID
  
  $stmt= $conn->prepare($query);
  $stmt->bindParam(":id",$id);

  $stmt->bindParam(":receitaID", $receitaID);
  $stmt->execute();

  return $stmt->fetch(PDO::FETCH_ASSOC);
}

// insere dados no BD
function criarReceita($userID, $nomeReceita, $tempoPreparo, $descricao, $ingredientes,$quantidades, $conn) {

  $conn->beginTransaction();

  // receitas
  $query= "INSERT INTO receitas (nome, tempo_de_preparo, descricao) 
  VALUES (:nome, :tempo_de_preparo, :descricao)";
  $stmt= $conn->prepare($query);
  $stmt->bindParam(":nome", $nomeReceita);
  $stmt->bindParam(":tempo_de_preparo", $tempoPreparo);
  $stmt->bindParam(":descricao", $descricao);
  $stmt->execute();
  $id_receita = $conn->lastInsertId();

  // usuarios_receitas
  $query = "INSERT INTO usuarios_receitas (id_usuario, id_receita) 
  VALUES (:id_usuario, :id_receita)";
  $stmt= $conn->prepare($query);
  $stmt->bindParam(":id_usuario", $userID);
  $stmt->bindParam(":id_receita", $id_receita);
  $stmt->execute();

  // ingredientes
  $query = "INSERT INTO ingredientes (nome, quantidade)
  VALUES (:nome, :quantidade);";
  $stmt= $conn->prepare($query);
  $stmt->bindParam(":nome", $ingredientes);
  $stmt->bindParam(":quantidade", $quantidades);
  $stmt->execute();
  $id_ingrediente = $conn->lastInsertId();

  // receitas_ingredientes
  $query = "INSERT INTO receitas_ingredientes (id_receita, id_ingrediente) 
  VALUES (:id_receita, :id_ingrediente);";
  $stmt= $conn->prepare($query);
  $stmt->bindParam(":id_receita", $id_receita);
  $stmt->bindParam(":id_ingrediente", $id_ingrediente);
  $stmt->execute();

  $conn->commit();
}

// edita os dados no BD
function editarDados($userID, $receitaid, $nomeReceita, $tempoPreparo, $ingredientes, $quantidades, $descricao,$conn) {

  $query = "UPDATE Curso SET nome = :nome, data_inicio = :data_inicio, unidade = :unidade, enquadramento = :enquadramento, endereco = :endereco, coordenador = :coordenador, qtd_vagas = :qtd_vagas, turno = :turno WHERE id = :idPost";

  $query = "UPDATE receitas AS T1
  JOIN receitas_ingredientes AS TJ ON T1.id = TJ.id_receita
  JOIN ingredientes AS T2 ON TJ.id_ingrediente = T2.id
  JOIN usuarios_receitas AS T3 ON T3.id_receita = T1.id
  SET T1.nome = :nomeReceita, T1.tempo_de_preparo = :tempoPreparo, 
  T1.descricao = :descricao, T2.nome = :ingredientes, T2.quantidade = :quantidades WHERE T1.id = :receitaid AND T3.id_usuario = :userID";

  $stmt= $conn->prepare($query);
  $stmt->bindParam(":nomeReceita", $nomeReceita);
  $stmt->bindParam(":tempoPreparo", $tempoPreparo);
  $stmt->bindParam(":descricao", $descricao);
  $stmt->bindParam(":ingredientes", $ingredientes);
  $stmt->bindParam(":quantidades", $quantidades);
  $stmt->bindParam(":receitaid", $receitaid);
  $stmt->bindParam(":userID", $userID);
  $stmt->execute();

}

// exclui dados no BD
function deletarDados($userID, $idReceita, $idIngrediente, $receitaId, $receitaIngrediente, $conn) {
  
  $query= "DELETE FROM usuarios_receitas WHERE id_receita = :id_receita
  AND id_usuario = :userID";
  $stmt= $conn->prepare($query);
  $stmt->bindParam(":id_receita", $idReceita, PDO::PARAM_INT);
  $stmt->bindParam(":userID", $userID, PDO::PARAM_INT);
  $stmt->execute();

  $query= "DELETE FROM receitas_ingredientes WHERE id_receita = :id_receita
  AND id_ingrediente = :id_ingrediente";
  $stmt= $conn->prepare($query);
  $stmt->bindParam(":id_receita", $idReceita, PDO::PARAM_INT);
  $stmt->bindParam(":id_ingrediente", $idIngrediente, PDO::PARAM_INT);
  $stmt->execute();

  $query= "DELETE FROM receitas WHERE id = :receita_id";
  $stmt= $conn->prepare($query);
  $stmt->bindParam(":receita_id", $receitaId, PDO::PARAM_INT);
  $stmt->execute();

  $query= "DELETE FROM ingredientes WHERE id = :receita_ingrediente";
  $stmt= $conn->prepare($query);
  $stmt->bindParam(":receita_ingrediente", $receitaIngrediente, PDO::PARAM_INT);
  $stmt->execute();
}

function todosFavoritos($userID, $conn) {
  $query = "SELECT favoritos.id, receitas.nome, receitas.tempo_de_preparo, ingredientes.nome AS nome_ingrediente, 
  ingredientes.quantidade, receitas.descricao
  FROM favoritos
  INNER JOIN usuario ON favoritos.id_usuario = usuario.id
  INNER JOIN ingredientes ON favoritos.id_ingredientes = ingredientes.id
  INNER JOIN receitas ON favoritos.id_receita = receitas.id
  WHERE id_usuario = :userID";
  $stmt= $conn->prepare($query);
  $stmt->bindParam(":userID", $userID, PDO::PARAM_INT);
  $stmt->execute();
  return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function umFavorito($userID, $favoritoID, $conn) {
  $query = "SELECT favoritos.id, receitas.nome, receitas.tempo_de_preparo, ingredientes.nome AS nome_ingrediente, 
  ingredientes.quantidade, receitas.descricao
  FROM favoritos
  INNER JOIN usuario ON favoritos.id_usuario = usuario.id
  INNER JOIN ingredientes ON favoritos.id_ingredientes = ingredientes.id
  INNER JOIN receitas ON favoritos.id_receita = receitas.id
  WHERE usuario.id = :userID AND favoritos.id = :favoritoID";
  $stmt= $conn->prepare($query);
  $stmt->bindParam(":userID", $userID, PDO::PARAM_INT);
  $stmt->bindParam(":favoritoID", $favoritoID, PDO::PARAM_INT);
  $stmt->execute();
  return $stmt->fetch(PDO::FETCH_ASSOC);
}

function favorito($userID, $idReceita, $idIngrediente, $conn) {
  $query = "INSERT INTO favoritos (id_usuario, id_receita, id_ingredientes)
  VALUES (:userID, :idReceita, :idIngrediente)";
  $stmt= $conn->prepare($query);
  $stmt->bindParam(":userID", $userID, PDO::PARAM_INT);
  $stmt->bindParam(":idReceita", $idReceita, PDO::PARAM_INT);
  $stmt->bindParam(":idIngrediente", $idIngrediente, PDO::PARAM_INT);
  $stmt->execute();

}

function deletarFavorito($favoritoID, $conn) {
  $query = "DELETE FROM favoritos WHERE id = :favoritoID";
  $stmt= $conn->prepare($query);
  $stmt->bindParam(":favoritoID", $favoritoID, PDO::PARAM_INT);
  $stmt->execute();

}

?>