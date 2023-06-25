<?php
include_once("../conn.php");
include_once("funcoesLogin.php");
?>

<?php

if ( $_SERVER["REQUEST_METHOD"] === "POST") {
    
	if ( !empty($_POST["name"]) || !empty($_POST["lastname"]) || !empty($_POST["email"]) || !empty($_POST["password"]) || !empty($_POST["confirmpassword"])) {

		$inputs = array($_POST["name"], $_POST["lastname"], $_POST["email"], $_POST["password"], $_POST["confirmpassword"]);

		if(!validarCamposLogin($inputs)) {
			header("Location:"."../../src/templates/register.php");
			$_SESSION["alertaCamposVazios"] = true;
		}
		
		$nome = $_POST["name"];
		$sobrenome = $_POST["lastname"];
		$senha = $_POST["password"];
		$email = $_POST["email"];
		$confirmarsenha = $_POST["confirmpassword"];

		$stmt = $conn->prepare("SELECT * FROM usuarios WHERE email = :email");
		$stmt->bindParam(":email", $email);
		$stmt->execute();

		$_SESSION["nome-user"] = '
		<div class="form-floating mb-3">
			<input
				type="text"
				class="form-control"
				id="name"
				name="name"
				placeholder="Digite seu nome"
				value="' . htmlspecialchars($nome, ENT_QUOTES) . '"
			/>
			<label for="name" class="form-label">Digite seu nome</label>
		</div>';

		$_SESSION["sobre-nome-user"] = '
		<div class="form-floating mb-3">
			<input
				type="text"
				class="form-control"
				id="lastname"
				name="lastname"
				placeholder="Digite seu sobrenome"
				value="' . htmlspecialchars($sobrenome, ENT_QUOTES) . '"
			/>
			<label for="lastname" class="form-label"
				>Digite seu sobrenome</label
			>
			<div class="valid-feedback">
				Looks good!
			</div>
		</div>';

		if ($stmt->rowCount() > 0) {
			$_SESSION["alert-email"] = '
			<div id="validationServerEmail"
        class="invalid-feedback"> Este endereço de email já está sendo usado. 
			</div>';
			$_SESSION["alert-input"] = '
			<input
				type="text"
				class="form-control is-invalid"
				id="email"
				name="email"
				placeholder="Digite seu email"
				value="' . htmlspecialchars($email, ENT_QUOTES) . '"
			/>
      <label for="email" class="form-label">Digite seu email</label>';
			header("Location:"."../../src/templates/register.php");		

		} else if (validarEmail($email)) {
				$_SESSION["alert-email"] = '
				<div id="validationServerEmail"
					class="valid-feedback">Este endereço de email é válido. 
				</div>';
				$_SESSION["alert-input"] = '
					<input
						type="text"
						class="form-control is-valid"
						id="email"
						name="email"
						placeholder="Digite seu email"
						value="' . htmlspecialchars($email, ENT_QUOTES) . '"
					/>
      	<label for="email" class="form-label">Digite seu email</label>';
				header("Location:"."../../src/templates/register.php");
			
			} else {
				$_SESSION["alert-email"] = '
				<div id="validationServerEmail"
					class="invalid-feedback">Este endereço de email não é válido! 
				</div>';
				$_SESSION["alert-input"] = '
					<input
						type="text"
						class="form-control is-invalid"
						id="email"
						name="email"
						placeholder="Digite seu email"
						value="' . htmlspecialchars($email, ENT_QUOTES) . '"
					/>
      	<label for="email" class="form-label">Digite seu email</label>';
				header("Location:"."../../src/templates/register.php");
			}

		if ($senha !== $confirmarsenha) {
			$_SESSION["msg-senha-errada"] = true;
			$_SESSION["msg2-senha-errada"] = true;
			header("Location:"."../../src/templates/register.php");
			exit();

		} else {
			if (validarSenha($senha)) {
				$senhaHash = md5($senha);
				inserirUser($nome, $sobrenome, $email, $senhaHash);
				unset($_SESSION["nome-user"]);
        unset($_SESSION["sobre-nome-user"]);
				unset($_SESSION["alert-input"]);
        unset($_SESSION["alert-email"]);
        unset($_SESSION["alertaCamposVazios"]);
				header("Location:"."../../src/templates/register.php");
				$_SESSION["usuarioCriado"] = true;
				
			} else {
				$_SESSION["msg2-senha-errada"] = true;
				header("Location:"."../../src/templates/register.php");
				exit();
			}
		}
	
	}	else {
		header("Location:"."../../src/templates/register.php");
		$_SESSION["alertaCamposVazios"] = true;
		exit();
	}
	
}


?>