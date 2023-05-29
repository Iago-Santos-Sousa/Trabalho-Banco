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

    <div class="container" style="margin-top: 20rem;">
      <div><?php echo $userID;?></div>
      <div class="row">
        <div class="col">
          <?php if(count($AllFavoritos) >
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
              <?php foreach($AllFavoritos as $favorite):?>
              <tr>
                <!-- <td><?=$favorite["id_usuario"]?></td> -->
                <td><?=$favorite["nome"]?></td>
                <td><?=$favorite["tempo_de_preparo"]?></td>
                <td><?=$favorite["nome_ingrediente"]?></td>
                <td><?=$favorite["quantidade"]?></td>
                <td><?=$favorite["descricao"]?></td>
                <td class="d-flex justify-content-between">
                 

                  <form method="POST" action="../config/process.php">
                    <input type="hidden" name="deletarFavorito" value="d">

                    <input type="hidden" name="favorito_id" value="<?=$favorite["id"]?>">

                    <button type="submit" class="delete-btn border-0 text-danger" style="background-color: initial;"><i class="fa-solid fa-trash-can" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Excluir curso" data-bs-custom-class="custom-tooltip"></i></button>
                  </form>
                </td>
                </tr>
                <?php endforeach;?>
            </tbody>
          </table>

          <?php else:?>
            <div>não há favoritos</div>
          <?php endif;?>
        </div>
      </div>
    </div>

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
