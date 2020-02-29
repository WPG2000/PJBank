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
						
						/* ............................ MenuManActive_OnLoad ............................................... */							
						var url = window.location.href;
						url_key = url.split("#").pop();
						url_key_format = "menu_man_"+url_key;											
						
						$(".menu_man_section button").each(function(){
							
							menu_man_id = $(this).attr("id");							
							
							if(menu_man_id==url_key_format){
																								
								$(this).addClass("menu_manager_list_active");
								
							}//end if
							
						});//end each						
						/* ........................... /MenuManActive_OnLoad ............................................... */	

						/* -- */
						
						/* ........................................................................... */
						$(".btn_open_menu_manager").click(function(){				
											
											
							var menu_man_state = $(".er_group").is(":visible"); 		
							var er_group_margin = $(".er_group").css("margin-left");				
							//alert(er_group_margin);
							
							var section_menu_wrapp = $(".section_menu_wrapp").css("margin-right");				
							
							if(er_group_margin=='0px'){
								//alert("open");				
											
								//$(".btn_open_menu_manager").prop("disabled",true);
								
								setTimeout(function(){ 
									//$(".menu_manager").hide();	
									//$(".btn_open_menu_manager").prop("disabled",false);				
								}, 1000);
								
								$(".er_group").css({
									margin:'0 0 0 -100%'				
								});
								
								$(".er_group").css({
									//width:'0'				
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
													
								//$(".menu_manager").show();					
								
								setTimeout(function(){ 			
									$(".menu_manager").css({					
										//margin:'0 0 0 0'
									});
									
									$(".er_group").css({
										//width:''				
										margin:'0 0 0 0'
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
						$(".menu_man_section a,.menu_man_section button").click(function(){						 		
							
							$(this).find(".icon_arrow").toggleClass("icon-more_vert icon-more_horiz");	
							
							$(".menu_man_section a,.menu_man_section button").removeClass("menu_manager_list_active");	
							$(this).addClass("menu_manager_list_active");	
							
							$(".menu_man_section a .icon,.menu_man_section button .icon").css({
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
						
						//aqui
						$(document).on('click', function (e) {  		
								if( $(window).width() < 1024){
								
									$(".er_group").css({
										margin:'0 0 0 -100%'				
									});																	
																		
								}//end if < 1024	
							
							e.stopPropagation();				
							
						});//end click  	
					
						/* ......................... /MobileRules .................................... */
						
						/* -- */
						
						/*	
						$(document).on('click', function (e) {  		
							//$(".btn_level1").parent().find(".level_content").hide();
						});//end click  	
						*/											
						
						/* -- */
							
						/* .............................................. OpenLinks .............................................. */				
						
						/* -- */
						
						/* .......................................................................................... */
						$(".menu_manager button").click(function(){							
							
							var hidden_btn_level = $(this).find(".hidden_btn_level").val();
							var hidden_step_nav = $(this).find(".hidden_step_nav").val();							
							var screen_label = $(this).find(".hidden_screen_label").val();
							var nome_tela = $(this).find(".hidden_nome_tela").val();
							var nome_empresa = $(this).find(".hidden_nome_empresa").val();	
							var screen_table = $(this).find(".hidden_screen_table").val();
							var engine = $(this).find(".hidden_engine").val();	
							var box_mode = $(this).find('.hidden_box_mode').val();
							var form_mode = $(this).find('.hidden_form_mode').val();
                            var tipo_user_logado = $(this).find('.hidden_tipo_user_logado').val();
							
							var dados = $(this).serialize();

							if(screen_label=="sair"){
								
								var hidden_location = $(this).find('.hidden_location').val();
								if(hidden_location==""){
									var idEmprEncode = $.base64.encode(id_empr);
									hidden_location = "?a="+idEmprEncode;
								}else{
									hidden_location = "http://"+hidden_location;
								}
																								
								var url_set = "igniter/login/php/logout.php";
								
							}else{
								var url_set = "model/form-operation/update/up-nav-session.php?screen_label="+screen_label+"&&nome_tela="+nome_tela+"&&nome_empresa="+nome_empresa+"&&screen_table="+screen_table+"&&engine="+engine+"&&box_mode="+box_mode+"&&form_mode="+form_mode;
							}//end if/else
								
								if(hidden_btn_level!="btn_level1"){
									
									//alert(nome_tela);																
									
									$.ajax({
									type: "GET",				
									url: url_set,
									data: dados,	
									   beforeSend: function(){																															
											
											$( ".menu_manager button" ).attr("disabled",true).css({cursor:'wait'});
											
											$(".menu_manager a .icon,.menu_manager button .icon").css({													
												color:'unset'
											});		
											
											$(".recept_box").html('<img src="engine/imgs/preloaders-gif/preloader-gif5.gif" class="preloader" />');
											$("#er_title_box").hide();
											$("#er_step_nav").html("");																																	
											
											window.location.hash = screen_label;
											
									   },
										success: function( data ){
												
												setTimeout(function(){ 
																												
														if(hidden_step_nav=="on"){
															$("#er_step_nav").load("engine/nav-bars/step-nav/php/index.php").fadeIn(600);		
														}//end if	
													
												}, 200);				
												
												setTimeout(function(){ 
													$("#er_modal").load("engine/modal/php/modal.php?screen_label="+screen_label_session);
												}, 300);

                                                setTimeout(function(){
                                                    $(".recept_box").html("").hide();
                                                }, 400);

                                                if( $(window).width() < 1024){
                                                    $(".er_group").css({
                                                        margin:'0 0 0 -100%'
                                                    });
                                                }//end if < 1024
										
										},//end success
										 complete: function(data) {
											 
											 setTimeout(function(){
																												
													//$('.nome_tela span').html(nome_tela+" "+nome_empresa);	  																																																																					
													$("#er_title_box").load("engine/nav-bars/title-box/php/index.php").fadeIn(200);
													
														if(screen_label=="dashboard"){

														    if(tipo_user_logado=="Inquilino"){
                                                                $("#rb_welcome").load("igniter/welcome/php/dashboard_loc.php").fadeIn(400);
                                                            }
                                                            if(tipo_user_logado=="Proprietário"){
                                                                $("#rb_welcome").load("igniter/welcome/php/dashboard_prop.php").fadeIn(400);
                                                            }
															//$("#rb_welcome").load("igniter/welcome/php/client-view.php").fadeIn(200);
														
														}else if(screen_label=="sair"){

															window.location.href = hidden_location; //usar para direcionar ao site da empresa
															
														}else{
															
															$("#rb_"+screen_label).load("engine/"+engine+"/php/"+engine+".php?action_nav_btn=action_nav_btn_novo").fadeIn(400);
															
														}//end if/else																																																																																						
														
												}, 1000);
												
												setTimeout(function(){ 																								
													
													$( ".menu_manager button" ).attr("disabled",false).css({cursor:''});
													
													$(".menu_manager a .icon,.menu_manager button .icon").css({													
														color:'unset'
													});																											 													 
													 
												}, 4000);
												
										 }//end complete
									});//end method
									
									return false;		
							
							}//end if !=btn_level1
							
						});//end click							
						
						/* .......................................................................................... */	
						
						/* -- */															
						
						/* ............................................. /OpenLinks .............................................. */				
						
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
					
					$(".menu_man_body a,.menu_man_body button").css({
						borderBottom:''
					});															

					$(".menu_man_body a .icon,.menu_man_body button .icon").css({
						color:'#2c3e50'
					});
					
					$(".menu_manager li, .menu_manager span").css({						
						color:'#2c3e50'
					});

					$(".menu_man_body a .text,.menu_man_body button .text").css({
						color:''
					});
					
					$(".menu_man_body a .icon_arrow,.menu_man_body button .icon_arrow").css({
						backgroundColor:'',
						color:''
					});
					
					$(".menu_man_body li").css({
						borderBottom:'1px solid #f0f0f0'
					});
					
					$(".menu_man_body a .icon_arrow:hover,.menu_man_body button .icon_arrow:hover").css({
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
				
				/* ... */
				
				if (settings.theme=="dark") {					
					
					$(".menu_manager").css({
						backgroundColor:'#080a0c',
						borderRight:'1px solid #080a0c'
					});	
					
					$(".menu_man_body a,.menu_man_body button").css({
						borderBottom:'1px solid #d9e4ef00'
					});															

					$(".menu_man_body a .icon,.menu_man_body button .icon").css({
						//color:'#3ba6ef'
						color:'#8B8386'
					});	

					$(".menu_manager li, .menu_manager span").css({						
						color:'#8B8386'
					});

					$(".menu_man_body a .text,.menu_man_body button .text").css({
						color:'#FFF'
					});
					
					$(".menu_man_body a .icon_arrow,.menu_man_body button .icon_arrow").css({
						backgroundColor:'rgba(255,255,255,0.12)',
						color:'#ffffffbd'
					});
					
					$(".menu_man_body a .icon_arrow:hover,.menu_man_body button .icon_arrow:hover").css({
						backgroundColor:'#e1e9f233',
						color:'#FFF'
					});	

					$(".menu_manager_list_active").css({
						backgroundColor:'rgba(217, 228, 239, 0.1)'
					});
					
					$(".level_content").css({
						backgroundColor:'rgba(255,255,255,0.02)'	
					});	

					
					
								/*
								$('.menu_man_body a,.menu_man_body button').hover(			
					
									function (e) {				
										$(this).parents('.menu_man_body a,.menu_man_body button').trigger('mouseleave');			
										
										$(this).css({
												backgroundColor:'rgba(255,255,255,0.04)',	
												color:'#000'												
											});
										
										e.stopPropagation();
									},

									function (e) {				
										$(this).parents('.menu_man_body a,.menu_man_body button').trigger('mouseleave');
											
										//$(".magick_tooltip_box").fadeOut(200);
										
										$(this).css({
												backgroundColor:'',	
												color:''													
											});
										
										e.stopPropagation();				
									}			
								
								);//end hover					
								*/
				}//end if
				
				/* ... */
				
				if (settings.theme=="madison") {
					
					$(".menu_manager").css({
						backgroundColor:'#2C3E50',
						borderRight:'1px solid #080a0c'
					});	
					
					$(".menu_man_body a,.menu_man_body button").css({
						borderBottom:'1px solid #d9e4ef00'
					});															

					$(".menu_man_body a .icon,.menu_man_body button .icon").css({						
						color:'#DADFE1'
					});
										
					$(".menu_manager li, .menu_manager span").css({						
						color:'#DADFE1'
					});

					$(".menu_man_body a .text,.menu_man_body button .text").css({
						color:'#FFF'
					});
					
					$(".menu_man_body a .icon_arrow,.menu_man_body button .icon_arrow").css({
						backgroundColor:'rgba(255,255,255,0.12)',
						color:'#ffffffbd'
					});
					
					/*
					$(".menu_man_body a .icon_arrow:hover,.menu_man_body button .icon_arrow:hover").css({
						backgroundColor:'#e1e9f233',
						color:'#FFF'
					});	
					*/
					
					$(".menu_manager_list_active").css({
						backgroundColor:'rgba(217, 228, 239, 0.1)'
					});
					
					$(".level_content").css({
						backgroundColor:'rgba(255,255,255,0.02)'	
					});
					
				}//end if
				
				/* ... */
				
				/* ... */
				
				if (settings.theme=="darkGrey") {
					
					$(".menu_manager").css({
						backgroundColor:'rgba(30, 39, 46,0.98)',
						borderRight:'1px solid #080a0c'
					});	
					
					$(".menu_man_body a,.menu_man_body button").css({
						borderBottom:'1px solid #d9e4ef00'
					});															

					$(".menu_man_body a .icon,.menu_man_body button .icon").css({						
						color:'#DADFE1'
					});
										
					$(".menu_manager li, .menu_manager span").css({						
						color:'#DADFE1'
					});

					$(".menu_man_body a .text,.menu_man_body button .text").css({
						color:'#FFF'
					});
					
					$(".menu_man_body a .icon_arrow,.menu_man_body button .icon_arrow").css({
						backgroundColor:'rgba(255,255,255,0.12)',
						color:'#ffffffbd'
					});
					
					/*
					$(".menu_man_body a .icon_arrow:hover,.menu_man_body button .icon_arrow:hover").css({
						backgroundColor:'#e1e9f233',
						color:'#FFF'
					});	
					*/
					
					$(".menu_manager_list_active").css({
						backgroundColor:'rgba(217, 228, 239, 0.1)'
					});
					
					$(".level_content").css({
						backgroundColor:'rgba(255,255,255,0.02)'	
					});
							
							
							$('.menu_man_body a,.menu_man_body button').hover(			
					
									function (e) {				
										$(this).parents('.menu_man_body a,.menu_man_body button').trigger('mouseleave');			
										
										$(this).css({
												backgroundColor:'rgba(255,255,255,0.04)',																								
											});
										
										e.stopPropagation();
									},

									function (e) {				
										$(this).parents('.menu_man_body a,.menu_man_body button').trigger('mouseleave');
											
										//$(".magick_tooltip_box").fadeOut(200);
										
										$(this).css({
												backgroundColor:'',	
												color:''													
											});
										
										e.stopPropagation();				
									}			
								
								);//end hover
					
				}//end if
				
				/* ... */

				if (settings.theme=="darkBlue") {
					
					$(".menu_manager").css({
						backgroundColor:'#20394c',
						borderRight:'1px solid #080a0c'
					});	
					
					$(".menu_man_body a,.menu_man_body button").css({
						borderBottom:'1px solid #d9e4ef00'
					});															

					$(".menu_man_body a .icon,.menu_man_body button .icon").css({						
						color:'#DADFE1'
					});
										
					$(".menu_manager li, .menu_manager span").css({						
						color:'#DADFE1'
					});

					$(".menu_man_body a .text,.menu_man_body button .text").css({
						color:'#FFF'
					});
					
					$(".menu_man_body a .icon_arrow,.menu_man_body button .icon_arrow").css({
						backgroundColor:'rgba(255,255,255,0.12)',
						color:'#ffffffbd'
					});
					
					/*
					$(".menu_man_body a .icon_arrow:hover,.menu_man_body button .icon_arrow:hover").css({
						backgroundColor:'#e1e9f233',
						color:'#FFF'
					});	
					*/
					
					$(".menu_manager_list_active").css({
						backgroundColor:'rgba(217, 228, 239, 0.1)'
					});
					
					$(".level_content").css({
						backgroundColor:'rgba(255,255,255,0.02)'	
					});
						
						$('.menu_man_body a,.menu_man_body button').hover(			
					
									function (e) {				
										$(this).parents('.menu_man_body a,.menu_man_body button').trigger('mouseleave');			
										
										$(this).css({
												backgroundColor:'rgba(255,255,255,0.04)',
												boxShadow:'inset 5px 0 0 0 #6C7B8B'												
											});
										
										e.stopPropagation();
									},

									function (e) {				
										$(this).parents('.menu_man_body a,.menu_man_body button').trigger('mouseleave');
											
										//$(".magick_tooltip_box").fadeOut(200);
										
										$(this).css({
												backgroundColor:'',	
												color:'',
												boxShadow:''													
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
