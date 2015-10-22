<?php
require_once("conecta.php");
/*require_once("class/Produto.php");
require_once("class/Categoria.php");*/
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
            if (trim($produto_atual['isbn']) == "") {
                $produto = new Produto($produto_atual['nome'],$produto_atual['preco']);
            } else {
                $produto = new Livro($produto_atual['nome'],$produto_atual['preco']);
                $produto->setIsbn($array['isbn']);
            }
            $produto->setId($produto_atual['id']);
            $produto->setDescricao($produto_atual['descricao']);
            $produto->setCategoria($categoria);
            $produto->setUsado($produto_atual['usado']);
            $produto->tipoProduto = $produto_atual['tipoProduto'];
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
        $query = "select p.*,c.nome as categoria_nome from produtos as p join categorias as c on c.id=p.categoria_id where p.id = {$id}";
        $resultado = mysqli_query($this->conexao, $query);
        return mysqli_fetch_assoc($resultado);
    }

    function removeProduto($id) {
        $query = "delete from produtos where id = {$id}";
        return mysqli_query($this->conexao, $query);
    }
}