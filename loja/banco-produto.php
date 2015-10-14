<?php
require_once("class/produto.php");
require_once("class/categoria.php");
require_once("conecta.php");

function listaProdutos($conexao) {
	$produtos = array();
	$resultado = mysqli_query($conexao, "select p.*,c.nome as categoria_nome from produtos as p join categorias as c on c.id=p.categoria_id");
	while($produto_atual = mysqli_fetch_assoc($resultado)) {
        $produto = new Produto;
        $categoria = new Categoria;
        $categoria->nome = $produto_atual['categoria_nome'];
        $produto->id = $produto_atual['id'];
        $produto->nome = $produto_atual['nome'];
        $produto->preco = $produto_atual['preco'];
        $produto->descricao = $produto_atual['descricao'];
        $produto->categoria = $categoria;
        $produto->usado = $produto_atual['usado'];
		array_push($produtos, $produto);
	}
	return $produtos;
}

function insereProduto($conexao, $produto) {
	if(array_key_exists('usado', $_POST)) {
        $produto->usado = "true";
    } else {
        $produto->usado = "false";
    }
    $query = "insert into produtos (nome, preco, descricao, categoria_id,
    usado) values ('{$produto->nome}', '{$produto->preco}',
    '{$produto->descricao}', '{$produto->categoria->id}', {$produto->usado})";
	return mysqli_query($conexao, $query);
}
function alteraProduto($conexao, $id, $nome, $preco, $descricao, $categoria_id, $usado) {
	$query = "update produtos set nome = '{$nome}', preco = {$preco}, descricao = '{$descricao}', categoria_id= {$categoria_id}, usado = {$usado} where id = '{$id}'";
	return mysqli_query($conexao, $query);
}

function buscaProduto($conexao, $id) {
	$query = "select * from produtos where id = {$id}";
	$resultado = mysqli_query($conexao, $query);
	return mysqli_fetch_assoc($resultado);
}

function removeProduto($conexao, $id) {
	$query = "delete from produtos where id = {$id}";
	return mysqli_query($conexao, $query);
}