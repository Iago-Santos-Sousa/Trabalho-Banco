<?php
// session_start();
include_once("../conn.php");
// include_once("../../../register.php");
?>

<?php
  
$method = $_SERVER["REQUEST_METHOD"];
$dados = $_POST;

if ( $method === "POST") {
    
	if ( isset($dados["name"]) && !empty($dados["name"]) && isset($dados["lastname"]) && !empty($dados["lastname"]) && isset($dados["email"]) && !empty($dados["email"]) && isset	($dados["password"]) && !empty($dados["password"]) && isset($dados["confirmpassword"]) && !empty($dados["confirmpassword"])) {
		
		$_SESSION['nomeUsuario'] = $dados["name"];
		$_SESSION['sobrenomeUsuario'] = $dados["lastname"];
		$_SESSION['senhaUsuario'] = $dados["password"];
		$_SESSION['emailUsuario'] = $dados["email"];
		$_SESSION['confirmarsenha'] = $dados["confirmpassword"];

		if ($_SESSION['senhaUsuario'] != $_SESSION['confirmarsenha']) {
			$_SESSION["msg"] = 'Senha errada!';
			header("Location:"."../../src/templates/register.php");
			
			// return;

		} else {
			$stmt = $conn->prepare("INSERT INTO usuario (nome, sobre_nome, email, senha) VALUES (:nome, :sobre_nome, :email, :senha)");

			$stmt->bindParam(":nome", $_SESSION['nomeUsuario']);
			$stmt->bindParam(":sobre_nome", $_SESSION['sobrenomeUsuario']);
			$stmt->bindParam(":email", $_SESSION['emailUsuario']);
			$stmt->bindParam(":senha", $_SESSION['senhaUsuario']);
			$stmt->execute();

			header("Location:"."../../index.php");
		}
			
	}

	else {
		// header("Location:"."../../public/register.php");
		header("Location:"."../../src/templates/register.php");
	}
}




?>