<?php
include 'Livro.php';

$pesquisa = isset($_GET['pesquisa']) ? $_GET['pesquisa'] : '';

if(empty($pesquisa)) {
    $lista = Livro::listar();
} else {
    $lista = Livro::pesquisar($pesquisa);
}
?>
<div class="container">
    <table class="table table-striped table-hover ">
        <thead>
        <tr>
            <th>ID</th>
            <th>Titulo</th>
            <th>Autor</th>
            <th>Edição</th>
            <th>Editora</th>
            <th>Ano</th>
            <th>Qtd.</th>
            <th>Disponivel</th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($lista as $livro) {
            ?>
            <tr>
                <td><?php echo $livro->id ?></td>
                <td><a href="detalhes?id=<?php echo $livro->id ?>"><?php echo $livro->titulo ?></a></td>
                <td><?php echo $livro->autor ?></td>
                <td><?php echo $livro->edicao ?></td>
                <td><?php echo $livro->editora ?></td>
                <td><?php echo $livro->ano ?></td>
                <td><?php echo $livro->quantidade ?></td>
                <td><?php echo $livro->disponivel ?></td>
            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>
</div>