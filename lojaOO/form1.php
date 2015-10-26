<?php require_once("cabecalho.php");

$CategoriaDAO = new CategoriaDAO($conexao);
$categorias = $CategoriaDAO->listaCategorias();

?>
    <h1>Formulário Form1</h1>
    <form action="adiciona-produto.php" method="post">
        <table class="table">
            <td>Categoria</td>
                <td><?php $CategoriaDAO->montaListaCategorias() ?></td>
            </tr>
            <tr>
                <td>
                    <button class="btn btn-primary" type="submit">Cadastrar</button>
                </td>
            </tr>
        </table>
    </form>
<?php require_once("rodape.php"); ?>