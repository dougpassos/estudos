
                <td>Categoria</td>
                <td>
                    <select name="categoria_id" class="form-control">
                    <?php foreach($categorias as $categoria) :
                        $essaEhACategoria = $produto['categoria_id'] == $categoria['id'];
                        $selecao = $essaEhACategoria ? "selected='selected'" : "";
                        ?>
                        <option value="<?=$categoria['id']?>" <?=$selecao?>>
                                <?=$categoria['nome']?>
                        </option>
                    <?php endforeach ?>
                    </select>
                </td>
            </tr>
            <tr>