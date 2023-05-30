<?php
// include_once("../config/conn.php");
include_once("../config/process.php");

// $usuario;
// if(isset($_SESSION["id"])) {
//   $usuario = $_SESSION["id"];
// }

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ"
      crossorigin="anonymous"
    />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
              <a class="nav-link" href="./favoritos.php">Favoritos</a>
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

    <!-- Formulário -->
    <div class="container px-3" style="padding-top: 10rem;">

      <form method="POST" action="../config/process.php">
        <input type="hidden" name="usuarioID" value="<?=$_GET["id"]?>">
        <input type="hidden" name="receitaID" value="<?=$_GET["receita_id"]?>">
        <?php
          // $id = $_GET["id"];
          // $receitaID = $_GET["receita_id"];
          // $onlyContato = umRegistro($id, $receitaID, $conn);
          // echo "<div>" . $onlyContato["receita_nome"] . "</div>";
        ?>
        <div class="row justify-content-center">
          <div class="col-md-4">
            <div class="form-floating mb-3">
              <input
                type="text"
                class="form-control focus-ring focus-ring-primary"
                id="nome-receita"
                name="nome_receita"
                value="<?=$onlyContato["receita_nome"]?>"
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
                value="<?=$onlyContato["tempo_preparo"]?>"
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
                  id="ingrediente"
                  name="ingrediente"
                  style="height: 100px"
                ><?=$onlyContato["nome_ingrediente"]?></textarea>
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
                name="modo_preparo"
                style="height: 100px"
              ><?=$onlyContato["modo_preparo"]?>
            </textarea>
              <label for="modo_preparo">Modo de preparo</label>
            </div>
          </div>
        </div>

        <!-- Botão submit -->
        <div class="row justify-content-center mt-4">
          <div class="col-auto">
            <input type="hidden" name="editar" value="edit" />
            <button type="submit" class="btn btn-primary">Adicionar</button>
          </div>
        </div>
      </form>
    </div>

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
