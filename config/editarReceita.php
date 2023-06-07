<?php
include_once("funcoes.php");
// include_once("../public/edit.php");
// echo $_SESSION["receitaIDEditar"];

if( $_SERVER["REQUEST_METHOD"] === "POST") {
  // $receitaid = $_POST["receitaID"];
  $nomeReceita = $_POST["nome_receita"];
  $tempoPreparo = $_POST["tempo_preparo"];
  $ingredientes = $_POST["ingrediente"];
  $descricao = $_POST["descricao"];

  if( empty($nomeReceita) || empty($tempoPreparo) || empty($ingredientes) || empty($descricao)) {
    
    header('Location:'.'../public/edit.php');
    // header('Location:'.'../public/addreceita.php');
    $_SESSION["camposVaziosEditar"] = '
    <div class="row">
      <div class="col pt-3">
        <p class="text-center text-danger">Preencha todos os campos!</p>
      </div>
    </div>';
    exit();
    
  } else {
    header('Location:'.'../public/addreceita.php');
    editarReceita($userID, $_SESSION["receitaIDEditar"], $nomeReceita, $tempoPreparo, $ingredientes, $descricao);   
    
  }
} 















?>