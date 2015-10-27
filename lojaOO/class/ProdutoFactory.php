<?php
class ProdutoFactory
{
    private $classes = array("Ebook", "LivroFisico");

    public function criaPor($tipoProduto)
    {
        if (in_array($tipoProduto, $this->classes)) {
            return new $tipoProduto;
        }
        return new LivroFisico();
    }
}