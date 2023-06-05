<?php
include_once("../config/process.php");
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
    <link rel="stylesheet" href="../src/css/cssPublic.css" />
    <title>Document</title>
  </head>
  <body style="height: 100vh">
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
            <?php if(isset($_SESSION["id"])): ?>
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="../index.php"
                >Home</a
              >
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./favoritos.php">Favoritos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../config/login/sair.php">Sair</a>
            </li>
            <?php endif; ?>
            <?php if (!isset($_SESSION["id"])): ?>
              <?php header("Location:"."index.php"); ?>
            <?php endif; ?>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Formulário -->
    <div class="container px-3" style="padding-top: 10rem;">
      <form method="POST" action="../config/process.php">
        <div class="row justify-content-center">
          <div class="col-md-4">
            <div class="form-floating mb-3">
              <input
                type="text"
                class="form-control focus-ring focus-ring-primary"
                id="nome-receita"
                name="nome_receita"
                placeholder="Nome da receita"
              />
              <label for="nome-receita">Nome da receita</label>
            </div>
          </div>

          <div class="col-md-4">
            <div class="form-floating">
              <input
                type="number"
                class="form-control focus-ring focus-ring-primary"
                id="tempo_preparo"
                name="tempo_preparo"
                placeholder="Ingrediente"
              />
              <label for="tempo_preparo">Tempo de preparo</label>
            </div>
          </div>
        </div>

        <!-- segunda linha -->
        <div class="row justify-content-center mt-3">
          <div class="col-md-8 col-lg-6">
            <div class="form-floating">
              <textarea
                class="form-control"
                placeholder="Ingrediente"
                id="ingrediente"
                name="ingrediente"
                style="height: 100px"
              ></textarea>
              <label for="ingrediente">Ingredientes</label>
            </div>
          </div>
        </div>

        <div class="row justify-content-center mt-3">
          <div class="col-md-8 col-lg-6">
            <div class="form-floating">
              <textarea
                class="form-control"
                placeholder="Leave a comment here"
                id="modo_preparo"
                name="modo_preparo"
                style="height: 100px"
              ></textarea>
              <label for="modo_preparo">Modo de preparo</label>
            </div>
          </div>
        </div>

        <!-- Botão submit -->
        <div class="row justify-content-center mt-4">
          <div class="col-auto">
            <input type="hidden" name="campo_oculto" value="create" />
            <button type="submit" class="btn btn-primary">Adicionar</button>
          </div>
        </div>
      </form>
    </div>

    <div class="container mt-5 pb-5">
      <?php
        if(isset($_SESSION["msgFavorito"])) {
          echo '
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
          unset($_SESSION["msgFavorito"]);
        }
      ?>
      <div class="row">
        <?php if(count($AllContatos) >
        0):?>
        <?php foreach($AllContatos as $contato):?>
        <div class="col-md-3 pb-3">
          <div class="card border-info border-3">
            <img class="card-img-top img-fluid" src="../src/img/recipe.svg" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title text-center"><?=$contato["nome_receita"]?></h5>
              <div><hr class="border-3 text-success"></div>
              <!-- <p class="card-text"><?=$contato["modo_preparo"]?></p> -->
              <p class="card-text fw-bold"><i class="fa-regular fa-clock" style="color: #e17c09; cursor: pointer;" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Tempo de preparo" data-bs-custom-class="custom-tooltip"></i> <?=$contato["tempo_preparo"]?>: Minutos</p>
              <p class="card-text text-center d-flex gap-1 justify-content-center flex-wrap">
                <a type="button" style="width: 8rem;" tabindex="0" class="btn btn-primary" role="button" data-bs-container="body" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="<?=$contato["nome_ingrediente"]?>">
                Ingredientes
                </a>
                <a type="button" tabindex="0" style="width: 8rem;" class="btn btn-success" role="button" data-bs-container="body" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="<?=$contato["modo_preparo"]?>">
                Descrição
                </a>
              </p>
              <div class="acoes d-flex">
                <a class="lapis text-center" href="./edit.php?receita_id=<?=$contato["receita_id"]?>&id=<?=$contato["id_usuario"]?>"><i class="fa-solid fa-pencil text-primary" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Editar receita" data-bs-custom-class="custom-tooltip"></i></a>

                <form method="POST" action="../config/process.php">
                  <input type="hidden" name="favorito" value="favoritos">

                  <input type="hidden" name="id_receita" value="<?=$contato["id_receita"]?>">

                  <input type="hidden" name="id_ingrediente" value="<?=$contato["id_ingrediente"]?>">

                  <input type="hidden" name="receita_id" value="<?=$contato["receita_id"]?>">

                  <input type="hidden" name="receita_ingrediente" value="<?=$contato["receita_ingrediente"]?>">

                  <button type="submit" class="delete-btn border-0 text-success" style="background-color: initial;"><i class="fa-solid fa-star" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Favoritar" data-bs-custom-class="custom-tooltip"></i></button>
                </form>

                <form method="POST" action="../config/process.php">
                  <input type="hidden" name="type" value="delete">

                  <input type="hidden" name="id_receita" value="<?=$contato["id_receita"]?>">

                  <input type="hidden" name="id_ingrediente" value="<?=$contato["id_ingrediente"]?>">

                  <input type="hidden" name="receita_id" value="<?=$contato["receita_id"]?>">

                  <input type="hidden" name="receita_ingrediente" value="<?=$contato["receita_ingrediente"]?>">

                  <button type="submit" class="delete-btn border-0 text-danger" style="background-color: initial;"><i class="fa-solid fa-trash-can" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Excluir receita" data-bs-custom-class="custom-tooltip"></i></button>
                </form>
              </div>
            </div>
          </div>
        </div>
        <?php endforeach;?>
        
        <?php else:?>
          <div class="text-center">Não há receitas</div>
        <?php endif;?>
        
      </div>
    </div>

    <?php include_once("../src/templates/bootstrap.php");?>
    <script src="../src/js/toolTip.js" type="text/javascript"></script>
    <script src="../src/js/toastFavorito.js" type="text/javascript"></script>
  </body>
</html>
