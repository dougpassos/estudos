<?php require_once("cabecalho.php");

$CategoriaDAO = new CategoriaDAO($conexao);
$categorias = $CategoriaDAO->listaCategorias();

?>
    <h1>Formulário Form1</h1>
    <form action="adiciona-produto.php" method="post">
        <table class="table">
            <td>Categoria</td>
                <td>
                    <select name="categoria_id" class="form-control">
                    <?php foreach($categorias as $categoria) :?>
                        <option value="<?=$categoria->getId()?>">
                                <?=$categoria->getNome()?>
                        </option>
                    <?php endforeach ?>
                    </select>
                </td>
            </tr>
            <tr>
            <tr>
                <td>
                    <button class="btn btn-primary" type="submit">Cadastrar</button>
                </td>
            </tr>
        </table>
    </form>
<?php require_once("rodape.php"); ?>