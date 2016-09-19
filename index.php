<?php

//error_reporting(E_ALL);
//ini_set('display_errors', 1);

if(strpos($_SERVER['REQUEST_URI'], '?')){
     $pagina = substr($_SERVER['REQUEST_URI'], 0, strpos($_SERVER['REQUEST_URI'], '?'));
} else {
    $pagina = $_SERVER['REQUEST_URI'];
}

include 'Conexao.php';
?>

<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="vendor/bootstrap.min.css">
    <title>Biblioteca</title>
</head>
<body>

<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/biblioteca">Biblioteca</a>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li <?php if($pagina == "/biblioteca/cadastrar") {?> class="active" <?php } ?>><a href="cadastrar">Cadastrar </a></li>
                <li <?php if($pagina == "/biblioteca/consultar") {?> class="active" <?php } ?>><a href="consultar">Consultar </a></li>
            </ul>
            <form class="navbar-form navbar-left" role="search" action="consultar">
                <div class="form-group">
                    <input name="pesquisa" class="form-control" placeholder="Search" type="text">
                </div>
                <button type="submit" class="btn btn-default">Submit</button>
            </form>
        </div>
    </div>
</nav>

<?php
switch($pagina) {
    case '/biblioteca/cadastrar':
        include 'cadastrar.php';
        break;
    case '/biblioteca/consultar':
        include 'consultar.php';
        break;
    case '/biblioteca/detalhes':
        include 'detalhes.php';
        break;
}
?>

</body>
</html>
