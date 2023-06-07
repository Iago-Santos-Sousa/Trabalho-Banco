<?php
include_once("../conn.php");

function validarSenha($senha) {
  $senha_regex = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/";

  if (preg_match($senha_regex, $senha)) {
    return true;
  } else {
    return false;
  }
}

function inserirUser($nome, $sobrenome, $email, $senha) {
  global $conn;
  $stmt = $conn->prepare("INSERT INTO usuarios (nome_usuarios, sobre_nome, email, senha) VALUES (:nome_usuarios, :sobre_nome, :email, :senha)");
  $stmt->bindParam(":nome_usuarios", $nome);
  $stmt->bindParam(":sobre_nome", $sobrenome);
  $stmt->bindParam(":email", $email);
  $stmt->bindParam(":senha", $senha);
  $stmt->execute();
}

function verificarUser($email, $senha) {
  global $conn;
  $sql = "SELECT * FROM usuarios WHERE email = :email and senha = :senha";
  $stmt = $conn->prepare($sql);
  $stmt->bindParam(":email", $email);
  $stmt->bindParam(":senha", $senha);
  $stmt->execute();

  if($stmt->rowCount() > 0) {
    $dado = $stmt->fetch();
    $_SESSION["id_usuarios"] = $dado["id_usuarios"];
    $_SESSION["email"] = $dado["email"];
    $_SESSION["senha"] = $dado["senha"];
    return true;

  } else {
    return false;
  }
}

function validarEmail($email) {
  if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    return false;
  }

  list($user, $domain) = explode('@', $email);

  if (!checkdnsrr($domain, 'MX')) {
    return false;
  }

  return true;
}

?>