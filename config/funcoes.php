<?php

include_once("conn.php");

$userID;

if (isset($_SESSION["id_usuarios"])) {
  $userID = $_SESSION["id_usuarios"];
} 

$_SESSION["receitaIDEditar"];
$umRegistroReceitaArray = [];
$todosRegistrosReceitasArray = [];
$todosRegistrosFavoritosArray = [];

// Retorna todos os registros
function todosRegistrosReceitas($userID) {
  global $conn;
  $query= "SELECT *
  FROM usuarios
  INNER JOIN usuarios_receitas ON usuarios.id_usuarios = usuarios_receitas.id_usuarios_ur
  INNER JOIN receitas ON usuarios_receitas.id_receitas_ur = receitas.id_receitas
  INNER JOIN receitas_ingredientes 
  ON receitas.id_receitas = receitas_ingredientes.id_receitas_ri
  INNER JOIN ingredientes 
  ON receitas_ingredientes.id_ingredientes_ri = ingredientes.id_ingredientes
  WHERE usuarios.id_usuarios = :id_usuarios";
  $stmt= $conn->prepare($query);
  $stmt->bindParam(":id_usuarios",$userID, PDO::PARAM_INT);
  $stmt->execute();
  return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// retorna apenas um registro
function umRegistroReceita($userID, $receitaID) {
  global $conn;
  $query= "SELECT *
  FROM usuarios
  INNER JOIN usuarios_receitas ON usuarios.id_usuarios = usuarios_receitas.id_usuarios_ur
  INNER JOIN receitas ON usuarios_receitas.id_receitas_ur = receitas.id_receitas
  INNER JOIN receitas_ingredientes ON receitas.id_receitas = receitas_ingredientes.id_receitas_ri
  INNER JOIN ingredientes ON receitas_ingredientes.id_ingredientes_ri = ingredientes.id_ingredientes
  WHERE usuarios.id_usuarios = :userID AND receitas.id_receitas = :receitaID";
  
  $stmt= $conn->prepare($query);
  $stmt->bindParam(":userID",$userID);
  $stmt->bindParam(":receitaID", $receitaID);
  $stmt->execute();

  return $stmt->fetch(PDO::FETCH_ASSOC);
}

// insere dados no BD
function criarReceitas($userID, $nomeReceita, $tempoPreparo, $descricao, $ingredientes) {
  global $conn;
  $conn->beginTransaction();

  // receitas
  $query= "INSERT INTO receitas (nome_receitas, tempo_de_preparo, descricao)
  VALUES (:nome_receitas, :tempo_de_preparo, :descricao)";
  $stmt= $conn->prepare($query);
  $stmt->bindParam(":nome_receitas", $nomeReceita);
  $stmt->bindParam(":tempo_de_preparo", $tempoPreparo);
  $stmt->bindParam(":descricao", $descricao);
  $stmt->execute();
  $id_receita = $conn->lastInsertId();

  // usuarios_receitas
  $query = "INSERT INTO usuarios_receitas (id_usuarios_ur, id_receitas_ur) 
  VALUES (:id_usuarios_ur, :id_receitas_ur)";
  $stmt= $conn->prepare($query);
  $stmt->bindParam(":id_usuarios_ur", $userID);
  $stmt->bindParam(":id_receitas_ur", $id_receita);
  $stmt->execute();

  // ingredientes
  $query = "INSERT INTO ingredientes (nome_ingredientes)
  VALUES (:nome_ingredientes);";
  $stmt= $conn->prepare($query);
  $stmt->bindParam(":nome_ingredientes", $ingredientes);
  $stmt->execute();
  $id_ingrediente = $conn->lastInsertId();

  // receitas_ingredientes
  $query = "INSERT INTO receitas_ingredientes (id_receitas_ri, id_ingredientes_ri) 
  VALUES (:id_receitas_ri, :id_ingredientes_ri);";
  $stmt= $conn->prepare($query);
  $stmt->bindParam(":id_receitas_ri", $id_receita);
  $stmt->bindParam(":id_ingredientes_ri", $id_ingrediente);
  $stmt->execute();

  $conn->commit();
}

// edita os dados no BD
function editarReceita($userID, $receitaid, $nomeReceita, $tempoPreparo, $ingredientes, $descricao) {
  global $conn;

  $query = "UPDATE receitas AS T1
  JOIN receitas_ingredientes AS TJ ON T1.id_receitas = TJ.id_receitas_ingredientes
  JOIN ingredientes AS T2 ON TJ.id_ingredientes_ri = T2.id_ingredientes
  JOIN usuarios_receitas AS T3 ON T3.id_receitas_ur = T1.id_receitas
  SET T1.nome_receitas = :nomeReceita, T1.tempo_de_preparo = :tempoPreparo, T1.descricao = :descricao, T2.nome_ingredientes = :ingredientes
  WHERE T1.id_receitas = :receitaid AND T3.id_usuarios_ur = :userID";
  
  $stmt= $conn->prepare($query);
  $stmt->bindParam(":nomeReceita", $nomeReceita);
  $stmt->bindParam(":tempoPreparo", $tempoPreparo);
  $stmt->bindParam(":descricao", $descricao);
  $stmt->bindParam(":ingredientes", $ingredientes);
  $stmt->bindParam(":receitaid", $receitaid);
  $stmt->bindParam(":userID", $userID);
  $stmt->execute();

}

// exclui dados no BD
function deletarReceita($userID, $idReceita, $idIngrediente) {
  global $conn;

  $query= "DELETE receitas
  FROM receitas
  JOIN usuarios ON usuarios.id_usuarios = usuarios.id_usuarios
  WHERE receitas.id_receitas = :id_receita AND usuarios.id_usuarios = :userID";
  $stmt= $conn->prepare($query);
  $stmt->bindParam(":id_receita", $idReceita, PDO::PARAM_INT);
  $stmt->bindParam(":userID", $userID, PDO::PARAM_INT);
  $stmt->execute();

  $query= "DELETE ingredientes
  FROM ingredientes
  JOIN usuarios ON usuarios.id_usuarios = usuarios.id_usuarios
  WHERE ingredientes.id_ingredientes = :id_receita AND usuarios.id_usuarios = :id_ingrediente";
  $stmt= $conn->prepare($query);
  $stmt->bindParam(":id_receita", $idReceita, PDO::PARAM_INT);
  $stmt->bindParam(":id_ingrediente", $idIngrediente, PDO::PARAM_INT);
  $stmt->execute();
}

// retorna todos os registros da tabela favoritos
function todosRegistrosFavoritos($userID) {
  global $conn;
  $query = "SELECT *
  FROM favoritos
  WHERE id_usuarios_fa = :userID";
  $stmt= $conn->prepare($query);
  $stmt->bindParam(":userID", $userID, PDO::PARAM_INT);
  $stmt->execute();
  return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// retorna todos apenas um registro da tabela favoritos
function umRegistroFavorito($userID, $favoritoID) {
  global $conn;
  $query = "SELECT *
  FROM favoritos
  INNER JOIN usuarios ON usuarios.id_usuarios = usuarios.id_usuarios
  WHERE favoritos.id_usuarios_fa = :userID AND favoritos.id_favoritos = :favoritoID";
  $stmt= $conn->prepare($query);
  $stmt->bindParam(":userID", $userID, PDO::PARAM_INT);
  $stmt->bindParam(":favoritoID", $favoritoID, PDO::PARAM_INT);
  $stmt->execute();
  return $stmt->fetch(PDO::FETCH_ASSOC);
}

// insere dados na tabela favoritos do BD
function inserirFavorito($userID, $idReceita) {
  global $conn;
  $favoritoRegistro = [];
  $favoritoRegistro = umRegistroReceita($userID, $idReceita);

  $query = "INSERT INTO favoritos 
  (id_usuarios_fa, receitas_fa, tempo_de_preparo_fa, ingredientes_fa, descricao_fa)
  VALUES (:id_usuarios_fa, :receitas_fa, :tempo_de_preparo_fa, :ingredientes_fa, :descricao_fa)";
  $stmt= $conn->prepare($query);
  $stmt->bindParam(":id_usuarios_fa", $userID, PDO::PARAM_INT);
  $stmt->bindParam(":receitas_fa", $favoritoRegistro["nome_receitas"], PDO::PARAM_INT);
  $stmt->bindParam(":tempo_de_preparo_fa", $favoritoRegistro["tempo_de_preparo"]);
  $stmt->bindParam(":ingredientes_fa", $favoritoRegistro["nome_ingredientes"]);
  $stmt->bindParam(":descricao_fa", $favoritoRegistro["descricao"]);
  $stmt->execute();

}

// deleta um favorito específico no BD
function deletarFavorito($favoritoID, $userID) {
  global $conn;
  $query = "DELETE FROM favoritos WHERE id_favoritos = :favoritoID AND id_usuarios_fa = :userID";
  $stmt= $conn->prepare($query);
  $stmt->bindParam(":favoritoID", $favoritoID, PDO::PARAM_INT);
  $stmt->bindParam(":userID", $userID, PDO::PARAM_INT);
  $stmt->execute();

}

?>