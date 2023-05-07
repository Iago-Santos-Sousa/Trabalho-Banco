<?php

// session_start();
include_once("../conn.php");
// include_once("./login.php");
// include_once("../../../index.php");

?>

<?php  
$method = $_SERVER["REQUEST_METHOD"];
$dados = $_POST;

if ($method === "POST") {

	if (isset($dados["email"]) && !empty($dados["email"]) && isset($dados["password"]) && !empty($dados["password"]) ) {
		$email = $dados["email"];
		$senha = $dados["password"];

		$sql = "SELECT * FROM usuario WHERE email = '$email' and senha = '$senha'";

		$result = $conn->query($sql);

		if ($result->rowCount() < 1) {
			
				
			unset($_SESSION['emailUsuario']);
			unset($_SESSION['senhaUsuario']);
			unset($_SESSION['nomeUsuario']);
			unset($_SESSION['sobrenomeUsuario']);
			unset($_SESSION['confirmarsenha']);
			
			header("Location:"."../../index.php");
			$_SESSION["alert"] = "alerta";
			return;

		}  
		
		else {
			$_SESSION['emailUsuario'] = $email;
			$_SESSION['senhaUsuario'] = $senha;
			header('Location:'. '../../public/homeSistema.php'); 
		}

			
	} else {
		$_SESSION["alert"] = "alerta";
		header("Location:"."../../index.php");
	}
	
} 

























?>