<?php

use App\Megasena;
use \PHPUnit\Framework\TestCase;

class AcertosContidosTest extends TestCase
{
    public function executar()
    {
        $megasena         = new Megasena(QUANTIDADE_DE_DEZENAS, TOTAL_DE_JOGOS);
        $megasena->sorteio();
        $result = !! $megasena->sorteio();
        $this->assertEquals($result, true);
    }
}