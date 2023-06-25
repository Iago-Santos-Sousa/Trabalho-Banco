<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
   <?php include_once("../templates/header.php");?>
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css"
    />
  
    <link rel="stylesheet" type="text/css" href="../css/styles.css" />
    <title>Register</title>
  </head>
  <body>
    <div class="container col-11 col-md-9" id="form-container" style="margin-bottom: 23rem;">
      <div class="row gx-5">
        <div class="col-md-6">
          <h2>Realize o seu cadastro</h2>
          <form class="" action="../../config/login/criarLogin.php" method="POST">
            <?php

              if (isset($_SESSION["usuarioCriado"])) {
                echo '
                <div class="toast-container top-0 start-50 translate-middle-x p-3">
                  <div
                    id="liveToast"
                    class="toast d-flex text-bg-success"
                    role="alert"
                    aria-live="assertive"
                    aria-atomic="true"
                  >
                    <div class="toast-body rounded border-2">Cadastro realizado com sucesso!</div>
                    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                  </div>
                </div>';
                unset($_SESSION["usuarioCriado"]);
              }

              if(isset($_SESSION["nome-user"]) || isset($_SESSION["sobre-nome-user"])) {
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
                if(isset($_SESSION["alert-input"]) && isset($_SESSION["alert-email"])) {
                  echo $_SESSION["alert-input"];
                  echo $_SESSION["alert-email"];
                  unset($_SESSION["alert-input"]);
                  unset($_SESSION["alert-email"]);
                  
                } else {
                  // unset($_SESSION["alert-input"]);
                  // unset($_SESSION["alert-email"]);
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
                if(isset($_SESSION["msg2-senha-errada"])) {
                  echo '<p class="text-danger">Senha inválida. A senha deve conter pelo menos 8 caracteres, incluindo pelo menos uma letra maiúscula, uma letra minúscula, um número e um caractere especial.</p>';
                  unset($_SESSION["msg2-senha-errada"]);
                } else {
                  unset($_SESSION["msg2-senha-errada"]);

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
                if(isset($_SESSION["msg-senha-errada"])) {
                  echo '<p class="text-danger">Confirme a sua senha corretamente.</p>';
                  unset($_SESSION["msg-senha-errada"]);
                } else {
                  unset($_SESSION["msg-senha-errada"]);

                }
              ?>
            </div>
            <?php
              if(isset($_SESSION["alertaCamposVazios"])) {
                echo '<p class="text-danger">Preencha todos os campos e de forma correta!</p>';
                unset($_SESSION["alertaCamposVazios"]);
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

    <?php include_once("../templates/footer.php");?>
    <script src="../js/toastRegistro.js" type="text/javascript"></script>
  </body>
</html>
