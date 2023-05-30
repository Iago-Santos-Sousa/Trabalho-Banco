<?php
include_once("../config/process.php");
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp"
      crossorigin="anonymous"
    />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../src/css/cssPublic.css" />

    <title>Document</title>
  </head>
  <body>
    <!-- nav verificado -->
    <nav
      class="navbar navbar-expand-lg bg-body-tertiary bg-primary fixed-top"
      data-bs-theme="dark"
    >
      <div class="container-fluid">
        <a class="navbar-brand" href="../homeSistema.php"
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
            <?php if(isset($_SESSION["id"])): ?>
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="../homeSistema.php"
                >Home</a
              >
            </li>
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="./addreceita.php"
                >Adicionar receita</a
              >
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../config/login/sair.php">Sair</a>
            </li>
            <?php endif; ?>
            <?php if (!isset($_SESSION["id"])): ?>
            <?php header("Location:"."homeSistema.php"); ?>
            <?php endif; ?>
          </ul>
        </div>
      </div>
    </nav>

     <div class="container pb-5" style="padding-top: 10rem;">
      <div class="row">
        <?php if(count($AllFavoritos) >
        0):?>
        <?php foreach($AllFavoritos as $favorite):?>
        <div class="col-md-4">
          <div class="card border-info border-3 mt-2">
            
            <div class="card-body">
              <h5 class="card-title text-center"><?=$favorite["nome"]?></h5>
              <div><hr class="border-3 text-success"></div>
              <!-- <p class="card-text"><?=$favorite["modo_preparo"]?></p> -->
              <p class="card-text fw-bold"><?=$favorite["tempo_de_preparo"]?>: Minutos</p>
              <p class="card-text text-center d-flex gap-1 justify-content-center flex-wrap">
                <a type="button" tabindex="0" class="btn btn-primary" role="button" data-bs-container="body" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="<?=$favorite["nome_ingrediente"]?>">
                Ingredientes
                </a>
                <a type="button" tabindex="0" class="btn btn-success" role="button" data-bs-container="body" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="<?=$favorite["descricao"]?>">
                Descrição
                </a>
              </p>
              <div class="acoes d-flex">
                <form method="POST" action="../config/process.php">
                  <input type="hidden" name="deletarFavorito" value="d">

                  <input type="hidden" name="favorito_id" value="<?=$favorite["id"]?>">

                  <button type="submit" class="delete-btn border-0 text-danger" style="background-color: initial;"><i class="fa-solid fa-trash-can" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Excluir favorito" data-bs-custom-class="custom-tooltip"></i></button>
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

     <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
      crossorigin="anonymous"
    ></script>

    <script>
      const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
      const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
    </script>
  </body>
</html>
