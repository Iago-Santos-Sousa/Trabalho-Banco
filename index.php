<?php
session_start();

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
  echo "logado";
 
} else {
  echo "não está logado!";
  unset($_SESSION["id_usuarios"]);
  unset($_SESSION["email"]);
  unset($_SESSION["senha"]);
  unset($_SESSION['loggedin']);
  session_destroy();
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <?php
      include_once("./src/templates/header.php");
    ?>
    <link rel="stylesheet" href="./src/css/cssPublic.css" />

    <title>Document</title>
  </head>
  <body style="height: 100vh">
    <nav
      class="navbar navbar-expand-lg bg-body-tertiary bg-primary fixed-top"
      data-bs-theme="dark"
    >
      <div class="container-fluid">
        <a class="navbar-brand" href="./index.php"
          ><img src="./src/img/icon.png" alt="icon logo"
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
              <a class="nav-link" aria-current="page" href="./public/addreceita.php"
                >Adicionar receita</a
              >
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./public/favoritos.php">Favoritos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./config/login/logout.php">Sair</a>
            </li>
            <?php endif; ?>
            <?php if (!isset($_SESSION["id_usuarios"])): ?>
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="./src/templates/loginEntrar.php"
                >Login</a
              >
            </li>
            <?php endif; ?>
          </ul>
        </div>
      </div>
    </nav>

      <h1 class="purples" style="margin-top: 7rem;">Livro de receitas</h1>

      <section class="" style="height: calc(100% - 3rem); padding-top: 3rem; margin-bottom: 5rem;">

        <div class="wrapper" >
          <div
            class="container"
          >
            <div class="row justify-content-center">
              <div class="col-md-10 col-lg-8 col-xl-8">
                <div
                  id="carouselExampleAutoplaying"
                  class="carousel slide"
                  data-bs-ride="carousel"
                >
                  <div class="carousel-indicators">
                    <button
                      type="button"
                      data-bs-target="#carouselExampleAutoplaying"
                      data-bs-slide-to="0"
                      class="active"
                      aria-current="true"
                      aria-label="Slide 1"
                    ></button>
                    <button
                      type="button"
                      data-bs-target="#carouselExampleAutoplaying"
                      data-bs-slide-to="1"
                      aria-label="Slide 2"
                    ></button>
                    <button
                      type="button"
                      data-bs-target="#carouselExampleAutoplaying"
                      data-bs-slide-to="2"
                      aria-label="Slide 3"
                    ></button>
                  </div>
                  <div
                    class="carousel-inner rounded-5 shadow-4-strong"
                    id="meuCarrossel"
                  >
                    <div class="carousel-item active">
                      <img
                        src="./src/img/img-um.jpg"
                        class="d-block img-fluid"
                        alt="..."
                      />
                      <div class="carousel-caption d-none d-md-block">
                        <h3 class="fs-2 text-light fw-bolder">Crie as suas receitas</h3>
                      </div>
                    </div>
                    <div class="carousel-item">
                      <img
                        src="./src/img/img-dois.jpg"
                        class="d-block img-fluid"
                        alt="..."
                      />
                      <div class="carousel-caption d-none d-md-block">
                        <h3 class="fs-2 text-light fw-bolder">Escolha entre as suas favoritas</h3>
                      </div>
                    </div>
                    <div class="carousel-item">
                      <img
                        src="./src/img/img-tres.jpg"
                        class="d-block img-fluid"
                        alt="..."
                      />
                      <div class="carousel-caption d-none d-md-block">
                        <h3 class="fs-2 text-light fw-bolder">Altere suas receitas quando quiser</h3>
                      </div>
                    </div>
                  </div>
                  <button
                    class="carousel-control-prev"
                    type="button"
                    data-bs-target="#carouselExampleAutoplaying"
                    data-bs-slide="prev"
                  >
                    <span
                      class="carousel-control-prev-icon"
                      aria-hidden="true"
                    ></span>
                    <span class="visually-hidden">Previous</span>
                  </button>
                  <button
                    class="carousel-control-next"
                    type="button"
                    data-bs-target="#carouselExampleAutoplaying"
                    data-bs-slide="next"
                  >
                    <span
                      class="carousel-control-next-icon"
                      aria-hidden="true"
                    ></span>
                    <span class="visually-hidden">Next</span>
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

    <?php
      include_once("./src/templates/footer.php");
    ?>
  </body>
</html>
