<?php

namespace App;

/**
 * Class Megasena
 */
class Megasena
{
    /**
     * @var array
     */
    private $quantidadeDeDezenas;

    /**
     * @var
     */
    private $resultado;

    /**
     * @var int
     */
    private $totalDeJogos;

    /**
     * @var
     */
    private $jogos;

    /**
     * Megasena constructor.
     * @param array $quantidadeDeDezenas
     * @param int $totalDeJogos
     */
    public function __construct(int $quantidadeDeDezenas, int $totalDeJogos)
    {
        $this->quantidadeDeDezenas = $quantidadeDeDezenas;
        $this->totalDeJogos        = $totalDeJogos;
    }

    /**
     * @return mixed
     */
    public function getResultado()
    {
        return $this->resultado;
    }

    /**
     * @param $resultado
     */
    public function setResultado($resultado)
    {
        $this->resultado = $resultado;
    }

    /**
     * @return array
     */
    private function gerarJogo($start, $end, $sorteioDezenas=null)
    {
        $jogo  = [];
        $quantidadeDeDezenas = $sorteioDezenas ?? $this->quantidadeDeDezenas;
        for($i = count($jogo); count($jogo) <= $quantidadeDeDezenas; $i++)
        {
            $rand  = mt_rand($start, $end);
            if(array_search($rand, $jogo)===false)
            {
                $jogo[] = $rand;
            }
        }
        return $jogo;
    }

    /**
     * @param $start
     * @param $end
     * @return array
     */
    public function jogosFeitos($start, $end)
    {
        $jogos = [];
        for($i=1;$i<=$this->totalDeJogos;$i++)
        {
            $jogos[] = $this->gerarJogo($start, $end);
        }
        return $jogos;
    }

    /**
     * @return bool
     */
    public function sorteio()
    {
        $this->setResultado($this->gerarJogo(01, 60, 6));
        return true;
    }

    /**
     * @param $jogosFeitos
     * @return mixed
     */
    public function jogosFeitosComAcertos($jogosFeitos, $resultado)
    {
        $arrayJaComAcertos = [];
        foreach ($jogosFeitos as $jogo)
        {

            $arrayJaComAcertos[] = [
                "acertos"    => array_intersect($jogo, $resultado),
                "erros"      => array_diff($jogo, $resultado),
                "resultado"  => $resultado
            ];

        }
        return $arrayJaComAcertos;
    }

}