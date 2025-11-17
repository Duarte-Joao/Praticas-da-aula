<?php
include '../header.php';
include '../db.class.php';

$db = new db('post');
$data = null;

$dbCategoria = new db('categoria');
$categorias = $dbCategoria->all(); //listando todas as categorias

if (!empty($_POST)) {
    try {

        $errors = [];
        
        if (empty($_POST['titulo'])) {
            $errors[] = throw 'O titulo é obrigatório';
        }

        if (empty($_POST['telefone'])) {
            $errors[] = throw 'A descrição é obrigatório';
        }

        if (empty($_POST['data_publicacao'])) {
            $errors[] = throw 'A data da publicação é obrigatória';
        }

        if (empty($_POST['id'])) {
                $db->store($_POST);
                echo "Registro Salvo com sucesso!";
     
        } else {
            $db->update($_POST);

            echo "Registro Atualizado com sucesso!";
        }


        echo "<script>
        setTimeout(
            ()=> window.location.href = 'postList.php', 2000
        );
    </script>";
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

<h3>Formulário Postagem</h3>
<form action="" method="post">
    <input type="hidden" name="id" value="<?= $data->id ?? '' ?>">
    <input type="hidden" name="usuario_id" value="<?= $data->usuario_id ?? 
        $_SESSION['usuario_id']
    ?>">

    <div class="row">
        <div class="col-6">
            <label for="" class="form-label">Título</label>
            <input class="form-control" type="text" name="titulo" value="<?= $data->titulo ?? '' ?>"> <!-- <.?= é iguala a o echo-->
        </div>
        <div class="col-6">
            <label for="" class="form-label">Data Publicação</label>
            <input class="form-control" type="date" name="data_publicacao" value="<?= $data->data_publicacao ?? '' ?>">
        </div>
    </div>

    <div class="row">
        <div class="col">
            <label for="" class="form-label">Categoria</label>
            <select class="form-select" name="categoria_id" id="">
                <?php
                    foreach($categorias as $item){
                        echo "<option value='$item->id'>$item->nome</option>";
                    }
                ?>
            </select>
        </div>
        <div class="col">
            <label for="" class="form-label">Status</label>
            <select class="form-select" name="status" id="">
                <option value="1">Publicado</option>
                <option value="0">Não publicado</option>
            </select>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <label for="" class="form-label">Descrição</label>
            <textarea class="form-control" name="descricao"><?= $data->descricao ?? '' ?></textarea>
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