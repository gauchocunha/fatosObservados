<!-- Content Header (Page header) -->
<style type="text/css">
    p{
        text-align: justify;
        text-indent: 30px;
    }
</style>

<section class="content-header">
    <h1>
        Ajuda
        <small>Leia antes de utilizar o sistema!</small>
    </h1>
</section>

<!-- Main content -->
<section class="content">

    <h4>Considerações iniciais:</h4>
    <p>Este sistema foi criado com o objetivo de controlar os fatos observados....</p>
    <p>Esta página de ajuda serve para dar uma visão geral do sistema.</p>

    <h4>Cadastro dos usuários:</h4>
    <p>Esta página, contém os dados básicos de um usuário do sistema.</p>
    <p>Somente usuários com perfil de administrador podem cadastrar novos usuários e realizar configurações no sistema, como, por exemplo, gerar a numeração.</p>
    <p>Não é possível excluir usuários do sistema por questões de auditoria e segurança. Entretanto se uma pessoa deixar de ter acesso ao sistema, basta mudar o seu staus de ativo para "Não" e essa pessoa não consegue entrar no sistema.</p>
    <p>Os administradores sempre devem verificar se um usuário não foi desativado antes de criar um novo, para evitar registros duplicados, pois como uma das idéias do sistema é ser bastantes simples e rápido não foi acrescentado um campo que pudesse ser utilizado como uma "chave", CPF por exemplo.</p>

    <h4>Cadastro da escola:</h4>
    <p>Esta página, contém os dados básicos de uma escola.</p>
    <p>Somente usuários com perfil de administrador podem cadastrar escolas. Todos campos são obrigatórios, exceto o campo "Complemento".

    <h4>Cadastro das alterações:</h4>
    <p>Nesta página é possível adicionar as alterações previstas.</p>
    <p>Só pode ser operada por administradores. O campo "Pontuação" deve ser preenchido utilizando o ponto como separador decimal. Alterações salvas com o tipo "Transgressão" tem o valor especificado na pontuação diminuído do conceito do estudante, alterações salvas com o tipo "Referência elogiosa" tem o valor especificado na pontuação somado ao conceito do estudante. </p>

    <h4>Cadastro de estudantes:</h4>
    <p>Mantendo o princípio da simplicidade, nesta página é necessário apenas o CPF do estudante, seu nome e nome de guerra e se está ativo.</p>

    <h4>Cadastro da numeração:</h4>
    <p>Requer cuidado esse procedimento. Só deve ser executado uma vêz por ano. Uma tela de advertência sempre será exibida. Funciona da seguinte maneira: Primeiro é necessário cadastrar todos os estudantes novatos e desativar os que já saíram da escola, seja
        por transferência ou por termino da última série oferecida pela instituição. A partir daí o sistema organiza em ordem alfabética e numera todos seguindo essa ordem. Para realizar esse procedimento
        o administrador vai preencher o ano desejado e clicar em "Gerar numeração". Estudantes que chegarem depois do procedimento realizado serão incluidos no final da sequencia numérica. Para isso digite o ano desejado, selecione o estudante e clique em "Gerar numeração para um estudante".</p>

    <h4>Cadastro dos fatos observdos:</h4>
    <p>Por fim temos o registro dos fatos observados. Funciona assim: Preencha a data do fato, selecione um estudante, selecione uma transgressão ou fato positivo, e se houverem dúvidas quanto a situação, digite uma observação. Depois clicar em "Salvar" ou "Salvar & Novo". Clicando em salvar, o registro é armazenado e o sistema permanece aguardando
         o próximo comando. Clicando em "Salvar & Novo" o registro é salvo e o sistema prepara o formulário para receber um novo registro, mantendo a data.</p>
    <p>Todo registro com observação deverá ser validado pelo diretor da escola e só terá a pontuação computada após esse procedimento.</p>
    <p>Ao lado das caixas de seleção "Estudante" e "Transgressão" existem duas caixas de texto para facilitar o preenchimento. Ao digitar o numero do estudante o sistema seleciona o estudante corresposndente, procedimento análogo é realizado com a transgressão.</p>
    <p>Ao selecionar um estudante ou uma trasngressão ocorre o inverso, ou seja, a caixa de texto é preencida. Dentro de muito pouco tempo
        os operadores vão decorar os códigos das transgressões, o que vai tornar muito rápido o preenchimento desse formulário.</p>

</section>