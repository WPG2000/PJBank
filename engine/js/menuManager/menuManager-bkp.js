/*

 * William P.G - menuManager
 
 * Recurso para estruturar links atraves do menu lateral esquerdo. 
 
*/

(function($) {

	$.fn.menuManager = function( options ) {
		
		//default settings
		var settings = $.extend({
			
			start    : true,
			theme    : null,			
			
		}, options);

		//return settings	
		return this.each( function() {			
			
			/* -- */	
			
			/*.......... start ........... */
			if (settings.start) {																													
				
					/* -- */
	
						/* ........................................................................... */
						var screen_label_session = '[@screen_label_session]';	
						/* ........................................................................... */
						
						/* -- */
						
						/* ............................ MenuManActive_OnLoad ............................................... */	
						var menu_man_a_id = $(".menu_man_section a").attr("id");	
						var compare_to_add = "menu_man_tokio_"+screen_label_session;	
						
							if(compare_to_add==menu_man_a_id){
							
								$("#"+menu_man_a_id).addClass("menu_manager_list_active");
								
							}else if(compare_to_add=='menu_man_tokio_'){
							
								$("#menu_man_vis_geral").addClass("menu_manager_list_active");
								
							}
						/* ........................... /MenuManActive_OnLoad ............................................... */	

						/* -- */
						
						/* ........................................................................... */
						$(".btn_open_menu_manager").click(function(){				
											
											
							var menu_man_state = $(".menu_manager").is(":visible"); 		
							
							var section_menu_wrapp = $(".section_menu_wrapp").css("margin-right");				
							
							if(menu_man_state==true){
								//alert("open");				
											
								$(".btn_open_menu_manager").prop("disabled",true);
								
								setTimeout(function(){ 
									$(".menu_manager").hide();	
									$(".btn_open_menu_manager").prop("disabled",false);				
								}, 1000);
								
								$(".menu_manager").css({
									margin:'0 0 0 -100%'				
								});
								
								$(".er_group").css({
									width:'0'				
								});
								
								/*
								$(".section_menu_wrapp").css({
										width:'80px'				
								});			
								*/
								
								$(".action_nav_wrapp").css({
									left:'0'
								});
								
								$(".an_right_side").css({
									marginRight:'5%'
								});	
									
								$(".form_footer").css({
									left:'30px'
								});	
								
								if(section_menu_wrapp=='-96px') {
									$(".recept_box_wrapp").css({
										//width:'98.5%'
										maxWidth:'99.5%',
										marginLeft:'30px'
									});
								}else{
									$(".recept_box_wrapp").css({
										//width:'93.7%'
										maxWidth:'99.5%',
										marginLeft:'30px'
									});
								}
											
									
							}else{
								//alert("close");						
													
								$(".menu_manager").show();					
								
								setTimeout(function(){ 			
									$(".menu_manager").css({					
										margin:'0 0 0 0'
									});
									
									$(".er_group").css({
										width:''				
									});
								
									$(".section_menu_wrapp").css({
										width:''				
									});
									
									$(".action_nav_wrapp").css({
										left:''
									});
									
									$(".an_right_side").css({
										marginRight:''
									});							
									
									$(".form_footer").css({
										left:''
									});	
									
									if(section_menu_wrapp=='-96px') {
										$(".recept_box_wrapp").css({
											//width:''
											maxWidth:'',
											marginLeft:''
										});
									}else{
										$(".recept_box_wrapp").css({
											//width:'78.5%'
											maxWidth:'99.5%',
											marginLeft:''
										});
									}
									
								}, 10);			
											
							}//end if/else		
									
						});//end click	
						/* ........................................................................... */
						
						/* -- */
						
						/* ........................................................................... */
						$(".menu_man_section a").click(function(){						 		
							$(this).find(".icon_arrow").toggleClass("icon-more_vert icon-more_horiz");	
							$(".menu_man_section a").removeClass("menu_manager_list_active");	
							$(this).addClass("menu_manager_list_active");	
							
							$(".menu_man_section a .icon").css({
								color:'#8B8386'
							});
							$(this).find(".icon").css({
								color:'#CDC1C5'
							});
						});//end click	
						/* ........................................................................... */
						
						/* -- */
						
						/* ........................................................................... */
						$(".btn_level1").click(function(e){				
						
							var drop_body = $(this).parent().find(".level_content").is(":visible"); 
							if(drop_body==true){
								//alert("open");			
								$(this).parent().find(".level_content").hide();
							}else{
								//alert("close");		
								$(this).parent().find(".level_content").show();
							}
										
							e.stopPropagation();
						});//end click
						/* ........................................................................... */
						
						/* -- */
						
						/* ........................................................................... */
						$(".btn_level2").click(function(e){			
							
							var drop_body = $(this).parent().find(".inner_btn").is(":visible"); 
							if(drop_body==true){
								//alert("open");			
								$(this).parent().find(".level_content_btn_level2").hide();			
							}else{
								//alert("close");			
								$(this).parent().find(".inner_btn,.level_content_btn_level2").css({display:'inline-block'});						
							}			
											
							e.stopPropagation();
						});//end click	
						/* ........................................................................... */
						
						/* -- */	
						
						/* ........................................................................... */
						$(".inner_btn").click(function(e){								
							
							var drop_body = $(this).parent().find(".level_content").is(":visible"); 
							if(drop_body==true){
								//alert("open");									
								$(this).parent().find(".level_content").hide();			
							}else{
								//alert("close");				
								$(this).parent().find(".level_content").show();			
							}								
							e.stopPropagation();
											
						});//end click	
						/* ........................................................................... */

						/* -- */
						
						/* .......................... MobileRules .................................... */
						$(".level_content").click(function(e){
									
								if( $(window).width() < 1024){
									
									$(".menu_manager").css({
										margin:'0 0 0 -100%'				
									});
									
									setTimeout(function(){ 
										$(".menu_manager").hide();
									}, 1000);
								}//end if < 1024
								
								//e.stopPropagation();
						});//end click	
						
						/*
						$(document).on('click', function () {  		
								if( $(window).width() < 1024){
								
									$(".menu_manager").css({
										margin:'0 0 0 -100%'				
									});																		
																		
								}//end if < 1024	
											
						});//end click  	
						*/
						/* ......................... /MobileRules .................................... */
						
						/* -- */
						
						/*	
						$(document).on('click', function (e) {  		
							//$(".btn_level1").parent().find(".level_content").hide();
						});//end click  	
						*/
						
						/* -- */
							
						/* .............................................................. OpenLinks .............................................................................. */				
						
						/* -- */
						
						/* .......................................................................................... */	
							
						$("#menu_man_dashboard").click(function(){							
						
							var screen_label = $(this).find(".hidden_screen_label").val();
							var nome_tela = $(this).find(".hidden_nome_tela").val();
							var nome_empresa = $(this).find(".hidden_nome_empresa").val();	
							var screen_table = $(this).find(".hidden_screen_table").val();
							var engine = $(this).find(".hidden_engine").val();	
							var box_mode = $(this).find('.hidden_box_mode').val();
							var form_mode = $(this).find('.hidden_form_mode').val();						
							
							var dados = $(this).serialize();
							
							//alert("Contratar Seguro. Em breve.");		
							//alert(engine);	
							
							$.ajax({
							type: "GET",				
							url: "model/form-operation/update/up-nav-session.php?screen_label="+screen_label+"&&nome_tela="+nome_tela+"&&nome_empresa="+nome_empresa+"&&screen_table="+screen_table+"&&engine="+engine+"&&box_mode="+box_mode+"&&form_mode="+form_mode,
							data: dados,	
							   beforeSend: function(){											
									$(".btn_open_menu_manager").attr("disabled", "disabled");
									$(".recept_box").html('<img src="engine/imgs/preloaders-gif/preloader-gif3.gif" class="preloader" />');	
									$("#er_title_box").hide();
							   },
							success: function( data ){
										
										setTimeout(function(){ 
											$('.btn_open_menu_manager').prop("disabled", false);
										}, 4000);					
										
										setTimeout(function(){
										
											$("#er_title_box").load("engine/nav-bars/title-box/php/index.php").fadeIn(1000);					
											$(".recept_box").hide();			
											$(".recept_box").html('...');
											$("#rb_welcome").load("igniter/welcome/php/client-view.php").hide().fadeIn(1000);
											$('.nome_tela span').html(nome_tela+" "+nome_empresa).hide().fadeIn(1000);	  					
										
										}, 600);
										
										//$("#er_breadcrumb").load("engine/nav-bars/breadcrumb/php/index.php");					
										//$("#er_section_menu").load("engine/nav-bars/section-menu/php/index.php");														
										//$("#er_action_nav").load("engine/nav-bars/action-nav/php/action-nav.php?screen_label="+screen_label);					
											
									if( $(window).width() < 1024){				
										$(".menu_manager").css({
											margin:'0 0 0 -100%'				
										});
										
										setTimeout(function(){ 
											$(".menu_manager").hide();
										}, 1000);
									}//end if < 1024
								
								}//end success
							});//end method
							
							return false;		
							
						});//end click	
						
						/* .......................................................................................... */	
						
						/* -- */
						
						/* .......................................................................................... */	
							
						$("#menu_man_customize_theme").click(function(){							
						
							var screen_label = $(this).find(".hidden_screen_label").val();
							var nome_tela = $(this).find(".hidden_nome_tela").val();
							var nome_empresa = $(this).find(".hidden_nome_empresa").val();	
							var screen_table = $(this).find(".hidden_screen_table").val();
							var engine = $(this).find(".hidden_engine").val();	
							var box_mode = $(this).find('.hidden_box_mode').val();
							var form_mode = $(this).find('.hidden_form_mode').val();						
							
							var dados = $(this).serialize();
							
							//alert("Contratar Seguro. Em breve.");		
							//alert(engine);	
							
							$.ajax({
							type: "GET",				
							url: "model/form-operation/update/up-nav-session.php?screen_label="+screen_label+"&&nome_tela="+nome_tela+"&&nome_empresa="+nome_empresa+"&&screen_table="+screen_table+"&&engine="+engine+"&&box_mode="+box_mode+"&&form_mode="+form_mode,
							data: dados,	
							   beforeSend: function(){											
									$(".btn_open_menu_manager").attr("disabled", "disabled");
									$(".recept_box").html('<img src="engine/imgs/preloaders-gif/preloader-gif3.gif" class="preloader" />');	
									$("#er_title_box").hide();
							   },
							success: function( data ){
										
										setTimeout(function(){ 
											$('.btn_open_menu_manager').prop("disabled", false);
										}, 4000);					
										
										setTimeout(function(){
										
											$("#er_title_box").load("engine/nav-bars/title-box/php/index.php").fadeIn(1000);					
											$(".recept_box").hide();			
											$(".recept_box").html('...');
											$("#rb_"+screen_label).load("engine/"+engine+"/php/form_master.php?screen_label="+screen_label+"&&action_nav_btn=action_nav_btn_novo").fadeIn(200);												
											$('.nome_tela span').html(nome_tela+" "+nome_empresa).hide().fadeIn(1000);	  					
										
										}, 600);
										
										//$("#er_breadcrumb").load("engine/nav-bars/breadcrumb/php/index.php");					
										//$("#er_section_menu").load("engine/nav-bars/section-menu/php/index.php");														
										//$("#er_action_nav").load("engine/nav-bars/action-nav/php/action-nav.php?screen_label="+screen_label);					
											
									if( $(window).width() < 1024){				
										$(".menu_manager").css({
											margin:'0 0 0 -100%'				
										});
										
										setTimeout(function(){ 
											$(".menu_manager").hide();
										}, 1000);
									}//end if < 1024
								
								}//end success
							});//end method
							
							return false;		
							
						});//end click	
						
						/* .......................................................................................... */	
						
						/* -- */
						
						/* .......................................................................................... */	
							
						$("#menu_man_customize_features").click(function(){							
						
							var screen_label = $(this).find(".hidden_screen_label").val();
							var nome_tela = $(this).find(".hidden_nome_tela").val();
							var nome_empresa = $(this).find(".hidden_nome_empresa").val();	
							var screen_table = $(this).find(".hidden_screen_table").val();
							var engine = $(this).find(".hidden_engine").val();	
							var box_mode = $(this).find('.hidden_box_mode').val();
							var form_mode = $(this).find('.hidden_form_mode').val();						
							
							var dados = $(this).serialize();
							
							//alert("Contratar Seguro. Em breve.");		
							//alert(engine);								
							
							$.ajax({
							type: "GET",				
							url: "model/form-operation/update/up-nav-session.php?screen_label="+screen_label+"&&nome_tela="+nome_tela+"&&nome_empresa="+nome_empresa+"&&screen_table="+screen_table+"&&engine="+engine+"&&box_mode="+box_mode+"&&form_mode="+form_mode,
							data: dados,	
							   beforeSend: function(){											
									$(".btn_open_menu_manager").attr("disabled", "disabled");
									$(".recept_box").html('<img src="engine/imgs/preloaders-gif/preloader-gif3.gif" class="preloader" />');	
									$("#er_title_box").hide();
							   },
							success: function( data ){
										
										setTimeout(function(){ 
											$('.btn_open_menu_manager').prop("disabled", false);
										}, 4000);					
										
										setTimeout(function(){
										
											$("#er_title_box").load("engine/nav-bars/title-box/php/index.php").fadeIn(1000);					
											$(".recept_box").hide();			
											$(".recept_box").html('...');
											$("#rb_"+screen_label).load("engine/"+engine+"/php/dynamic-grid-features.php?screen_label="+screen_label+"&&action_nav_btn=action_nav_btn_novo").fadeIn(200);												
											$('.nome_tela span').html(nome_tela+" "+nome_empresa).hide().fadeIn(1000);	  					
										
										}, 600);
										
										//$("#er_breadcrumb").load("engine/nav-bars/breadcrumb/php/index.php");					
										//$("#er_section_menu").load("engine/nav-bars/section-menu/php/index.php");														
										//$("#er_action_nav").load("engine/nav-bars/action-nav/php/action-nav.php?screen_label="+screen_label);					
											
									if( $(window).width() < 1024){				
										$(".menu_manager").css({
											margin:'0 0 0 -100%'				
										});
										
										setTimeout(function(){ 
											$(".menu_manager").hide();
										}, 1000);
									}//end if < 1024
								
								}//end success
							});//end method
							
							return false;		
							
						});//end click	
						
						/* .......................................................................................... */	
						
						/* -- */
						
						/* .......................................................................................... */	
							
						$("#menu_man_blog_about_sctructure").click(function(){							
						
							var screen_label = $(this).find(".hidden_screen_label").val();
							var nome_tela = $(this).find(".hidden_nome_tela").val();
							var nome_empresa = $(this).find(".hidden_nome_empresa").val();	
							var screen_table = $(this).find(".hidden_screen_table").val();
							var engine = $(this).find(".hidden_engine").val();	
							var box_mode = $(this).find('.hidden_box_mode').val();
							var form_mode = $(this).find('.hidden_form_mode').val();						
							
							var dados = $(this).serialize();
							
							//alert("Contratar Seguro. Em breve.");		
							//alert(engine);	
							
							$.ajax({
							type: "GET",				
							url: "model/form-operation/update/up-nav-session.php?screen_label="+screen_label+"&&nome_tela="+nome_tela+"&&nome_empresa="+nome_empresa+"&&screen_table="+screen_table+"&&engine="+engine+"&&box_mode="+box_mode+"&&form_mode="+form_mode,
							data: dados,	
							   beforeSend: function(){											
									$(".btn_open_menu_manager").attr("disabled", "disabled");
									$(".recept_box").html('<img src="engine/imgs/preloaders-gif/preloader-gif3.gif" class="preloader" />');	
									$("#er_title_box").hide();
							   },
							success: function( data ){
										
										setTimeout(function(){ 
											$('.btn_open_menu_manager').prop("disabled", false);
										}, 4000);					
										
										setTimeout(function(){
										
											$("#er_title_box").load("engine/nav-bars/title-box/php/index.php").fadeIn(1000);					
											$(".recept_box").hide();			
											$(".recept_box").html('...');					
											$("#rb_welcome").load("igniter/welcome/php/client-view.php").hide().fadeIn(1000);
											$('.nome_tela span').html(nome_tela+" "+nome_empresa).hide().fadeIn(1000);	  					
										
										}, 600);
										
										//$("#er_breadcrumb").load("engine/nav-bars/breadcrumb/php/index.php");					
										//$("#er_section_menu").load("engine/nav-bars/section-menu/php/index.php");														
										//$("#er_action_nav").load("engine/nav-bars/action-nav/php/action-nav.php?screen_label="+screen_label);					
											
									if( $(window).width() < 1024){				
										$(".menu_manager").css({
											margin:'0 0 0 -100%'				
										});
										
										setTimeout(function(){ 
											$(".menu_manager").hide();
										}, 1000);
									}//end if < 1024
								
								}//end success
							});//end method
							
							return false;		
							
						});//end click	
						/* .......................................................................................... */	
						
						/* -- */
						
						/* .......................................................................................... */	
							
						$("#menu_man_blog_about_use").click(function(){							
						
							var screen_label = $(this).find(".hidden_screen_label").val();
							var nome_tela = $(this).find(".hidden_nome_tela").val();
							var nome_empresa = $(this).find(".hidden_nome_empresa").val();	
							var screen_table = $(this).find(".hidden_screen_table").val();
							var engine = $(this).find(".hidden_engine").val();	
							var box_mode = $(this).find('.hidden_box_mode').val();
							var form_mode = $(this).find('.hidden_form_mode').val();						
							
							var dados = $(this).serialize();
							
							//alert("Contratar Seguro. Em breve.");		
							//alert(engine);	
							
							$.ajax({
							type: "GET",				
							url: "model/form-operation/update/up-nav-session.php?screen_label="+screen_label+"&&nome_tela="+nome_tela+"&&nome_empresa="+nome_empresa+"&&screen_table="+screen_table+"&&engine="+engine+"&&box_mode="+box_mode+"&&form_mode="+form_mode,
							data: dados,	
							   beforeSend: function(){											
									$(".btn_open_menu_manager").attr("disabled", "disabled");
									$(".recept_box").html('<img src="engine/imgs/preloaders-gif/preloader-gif3.gif" class="preloader" />');	
									$("#er_title_box").hide();
							   },
							success: function( data ){
										
										setTimeout(function(){ 
											$('.btn_open_menu_manager').prop("disabled", false);
										}, 4000);					
										
										setTimeout(function(){
										
											$("#er_title_box").load("engine/nav-bars/title-box/php/index.php").fadeIn(1000);					
											$(".recept_box").hide();			
											$(".recept_box").html('...');					
											$("#rb_welcome").load("igniter/welcome/php/about-use-view.php").hide().fadeIn(1000);
											$('.nome_tela span').html(nome_tela+" "+nome_empresa).hide().fadeIn(1000);	  					
										
										}, 600);
										
										//$("#er_breadcrumb").load("engine/nav-bars/breadcrumb/php/index.php");					
										//$("#er_section_menu").load("engine/nav-bars/section-menu/php/index.php");														
										//$("#er_action_nav").load("engine/nav-bars/action-nav/php/action-nav.php?screen_label="+screen_label);					
											
									if( $(window).width() < 1024){				
										$(".menu_manager").css({
											margin:'0 0 0 -100%'				
										});
										
										setTimeout(function(){ 
											$(".menu_manager").hide();
										}, 1000);
									}//end if < 1024
								
								}//end success
							});//end method
							
							return false;		
							
						});//end click	
						/* .......................................................................................... */	
						
						/* -- */		
						
						/* .......................................................................................... */
						
						$("#menu_man_sair").click(function(){										
									
							var screen_label = $(this).find(".hidden_screen_label").val();				
							
							var dados = $(this).serialize();
							
							$.ajax({
							type: "POST",				
							url: "model/login/logout.php",
							data: dados,	
							   beforeSend: function(){							
									
							   },
							success: function( data ){
										
									location.reload();

								}//end success
							});//end method
							
							return false;		
							
						});//end click
						
						/* .......................................................................................... */				
						
						/* ............................................................. /OpenLinks .............................................................................. */				
						
						/* -- */	
			
			}else{
				
				$(".er_group, .menu_manager, .btn_open_menu_manager").css({
					display:'none'
				});
				
				$(".recept_box_wrapp").css({
					marginLeft:'10px',
					maxWidth:'99%'
				});
				
			}//end if	
			/*......... /start ........... */
			
			/* -- */
			
			/*.......... theme ........... */
			if (settings.theme) {
				
				//$(this).css("theme", settings.theme );
				
				if ((settings.theme=="")||(settings.theme=="clean")) {
										
					$(".menu_manager").css({
						backgroundColor:'',
						borderRight:''
					});	
					
					$(".menu_man_body a").css({
						borderBottom:''
					});															

					$(".menu_man_body a .icon").css({
						color:''
					});

					$(".menu_man_body a .text").css({
						color:''
					});
					
					$(".menu_man_body a .icon_arrow").css({
						backgroundColor:'',
						color:''
					});
					
					$(".menu_man_body a .icon_arrow:hover").css({
						backgroundColor:'',
						color:''
					});	

					$(".menu_manager_list_active").css({
						backgroundColor:''
					});
					
					$(".level_content").css({
						backgroundColor:''	
					});	
					
					
				}//end if
				
				if (settings.theme=="dark") {					
					
					$(".menu_manager").css({
						backgroundColor:'#080a0c',
						borderRight:'1px solid #080a0c'
					});	
					
					$(".menu_man_body a").css({
						borderBottom:'1px solid #d9e4ef00'
					});															

					$(".menu_man_body a .icon").css({
						//color:'#3ba6ef'
						color:'#8B8386'
					});

					$(".menu_man_body a .text").css({
						color:'#FFF'
					});
					
					$(".menu_man_body a .icon_arrow").css({
						backgroundColor:'rgba(255,255,255,0.12)',
						color:'#ffffffbd'
					});
					
					$(".menu_man_body a .icon_arrow:hover").css({
						backgroundColor:'#e1e9f233',
						color:'#FFF'
					});	

					$(".menu_manager_list_active").css({
						backgroundColor:'rgba(217, 228, 239, 0.1)'
					});
					
					$(".level_content").css({
						backgroundColor:'rgba(255,255,255,0.02)'	
					});	

					
					
					
								$('.menu_man_body a').hover(			
					
									function (e) {				
										$(this).parents('.menu_man_body a').trigger('mouseleave');			
										
										$(this).css({
												backgroundColor:'rgba(255,255,255,0.04)',	
												color:'#000'												
											});
										
										e.stopPropagation();
									},

									function (e) {				
										$(this).parents('.menu_man_body a').trigger('mouseleave');
											
										//$(".magick_tooltip_box").fadeOut(200);
										
										$(this).css({
												backgroundColor:'',	
												color:''													
											});
										
										e.stopPropagation();				
									}			
								
								);//end hover					
					
				}//end if
				
			}//end if	
			/*......... /theme ........... */			
			
			/* -- */						
			
		});//end return

	};//end fn

}(jQuery));//end func
