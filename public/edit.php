<?php
include_once("../config/funcoes.php");
// include_once("../config/editarReceita.php");

if( isset($_POST["receitaID"])) {
  $_SESSION["receitaIDEditar"] = $_POST["receitaID"];
}

$umRegistroReceitaArray = umRegistroReceita($userID, $_SESSION["receitaIDEditar"]);

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
  </head class="corpo">
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
              <a class="nav-link" href="./favoritos.php">Favoritos</a>
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
    
    <!-- Formulário -->
    <div class="container px-3" style="padding-top: 10rem; margin-bottom: 41rem;">
      <div class="row mb-5">
        <div class="col">
          <h3 class="text-center">Atualizar receita</h3>
        </div>
      </div>
      <form method="POST" action="../config/editarReceita.php">

        <div class="row justify-content-center">
          <div class="col-md-4">
            <div class="form-floating mb-3">
              <input
                type="text"
                class="form-control focus-ring focus-ring-primary"
                id="nome-receita"
                name="nome_receita"
                value="<?=$umRegistroReceitaArray["nome_receitas"]?>"
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
                value="<?=$umRegistroReceitaArray["tempo_de_preparo"]?>"
                placeholder="Ingrediente"
              />
              <label for="tempo_preparo">Tempo de preparo</label>
            </div>
          </div>
        </div>

        <!-- segunda linha -->
        <div>
          <div class="row justify-content-center mt-3">
            <div class="col-md-8 col-lg-6">
              <div class="form-floating">
                <textarea
                  class="form-control"
                  placeholder="Ingrediente"
                  id="ingredientes"
                  name="ingrediente"
                  style="height: 100px"
                ><?=$umRegistroReceitaArray["nome_ingredientes"]?></textarea>
                <label for="ingrediente">Ingredientes</label>
              </div>
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
                name="descricao"
                style="height: 100px"
              ><?=$umRegistroReceitaArray["descricao"]?></textarea>
              <label for="modo_preparo">Modo de preparo</label>
            </div>
          </div>
        </div>

        <?php
          if( isset($_SESSION["camposVaziosEditar"])) {
            echo '<div class="row justify-content-center"><div class="col-6 col-md-6 col-lg-6 col-xl-5"><div id="liveAlertPlaceholder" class="mt-2"></div></div></div>';
            unset($_SESSION["camposVaziosEditar"]);
          }
        ?>

        <!-- Botão submit -->
        <div class="row justify-content-center mt-4">
          <div class="col-auto">
            <input type="hidden" name="editar" value="edit" />
            <button type="submit" class="btn btn-primary">Atualizar</button>
          </div>
        </div>
      </form>
    </div>

   <?php include_once("../src/templates/footer.php");?>
   <script src="../src/js/alertCamposVaziosEditar.js" type="text/javascript"></script>
  </body>
</html>
