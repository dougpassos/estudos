<?php require_once("cabecalho.php");
 require_once("class/produtoDAO.php");
 require_once("logica-usuario.php");
 require_once("class/produto.php");
 require_once("class/categoria.php");
verificaUsuario();
$produto = new Produto($_POST['nome'],$_POST['preco']);
$categoria = new Categoria;
$produtoDAO = new ProdutoDAO($conexao);
$categoria->setId($_POST['categoria_id']);
$produto->setDescricao($_POST['descricao']);
$produto->SetCategoria($categoria);

if(array_key_exists('usado', $_POST)) {
	$produto->SetUsado("true");
} else {
	$produto->SetUsado("false");
}

if($produtoDAO->insereProduto($produto)) { ?>
	<p class="text-success">O produto <?= $produto->getNome() ?>, <?= $produto->getPreco() ?> foi adicionado.</p>
<?php } else {
	$msg = mysqli_error($conexao);
?>
	<p class="text-danger">O produto <?= $produto->getNome() ?> não foi adicionado: <?= $msg?></p>
<?php
}
?>

<?php require_once("rodape.php"); ?>
