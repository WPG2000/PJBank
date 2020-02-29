<?php
	function mask($val, $mask){
		 
		 $maskared = '';
		 $k = 0;
		 
			for($i = 0; $i<=strlen($mask)-1; $i++){
		 
				 if($mask[$i] == '#'){
				
					if(isset($val[$k]))
						$maskared .= $val[$k++];
					 
					 }else{
						
						if(isset($mask[$i])){
							$maskared .= $mask[$i];
						}//end if	
						
					}//end if/else
						 
				}//end for
				 
				 return $maskared;
		 
	}//end func
	
	/*
	$cnpj = "11222333000199";
	$cpf = "00100200300";
	$cep = "08665110";
	$data = "10102010";

	echo mask($cnpj,'##.###.###/####-##');
	echo mask($cpf,'###.###.###-##');
	echo mask($cep,'#####-###');
	echo mask($data,'##/##/####');
	*/
?>