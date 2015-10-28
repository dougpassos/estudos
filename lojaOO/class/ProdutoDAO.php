<?php
require_once("conecta.php");
require_once("autoload.php");

class ProdutoDAO{

    private $conexao;

    function __construct($conexao){
        $this->conexao = $conexao;
    }

    function listaProdutos() {
        $produtos = array();
        $resultado = mysqli_query($this->conexao, "select p.*,c.nome as categoria_nome from produtos as p join categorias as c on c.id=p.categoria_id");
        while($produto_atual = mysqli_fetch_assoc($resultado)) {
            $categoria = new Categoria;
            $categoria->setId($produto_atual['categoria_id']);
            $categoria->setNome($produto_atual['categoria_nome']);
            $factory = new ProdutoFactory;
            $produto = $factory->criaPor($produto_atual['tipoProduto']);
            $produto->atualizaBaseadoEm($produto_atual);
            $produto->setCategoria($categoria);
            array_push($produtos, $produto);
        }
        return $produtos;
    }

    function insereProduto($produto) {
        //$produto->setNome() = mysqli_real_escape_string($conexao, $produto->getNome());
        $query = "insert into produtos (nome, preco, descricao, categoria_id, usado, isbn, tipoProduto) values ('{$produto->getNome()}', {$produto->getPreco()}, '{$produto->getDescricao()}', {$produto->getCategoria()->getId()}, {$produto->getUsado()}, '{$produto->getIsbn()}', '{$produto->tipoProduto}')";
        return mysqli_query($this->conexao, $query);
    }

    function alteraProduto($produto) {
        //$nome = mysqli_real_escape_string($this->conexao, $nome);
        if ($produto->tipoProduto == "Livro"){
            $query = "update produtos set nome = '{$produto->getNome()}', preco = '{$produto->getPreco()}', descricao = '{$produto->getDescricao()}', categoria_id= '{$produto->getCategoria()->getId()}', usado = '{$produto->getUsado()}', isbn = '{$produto->getIsbn()}', tipoProduto = '{$produto->tipoProduto}' where id = '{$produto->getId()}'";
        } else {
            $query = "update produtos set nome = '{$produto->getNome()}', preco = '{$produto->getPreco()}', descricao = '{$produto->getDescricao()}', categoria_id= '{$produto->getCategoria()->getId()}', usado = '{$produto->getUsado()}', isbn = NULL ,tipoProduto = '{$produto->tipoProduto}' where id = '{$produto->getId()}'";

        }
        //$query = "update produtos set nome = '{$produto->getNome()}', preco = '{$produto->getPreco()}', descricao = '{$produto->getDescricao()}', categoria_id= '{$produto->getCategoria()->getId()}', usado = '{$produto->getUsado()}' isbn = '{$produto->getIsbn()}', tipoProduto = '{produto->tipoProduto}' where id = '{$produto->getId()}'";
        return mysqli_query($this->conexao, $query);
    }


    function buscaProduto($id) {
        $query = "select * from produtos where id = $id";
        $resultado = mysqli_query($this->conexao, $query);
        while($retornoProduto = mysqli_fetch_assoc($resultado))
        {
            $categoria = new Categoria;
            $catDAO = new CategoriaDAO($this->conexao);
            $retornoCat = $catDAO->buscaCategoria($retornoProduto['categoria_id']);
            $categoria->setId($retornoCat[0]["id"]);
            $categoria->setNome($retornoCat[0]['nome']);
            $factory = new ProdutoFactory;
            $produto = $factory->criaPor($retornoProduto['tipoProduto']);
            $produto->atualizaBaseadoEm($retornoProduto);
            $produto->setCategoria($categoria);
        }
        return $produto;

    }

    function removeProduto($id) {
        $query = "delete from produtos where id = {$id}";
        return mysqli_query($this->conexao, $query);
    }

}