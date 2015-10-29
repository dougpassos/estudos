<?php
class Avaliador
{
    public $maiorValor = -INF;
    public $menorValor = INF;
    private $maiores;

    public function avalia(Leilao $leilao)
    {
        foreach ($leilao->getLances() as $lance) {
            if($lance->getValor() > $this->maiorValor){
                $this->maiorValor = $lance->getValor();
            }
            if($lance->getValor() < $this->menorValor){
                $this->menorValor = $lance->getValor();
            }
            $this->pegaMaioresNo($leilao);
        }
    }

    public function mediaLances(Leilao $leilao)
    {
        $somaLance = 0;
        $numLances = 0;
        foreach ($leilao->getLances() as $lance)
        {
            $somaLance = $somaLance + $lance->getValor();
            $numLances++;
        }
        return $somaLance/$numLances;
    }

    public function pegaMaioresNo(Leilao $leilao)
    {
        $lances = $leilao->getLances();
        usort($lances,function ($a,$b) {
            if($a->getValor() == $b->getValor()) return 0;
            return ($a->getValor() < $b->getValor()) ? 1 : -1;
        });
        $this->maiores = array_slice($lances, 0,3);
    }

    public function getMaiorLance()
    {
        return $this->maiorValor;
    }

    public function getMenorLance()
    {
        return $this->menorValor;
    }

    public function getTresMaiores()
    {
        return $this->maiores;
    }

}