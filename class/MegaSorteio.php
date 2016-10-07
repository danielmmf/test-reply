<?php
class MegaSorteio  {

	public function criar_aposta($limite = 6){
		//$numero = range(1, 60); //o for é mais rapido que o range pra gerar o numer :P
		$numero = array();
		for($i = 1; $i < 60; ++$i) {
			$numero[]=$i;
		}
		shuffle($numero);
		$rand_keys = array_slice($numero, 0, 6);
		
		rsort($rand_keys);//coloca os numeros em ordem decrescente
		$numeros_ordenados = array_reverse($rand_keys);//inverte para ficar em ordem crescente
		return array_unique($numeros_ordenados);//confirma se não tem repetido
	}

	public function valida_sorteio( $numero , $serie1 , $serie2){
		return ($numero <= count(array_diff($serie1, $serie2)));
	}

	public function printa_table($data,$limite = 6){
		$retorno = '<table  class="table table-bordered table-striped table-hover">';
		$retorno .= '<tr>';
		for($i=1;$i<=10;$i++) {
		  $retorno .= '<th>' . $i . '</th>';
		}
		$retorno .= '</tr>';
	    for($i=0;$i<$limite;$i++) {
		  $retorno .= '<tr>';
		  $retorno .= '<td>' . $data[0][$i] . '</td>';
		  $retorno .= '<td>' . $data[1][$i] . '</td>';
		  $retorno .= '<td>' . $data[2][$i] . '</td>';
		  $retorno .= '<td>' . $data[3][$i] . '</td>';
		  $retorno .= '<td>' . $data[4][$i] . '</td>';
		  $retorno .= '<td>' . $data[5][$i] . '</td>';
		  $retorno .= '<td>' . $data[6][$i] . '</td>';
		  $retorno .= '<td>' . $data[7][$i] . '</td>';
		  $retorno .= '<td>' . $data[8][$i] . '</td>';
		  $retorno .= '<td>' . $data[9][$i] . '</td>';
		  $retorno .= '</tr>';
		}
		$retorno .= '</table>';
		return $retorno;
	}


	public function montar_cartela(){
		$apostas = array();
		$primeira_aposta = $this->criar_aposta();
		$apostas[] = $primeira_aposta;
		$ultima = $primeira_aposta;

		$i=1;
		while ($i <= 9) {
			$nova_aposta = $this->criar_aposta();
			$indices = count(array_diff($nova_aposta , $ultima));
			
			if($indices >= 4){
				//$apostas[] =  $nova_aposta;
				array_push($apostas, $nova_aposta);
				$i++;
				$ultima = $nova_aposta;
			} 
		}
			
		return $apostas;
	}
	
}