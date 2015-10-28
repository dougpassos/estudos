<?php
class LivroFisico extends Livro
{
    private $taxaImpressao;

    public function getTaxaImpressao()
    {
        return $this->taxaImpressao;
    }

    public function setTaxaImpressao($taxaImpressao)
    {
        $this->taxaImpressao = $taxaImpressao;
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
        $this->setTaxaImpressao($params['taxaImpressao']);

    }
}