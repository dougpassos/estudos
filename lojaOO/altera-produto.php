<?php
require_once("cabecalho.php");

/*$DAO = new ProdutoDAO($conexao);
if($_POST['tipoProduto'] == 'Livro'){
    $produto = new Livro($_POST['nome'],$_POST['preco']);
    $produto->setIsbn($_POST['ispn']);
} else {
    $produto = new Produto($_POST['nome'],$_POST['preco']);
}

$produto->setId($_POST['id']);
$produto->setDescricao($_POST['descricao']);
$categoria = new Categoria;
$categoria->setId($_POST['categoria_id']);
$produto->setCategoria($categoria);
if(array_key_exists('usado', $_POST)) {
	$produto->setUsado(1);
} else {
	$produto->setUsado(0);
}
$produto->tipoProduto = $_POST['tipoProduto'];*/
$factory = new ProdutoFactory;
$produto = $factory->criaPor($_POST['tipoProduto']);
$produto->atualizaBaseadoEm($_POST);
$categoria = new Categoria;
$produtoDAO = new ProdutoDAO($conexao);
$categoria->setId($_POST['categoria_id']);
$produto->setCategoria($categoria);
echo "POst<br>";
var_dump($_POST);
echo "<br> produto <br>";
var_dump($produto);

if($produtoDAO->alteraProduto($produto)) { ?>
	<p class="text-success">O produto <?= $produto->getNome() ?>, <?= $produto->getPreco() ?> foi alterado.</p>
<?php } else {
	$msg = mysqli_error($conexao);
?>
	<p class="text-danger">O produto <?= $produto->getNome() ?> não foi alterado: <?= $msg?></p>
<?php
}
?>

<?php require_once("rodape.php"); ?>
