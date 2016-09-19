<?php

class Livro
{
    public $id;
    public $titulo;
    public $autor;
    public $editora;
    public $edicao;
    public $ano;
    public $quantidade;
    public $disponivel;

    public function __construct($id = false)
    {
        if($id != false) {
            $this->getLivro($id);
        }
    }

    public function inserir($titulo, $autor, $editora, $edicao, $ano, $quantidade)
    {
        $this->titulo = $titulo;
        $this->autor = $autor;
        $this->editora = $editora;
        $this->edicao = $edicao;
        $this->ano = $ano;
        $this->quantidade = $quantidade;
        $this->disponivel = $quantidade;

        $sql = "INSERT INTO livros (titulo, autor, editora, edicao, ano, quantidade, disponivel) VALUES (:titulo, :autor, :editora, :edicao, :ano, :quantidade, :disponivel)";

        $conn = Conexao::getIsntance();
        $statement = $conn->prepare($sql);

        $statement->bindValue(':titulo', $this->titulo, PDO::PARAM_STR);
        $statement->bindValue(':autor', $this->autor, PDO::PARAM_STR);
        $statement->bindValue(':editora', $this->editora, PDO::PARAM_STR);
        $statement->bindValue(':edicao', $this->edicao, PDO::PARAM_STR);
        $statement->bindValue(':ano', $this->ano, PDO::PARAM_INT);
        $statement->bindValue(':quantidade', $this->quantidade, PDO::PARAM_INT);
        $statement->bindValue(':disponivel', $this->disponivel, PDO::PARAM_INT);

        return $statement->execute();

    }

    public function getLivro($id)
    {
        $sql = "SELECT * FROM livros WHERE id = :id";

        $conn = Conexao::getIsntance();
        $statement = $conn->prepare($sql);

        $statement->bindValue(':id', $id, PDO::PARAM_INT);

        $statement->execute();

        $livro = $statement->fetch(PDO::FETCH_OBJ);

        $this->id = $livro->id;
        $this->titulo = $livro->titulo;
        $this->autor = $livro->autor;
        $this->editora = $livro->editora;
        $this->edicao = $livro->edicao;
        $this->ano = $livro->ano;
        $this->quantidade = $livro->quantidade;
        $this->disponivel = $livro->disponivel;

        return $this;
    }

    public function emprestar()
    {
        if($this->quantidade > 0) {
            $nova_quantidade = $this->disponivel - 1;
        } else {
            return false;
        }

        $sql = "UPDATE livros SET disponivel = $nova_quantidade WHERE id = " . $this->id;

        $conn = Conexao::getIsntance();

        $statement = $conn->query($sql);
        $statement->execute();
    }

    public function devolver()
    {

        $nova_quantidade = $this->disponivel + 1;

        $sql = "UPDATE livros SET disponivel = $nova_quantidade WHERE id = " . $this->id;

        $conn = Conexao::getIsntance();

        $statement = $conn->query($sql);
        $statement->execute();
    }

    public static function pesquisar($pesquisa)
    {

        $like = "concat('%', :pesquisa, '%')";

        $sql = "SELECT * FROM livros WHERE id LIKE $like OR titulo LIKE $like OR autor LIKE $like OR editora LIKE $like OR edicao LIKE $like OR ano LIKE $like";

        $conn = Conexao::getIsntance();
        $statement = $conn->prepare($sql);

        $statement->bindValue(':pesquisa', $pesquisa, PDO::PARAM_STR);

        $statement->execute();

        $lista = $statement->fetchAll(PDO::FETCH_OBJ);

        return $lista;
    }
    
    public static function listar()
    {
        $sql = "SELECT * FROM livros";

        $conn = Conexao::getIsntance();
        $statement = $conn->query($sql);

        $lista = $statement->fetchAll(PDO::FETCH_OBJ);

        return $lista;
    }
}
