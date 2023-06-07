<?php
include_once("../config/process.php");
// include_once("../config/funcoes.php");
$todosRegistrosFavoritosArray = todosRegistrosFavoritos($userID);
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <?php
      include_once("../src/templates/header.php");
    ?>
    <!-- <link rel="stylesheet" href="../src/css/cssPublic.css" /> -->

    <title>Document</title>
  </head>
  <body>
    <!-- nav verificado -->
    <nav
      class="navbar navbar-expand-lg bg-body-tertiary bg-primary fixed-top"
      data-bs-theme="dark"
    >
      <div class="container-fluid">
        <a class="navbar-brand" href="../index.php"
          ><img src="../src/img/icon.png" alt="icon logo"
        /></a>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarNav"
          aria-controls="navbarNav"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse p-3" id="navbarNav">
          <ul class="navbar-nav align-items-center">
            <?php if(isset($_SESSION["id_usuarios"])): ?>
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="../index.php"
                >Home</a
              >
            </li>
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="./addreceita.php"
                >Adicionar receita</a
              >
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../config/login/logout.php">Sair</a>
            </li>
            <?php endif; ?>
            <?php if (!isset($_SESSION["id_usuarios"])): ?>
            <?php header("Location:"."index.php"); ?>
            <?php endif; ?>
          </ul>
        </div>
      </div>
    </nav>

     <div class="container mt-5 pb-5" style="padding-top: 10rem;">
      <div class="row">
        <?php if(count($todosRegistrosFavoritosArray) >
        0):?>
        <?php foreach($todosRegistrosFavoritosArray as $favorite):?>
        <div class="col-md-3 pb-3">
          <div class="card border-info border-3">
            <img class="card-img-top img-fluid" src="../src/img/recipe.svg" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title text-center"><?=$favorite["receitas_fa"]?></h5>
              <div><hr class="border-3 text-success"></div>
              <p class="card-text fw-bold"><i class="fa-regular fa-clock" style="color: #e17c09; cursor: pointer;" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Tempo de preparo" data-bs-custom-class="custom-tooltip"></i> <?=$favorite["tempo_de_preparo_fa"]?>: Minutos</p>
              <p class="card-text text-center d-flex gap-1 justify-content-center flex-wrap">
                <a type="button" tabindex="0" style="width: 8rem;" class="btn btn-primary" role="button" data-bs-container="body" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="<?=$favorite["ingredientes_fa"]?>">
                Ingredientes
                </a>
                <a type="button" tabindex="0" style="width: 8rem;" class="btn btn-success" role="button" data-bs-container="body" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="<?=$favorite["descricao_fa"]?>">
                Descrição
                </a>
              </p>
              <div class="acoes d-flex">
                <form method="POST" action="../config/process.php">
                  <input type="hidden" name="deletarFavorito" value="d">

                  <input type="hidden" name="favorito_id" value="<?=$favorite["id_favoritos"]?>">

                  <button type="submit" class="delete-btn border-0 text-danger" style="background-color: initial;"><i class="fa-solid fa-trash-can" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Excluir favorito" data-bs-custom-class="custom-tooltip"></i></button>
                </form>

                <form method="POST" action="./pdf/imprimir.php" target="_blank">
                  <input type="hidden" name="imprimir_pdf" value="pdf">

                  <input type="hidden" name="favorito_id" value="<?=$favorite["id_favoritos"]?>">
                  
                  <button type="submit" class="delete-btn border-0 text-warning" style="background-color: initial;"><i class="fa-solid fa-print" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Imprimir receita" data-bs-custom-class="custom-tooltip"></i></button>
                </form>
              </div>
            </div>
          </div>
        </div>
        <?php endforeach;?>
        
        <?php else:?>
          <div class="text-center">Não há favoritos</div>
        <?php endif;?>
        
      </div>
    </div>

    <?php include_once("../src/templates/bootstrap.php");?>
    <script src="../src/js/toolTip.js" type="text/javascript"></script>
  </body>
</html>
