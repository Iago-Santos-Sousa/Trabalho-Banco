<?php

session_start();
include_once("../conn.php");
include_once("./login.php");

?>


<?php  

if (isset($dados["email"]) && !empty($dados["email"]) && isset($dados["password"]) && !empty($dados["password"]) ) {
    $email = $dados["email"];
    $senha = $dados["password"];

    $sql = "SELECT * FROM usuario WHERE email = '$email' and senha = '$senha'";

    $result = $conn->query($sql);

    if ($result->rowCount() < 1) {
        
        unset($_SESSION['emailUsuario']);
        unset($_SESSION['senhaUsuario']);
        header("Location:"."../../../index.php");

    }  
    
    else {
        $_SESSION['emailUsuario'] = $email;
        $_SESSION['senhaUsuario'] = $senha;
        header('Location:'. '../../../public/homeSistema.php'); 
    }

    
} else {
    header("Location:"."../../../index.php");
}






















?>