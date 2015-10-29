<?php
    require "Usuario.php";
    require "Lance.php";
    require "Leilao.php";
    require "Avaliador.php";
    class AvaliadorTest extends PHPUnit_Framework_TestCase
    {
        public function testDeveAceitarLancesEmOrdemDecrescente()
        {
            $leilao = new Leilao("Play 4");
            $cunha = new Usuario("Cunha");
            $dilma = new Usuario("Dilma");
            $lula = new Usuario("Lula");

            $leilao->propoe(new Lance($cunha,400));
            $leilao->propoe(new Lance($dilma,350));
            $leilao->propoe(new Lance($lula,250));

            $leiloeiro = new Avaliador;
            $leiloeiro->avalia($leilao);

            $maiorEsperado = 400;
            $menorEsperado = 250;

            $this->assertEquals($maiorEsperado, $leiloeiro->getMaiorLance());
            $this->assertEquals($menorEsperado, $leiloeiro->getMenorLance());
        }

    }