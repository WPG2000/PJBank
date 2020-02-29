<?php
$table_id_name = 'ID';

//$segundos_agora = date("s");

$id_escolhido = $_POST['id_escolhido'];

	if($clean_switch=="yes"){
		
		$agendamento_titulo = '';

		$agendamento_data_inicio = '';	

		$agendamento_hora_inicio = '';

		$agendamento_data_fim = '';	

		$agendamento_hora_fim = '';
		
	}//end if

	/* ... */

	if($clean_switch=="no"){
		
		$agendamento_titulo = $_POST['agendamento_titulo'];

		$agendamento_data_inicio = explode('/', $_POST['agendamento_data_inicio']);
		$agendamento_data_inicio = $agendamento_data_inicio[2].'-'.$agendamento_data_inicio[1].'-'.$agendamento_data_inicio[0];		

		$agendamento_hora_inicio = $_POST['agendamento_hora_inicio'];

		$agendamento_data_fim = explode('/', $_POST['agendamento_data_fim']);
		$agendamento_data_fim = $agendamento_data_fim[2].'-'.$agendamento_data_fim[1].'-'.$agendamento_data_fim[0];		

		$agendamento_hora_fim = $_POST['agendamento_hora_fim'];	
		
	}//end if

						
	
//echo "id_escolhido: ".$id_escolhido;die;	
//echo "agendamento_titulo: ".$agendamento_titulo;die;
//echo "agendamento_data_inicio: ".$agendamento_data_inicio;die;
//echo "agendamento_data_fim: ".$agendamento_data_fim;die;
//echo "agendamento_hora_inicio: ".$agendamento_hora_inicio;die;
//echo "agendamento_hora_fim: ".$agendamento_hora_fim;die;
?>