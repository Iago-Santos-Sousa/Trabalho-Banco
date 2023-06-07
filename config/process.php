<?php

include_once("funcoes.php");

if($_SERVER["REQUEST_METHOD"] === "POST") {
  
  if ( !empty($_POST["criar-receita"])) {
    $nomeReceita = $_POST["nome_receita"];
    $tempoPreparo = $_POST["tempo_preparo"];
    $ingredientes = $_POST["ingrediente"];
    $descricao = $_POST["modo_preparo"];

    if( !empty($nomeReceita) && !empty($tempoPreparo) && !empty($ingredientes) && !empty($descricao)) {

      criarReceitas($userID, $nomeReceita, $tempoPreparo, $descricao, $ingredientes);

      header('Location:'.'../public/addreceita.php');

    } else {
      header('Location:'.'../public/addreceita.php');
      $_SESSION["campo-vazio"] = '
      <div class="row">
        <div class="col pt-3">
          <p class="text-center text-danger">Preencha todos os campos!</p>
        </div>
      </div>';
    }

  } elseif(!empty($_POST["deletar-receita"])) {
    $idReceita = $_POST["id_receitas"];
    $idIngrediente = $_POST["id_ingredientes"];
    deletarReceita($userID, $idReceita, $idIngrediente);
    header('Location:'.'../public/addreceita.php');
  } 
  elseif( !empty($_POST["favorito"])) {
    $idReceita = $_POST["id_receitas"];
    inserirFavorito($userID, $idReceita);
    deletarReceita($userID, $idReceita, $idIngrediente, $receitaId, $receitaIngrediente);
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
    deletarFavorito($favoritoID, $userID);
    header('Location:'.'../public/favoritos.php');
    
  }
}

  





 










	




























?>