<?php
// session_start();
include_once("./config/conn.php");
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
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css"
    />
    <link rel="stylesheet" type="text/css" href="./src/css/styles.css" />
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
      crossorigin="anonymous"
      defer
    ></script>
    <script src="./src/js/script.js" defer></script>
    <script src="./src/js/toolTip.js" defer></script>
    <title>Document</title>
  </head>
  <body>
    <div class="container col-11 col-md-9" id="form-container">
      <div class="row justify-content-center">
        <div class="row justify-content-center mb-3">
          <div class="col-4 col-md-5 col-lg-4">
            <img
              src="./src/img/img-restaurant.png"
              alt="Entrar no sistema"
              class="img-fluid"
            />
          </div>
        </div>

        <div class="col-10 col-md-9 col-lg-8 col-xl-8 col-xxl-8">
          <form action="./src/process/login/check.php" method="POST">
            <div class="input-group mb-3">
              <span class="input-group-text bg-transparent" style="cursor: pointer; border: none; border-bottom: 1px solid #ccc; border-radius: 0;"
              data-bs-toggle="tooltip"
              data-bs-placement="left"
              data-bs-title="Email"
              >@</span
              >
              <div class="form-floating">
                <input
                  type="text"
                  class="form-control"
                  id="email"
                  name="email"
                  placeholder="Digite o seu email"
                  required
                />
                <label for="email" class="form-label">Digite o seu email</label>
              </div>
            </div>

            <div class="input-group mb-3">
              <div class="form-floating">
                <input
                  type="password"
                  class="form-control"
                  id="password"
                  name="password"
                  placeholder="Digite a sua senha"
                  id="password"
                  required
                />

                <label for="password" class="form-label"
                  >Digite a sua senha</label
                >
              </div>
              <span class="input-group-text bg-transparent"
                style="border: none; border-bottom: 1px solid #ccc; border-radius: 0; cursor: pointer;" 
                id="span" 
                ><i
                  class="bi bi-eye-slash"
                  id="togglePassword"
                  data-bs-toggle="tooltip"
                  data-bs-placement="right"
                  data-bs-title="Esconder ou mostrar senha"
                ></i
              ></span>
            </div>

            <div class="col" id="link-container">
              <a href="./register.php">Ainda não tenho cadastro</a>
            </div>

            <div class="col mt-3">
              <button type="submit" class="btn btn-primary" style="background-color: #6c63ff;">Entrar</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </body>
</html>
