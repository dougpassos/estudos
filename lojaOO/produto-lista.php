<?php require_once("cabecalho.php");
 require_once("class/ProdutoDAO.php");

 ?>

<table class="table table-striped table-bordered">
	<tr>
		<th>Produto</th>
		<th>Preço</th>
		<th>Imposto</th>
		<th>Descrição</th>
		<th>Categoria</th>
		<th>Novo / Usado</th>
		<th>Tipo de Produto</th>
		<th>ISBN</th>
	</tr>
	<?php
		$produtosDAO = new ProdutoDAO($conexao);
		$produtos = (object) $produtosDAO->listaProdutos();

		foreach($produtos as $produto) :
	?>
	<tr>
		<td><?= $produto->getNome() ?></td>
		<td><?= $produto->getPreco() ?></td>
		<td>R$ <?= $produto->calculaImposto() ?> </td>
		<td><?= substr($produto->getDescricao(), 0, 40) ?></td>
		<td><?= $produto->getCategoria()->getNome() ?></td>
		<?php if($produto->getUsado() == 1)
		{ ?>
				<td>Usado</td>
		<?php }else{ ?>
				<td>Novo</td>
		<?php } ?>
		<td><?= $produto->tipoProduto ?></td>
		<td><?php if($produto->isLivro()): ?>
            ISBN: <?= $produto->getIsbn() ?>
        <?php endif ?>
		</td>
		<td><a class="btn btn-primary" href="produto-altera-formulario.php?id=<?=$produto->getId()?>">alterar</a></td>
		<td>
			<form action="remove-produto.php" method="post">
				<input type="hidden" name="id" value="<?=$produto->getId()?>">
				<input type="hidden" name="nome" value="<?=$produto->getNome()?>">
				<input type="hidden" name="preco" value="<?=$produto->getPreco()?>">
				<button class="btn btn-danger">remover</button>
			</form>
		</td>
	</tr>
	<?php
		endforeach
	?>
</table>
<?php require_once("rodape.php"); ?>
