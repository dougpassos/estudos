<?php require_once("cabecalho.php");
require_once("banco-categoria.php");

$produtoDAO = new ProdutoDAO($conexao);
$CategoriaDAO = new CategoriaDAO($conexao);
$produto = $produtoDAO->buscaProduto($_GET['id']);
$categoriaProduto = $produto->getCategoria()->getId();
$usado = $produto->getUsado() ? "checked='checked'" : "";
?>
	<h1>Alterando produto</h1>
	<form action="altera-produto.php" method="post">
		<input type="hidden" name="id" value="<?=$produto->getId()?>">
		<table class="table">
			<?php require_once("produto-formulario-base.php"); ?>
			<tr>
				<td>
					<button class="btn btn-primary" type="submit">Alterar</button>
				</td>
			</tr>
		</table>
	</form>
<?php require_once("rodape.php"); ?>
