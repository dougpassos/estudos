<?php require_once("cabecalho.php");
 require_once("logica-usuario.php");

verificaUsuario();
if($_POST['tipoProduto'] == 'Livro'){
    $produto = new Livro($_POST['nome'],$_POST['preco']);
    $produto->setIsbn($_POST['ispn']);
} else {
    $produto = new Produto($_POST['nome'],$_POST['preco']);
}
$categoria = new Categoria;
$produtoDAO = new ProdutoDAO($conexao);
$categoria->setId($_POST['categoria_id']);
$produto->setDescricao($_POST['descricao']);
$produto->setCategoria($categoria);
$produto->tipoProduto = $_POST['tipoProduto'];

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
