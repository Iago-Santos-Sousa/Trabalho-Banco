<?php
session_start();
include_once("../config/conn.php");

if ((!isset($_SESSION['emailUsuario']) == true) and (!isset($_SESSION['senhaUsuario']) == true)) {
    unset($_SESSION['emailUsuario']);
    unset($_SESSION['senhaUsuario']);
    unset($_SESSION['nomeUsuario']);
    unset($_SESSION['sobrenomeUsuario']);
    unset($_SESSION['confirmarsenha']);
    session_destroy();
    header("Location: ". "../index.php");
}

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
    <link rel="stylesheet" href="../src/css/cssPublic.css" />

    <title>Document</title>
  </head>
  <body style="">
    <nav
      class="navbar navbar-expand-lg bg-body-tertiary bg-primary fixed-top"
      data-bs-theme="dark"
    >
      <div class="container-fluid">
        <a class="navbar-brand" href="./homeSistema.php"
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
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="./addreceita.html"
                >Adicionar receita</a
              >
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./favoritos.html">Favoritos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../config/login/sair.php">Sair</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <div
      class="container"
      style="min-height: 100vh; padding-top: 10rem; padding-bottom: 5rem"
    >
      <div class="row justify-content-center">
        <div class="col-12 col-lg-10">
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
                  src="../src/img/img-um.jpg"
                  class="d-block img-fluid"
                  alt="..."
                />
                <div class="carousel-caption d-none d-md-block">
                  <h3>Crie as suas receitas</h3>
                </div>
              </div>
              <div class="carousel-item">
                <img
                  src="../src/img/img-dois.jpg"
                  class="d-block img-fluid"
                  alt="..."
                />
                <div class="carousel-caption d-none d-md-block">
                  <h3>Escolha entre as suas favoritas</h3>
                </div>
              </div>
              <div class="carousel-item">
                <img
                  src="../src/img/img-tres.jpg"
                  class="d-block img-fluid"
                  alt="..."
                />
                <div class="carousel-caption d-none d-md-block">
                  <h3>Altere suas receitas quando quiser</h3>
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

    <footer class="bg-dark text-center text-lg-start bottom text-light">
      <!-- Copyright -->
      <div class="text-center p-3">
        © 2023 Copyright:
        <a class="text-light" href="https://mdbootstrap.com/">Receitas</a>
      </div>
      <!-- Copyright -->
    </footer>

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
