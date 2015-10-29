<?php
class Avaliador
{
    public $maiorValor = -INF;
    public $menorValor = INF;

    public function avalia(Leilao $leilao)
    {
        foreach ($leilao->getLances() as $lance) {
            if($lance->getValor() > $this->maiorValor){
                $this->maiorValor = $lance->getValor();
            }
            if($lance->getValor() < $this->menorValor){
                $this->menorValor = $lance->getValor();
            }
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

    public function getMaiorLance()
    {
        return $this->maiorValor;
    }

    public function getMenorLance()
    {
        return $this->menorValor;
    }

}