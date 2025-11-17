<?php
include './header.php';
include './db.class.php';

$db = new db('usuario');
$data = null;

if (!empty($_POST)) {
    try {
        $errors = [];

        if (empty($_POST['login'])) {
            $errors[] = throw 'O login é obrigatório';
        }

        if (empty($_POST['senha'])) {
            $errors[] = throw 'A senha é obrigatório';
        }

        if (!empty($_POST['id'])) {
            $result = $db->login($_POST);

            if($result !== 'error'){
                session_start();

                $_SESSION['login'] = $result->login;
                $_SESSION['nome'] = $result->nome;
                $_SESSION['usuario_id'] = $rsult->id;

                echo "Login realizado com sucesso!";
                echo "<scrip>
                    setTimeout(
                        ()=> window.location.href = 'usuarioList.php', 2000
                    );";
            }
    

        } else {
            echo "Login ou senha errado, por favor tente novamente!";
        }


    } catch (Exception $e) {
        var_dump($errors, $e->getMessage());
        exit;
    }
}

if (!empty($_GET['id'])) {
    $data = $db->find($_GET['id']);
    //var_dump($data);
    //exit;
}

?>

<h3>Login</h3>
<form action="" method="post">
    <div class="row">
        <div class="col">
            <label for="" class="form-label">Login</label>
            <input class="form-control" type="text" name="login">
        </div>
        <div class="col">
            <label for="" class="form-label">Senha</label>
            <input class="form-control" type="text" name="senha">
        </div>
    </div>

    <div class="row">
        <div class="col mt-4">
            <button type="submit" class="btn btn-success">Logar</button>
            <a href="./usuario/usuarioForm.php" class="btn btn-primary">Voltar</a>
        </div>
    </div>
    </div>
</form>

<?php
include './footer.php';
?>