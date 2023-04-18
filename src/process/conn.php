<?php

  session_start();

  $user = "root";
  $pass = "";
  $db = "livro_receita";
  $host = "localhost";

  try {

    $conn = new PDO("mysql:host={$host};dbname={$db}", $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    echo "<h1>Deu certo</h1>";

  } catch (PDOException $e) {

    print "Erro: " . $e->getMessage() . "<br/>";
    die();
    echo "Deu erro";

  }

?>