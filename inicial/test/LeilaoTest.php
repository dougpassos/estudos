<?php
require "class/Usuario.php";
require "class/Lance.php";
require "class/Leilao.php";
//require "Avaliador.php";

class LeilaoTest extends PHPUnit_Framework_TestCase
{
    public function testDeveProporUmLance()
    {
        $leilao = new Leilao("MacBook");
        $this->assertEquals(0, count($leilao->getLances()));
    }

}