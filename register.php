<?php
// session_start();
include_once("./src/process/conn.php");
include_once("./src/process/login/login.php");
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x"
      crossorigin="anonymous"
    />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css"
    />
    <!-- JavaScript Bundle with Popper -->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4"
      crossorigin="anonymous"
      defer
    ></script>
    <script src="./src/js/alert.js" defer></script>
    <link rel="stylesheet" href="./src/css/styles.css" />
    <title>Register</title>
  </head>
  <body>
    <div class="container col-11 col-md-9" id="form-container">
      <div class="row gx-5">
        <div class="col-md-6">
          <h2>Realize o seu cadastro</h2>
          <form action="./src/process/login/login.php" method="POST">
            <div class="form-floating mb-3">
              <input
                type="text"
                class="form-control"
                id="name"
                name="name"
                placeholder="Digite seu nome"
                required
              />
              <label for="name" class="form-label">Digite seu nome</label>
            </div>
            <div class="form-floating mb-3">
              <input
                type="text"
                class="form-control"
                id="lastname"
                name="lastname"
                placeholder="Digite seu sobrenome"
                required
              />
              <label for="lastname" class="form-label"
                >Digite seu sobrenome</label
              >
            </div>
            <div class="form-floating mb-3">
              <input
                type="email"
                class="form-control"
                id="email"
                name="email"
                placeholder="Digite seu email"
                required
              />
              <label for="email" class="form-label">Digite seu email</label>
            </div>
            <div class="form-floating mb-3">
              <input
                type="password"
                class="form-control"
                id="password"
                name="password"
                placeholder="Digite sua senha"
                required
              />
              <label for="password" class="form-label">Digite sua senha</label>
            </div>
            <div class="form-floating mb-3">
              <input
                type="password"
                class="form-control"
                id="confirmpassword"
                name="confirmpassword"
                placeholder="Confirme sua senha"
                required
              />
              <label for="confirmpassword" class="form-label"
                >Confirme sua senha</label
              >
            </div>
            <input type="submit" class="btn btn-primary" value="Cadastrar" />
          </form>
        </div>
        <div class="col-md-6">
          <div class="row align-items-center justify-content-center">
            <div class="col-6 col-md-12">
              <img
                src="./src/img/chef.svg"
                alt="Hello New Customer"
                class="img-fluid"
              />
            </div>
            <div class="col-12" id="link-container">
              <a href="./index.php">Eu já tenho uma conta</a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <?php
    
    
    
    ?>

    <?php
    
    function confirmarSenha() {
      echo "<div id='liveAlertPlaceholder'></div>";
    }
    
    
    ?>
  </body>
</html>
