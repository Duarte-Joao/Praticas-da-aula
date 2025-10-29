<?php
include '../header.php';
include '../db.class.php';

$db = new db();
$db->store([
    "nome" => "João",
    "telefone" => "49 998349066",
    "cpf" => "09530898940",
    "email" => "teste@gmail.com"
]);

?>

<h3>Formulário do Usuário</h3>
<form action="" method="post">
    <div class="row">
        <div class="col-6">
            <label for="" class="form-label">Nome</label>
            <input class="form-contro" type="text" name="nome">
        </div>
        <div class="col-6">
            <label for="" class="form-label">Email</label>
            <input class="form-contro" type="text" name="email">
        </div>
    </div>

    <div class="row">
        <div class="col">
            <label for="" class="form-label">CPF</label>
            <input class="form-contro" type="text" name="cpf">
        </div>
        <div class="col">
            <label for="" class="form-label">Telefone</label>
            <input class="form-contro" type="text" name="telefone">
        </div>
    </div>

    <div class="row">
        <div class="col">
            <label for="" class="form-label">Login</label>
            <input class="form-contro" type="text" name="login">
        </div>
        <div class="col">
            <label for="" class="form-label">Senha</label>
            <input class="form-contro" type="text" name="senha">
        </div>
        <div class="col">
            <label for="" class="form-label">Confirmar Senha</label>
            <input class="form-contro" type="text" name="c_senha">
        </div>
    </div>

    <div class="ro">
        <div class="col mt-4">
            <button type="submit">Salvar</button>
            <a href="./usuarioList.php">Voltar</a>
        </div>
    </div>
    </div>
</form>

<?php
include '../footer.php'
?>