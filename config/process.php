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

// if(isset($_GET["receitaid-param"])) {
//   $receitaID = $_GET["receitaid-param"];
//   $onlyContato = umRegistro($userID, $receitaID, $conn);
// } 
if(!empty($_GET)) {
  $receitaID = $_GET["receita_id"];
}

if(!empty($receitaID)) {
  $onlyContato = umRegistro($userID, $receitaID, $conn);
} 

// $onlyContato = umRegistro($userID, $receitaID, $conn);

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
    $_SESSION["campo-vazio"] = '
    <div class="row">
      <div class="col pt-3">
        <p class="text-center text-danger">Preencha todos os campos!</p>
      </div>
    </div>';
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
    exit();
  }
  
}
elseif( !empty($_POST["favorito"])) {
  $idReceita = $_POST["id_receita"];
  $idIngrediente = $_POST["id_ingrediente"];
  deletarDados($userID, $idReceita, $idIngrediente, $receitaId, $receitaIngrediente, $conn);
  favorito($userID, $idReceita, $idIngrediente, $conn);
  // deletarDados($userID, $idReceita, $idIngrediente, $receitaId, $receitaIngrediente, $conn);
  // echo "adicionado aos favoritos";
  $_SESSION["msgFavorito"] = '
  <div class="toast-container top-0 start-50 translate-middle-x p-3">
    <div
      id="liveToast"
      class="toast d-flex text-bg-primary"
      role="alert"
      aria-live="assertive"
      aria-atomic="true"
    >
      <div class="toast-body rounded border-2">Adicionado aos favoritos!</div>
      <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
  </div>';
  header('Location:'.'../public/addreceita.php');
 
} elseif( !empty($_POST["deletarFavorito"])) {
  $favoritoID = $_POST["favorito_id"];
  // echo $favoritoID;
  // echo "favorito deletado";
  deletarFavorito($favoritoID, $conn);
  header('Location:'.'../public/favoritos.php');
  
}


  





 










	




























?>