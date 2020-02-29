<?php

	require_once("../../../../model/classes/template.class.php");	
	require_once("../../../../model/sessions/session-global.php");
	require_once("../../../../model/sessions/nav-session.php");

	$profile  = new Template("../html/index.html");	

	if($user_loc_session=="SIM"){
            $menu_dashboard_visibility = "inline-block";
			$menu_repasses_visibility = "none";
			$menu_desocup_visibility = "inline-block";
			$menu_contratos_visibility = "inline-block";
			$menu_manutenc_solic_visibility = "inline-block";
			$menu_titulos_a_pagar_inquilino_visibility = "inline-block";
			$menu_historico_de_contatos_visibility = "inline-block";
			$menu_meus_arquivos_visibility = "inline-block";
			$menu_ressarcimento_visibility = "inline-block";
			$menu_vistoria_visibility = "inline-block";
			$menu_mensagem_visibility = "inline-block";
			$menu_demonstrativos_visibility = "none";
			$menu_rendimentos_visibility = "none";
			$menu_imoveis_visibility = "none";
            $menu_dimob_visibility = "none";
	}//end if user_loc_session
	
	if($user_prop_session=="SIM"){
            $menu_dashboard_visibility = "inline-block";
			$menu_repasses_visibility = "inline-block";
			$menu_desocup_visibility = "none";
			$menu_contratos_visibility = "none";
			$menu_manutenc_solic_visibility = "none";
			$menu_titulos_a_pagar_inquilino_visibility = "none";
			$menu_historico_de_contatos_visibility = "inline-block";
			$menu_meus_arquivos_visibility = "inline-block";
			$menu_ressarcimento_visibility = "none";
			$menu_vistoria_visibility = "none";
			$menu_mensagem_visibility = "inline-block";
			$menu_demonstrativos_visibility = "inline-block";
			$menu_rendimentos_visibility = "inline-block";
			$menu_imoveis_visibility = "inline-block";
            $menu_dimob_visibility = "none";
	}//end if $user_prop_session

    if($session_ARimobiliariaLoginDimob_key=="yes"){
        $menu_dimob_visibility = "inline-block";
        $menu_dashboard_visibility = "none";
        $menu_repasses_visibility = "none";
        $menu_desocup_visibility = "none";
        $menu_contratos_visibility = "none";
        $menu_manutenc_solic_visibility = "none";
        $menu_titulos_a_pagar_inquilino_visibility = "none";
        $menu_historico_de_contatos_visibility = "none";
        $menu_meus_arquivos_visibility = "none";
        $menu_ressarcimento_visibility = "none";
        $menu_vistoria_visibility = "none";
        $menu_mensagem_visibility = "none";
        $menu_demonstrativos_visibility = "none";
        $menu_rendimentos_visibility = "none";
        $menu_imoveis_visibility = "none";
    }//end if session_ARimobiliariaLoginDimob_key

	//$profile->set("menu_manager_list", $menu_manager_list);	
	$profile->set("screen_label_session", $screen_label_session);
	$profile->set("site_cliente", $site_cliente);
    $profile->set("tipo_de_usuario", $tipo_de_usuario);
    $profile->set("menu_dashboard_visibility", $menu_dashboard_visibility);
	$profile->set("menu_repasses_visibility", $menu_repasses_visibility);
	$profile->set("menu_desocup_visibility", $menu_desocup_visibility);
	$profile->set("menu_contratos_visibility", $menu_contratos_visibility);	
	$profile->set("menu_manutenc_solic_visibility", $menu_manutenc_solic_visibility);
	$profile->set("menu_titulos_a_pagar_inquilino_visibility", $menu_titulos_a_pagar_inquilino_visibility);
	$profile->set("menu_historico_de_contatos_visibility", $menu_historico_de_contatos_visibility);	
	$profile->set("menu_meus_arquivos_visibility", $menu_meus_arquivos_visibility);			
	$profile->set("menu_ressarcimento_visibility", $menu_ressarcimento_visibility);	
	$profile->set("menu_vistoria_visibility", $menu_vistoria_visibility);	
	$profile->set("menu_mensagem_visibility", $menu_mensagem_visibility);	
	$profile->set("menu_demonstrativos_visibility", $menu_demonstrativos_visibility);	
	$profile->set("menu_rendimentos_visibility", $menu_rendimentos_visibility);	
	$profile->set("menu_imoveis_visibility", $menu_imoveis_visibility);
    $profile->set("menu_dimob_visibility", $menu_dimob_visibility);

	echo $profile->output();

?>