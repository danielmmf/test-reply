<?php


class Reader{
	
	private $conteudo;

	public function ler_arquivo($arquivo){
		try {
			$this->conteudo = file_get_contents($arquivo);
			return true;
		} catch (Exception $e) {
			echo $e->getMessage();
			return false;
		}
	}

	public function conteudo(){
		return $this->conteudo;
	}

	public static function parser($arquivo){
		$conteudo = new Reader;
		$conteudo->ler_arquivo($arquivo);
		return $conteudo->conteudo();
	}
}