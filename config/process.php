<?php

include_once("conn.php");
include_once("funcoes.php");

$id;
$receitaID;
$userID;
$onlyContato = [];
$AllContatos = [];
$AllFavoritos = [];

if (isset($_SESSION["id"])) {
  $userID = $_SESSION["id"];
}

if(!empty($_GET)) {
  $id = $_GET["id"];
  $receitaID = $_GET["receita_id"];
}

if(!empty($id) && !empty($receitaID)) {
  $onlyContato = umRegistro($id, $receitaID, $conn);
} 

$AllContatos = allRegistros($userID, $conn);
$AllFavoritos = todosFavoritos($userID, $conn);

if ( isset($_POST["campo_oculto"])) {
  $valorOculto = $_POST["campo_oculto"];
  $nomeReceita = $_POST["nome_receita"];
  $tempoPreparo = $_POST["tempo_preparo"];
  $ingredientes = $_POST["ingrediente"];
  // $quantidades = $_POST["quantidades"];
  $descricao = $_POST["modo_preparo"];

  if( !empty($nomeReceita) && !empty($tempoPreparo) && !empty($ingredientes) && !empty($descricao)) {
    echo "campo preenchido";

    criarReceita($userID, $nomeReceita, $tempoPreparo, $descricao, $ingredientes,$quantidades, $conn);

    header('Location:'.'../public/addreceita.php');
    // header('Location:'.'./process.php');

  } else {
    echo "campo vazio";
    // header('Location:'.'../public/addreceita.php');
  }

} elseif(isset($_POST["type"])) {
  $valorDelete = $_POST["type"];
  $idReceita = $_POST["id_receita"];
  $idIngrediente = $_POST["id_ingrediente"];
  $receitaId = $_POST["receita_id"];
  $receitaIngrediente = $_POST["receita_ingrediente"];
  echo $valorDelete;
  echo $idReceita;
  echo "Deletado";
  deletarDados($userID, $idReceita, $idIngrediente, $receitaId, $receitaIngrediente, $conn);
  header('Location:'.'../public/addreceita.php');


} elseif( isset($_POST["editar"])) {
  $valorEditar = $_POST["editar"];
  $receitaid = $_POST["receitaID"];
  $usuarioID = $_POST["usuarioID"];

  $nomeReceita = $_POST["nome_receita"];
  $tempoPreparo = $_POST["tempo_preparo"];
  $ingredientes = $_POST["ingrediente"];
  // $quantidades = $_POST["quantidades"];
  $descricao = $_POST["modo_preparo"];

  if( !empty($nomeReceita) && !empty($tempoPreparo) && !empty($ingredientes) && !empty($descricao)) {
    echo "editado";
    editarDados($userID, $receitaid, $nomeReceita, $tempoPreparo, $ingredientes, $quantidades, $descricao,$conn);
    // header('Location:'.'../public/edit.php');
    header('Location:'.'../public/addreceita.php');

  } else {
    echo "campos vazios";
  }
  // header('Location:'.'./process.php');
  echo $valorEditar . "  ";
  echo $usuarioID;
  
} elseif( isset($_POST["favorito"])) {
  $idReceita = $_POST["id_receita"];
  $idIngrediente = $_POST["id_ingrediente"];

  favorito($userID, $idReceita, $idIngrediente, $conn);
  // deletarDados($userID, $idReceita, $idIngrediente, $receitaId, $receitaIngrediente, $conn);
  echo "adicionado aos favoritos";
  $_SESSION["msgFavorito"] = "favorito";
  header('Location:'.'../public/addreceita.php');
 

} else if( isset($_POST["deletarFavorito"])) {
  $favoritoID = $_POST["favorito_id"];
  echo $favoritoID;
  echo "favorito deletado";
  deletarFavorito($favoritoID, $conn);
  header('Location:'.'../public/favoritos.php');
  
} else {
  echo "não foi deletado";
}



 










	




























?>