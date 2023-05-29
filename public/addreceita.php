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

    <!-- id do usuario -->
    <div><?php echo $userID;?></div>
    <!-- id do usuario -->

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
                type="text"
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
          <div class="col-md-4">
            <div class="form-floating mb-3">
              <input
                type="text"
                class="form-control focus-ring focus-ring-primary"
                id="ingrediente"
                name="ingrediente"
                placeholder="Ingrediente"
              />
              <label for="ingrediente">Ingredientes</label>
            </div>
          </div>

          <div class="col-md-4">
            <div class="form-floating mb-3">
              <input
                type="text"
                class="form-control focus-ring focus-ring-primary"
                id="quantidades"
                name="quantidades"
                placeholder="Quantidade"
              />
              <label for="quantidades">Quantidades</label>
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

    <div class="container mt-5">
      <div><?php if(isset($_SESSION["input"]) && !empty($input)) {
        echo $input;
      }?></div>
      <div class="row">
        <div class="col">
          <?php if(count($AllContatos) >
          0):?>

          <table class="table table-hover mb-0">
            <thead class="" style="background-color: #007500; color: #fff;">
              <tr>
                <!-- <th scope="col" class="">ID usuário</th> -->
                <th scope="col" class="">Nome receita</th>
                <th scope="col" class="">Tempo preparo</th>
                <th scope="col" class="">Ingredientes</th>
                <th scope="col" class="">Quantidade</th>
                <th scope="col" class="">Descrição</th>
                <th scope="col" class="">Ações</th>
              </tr>
            </thead>
            <tbody class="">
              <?php foreach($AllContatos as $contato):?>
              <tr>
                <!-- <td><?=$contato["id_usuario"]?></td> -->
                <td><?=$contato["nome_receita"]?></td>
                <td><?=$contato["tempo_preparo"]?></td>
                <td><?=$contato["nome_ingrediente"]?></td>
                <td><?=$contato["ingredientes_qtd"]?></td>
                <td><?=$contato["modo_preparo"]?></td>
                <td class="d-flex justify-content-between">
                  <a class="lapis text-center" href="./edit.php?receita_id=<?=$contato["receita_id"]?>&id=<?=$contato["id_usuario"]?>"><i class="fa-solid fa-pencil text-primary" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Editar curso" data-bs-custom-class="custom-tooltip"></i></a>

                  <form method="POST" action="../config/process.php">
                    <input type="hidden" name="favorito" value="favoritos">

                    <input type="hidden" name="id_receita" value="<?=$contato["id_receita"]?>">

                    <input type="hidden" name="id_ingrediente" value="<?=$contato["id_ingrediente"]?>">

                    <input type="hidden" name="receita_id" value="<?=$contato["receita_id"]?>">

                    <input type="hidden" name="receita_ingrediente" value="<?=$contato["receita_ingrediente"]?>">

                    <button type="submit" class="delete-btn border-0 text-danger" style="background-color: initial;"><i class="fa-solid fa-star"></i></button>
                  </form>

                  <form method="POST" action="../config/process.php">
                    <input type="hidden" name="type" value="delete">

                    <input type="hidden" name="id_receita" value="<?=$contato["id_receita"]?>">

                    <input type="hidden" name="id_ingrediente" value="<?=$contato["id_ingrediente"]?>">

                    <input type="hidden" name="receita_id" value="<?=$contato["receita_id"]?>">

                    <input type="hidden" name="receita_ingrediente" value="<?=$contato["receita_ingrediente"]?>">

                    <button type="submit" class="delete-btn border-0 text-danger" style="background-color: initial;"><i class="fa-solid fa-trash-can" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Excluir curso" data-bs-custom-class="custom-tooltip"></i></button>
                  </form>
                </td>
                </tr>
                <?php endforeach;?>
            </tbody>
          </table>

          <?php else:?>
            <div>não há receitas</div>
          <?php endif;?>
        </div>
      </div>
    </div>

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
