<?php
require_once("conecta.php");
require_once("class/produto.php");
require_once("class/categoria.php");

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
            $categoria->setNome($produto_atual['categoria_nome']);
            $produto = new Produto;
            $produto->setId($produto_atual['id']);
            $produto->setNome($produto_atual['nome']);
            $produto->setPreco($produto_atual['preco']);
            $produto->setDescricao($produto_atual['descricao']);
            $produto->setCategoria($categoria);
            $produto->setUsado($produto_atual['usado']);
            array_push($produtos, $produto);
        }
        return $produtos;
    }

    function insereProduto($produto) {
        //$produto->setNome() = mysqli_real_escape_string($conexao, $produto->getNome());
        $query = "insert into produtos (nome, preco, descricao, categoria_id, usado) values ('{$produto->getNome()}', {$produto->getPreco()}, '{$produto->getDescricao()}', {$produto->getCategoria()->getId()}, {$produto->getUsado()})";
        return mysqli_query($this->conexao, $query);
    }
    function alteraProduto($id, $nome, $preco, $descricao, $categoria_id, $usado) {
        $nome = mysqli_real_escape_string($this->conexao, $nome);
        $query = "update produtos set nome = '{$nome}', preco = {$preco}, descricao = '{$descricao}', categoria_id= {$categoria_id}, usado = {$usado} where id = '{$id}'";
        return mysqli_query($this->conexao, $query);
    }


    function buscaProduto($id) {
        $query = "select * from produtos where id = {$id}";
        $resultado = mysqli_query($this->conexao, $query);
        return mysqli_fetch_assoc($resultado);
    }

    function removeProduto($id) {
        $query = "delete from produtos where id = {$id}";
        return mysqli_query($this->conexao, $query);
    }
}