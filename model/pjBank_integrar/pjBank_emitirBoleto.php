<?php
	
	$dados = array(    
		"vencimento"=>"12/30/2019",
		"valor"=>"50.75",
		"juros"=>"0",
		"juros_fixo"=>"0",
		"multa"=>"0",
		"multa_fixo"=>"0",
		"nome_cliente"=>"Cliente de Exemplo",
		"email_cliente"=>"cliente.exemplo@pjbank.com.br",
		"telefone_cliente"=>"1940096830",
		"cpf_cliente"=>"62936576000112",
		"endereco_cliente"=>"Rua Joaquim Vilac",
		"numero_cliente"=>"509",
		"bairro_cliente"=>"Vila Teixeira",
		"cidade_cliente"=>"Campinas",
		"estado_cliente"=>"SP",
		"cep_cliente"=>"13301510",
		"logo_url"=>"https://pjbank.com.br/assets/images/logo-pjbank.png",
		"texto"=>"Texto opcional",
		"grupo"=>"Boletos001",
		"webhook"=>"http://example.com.br",
		"pedido_numero"=>"89724"
	);

	$curl = curl_init();

	curl_setopt_array($curl, array(
	  CURLOPT_URL => "https://sandbox.pjbank.com.br/recebimentos/d3418668b85cea70aa28965eafaf927cd34d004c/transacoes",
	  CURLOPT_RETURNTRANSFER => true,
	  CURLOPT_SSL_VERIFYPEER => false,
	  CURLOPT_ENCODING => "",
	  CURLOPT_MAXREDIRS => 10,
	  CURLOPT_TIMEOUT => 0,
	  CURLOPT_FOLLOWLOCATION => true,
	  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	  CURLOPT_CUSTOMREQUEST => "POST",
	  CURLOPT_POSTFIELDS => http_build_query($dados),
	  CURLOPT_HTTPHEADER => array(
		"Content-Type: application/x-www-form-urlencoded"
	  ),
	));

	$response = curl_exec($curl);

	curl_close($curl);
	
	if ($response === FALSE) {
			
		echo 'An error has occurred: ' . curl_error($curl) . PHP_EOL;
		echo "\n";
		
	}else{
		
		$retorno = json_decode($response);
		
		$id_unico = $retorno->id_unico;
		$id_unico_original = $retorno->id_unico_original;
		$status = $retorno->status;
		$msg = $retorno->msg;
		$nossonumero = $retorno->nossonumero;
		$linkBoleto = $retorno->linkBoleto;
		$linkGrupo = $retorno->linkGrupo;		
		$linhaDigitavel = $retorno->linhaDigitavel;
		$pedido_numero = $retorno->pedido_numero;
		$banco_numero = $retorno->banco_numero;
		$token_facilitador = $retorno->token_facilitador;
		$credencial = $retorno->credencial;	
	}	

	include($grid_dynamic_body);				
	include($dynamic_grid_config);

?>