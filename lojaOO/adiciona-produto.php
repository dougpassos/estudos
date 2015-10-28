<?php require_once("cabecalho.php");
 require_once("logica-usuario.php");

verificaUsuario();
$factory = new ProdutoFactory;
$produto = $factory->criaPor($_POST['tipoProduto']);
$produto->atualizaBaseadoEm($_POST);

$categoria = new Categoria;
$produtoDAO = new ProdutoDAO($conexao);
$categoria->setId($_POST['categoria_id']);
$produto->setCategoria($categoria);


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
