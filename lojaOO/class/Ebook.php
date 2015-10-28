<?php
class Ebook extends Livro
{
    private $waterMark;

    public function getWaterMark()
    {
        return $this->waterMark;
    }

    public function setWaterMark($waterMark)
    {
        $this->waterMark = $waterMark;
    }

    public function atualizaBaseadoEm($params)
    {
        $this->setId($params['id']);
        $this->setNome($params['nome']);
        $this->preco = $params['preco'];
        $this->setDescricao($params['descricao']);
        $this->setUsado($params['usado']);
        $this->setIsbn($params['isbn']);
        $this->tipoProduto = $params['tipoProduto'];
        $this->setWaterMark($params['waterMark']);

    }
}