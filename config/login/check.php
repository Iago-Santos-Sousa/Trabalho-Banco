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
				header('Location:'. '../../index.php'); 
	
			} else {
				unset($_SESSION["id"]);
				unset($_SESSION["email"]);
				unset($_SESSION["senha"]);
				session_destroy();
				header('Location:'. '../../index.php');
			}
		} else {
			$_SESSION["alert"] = '<div class="row justify-content-center"><div class="col-6 col-md-6 col-lg-6 col-xl-5"><div id="liveAlertPlaceholder" class="mt-2"></div></div></div>';
			header("Location:"."../../src/templates/loginEntrar.php");
			
		}
			
	} else {
		$_SESSION["alert"] = '<div class="row justify-content-center"><div class="col-6 col-md-6 col-lg-6 col-xl-5"><div id="liveAlertPlaceholder" class="mt-2"></div></div></div>';
		header("Location:"."../../src/templates/loginEntrar.php");
	}
	
} 

























?>