<?php
class Livro extends Produto
{
    private $isbn;

    public function getIsbn()
    {
        return $this->isbn;
    }

     public function setIsbn($isbn)
    {
        $this->isbn = $isbn;
    }

    function calculaImposto()
    {
        return parent::calculaImposto() * 0.5;
    }


}