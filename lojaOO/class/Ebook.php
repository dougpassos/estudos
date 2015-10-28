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

        $this->setWaterMark($params['watermark']);
        $this->setIsbn($params['isbn']);
        $this->setId($params['id']);
        $this->setNome($params['nome']);
        $this->preco = $params['preco'];
        $this->setDescricao($params['descricao']);
        $this->setUsado($params['usado']);
        $this->tipoProduto = $params['tipoProduto'];

    }
}