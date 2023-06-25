<?php
include_once("funcoesLogin.php");
?>

<?php  
if ($_SERVER["REQUEST_METHOD"] === "POST") {

	if (isset($_POST["email"]) && !empty($_POST["email"]) && isset($_POST["password"]) && !empty($_POST["password"]) ) {
		$email = $_POST["email"];
		$senha = $_POST["password"];

		if (verificarUser($email, md5($senha)) == true) {

			if(isset($_SESSION["id_usuarios"]) || isset($_SESSION["email"]) || isset($_SESSION["senha"])){
				$_SESSION['loggedin'] = true;
				header('Location:'. '../../index.php'); 
	
			} else {
				unset($_SESSION["id_usuarios"]);
				unset($_SESSION["email"]);
				unset($_SESSION["senha"]);
				unset($_SESSION['loggedin']);
				session_destroy();
				header('Location:'. '../../index.php');
			}

		} else {
			$_SESSION["alert"] = true;
			header("Location:"."../../src/templates/loginEntrar.php");
			
		}
			
	} else {
		$_SESSION["alert"] = true;
		header("Location:"."../../src/templates/loginEntrar.php");
	}
	
} 

























?>