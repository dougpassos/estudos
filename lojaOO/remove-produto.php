<?php
require_once("cabecalho.php");
$produtoDAO = new ProdutoDAO($conexao);
$produto = new Produto($_POST['nome'],$_POST['preco']);

if($produtoDAO->removeProduto($_POST['id'])) { ?>
    <p class="text-success">O produto <?= $produto->getNome() ?>,   foi deletado.</p>
<?php } else {
    $msg = mysqli_error($conexao);
?>
    <p class="text-danger">O produto <?= $produto->getNome() ?> não foi deletado: <?= $msg?></p>
<?php
}
?>
