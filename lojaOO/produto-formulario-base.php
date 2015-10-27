            <tr>
                <td>Nome</td>
                <td> <input class="form-control" type="text" name="nome" value="<?=$produto->getNome()?>"></td>
            </tr>
            <tr>
                <td>Preço</td>
                <td><input  class="form-control" type="number" name="preco"
                    value="<?=$produto->getPreco()?>"></td>
            </tr>
            <tr>
                <td>Descrição</td>
                <td><textarea class="form-control" name="descricao"><?=$produto->getDescricao()?></textarea></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="checkbox" name="usado" <?=$usado?> value="true"> Usado
            </tr>
            <tr>
                <td>Categoria</td>
                <td>
                <?php $CategoriaDAO->montaListaCategorias($categoriaProduto) ?>
                </td>
            </tr>
            <tr>
                <td>Tipo do produto</td>
                <td>
                    <select name="tipoProduto" class="form-control">
                        <option value="Livro">Livro</option>
                        <option value="Produto">Geral</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>ISPN (Caso seja um livro)</td>
                <td><input class="form-control" type="text" name="ispn" value="<?=$isbn?>"></td>
            </tr>