<?php

    $gre_contratos_loc_id = $_REQUEST['gre_contratos_loc_id'];
    $gre_pessoas_id = $_REQUEST['gre_pessoas_id'];
    $mes = $_REQUEST['mes'];
    $ano = $_REQUEST['ano'];

    $vlr_aluguel = str_replace(".", "", $_REQUEST['vlr_aluguel']);
    $vlr_aluguel = str_replace(",", ".", $vlr_aluguel);

    $vlr_administracao = str_replace(".", "", $_REQUEST['vlr_administracao']);
    $vlr_administracao = str_replace(",", ".", $vlr_administracao);

    $vlr_irrf = str_replace(".", "", $_REQUEST['vlr_irrf']);
    $vlr_irrf = str_replace(",", ".", $vlr_irrf);

    $gre_extratos_id = $_REQUEST['gre_extratos_id'];
    $data_hora = $_REQUEST['data_hora'];
    $divide_ir = $_REQUEST['divide_ir'];
    $renda_bruta = $_REQUEST['renda_bruta'];
    $adm_bruta = $_REQUEST['adm_bruta'];
    $valor_ir_total = $_REQUEST['valor_ir_total'];
    $desc_renda = $_REQUEST['desc_renda'];
    $desc_adm = $_REQUEST['desc_adm'];

    $data_repassado = $_REQUEST['data_repassado'];
    $data_repassado = implode("-",array_reverse(explode("/",$data_repassado)));

    $user_nome = $_REQUEST['user_nome'];

?>