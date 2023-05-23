<?php
include_once("./funcoesLogin.php");
?>

<?php  
$method = $_SERVER["REQUEST_METHOD"];
$dados = $_POST;

if ($method === "POST") {

	if (isset($dados["email"]) && !empty($dados["email"]) && isset($dados["password"]) && !empty($dados["password"]) ) {
		$email = $dados["email"];
		$senha = $dados["password"];

		if (verificarUser($email, $senha) == true) {
			if(isset($_SESSION["id"]) || isset($_SESSION["email"]) || isset($_SESSION["senha"])) {
				header('Location:'. '../../public/homeSistema.php'); 
	
			} else {
				header('Location:'. '../../public/homeSistema.php');
				session_destroy();
			}
		} else {
			header("Location:"."../../index.php");
			$_SESSION["alert"] = "alerta";
		}
			
	} else {
		$_SESSION["alert"] = "alerta";
		header("Location:"."../../index.php");
	}
	
} 

























?>