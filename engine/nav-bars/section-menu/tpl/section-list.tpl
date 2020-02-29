<meta charset="utf-8">

<div class="section_menu" id="sm_[@id_status]">
	<li class="[@class]" href="[@screen_label]">
		<span class="icon icon-[@icone]"></span>
		<span class="text">[@nome]</span>		
		<span class="score" style="[@custom_style_score]">[@score]</span>		
		<span class="arrow icon-play_arrow" style="display:[@display];"></span>
		<!--<input type="hidden" value="[@nome]" />-->
		<input type="hidden" value="[@nome_tela]" class="hidden_nome_tela" />
		<input type="hidden" value="[@id_status]" class="hidden_id_status" />
		<input type="hidden" value="[@screen_table]" class="hidden_screen_table" />
		<input type="hidden" value="[@engine]" class="hidden_engine" />
	</li>
</div><!-- /section_menu-->

<script>
$(document).ready(function(){	
		
		/* -- */
		
		/* ......................... Score .......................... */	
		//var score = '[@score]';
		//var custom_style_score = '[@custom_style_score]';
		
		//$("#sm_[@id_status]").find(".score").html(score).attr('style',  '[@custom_style_score]');					
		//$(".recept_score").load("engine/nav-bars/section-menu/php/score_box.php?score="+score+"&&custom_style_score="+custom_style_score);					
		/* ........................ /Score .......................... */			
		
		/* -- */
		
		/* ................................................................................. */
		var tipo_user_logado = '[@tipo_user_logado]';
		/* ................................................................................. */
		
		/* -- */
		
		/* ......................... ManterUltimoSectionEscolhido .......................... */	
		var id_status_escolhido = '[@id_status_escolhido]'; 
			
			if(id_status_escolhido!=''){
				$(".section_menu li").removeClass("section_menu_active");			
				$("#sm_[@id_status_escolhido] li").addClass("section_menu_active");			
				
				$(".section_menu li .arrow").css({
					display:'none'
				});//end css
				$("#sm_[@id_status_escolhido] li .arrow").css({
					display:'inline-block'
				});//end css
			}else{
				$(".section_menu li").removeClass("section_menu_active");			
				$("#sm_1 li").addClass("section_menu_active");			
				
				$(".section_menu li .arrow").css({
					display:'none'
				});//end css
				$("#sm_1 li .arrow").css({
					display:'inline-block'
				});//end css
			}//end if/else
		/* ........................ /ManterUltimoSectionEscolhido .......................... */	
		
		/* -- */
		
		/* ......................... EscolherSection .................................. */	
		$("#sm_[@id_status] li").click(function(){
		
		/* -- */
		
		/* ............... */		
		var screen_label = $(this).attr('href');
		var screen_table = $(this).find('.hidden_screen_table').val();
		var nome_tela = $(this).find('.hidden_nome_tela').val();		
		var engine = $(this).find('.hidden_engine').val()
		var id_status = $(this).find('.hidden_id_status').val();

		//alert(screen_table);	
		/* ............... */					
		
		/* -- */
		
		/* ............... */
		$(".section_menu li .arrow").hide();
		$(".section_menu li").removeClass("section_menu_active");
		$(this).addClass("section_menu_active");
		$(this).find(".arrow").show();
		/* ............... */
		
		/* -- */
		
		/* ............... */
		$.ajax({
		   beforeSend: function(){							
				$("#rb_"+screen_label).load("engine/pre-load/php/index.php");								
		   },
		   success: function(){
		    setTimeout(function(){
				
				if(tipo_user_logado=='MIGRA'){
					$("#rb_"+screen_label).load("engine/"+engine+"/php/index.php?screen_label="+screen_label+"&&screen_table="+screen_table+"&&id_status_escolhido="+id_status).fadeIn(600);			 				
				}//end if
				if(tipo_user_logado=='CLIENTE'){
					$("#rb_"+screen_label).load("engine/"+engine+"/php/client_grid.php?screen_label="+screen_label+"&&screen_table="+screen_table+"&&id_status_escolhido="+id_status).fadeIn(600);			 				
				}//end if
				
				if(screen_label=="seguro_incendio"){				
					if((id_status=="1")||(id_status=="")){
						$(".title_box_left_side .section_name").html("Novos");
					}
					if(id_status=="2"){
						$(".title_box_left_side .section_name").html("Aceitos");
					}
					if(id_status=="3"){
						$(".title_box_left_side .section_name").html("Aprovados");
					}
					if(id_status=="4"){
						$(".title_box_left_side .section_name").html("Ativos");
					}									
					if(id_status=="5"){
						$(".title_box_left_side .section_name").html("Inativos");
					}			
				}
								
				if(screen_label=="seguro_fianc"){					
					if((id_status=="0")||(id_status=="")){
						$(".title_box_left_side .section_name").html("Todos");
					}
					if(id_status=="1"){
						$(".title_box_left_side .section_name").html("Novos");
					}
					if(id_status=="2"){
						$(".title_box_left_side .section_name").html("Em Análise");
					}
					if(id_status=="3"){
						$(".title_box_left_side .section_name").html("Aprovados");
					}
					if(id_status=="4"){
						$(".title_box_left_side .section_name").html("Reprovados");
					}														
				}
				
				if(screen_label=="financeiro_migra"){				
					if((id_status=="1")||(id_status=="")){
						$(".title_box_left_side .section_name").html("Contas do dia");
					}
					if(id_status=="2"){
						$(".title_box_left_side .section_name").html("Quitar");
					}
					if(id_status=="3"){
						$(".title_box_left_side .section_name").html("Fluxo de caixa");
					}								
				}
				
				
			 },500);
		   },
		   error: function(){
			alert("...");
		  }
		 });//end ajax method				
		/* ............... */
				
		/* -- */
		
		/* ............... */		
		/* ............... */
		
		/* -- */
		
		});//end click
		/* ........................ /EscolherSection .................................. */	
		
		/* -- */
		
});//end doc
</script>