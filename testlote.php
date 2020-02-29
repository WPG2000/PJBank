<?php

$dados = array(    
		"cobrancas[0][vencimento]"=>"12/30/2019",
		"cobrancas[0][valor]"=>"50.75",
		"cobrancas[0][juros]"=>"0",
		"cobrancas[0][juros_fixo]"=>"0",
		"cobrancas[0][multa]"=>"0",
		"cobrancas[0][multa_fixo]"=>"0",
		"cobrancas[0][desconto]"=>"",
		"cobrancas[0][diasdesconto1]"=>"",
		"cobrancas[0][desconto2]"=>"",
		"cobrancas[0][diasdesconto2]"=>"",
		"cobrancas[0][desconto3]"=>"",
		"cobrancas[0][diasdesconto3]"=>"",
		"cobrancas[0][nunca_atualizar_boleto]"=>"0",
		"cobrancas[0][nome_cliente]"=>"Cliente de Exemplo",
		"cobrancas[0][email_cliente]"=>"cliente.exemplo@pjbank.com.br",
		"cobrancas[0][telefone_cliente]"=>"1940096830",
		"cobrancas[0][cpf_cliente]"=>"62936576000112",
		"cobrancas[0][endereco_cliente]"=>"Rua Joaquim Vilac",
		"cobrancas[0][numero_cliente]"=>"509",
		"cobrancas[0][complemento_cliente]"=>"",
		"cobrancas[0][bairro_cliente]"=>"Vila Teixeira",
		"cobrancas[0][cidade_cliente]"=>"Campinas",
		"cobrancas[0][estado_cliente]"=>"SP",
		"cobrancas[0][cep_cliente]"=>"13301510",
		"cobrancas[0][logo_url]"=>"https://pjbank.com.br/assets/images/logo-pjbank.png",
		"cobrancas[0][texto]"=>"Texto opcional",
		"cobrancas[0][instrucao_adicional]"=>"",
		"cobrancas[0][grupo]"=>"Boletos001",
		"cobrancas[0][pedido_numero]"=>"666676",
		"cobrancas[1][vencimento]"=>"12/30/2019",
		"cobrancas[1][valor]"=>"50.75",
		"cobrancas[1][juros]"=>"0",
		"cobrancas[1][juros_fixo]"=>"0",
		"cobrancas[1][multa]"=>"0",
		"cobrancas[1][multa_fixo]"=>"0",
		"cobrancas[1][desconto]"=>"",
		"cobrancas[1][diasdesconto1]"=>"",
		"cobrancas[1][desconto2]"=>"",
		"cobrancas[1][diasdesconto2]"=>"",
		"cobrancas[1][desconto3]"=>"",
		"cobrancas[1][diasdesconto3]"=>"",
		"cobrancas[1][nunca_atualizar_boleto]"=>"0",
		"cobrancas[1][nome_cliente]"=>"Cliente de Exemplo",
		"cobrancas[1][email_cliente]"=>"cliente.exemplo@pjbank.com.br",
		"cobrancas[1][telefone_cliente]"=>"1940096830",
		"cobrancas[1][cpf_cliente]"=>"62936576000112",
		"cobrancas[1][endereco_cliente]"=>"Rua Joaquim Vilac",
		"cobrancas[1][numero_cliente]"=>"509",
		"cobrancas[1][complemento_cliente]"=>"",
		"cobrancas[1][bairro_cliente]"=>"Vila Teixeira",
		"cobrancas[1][cidade_cliente]"=>"Campinas",
		"cobrancas[1][estado_cliente]"=>"SP",
		"cobrancas[1][cep_cliente]"=>"13301510",
		"cobrancas[1][logo_url]"=>"https://pjbank.com.br/assets/images/logo-pjbank.png",
		"cobrancas[1][texto]"=>"Texto opcional",
		"cobrancas[1][instrucao_adicional]"=>"",
		"cobrancas[1][grupo]"=>"Boletos002",
		"cobrancas[1][pedido_numero]"=>"666677"
	);
	
	//echo http_build_query($dados);
	echo "<br>";

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
		//var_dump($retorno);
		/*
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
		*/
		
		$msgBoleto1 = $retorno[0]->msg;
		$linkBoleto1 = $retorno[0]->linkBoleto;
		
		$msgBoleto2 = $retorno[1]->msg;
		$linkBoleto2 = $retorno[1]->linkBoleto;
		
		echo "<br>";
		echo $msgBoleto1." "."<a href='$linkBoleto1' target='_blank'>".$linkBoleto1."</a>";
		echo "<br>";
		echo $msgBoleto2." "."<a href='$linkBoleto2' target='_blank'>".$linkBoleto2."</a>";;
	}	

?>