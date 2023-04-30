<?php
session_start();
include_once("../conn.php");
?>

<?php
    
    $method = $_SERVER["REQUEST_METHOD"];
    $dados = $_POST;

    // $_SESSION['nomeUsuario'] = "";
    // $_SESSION['sobrenomeUsuario'] = "";
    // $_SESSION['senhaUsuario'] = "";
    // $_SESSION['emailUsuario'] = "";

if ( $method === "POST") {
    
    if ( isset($dados["name"]) && !empty($dados["name"]) && isset($dados["lastname"]) && !empty($dados["lastname"]) && isset($dados["email"]) && !empty($dados["email"]) && isset($dados["password"]) && !empty($dados["password"]) ) {

        $_SESSION['nomeUsuario'] = $dados["name"];
        $_SESSION['sobrenomeUsuario'] = $dados["lastname"];
        $_SESSION['senhaUsuario'] = $dados["password"];
        $_SESSION['emailUsuario'] = $dados["email"];

        // $nome = $dados["name"];
        // $sobreNome = $dados["lastname"];
        // $email = $dados["email"];
        // $senha = $dados["password"];

        // $_SESSION['nomeUsuario'] = $nome;
        // $_SESSION['sobrenomeUsuario'] = $sobreNome;
        // $_SESSION['senhaUsuario'] = $senha;
        // $_SESSION['emailUsuario'] = $email;
        // $_SESSION['exemplo'] = 'ola';

        $stmt = $conn->prepare("INSERT INTO usuario (nome, sobre_nome, email, senha) VALUES (:nome, :sobre_nome, :email, :senha)");

        $stmt->bindParam(":nome", $_SESSION['nomeUsuario']);
        $stmt->bindParam(":sobre_nome", $_SESSION['sobrenomeUsuario']);
        $stmt->bindParam(":email", $_SESSION['emailUsuario']);
        $stmt->bindParam(":senha", $_SESSION['senhaUsuario']);
        $stmt->execute();

        // echo $_SERVER["nomeUsuario"];

        header("Location:"."../../../index.php");
        
    }

    else {
        // header("Location:"."../../public/register.php");
        header("Location:"."../../../register.php");
    }
}



  









?>