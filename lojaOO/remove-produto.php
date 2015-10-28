<?php
require_once("cabecalho.php");
$produtoDAO = new ProdutoDAO($conexao);


if($produtoDAO->removeProduto($_POST['id'])) { ?>
    <p class="text-success">O produto foi deletado.</p>
<?php } else {
    $msg = mysqli_error($conexao);
?>
    <p class="text-danger">O produto não foi deletado: <?= $msg?></p>
<?php
}

?>
