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

  $inputs = array($nomeReceita, $tempoPreparo, $ingredientes, $descricao);

  if(validarCampos($inputs)) {
    header('Location:'.'../public/addreceita.php');
    editarReceita($userID, $_SESSION["receitaIDEditar"], $nomeReceita, $tempoPreparo, $ingredientes, $descricao); 

  } else {
    header('Location:'.'../public/edit.php');
    // header('Location:'.'../public/addreceita.php');
    $_SESSION["camposVaziosEditar"] = true;
    exit();
  }

} 















?>