<?php
include_once("funcoesLogin.php");
?>

<?php  
if ($_SERVER["REQUEST_METHOD"] === "POST") {

	if (isset($_POST["email"]) && !empty($_POST["email"]) && isset($_POST["password"]) && !empty($_POST["password"]) ) {
		$email = $_POST["email"];
		$senha = $_POST["password"];

		if (verificarUser($email, $senha) == true) {
			if(isset($_SESSION["id_usuarios"]) || isset($_SESSION["email"]) || isset($_SESSION["senha"])) {
				header('Location:'. '../../index.php'); 
	
			} else {
				unset($_SESSION["id_usuarios"]);
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