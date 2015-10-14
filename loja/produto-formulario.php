<?php require_once("cabecalho.php");
require_once("banco-categoria.php");
require_once("logica-usuario.php");
require_once("class/produto.php");
require_once("class/categoria.php");

verificaUsuario();

$produto = new Produto;
$produto->nome = "";
$produto->descricao = "";
$produto->preco = "";
//$produto->categoria->id = "1";
$produto->usado = true;

$categorias = listaCategorias($conexao);
?>
	<h1>Formulário de produto</h1>
	<form action="adiciona-produto.php" method="post">
		<table class="table">

			<?php include("produto-formulario-base.php"); ?>

			<tr>
				<td>
					<button class="btn btn-primary" type="submit">Cadastrar</button>
				</td>
			</tr>
		</table>
	</form>
<?php include("rodape.php"); ?>
