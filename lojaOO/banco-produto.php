<?php
require_once("conecta.php");
require_once("class/produto.php");
require_once("class/categoria.php");
function listaProdutos($conexao) {
	$produtos = array();
	$resultado = mysqli_query($conexao, "select p.*,c.nome as categoria_nome from produtos as p join categorias as c on c.id=p.categoria_id");
	while($produto_atual = mysqli_fetch_assoc($resultado)) {
		$produto = new Produto;
		$categoria = new Categoria;
		$categoria->setNome($produto_atual['categoria_nome']);
		$produto->setId($produto_atual['id']);
		$produto->SetNome($produto_atual['nome']);
		$produto->setPreco($produto_atual['preco']);
		$produto->SetDescricao($produto_atual['descricao']);
		$produto->SetCategoria($categoria);
		$produto->SetUsado($produto_atual['usado']);
		array_push($produtos, $produto);
	}
	return $produtos;
}

function insereProduto($conexao, $produto) {
	//$produto->setNome() = mysqli_real_escape_string($conexao, $produto->getNome());
	$query = "insert into produtos (nome, preco, descricao, categoria_id, usado) values ('{$produto->getNome()}', {$produto->getPreco()}, '{$produto->getDescricao()}', {$produto->getCategoria()->getId()}, {$produto->getUsado()})";
	return mysqli_query($conexao, $query);
}
function alteraProduto($conexao, $id, $nome, $preco, $descricao, $categoria_id, $usado) {
	$nome = mysqli_real_escape_string($conexao, $nome);
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