<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css"
    />
  
    <link rel="stylesheet" type="text/css" href="../css/styles.css" />
    <title>Register</title>
  </head>
  <body>
    <div class="container col-11 col-md-9" id="form-container">
      <div class="row gx-5">
        <div class="col-md-6">
          <h2>Realize o seu cadastro</h2>
          <form class="" action="../../config/login/login.php" method="POST">
            <?php
              if(isset($_SESSION["nome-user"]) && isset($_SESSION["sobre-nome-user"])) {
                echo $_SESSION["nome-user"];
                echo $_SESSION["sobre-nome-user"];
                unset($_SESSION["nome-user"]);
                unset($_SESSION["sobre-nome-user"]);

              } else {
                echo '
                <div class="form-floating mb-3">
                <input
                  type="text"
                  class="form-control"
                  id="name"
                  name="name"
                  placeholder="Digite seu nome"
                
                />
                <label for="name" class="form-label">Digite seu nome</label>
                </div>';

                echo '
                  <div class="form-floating mb-3">
                    <input
                      type="text"
                      class="form-control"
                      id="lastname"
                      name="lastname"
                      placeholder="Digite seu sobrenome"
                      
                    />
                    <label for="lastname" class="form-label"
                      >Digite seu sobrenome</label
                    >
                  </div>';
                }
              ?>
            <div class="form-floating mb-3">
              <?php
                if(isset($_SESSION["alert-input"]) || isset($_SESSION["alert-email"])) {
                  echo $_SESSION["alert-input"];
                  // echo '<script type="text/javascript">
                  // const b = document.getElementById("email");
                  // b.classList.add("is-invalid");
                  // </script>';
                  echo $_SESSION["alert-email"];
                  unset($_SESSION["alert-input"]);
                  unset($_SESSION["alert-email"]);
                  
                } else {
                  echo '
                    <input
                      type="text"
                      class="form-control"
                      id="email"
                      name="email"
                      placeholder="Digite seu email"
                    />
                  <label for="email" class="form-label">Digite seu email</label>';
                }
              
              ?>
            </div>
            <div class="form-floating mb-3">
              <input
                type="password"
                class="form-control"
                id="password"
                name="password"
                placeholder="Digite sua senha"
              />
              <label for="password" class="form-label">Digite sua senha</label>
              <?php
                if(isset($_SESSION["msg2"])) {
                  echo '<p class="text-danger">Senha inválida. A senha deve conter pelo menos 8 caracteres, incluindo pelo menos uma letra maiúscula, uma letra minúscula, um número e um caractere especial.</p>';
                  unset($_SESSION["msg2"]);
                }
              ?>
            </div>
            <div class="form-floating mb-3">
              <input
                type="password"
                class="form-control"
                id="confirmpassword"
                name="confirmpassword"
                placeholder="Confirme sua senha"
                
              />
              <label for="confirmpassword" class="form-label"
                >Confirme sua senha</label
              >
              <?php
                if(isset($_SESSION["msg"])) {
                  echo '<p class="text-danger">Confirme a sua senha corretamente.</p>';
                  unset($_SESSION["msg"]);
                }
              ?>
            </div>
            <?php
              if(isset($_SESSION["alerta"])) {
                echo '<p class="text-danger">Preencha todos os campos!</p>';
                unset($_SESSION["alerta"]);
              }
            ?>
            <input type="submit" class="btn btn-primary" value="Cadastrar" />
          </form>
        </div>
        <div class="col-md-6">
          <div class="row align-items-center justify-content-center">
            <div class="col-6 col-md-12">
              <img
                src="../img/chef.svg"
                alt="Hello New Customer"
                class="img-fluid"
              />
            </div>
            <div class="col-12" id="link-container">
              <a href="./loginEntrar.php">Eu já tenho uma conta</a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous" type="text/javascript"></script>
  </body>
</html>
