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
                <td><input type="checkbox" name="usado" <?=$usado?> value="1"> Usado
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
                        <optgroup label="Livro">
                            <?php $selecaoTipo = ($produto->tipoProduto == "Ebook") ? " selected" : "";?>
                            <option value="Ebook"<?=$selecaoTipo?>>Ebook</option>
                            <?php $selecaoTipo = ($produto->tipoProduto == "LivroFisico") ? " selected" : "";?>
                            <option value="LivroFisico"<?=$selecaoTipo?>>Livro Físico</option>
                        </optgroup>
                    </select>
                </td>
            </tr>
            <tr>
                <td>ISBN (Caso seja um livro)</td>
                <td><input class="form-control" type="text" name="isbn" value="<?=$isbn?>"></td>
            </tr>