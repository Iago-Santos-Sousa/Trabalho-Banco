<?php
include_once("../../config/conn.php");

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
    <link rel="stylesheet" type="text/css" href="../css/styles.css" />
    <title>Document</title>
  </head>
  <body>
    <div class="container col-11 col-md-9" id="form-container" style="margin-bottom: 23rem;">
      <div class="row justify-content-center">
        <div class="row justify-content-center mb-3">
          <div class="col-4 col-md-5 col-lg-4">
            <img
              src="../img/img-restaurant.png"
              alt="Entrar no sistema"
              class="img-fluid"
            />
          </div>
        </div>

        <?php
          if(isset($_SESSION["alert"])) {
            echo '<div class="row justify-content-center"><div class="col-6 col-md-6 col-lg-6 col-xl-5"><div id="liveAlertPlaceholder" class="mt-2"></div></div></div>';
            unset($_SESSION["alert"]);
          }
        ?>
      
        <div class="col-10 col-md-9 col-lg-8 col-xl-8 col-xxl-8">
          <form action="../../config/login/validarLogin.php" method="POST">    
            <div class="input-group mb-3">
              <span class="input-group-text bg-transparent" style="cursor: pointer; border: none; border-bottom: 1px solid #ccc; border-radius: 0;"
              ><i class="bi bi-envelope-at fs-5" data-bs-toggle="tooltip" data-bs-placement="left" data-bs-title="Email"></i></span
              >
              <div class="form-floating">
                <input
                  type="text"
                  class="form-control"
                  id="email"
                  name="email"
                  placeholder="Digite o seu email"
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
                />
                <label for="password" class="form-label"
                  >Digite a sua senha</label
                >
              </div>
              <span class="input-group-text bg-transparent"
                style="border: none; border-bottom: 1px solid #ccc; border-radius: 0; cursor: pointer;"
                ><i
                  class="bi bi-eye-slash fs-5"
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

    <?php include_once("footer.php");?>
    <script src="../js/senhaTooltip.js" type="text/javascript"></script>
    <script src="../js/toolTip.js" type="text/javascript"></script>
    <script src="../js/alertLogin.js" type="text/javascript"></script>

  </body>
</html>
