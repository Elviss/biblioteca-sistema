<?php
include 'Livro.php';

if(isset($_POST) && !empty($_POST)){

    $livro = new Livro();

    $livro->inserir($_POST['titulo'], $_POST['autor'], $_POST['editora'], $_POST['edicao'], $_POST['ano'], $_POST['quantidade']);

    header('Location: /biblioteca/consultar');
}
?>

<div class="container">
    <form class="form-horizontal" action="" method="post">
        <fieldset>

            <!-- Form Name -->
            <legend>Cadastro</legend>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-lg-2 control-label" for="titulo">Titulo do livro</label>
                <div class="col-lg-8">
                    <input id="titulo" name="titulo" placeholder="titulo" class="form-control" required="" type="text">

                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-lg-2 control-label" for="autor">Autor</label>
                <div class="col-lg-8">
                    <input id="autor" name="autor" placeholder="autor" class="form-control" required="" type="text">

                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-lg-2 control-label" for="editora">Editora</label>
                <div class="col-lg-8">
                    <input id="editora" name="editora" placeholder="editora" class="form-control input-md" required="" type="text">

                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-lg-2 control-label" for="edicao">Edição</label>
                <div class="col-lg-8">
                    <input id="edicao" name="edicao" placeholder="edição" class="form-control" required="" type="text">

                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-lg-2 control-label" for="ano">Ano</label>
                <div class="col-lg-8">
                    <input id="ano" name="ano" placeholder="ano" class="form-control input-md" required="" type="text">

                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-lg-2 control-label" for="ano">Quantidade</label>
                <div class="col-lg-8">
                    <input id="quantidade" name="quantidade" placeholder="quantidade" class="form-control input-md" required="" type="text">

                </div>
            </div>

            <!-- Button -->
            <div class="form-group">
                <label class="col-lg-2 control-label" for="salvar"></label>
                <div class="col-lg-8">
                    <button id="salvar" name="salvar" class="btn btn-success">Salvar</button>
                </div>
            </div>

        </fieldset>
    </form>
</div>