<?php
	
	header('Access-Control-Allow-Origin: *');
	
	$credencial = "6ef5e5c493f22ef42d1c052e069af5df3060c090";
	$chave = "cfeb3e01f0d7d2217fc5f522f73c67ea56e5a669";
	
	$url = "https://sandbox.pjbank.com.br/recebimentos'";
	
	$dados = array(    
		"nome_empresa"=> "Empresa de Exemplo",
		"conta_repasse"=> "99999-9",
		"agencia_repasse"=> "0001",
		"banco_repasse"=> "001",
		"cnpj"=> "50282264000153",
		"ddd"=> "19",
		"telefone"=> "40096830",
		"email"=> "atendimento@pjbank.com.br",
		"X-CHAVE" => "cfeb3e01f0d7d2217fc5f522f73c67ea56e5a669"
	);
	
	$curl = curl_init();
	curl_setopt($curl, CURLOPT_URL, $url);
	curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($curl, CURLOPT_FAILONERROR, false);
	curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
	curl_setopt($curl, CURLOPT_POST, true);	
	curl_setopt($curl, CURLOPT_POSTFIELDS, $dados);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	
	curl_setopt($curl, CURLOPT_HTTPHEADER, array(																																									
		'Accept: application/json',										
		'Content-Type: application/json',	
		//'X-CHAVE: cfeb3e01f0d7d2217fc5f522f73c67ea56e5a669',
		//'Content-Type: application/x-www-form-urlencoded'		
	));	
	
	$output = utf8_decode(curl_exec($curl));
	
		if ($output === FALSE) {
			
			echo 'An error has occurred: ' . curl_error($curl) . PHP_EOL;
			echo "\n";
			
		}else{
			
			//echo $output;						
			
			$retorno = json_decode($output);									
			
			var_dump($retorno);	
			
			//$msg = $retorno->msg;						
							
			//$msgRetorno = $msg;
			
		}//end else output

	//include($grid_dynamic_body);				
	//include($dynamic_grid_config);

?>