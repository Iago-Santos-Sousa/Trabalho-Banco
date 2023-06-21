<?php
include_once("imprimir.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    .row h1::first-letter {
      text-transform: capitalize;
    }

   .row p::first-letter {
      text-transform: uppercase;
   }

  </style>
  <title>Document</title>
</head>
<body>
  <div class="container">
    <div class="row">
      <h1 class="text-center" style="text-align:center;"><?=$umFavorito["receitas_fa"]?></h1>
      <hr>
      <h3>Tempo de preparo:</h3>
      <p>- <?=$umFavorito["tempo_de_preparo_fa"]?> minutos</p>
      <h3>Ingredientes:</h3>
      <p>- <?=$umFavorito["ingredientes_fa"]?></p>
      <h3>Descrição(modo de preparo):</h3>
      <p>- <?=$umFavorito["descricao_fa"]?></p>
    </div>
  </div>
</body>
</html>