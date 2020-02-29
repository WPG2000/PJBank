/* -- */

/* .............................. BoxMaster ToolsRightSide ................................... */	

/* -- */

/* ....... ToggleBox ........ */
$(".bm_inner_header_btn_toggle").click(function(){	
	$(this).parents(".box_master").find(".bm_group_sides").slideToggle(200);	
});//end click
/* ...... /ToggleBox ........ */

/* -- */

/* ....... PrintElement ........ */
$(".bm_inner_header_btn_print_element").click(function(){				
	
	var btn_value = $(this).find("input").val();
	
	var title = $(this).parents(".box_master").find(".bm_inner_h_left_side .text").html();
	
	/* -- */	
	
	/* ..................... */
	if(btn_value=="btn_print_box_server_stats"){
	
		var canvas_id = 'bm_group_sides_circles';
		
	}else if(btn_value=="btn_print_box_distrib_carteira"){
	
		var canvas_id = 'bm_wrapp_donut_and_tags';
		
	}else if(btn_value=="btn_print_box_general_dashboard"){
		
		var canvas_id = 'recept_box_wrapp1';
	
	}else{
	
		var canvas_id = $(this).parents(".box_master").find("canvas").attr("id");
		
	}
	/* ..................... */

	/* -- */	
	
	$(".mbw_fullmode").show();
	/*
	$('.mbw_fullmode .mb_body').css({
		backgroundColor:'#F1F3F6',
		width:'57%'
	});//end css
	*/	
		
	     html2canvas(document.getElementById(canvas_id)).then(function(canvas){			              					
																	
			var canvasImg = canvas.toDataURL("image/jpg");
			
			$('.mbw_fullmode .modal_box').html('<img src="'+canvasImg+'" alt="">').printThis({
				importCSS: true,
				importStyle: true,
				printContainer: true,
				//loadCSS: "test.css",
				header: title,
				//base: "",
				//canvas: true,        
			  });		  											
		
		});//end html2canvas			
		
	/* ....................... */
	
	var qtd_print = 0;			
				  	
		var run_print = setInterval(function(){        
		
			$('.mbw_fullmode').fadeOut();
		
			qtd_print++;						   
		  if (qtd_print > 0) clearInterval(run_print);					  
		}, 2000);
	
	/* ....................... */
			
});//end click
/* ...... /PrintElement ........ */

/* -- */

/* ............................. /BoxMaster ToolsRightSide ................................... */	

/* -- */