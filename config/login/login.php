<?php
include_once("../conn.php");
include_once("./funcoesLogin.php");
?>

<?php
$method = $_SERVER["REQUEST_METHOD"];
$dados = $_POST;

if ( $method === "POST") {
    
	if ( isset($dados["name"]) && !empty($dados["name"]) || isset($dados["lastname"]) && !empty($dados["lastname"]) || isset($dados["email"]) && !empty($dados["email"]) || isset	($dados["password"]) && !empty($dados["password"]) || isset($dados["confirmpassword"]) && !empty($dados["confirmpassword"])) {
		
		$nome = $dados["name"];
		$sobrenome = $dados["lastname"];
		$senha = $dados["password"];
		$email = $dados["email"];
		$confirmarsenha = $dados["confirmpassword"];

		$stmt = $conn->prepare("SELECT * FROM usuario WHERE email = :email");
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
			exit();
			// return;			

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
				exit();
			}

		if ($senha != $confirmarsenha) {
			$_SESSION["msg"] = 'Senha errada!';
			exit();

		} else {
			if (validarSenha($senha)) {
				inserirUser($nome, $sobrenome, $email, $senha);
				header("Location:"."../../index.php");
				
			} else {
				$_SESSION["msg2"] = "<div>Senha inválida. A senha deve conter pelo menos 8 caracteres, incluindo pelo menos uma letra maiúscula, uma letra minúscula, um número e um caractere especial.</div>";
				header("Location:"."../../src/templates/register.php");
				// return;
				exit();
			}
		}
		
	
	}	else {
		$_SESSION["alerta"] = 'informe os dados!';
		header("Location:"."../../src/templates/register.php");
	}
	
}


?>