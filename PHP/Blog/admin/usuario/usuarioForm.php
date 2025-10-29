<?php
include '../header.php';
include '../db.class.php';

if (!empty($_POST)) {
    try {
        $db = new db();
        if (empty($_POST['nome'])) {
            $errors[] = throw 'O nome é obrigatório';
        }
        if (empty($_POST['telefone'])) {
            $errors[] = throw 'O telefone é obrigatório';
        }
        if (empty($_POST['cpf'])) {
            $errors[] = throw 'O cpf é obrigatório';
        }

        $db->store([
            "nome" => $_POST['nome'],
            "telefone" => $_POST['telefone'],
            "cpf" => $_POST['cpf'],
            "email" => $_POST['email']
        ]);
        echo "Registro Salvo com sucesso!";

        echo "<script>
        setTimeout(
            ()=> window.Location.href = 'usuarioList.php', 2000
        );
    </script>";
    } catch (Exception $e) {
        var_dump($e->getMessage());
    }
}


?>

<h3>Formulário do Usuário</h3>
<form action="" method="post">
    <div class="row">
        <div class="col-6">
            <label for="" class="form-label">Nome</label>
            <input class="form-control" type="text" name="nome">
        </div>
        <div class="col-6">
            <label for="" class="form-label">Email</label>
            <input class="form-control" type="text" name="email">
        </div>
    </div>

    <div class="row">
        <div class="col">
            <label for="" class="form-label">CPF</label>
            <input class="form-control" type="text" name="cpf">
        </div>
        <div class="col">
            <label for="" class="form-label">Telefone</label>
            <input class="form-control" type="text" name="telefone">
        </div>
    </div>

    <div class="row">
        <div class="col">
            <label for="" class="form-label">Login</label>
            <input class="form-control" type="text" name="login">
        </div>
        <div class="col">
            <label for="" class="form-label">Senha</label>
            <input class="form-control" type="text" name="senha">
        </div>
        <div class="col">
            <label for="" class="form-label">Confirmar Senha</label>
            <input class="form-control" type="text" name="c_senha">
        </div>
    </div>

    <div class="row">
        <div class="col mt-4">
            <button type="submit" class="btn btn-success">Salvar</button>
            <a href="./usuarioList.php" class="btn btn-primary">Voltar</a>
        </div>
    </div>
    </div>
</form>

<?php
include '../footer.php';
?>