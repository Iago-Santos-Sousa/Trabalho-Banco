# Trabalho-Banco

### Funcionalidades do trabalho:

1. Gerenciar login:
   - Registrar usuário;
   - Fazer login;
1. Gerenciar receita:
   - Adicionar receita;
   - Atualizar receita;
   - Deletar receita.
1. Favoritar receita;
1. Imprimir receita em PDF.

# 2. Gerenciar receita(Adicionar receita):

Usuário preenche os inputs da receita no script "**addreceita.php**" e depois clica em "**adicionar**", no script "**process.php**", verificamos se o método de envio do form é o "**POST**" se sim, verificamos se o input escondido "**criar-receita**" não esta vazio e assim resgatamos os dados que vem do formulário preenchido com a variável global "**$\_POST**", depois adicionamos os valores resgatados do formulário e colocamos no array "**$inputs**" e em seguida verificamos se todos estão preenchidos com a função "**validarCampos()**", que está no script "**funcoes.php**" se todos os inputs estiverem preenchidos chamados a função "**criarReceitas()**" que está no script "**funcoes.php**" e passamos os valores dos inputs como seus argumentos e inserimos os dados no BD utilizando o **PDO**, se os inputs estiverem vazios impedimos a inserção de dados vazios redirecionanado para a própria página com a função nativa do php "**header()**" e logo em seguida definimos um variável global "**$\_SESSION["camposVazios"]**" para emitir a mensagem de que os inputs estão vazios.

Também no script "**funcoes.php**" temos a função "**todosRegistrosReceitas()**" que retorna todos os registros das receitas já adicionadas pelo usuário para o array "**$todosRegistrosReceitasArray**" que está no script "**funcoes.php**". E logo no início do script "**addreceita.php**", o array "**$todosRegistrosReceitasArray**" recebe o retorno da função "**todosRegistrosReceitas()**" e se caso houver receitas vai ser mostrado na página em um loop for each "**$todosRegistrosReceitasArray as $receita**" senão, mostra um texto de que não há nenhuma receita.

# 1. Gerenciar login:

### 1.1 Registrar usuário:

Usuário acessa a página de cadastro e preenche os campos requeridos, o script "**criarLogin**.php" recebe os dados do usuário por meio do método "**POST**".

Na linha 10 verificamos se todos os campos estão preenchidos, se estiverem, atribuimos os dados do usuário no array "**$inputs**", e então verificamos de novo se os campos estão preenchidos com a função "**validarCamposLogin()**" que está definida no script "**funcoesLogin.php**", se tiver algum campo vazio emitimos uma mensagem de que todos os campos precisam ser preenchidos com a variável global "**$\_SESSION["alertaCamposVazios"]**".

Na linha 25 fazemos um select com **PDO** para verificar se existe emails duplicados no **BD**. As variáveis globais "**$\_SESSION["nome-user"]**", "**$\_SESSION["sobre-nome-user"]**" e "**$\_SESSION["alert-input"]**" recebem os inputs com o método "**htmlspecialchars**" no atributo "**value**" para fazer com que os dados já digitados pelo usuário permanecam na página após erro de autenticação.

Na linha 60 verificamos se existe emails duplicados, se existir, emitimos mensagem de erro com a variável global "**$\_SESSION["alert-email"]**" e impedimos a inserção desses dados.

Na linha 77 verificamos se o email é válido chamando a função "**validarEmail()**" que está definida no script "**funcoesLogin.php**", se o email for inválido, emitimos mensagem e impedimos a inserção de dados.

Na linha 112 verificamos se a senha digitada pelo ususário é igual a que foi confirmada pelo mesmo, se for diferente emitimos mensagem com as variáveis globais "**$\_SESSION["msg-senha-errada"]**" e "**$\_SESSION["msg2-senha-errada"]**" e impedimos a inserção de dados.

Se as senhas forem iguais chamamos a função "**validarSenha()**" que está no script "**funcoesLogin.php**", essa função valida a senha digitada por meio de uma **expressão regular** que requer no mínimo 8 caracteres sendo esses uma letra maiúscula, uma letra minúscula, um número e um caractere especial. Se a senha corresponder as exigências chamamos a função "**inserirUser()**" que está definida no script "**funcoesLogin.php**", ela é responsável por inserir os dados do usuário na tabela usuários no BD por meio do PDO do PHP, OBS: a "**$senha**" passada como argumento está criptografada com a função "**md5()**" do PHP, em seguida emitimos mensagem de sucesso com a variável global "**$\_SESSION["usuarioCriado"]**"

### 1.2 Fazer login:

Com o cadastro do usuário já realizado, ele acessa a página de login e clica no botão entrar.

O script "**validarLogin.php**" recebe o email e senha digitados por meio do método "**POST**" do envio do formulário.

Na linha 8 verificamos se os campos email e senha estão preenchidos, se algum estiver vazio emitimos mensagem com a variável global "**$\_SESSION["alert"]**" e impedimos a tentativa de login.

Na linha 12 chamamos a função "**verificarUser()**" que esta no script "**funcoesLogin.php**", essa função verifica se o email e senha estão cadastrados no BD por meio de um select usando PDO, se estiver, inciamos a sessão do usuário com as variáveis globais "**$\_SESSION**" e definimos uma sessão de login padrão com a "**$\_SESSION['loggedin']**", em seguida o usuário é redirecionado para o sistema com a função "**header()**".

Caso o email e senha não sejam encontrados destruimos as sessões para maior segurança, e emitimos mensagem de erro com a variável global "**$\_SESSION["alert"]**" e impedimos o redirecionamento da página.

# 2. Favoritar receita:

Quando o usuário escolher qual receita favoritar, ele clica no botão de favorito.

No script "**process**.php" na linha 32 verificamos se o input escondido "**favorito**" está definido e recebemos a ação desse usuário por meio de uma requsição "**POST**" de um formulário.

Na linha 33 recebemos também o id da receita escolhida em um input escondido que está no script "**addreceita.php**".

Na linha 34 chamamos a função "**inserirFavorito**($userID, $idReceita)" que está definida no script "**funcoes.php**" essa função insere a receita favoritada no BD na tabela favoritos com base no id do usuário e da receita. 
Dentro dessa função criamos o array "**$favoritoRegistro = []**" que irá receber a função "**umRegistroReceita($userID, $idReceita)**" com o registro da receita escolhida pelo usuário, em seguida fazemos uma query utilizando o **PDO** para inserir os dados dessa receita na tabela de favoritos por meio do array "**$favoritoRegistro = []\*\*" que já está com os dados dessa receita.

**OBS:** Optamos por criar a tabela favoritos sem relacionar chaves estrangeiras com primárias e fazer esse procedimento na função "**inserirFavorito**" porque colocamos a cláusula "**ON DELETE CASCADE**" nas chaves estrangeiras relacionadas do BD, para quando deletarmos uma receita, delete também seus ingredientes. Se tivessemos relacionado chaves com a tabela favoritos, assim que deletassemos uma receita também deletariamos ela na tabela favoritos.

Na linha 35 chamamos a função "**deletarReceita**" para retirar esse receita favoritada da página "**addreceita.php**".

Na linha 35 definimos a "**$\_SESSION["msgFavorito"]**" para emitir mensagem de sucesso.

No script "**favoritos.php**" na linha 3 chamaos a função "**todosRegistrosFavoritos($userID)**" dentro do array "**$todosRegistrosFavoritosArray**" para imprimir todas as receitas favoritadas pelo usuário na página com um loop for each.
