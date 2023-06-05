<?php

include_once("conn.php");
include_once("funcoes.php");

$receitaID;
$userID;
$onlyContato = [];
$AllContatos = [];
$AllFavoritos = [];

if (isset($_SESSION["id"])) {
  $userID = $_SESSION["id"];
}

if(!empty($_GET)) {
  $receitaID = $_GET["receita_id"];
  $onlyContato = umRegistro($userID, $receitaID, $conn);
}

// if(!empty($receitaID)) {
//   $onlyContato = umRegistro($userID, $receitaID, $conn);
// } 

$AllContatos = allRegistros($userID, $conn);
$AllFavoritos = todosFavoritos($userID, $conn);

if ( !empty($_POST["criar-receita"])) {
  $valorOculto = $_POST["campo_oculto"];
  $nomeReceita = $_POST["nome_receita"];
  $tempoPreparo = $_POST["tempo_preparo"];
  $ingredientes = $_POST["ingrediente"];
  // $quantidades = $_POST["quantidades"];
  $descricao = $_POST["modo_preparo"];

  if( !empty($nomeReceita) && !empty($tempoPreparo) && !empty($ingredientes) && !empty($descricao)) {
    // echo "campo preenchido";

    criarReceita($userID, $nomeReceita, $tempoPreparo, $descricao, $ingredientes,$quantidades, $conn);

    header('Location:'.'../public/addreceita.php');
    // header('Location:'.'./process.php');

  } else {
    // echo "campo vazio";
    header('Location:'.'../public/addreceita.php');
    $_SESSION["campo-vazio"] = "";
  }

} elseif(!empty($_POST["deletar-receita"])) {
  $valorDelete = $_POST["deletar-receita"];
  $idReceita = $_POST["id_receita"];
  $idIngrediente = $_POST["id_ingrediente"];
  $receitaId = $_POST["receita_id"];
  $receitaIngrediente = $_POST["receita_ingrediente"];
  // echo $valorDelete;
  // echo $idReceita;
  // echo "Deletado";
  deletarDados($userID, $idReceita, $idIngrediente, $receitaId, $receitaIngrediente, $conn);
  header('Location:'.'../public/addreceita.php');
  // !empty($_POST["editar"]
} 
elseif( !empty($_POST["editar"])) {
  $valorEditar = $_POST["editar"];
  $receitaid = $_POST["receitaID"];
  // $usuarioID = $_POST["usuarioID"];
  $nomeReceita = $_POST["nome_receita"];
  $tempoPreparo = $_POST["tempo_preparo"];
  $ingredientes = $_POST["ingrediente"];
  // $quantidades = $_POST["quantidades"];
  $descricao = $_POST["modo_preparo"];

  if( !empty($nomeReceita) && !empty($tempoPreparo) && !empty($ingredientes) && !empty($descricao)) {
    // echo "editado";
    editarDados($userID, $receitaid, $nomeReceita, $tempoPreparo, $ingredientes, $quantidades, $descricao,$conn);
    // header('Location:'.'../public/edit.php');
    header('Location:'.'../public/addreceita.php');

  } else {
    header('Location:'.'../public/addreceita.php');
    // header('Location:'.'../public/edit.php');
    // exit();
    $_SESSION["campo-vazio-editar"] = "";
  }
  
}
elseif( !empty($_POST["favorito"])) {
  $idReceita = $_POST["id_receita"];
  $idIngrediente = $_POST["id_ingrediente"];
  deletarDados($userID, $idReceita, $idIngrediente, $receitaId, $receitaIngrediente, $conn);
  favorito($userID, $idReceita, $idIngrediente, $conn);
  // deletarDados($userID, $idReceita, $idIngrediente, $receitaId, $receitaIngrediente, $conn);
  // echo "adicionado aos favoritos";
  $_SESSION["msgFavorito"] = "favorito";
  header('Location:'.'../public/addreceita.php');
 
} elseif( !empty($_POST["deletarFavorito"])) {
  $favoritoID = $_POST["favorito_id"];
  // echo $favoritoID;
  // echo "favorito deletado";
  deletarFavorito($favoritoID, $conn);
  header('Location:'.'../public/favoritos.php');
  
}


  





 










	




























?>