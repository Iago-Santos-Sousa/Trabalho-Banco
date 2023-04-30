<?php

  
  session_start();

  $user = "root";
  $pass = "";
  $db = "livro_receita";
  $host = "localhost";
  global $conn;

  try {

    $conn = new PDO("mysql:host={$host};dbname={$db}", $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

  } catch (PDOException $e) {

    print "Erro: " . $e->getMessage() . "<br/>";
    die();

  }

    // $stmt = $conn->prepare("SELECT * FROM tabela_teste");
    // $stmt->execute();
    // $dados = $stmt->fetchAll();


?>