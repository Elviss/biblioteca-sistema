<?php
include 'Livro.php';

$id = isset($_GET['id']) ? $_GET['id'] : 0;

$livro = new Livro($id);

if(isset($_GET['emprestar'])) {
    $livro->emprestar();

    header('Location: detalhes?id='.$id);
}

if(isset($_GET['devolver'])) {
    $livro->devolver();

    header('Location: detalhes?id='.$id);
}
?>

<div class="container">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title"><?php echo $livro->titulo ?></h3>
        </div>
        <div class="panel-body">
            <p class="text-muted">Autor: <?php echo $livro->autor ?></p>
            <p class="text-muted">Editora: <?php echo $livro->editora ?></p>
            <p class="text-muted">Edição: <?php echo $livro->edicao ?></p>
            <p class="text-muted">Ano: <?php echo $livro->ano ?></p>
            <p class="text-muted">Quantidade: <?php echo $livro->quantidade ?></p>
            <p class="text-muted">Disponivel: <?php echo $livro->disponivel ?></p>

        </div>
    </div>

    <div class="btn-group">
        <a href="<?php echo $_SERVER['REQUEST_URI'] ?>&emprestar=1" class="btn btn-info <?php if($livro->disponivel == 0) echo 'disabled' ?>">Emprestar</a>
        <a href="<?php echo $_SERVER['REQUEST_URI'] ?>&devolver=1" class="btn btn-success <?php if($livro->disponivel == $livro->quantidade) echo 'disabled' ?>">Devolver</a>
    </div>
</div>
