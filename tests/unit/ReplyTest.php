<?php


class ReplyTest extends \Codeception\Test\Unit
{
    /**
     * @var \UnitTester
     */
    protected $tester;

    protected function _before()
    {
    }

    protected function _after()
    {
    }

    // tests
    public function atestDeveTrazerSeisNumerosDiferentes10Vezes()
    {
        $megasena = new \MegaSorteio();
        for ($i=0; $i < 10; $i++) { 
            $this->assertEquals(6, count($megasena->criar_aposta(6)));
        }

    }


    public function testDeveMontarUmaCartela(){
        //uma cartela deve ter 6 jogos não repetidos
        $megasena = new \MegaSorteio();
        $megasena->montar_cartela();
        //die();
        
        $this->assertEquals(10, count($megasena->montar_cartela()));

    }


    public function testDevoRetornarSimOuNaoNaValidacao(){
        $megasena = new \MegaSorteio();
        $serie1 = array(1,2,3,4,5,6);
        $serie2 = array(1,2,3,4,5,6);
        $serie3 = array(3,4,5,6,7,8);
        $serie4 = array(5,6,7,8,9,10);
        $this->assertFalse($megasena->valida_sorteio(10, $serie1, $serie2));
        $this->assertFalse($megasena->valida_sorteio(10, $serie1, $serie3));
        $this->assertTrue($megasena->valida_sorteio(4, $serie1, $serie4));
        $this->assertTrue($megasena->valida_sorteio(4, $serie1, $serie4));
    }
}