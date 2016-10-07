<?php


class ReaderTest extends \Codeception\Test\Unit
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
    public function testDeveLerOConteudoDeUmArquivo()
    {
        $expected = 'arquivo de teste';
        $reader = new Reader();
        $this->assertEquals(true, $reader->ler_arquivo('tests/out.txt'));
        $this->assertEquals($expected, $reader->conteudo());
        $this->assertEquals($expected, Reader::parser('tests/out.txt'));
    }
}