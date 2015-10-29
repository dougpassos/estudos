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

        public function testDeveAceitarLancesEmOrdemCrescente()
        {
            $leilao = new Leilao("Play 4");
            $cunha = new Usuario("Cunha");
            $dilma = new Usuario("Dilma");
            $lula = new Usuario("Lula");

            $leilao->propoe(new Lance($lula,250));
            $leilao->propoe(new Lance($dilma,350));
            $leilao->propoe(new Lance($cunha,400));

            $leiloeiro = new Avaliador;
            $leiloeiro->avalia($leilao);

            $maiorEsperado = 400;
            $menorEsperado = 250;

            $this->assertEquals($maiorEsperado, $leiloeiro->getMaiorLance());
            $this->assertEquals($menorEsperado, $leiloeiro->getMenorLance());
        }

        public function testDeveAceitarLancesDeUmUnicoUsuario()
        {
            $leilao = new Leilao("Play 4");
            $cunha = new Usuario("Cunha");


            $leilao->propoe(new Lance($cunha,200));

            $leiloeiro = new Avaliador;
            $leiloeiro->avalia($leilao);

            $maiorEsperado = 200;
            $menorEsperado = 200;

            $this->assertEquals($maiorEsperado, $leiloeiro->getMaiorLance());
            $this->assertEquals($menorEsperado, $leiloeiro->getMenorLance());
        }

        public function testDeveAceitarLancesAleatorios()
        {
            $leilao = new Leilao("Play 4");
            $cunha = new Usuario("Cunha");
            $dilma = new Usuario("Dilma");
            $lula = new Usuario("Lula");

            $leilao->propoe(new Lance($lula,300));
            $leilao->propoe(new Lance($dilma,380));
            $leilao->propoe(new Lance($cunha,450));
            $leilao->propoe(new Lance($lula,250));
            $leilao->propoe(new Lance($dilma,200));
            $leilao->propoe(new Lance($cunha,500));
            $leilao->propoe(new Lance($lula,350));
            $leilao->propoe(new Lance($dilma,900));
            $leilao->propoe(new Lance($cunha,800));
            $leilao->propoe(new Lance($lula,290));
            $leilao->propoe(new Lance($dilma,750));
            $leilao->propoe(new Lance($cunha,600));

            $leiloeiro = new Avaliador;
            $leiloeiro->avalia($leilao);

            $maiorEsperado = 900;
            $menorEsperado = 200;

            $this->assertEquals($maiorEsperado, $leiloeiro->getMaiorLance());
            $this->assertEquals($menorEsperado, $leiloeiro->getMenorLance());
        }


        public function testMediaDeLances()
        {
            $leilao = new Leilao("Xbox 360");
            $cunha = new Usuario("Cunha");
            $dilma = new Usuario("Dilma");
            $lula = new Usuario("Lula");

            $leilao->propoe(new Lance($cunha,300));
            $leilao->propoe(new Lance($dilma,100));
            $leilao->propoe(new Lance($lula,200));

            $leiloeiro = new Avaliador;
            $mediaDosLances = $leiloeiro->mediaLances($leilao);

            $mediaEsperada = 200;

            $this->assertEquals($mediaEsperada, $mediaDosLances);
        }

        public function testMediaDeUmUnicoLance()
        {
            $leilao = new Leilao("Xbox 360");
            $cunha = new Usuario("Cunha");


            $leilao->propoe(new Lance($cunha,300));


            $leiloeiro = new Avaliador;
            $mediaDosLances = $leiloeiro->mediaLances($leilao);

            $mediaEsperada = 300;

            $this->assertEquals($mediaEsperada, $mediaDosLances);
        }

        public function testPegaOsTresMaioresOrdemCrescente()
        {

            $joao = new Usuario("Joao");
            $renan = new Usuario("Renan");
            $felipe = new Usuario("Felipe");

            $leilao = new Leilao("Playstation 3");

            $leilao->propoe(new Lance($joao,250));
            $leilao->propoe(new Lance($renan,300));
            $leilao->propoe(new Lance($felipe,400));
            $leilao->propoe(new Lance($joao,500));
            $leilao->propoe(new Lance($renan,600));
            $leilao->propoe(new Lance($felipe,700));

            $leiloeiro = new Avaliador();
            $leiloeiro->avalia($leilao);

            $maiores = $leiloeiro->getTresMaiores();

            $this->assertEquals(count($maiores),3);
            $this->assertEquals($maiores[0]->getValor(),700);
            $this->assertEquals($maiores[1]->getValor(),600);
            $this->assertEquals($maiores[2]->getValor(),500);
        }

        public function testPegaOsTresMaioresOrdemDecrescente()
        {

            $joao = new Usuario("Joao");
            $renan = new Usuario("Renan");
            $felipe = new Usuario("Felipe");

            $leilao = new Leilao("Playstation 3");

            $leilao->propoe(new Lance($joao,700));
            $leilao->propoe(new Lance($renan,600));
            $leilao->propoe(new Lance($felipe,500));
            $leilao->propoe(new Lance($joao,300));
            $leilao->propoe(new Lance($renan,150));
            $leilao->propoe(new Lance($felipe,100));

            $leiloeiro = new Avaliador();
            $leiloeiro->avalia($leilao);

            $maiores = $leiloeiro->getTresMaiores();

            $this->assertEquals(count($maiores),3);
            $this->assertEquals($maiores[0]->getValor(),700);
            $this->assertEquals($maiores[1]->getValor(),600);
            $this->assertEquals($maiores[2]->getValor(),500);
        }

        public function testPegaOsTresMaioresApenasDoisLances()
        {

            $joao = new Usuario("Joao");
            $renan = new Usuario("Renan");
            $felipe = new Usuario("Felipe");

            $leilao = new Leilao("Playstation 3");

            $leilao->propoe(new Lance($joao,700));
            $leilao->propoe(new Lance($renan,600));


            $leiloeiro = new Avaliador();
            $leiloeiro->avalia($leilao);

            $maiores = $leiloeiro->getTresMaiores();

            $this->assertEquals(count($maiores),2);
            $this->assertEquals($maiores[0]->getValor(),700);
            $this->assertEquals($maiores[1]->getValor(),600);

        }

        public function testPegaOsTresMaioresZeroLances()
        {

            $joao = new Usuario("Joao");
            $renan = new Usuario("Renan");
            $felipe = new Usuario("Felipe");

            $leilao = new Leilao("Playstation 3");


            $leiloeiro = new Avaliador();
            $leiloeiro->avalia($leilao);

            $maiores = $leiloeiro->getTresMaiores();

            $this->assertEquals(count($maiores),0);


        }


    }
?>