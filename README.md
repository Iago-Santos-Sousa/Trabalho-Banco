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

### 2. Gerenciar receita(Adicionar receita):

Usuário preenche os inputs da receita no script "**addreceita.php**" e depois clica em "**adicionar**", no script "**process.php**", verificamos se o input escondido "**criar-receita**" não esta vazio e assim tratamos os dados que vem do formulário preenchido, depois adicionamos os valores resgatados do formulário e colocamos no array "**$inputs**" e em seguida verificamos se todos estão preenchidos com a função "**validarCampos()**", que está no script "**funcoes.php**" se todos os inputs estiverem preenchidos chamados a função "**criarReceitas()**" que está no script "**funcoes.php**" e passamos os valores dos inputs como seus argumentos e inserimos os dados no BD utilizando o **PDO**, se os inputs estiverem vazios impedimos a inserção de dados vazios redirecionanado para a própria página com a função nativa do php "**header()**" e logo em seguida definimos um variável global "**$\_SESSION["camposVazios"]**" para emitir a mensagem de que os inputs estão vazios.

Também no script "**funcoes.php**" temos a função "**todosRegistrosReceitas()**" que retorna todos os registros das receitas já adicionadas pelo usuário para o array "**$todosRegistrosReceitasArray**" que está no script "**funcoes.php**". E logo no início do script "**addreceita.php**", o array "**$todosRegistrosReceitasArray**" recebe o retorno da função "**todosRegistrosReceitas()**" e se caso houver receitas vai ser mostrado na página em um loop for each "**$todosRegistrosReceitasArray as $receita**" senão, mostra um texto de que não há nenhuma receita.
