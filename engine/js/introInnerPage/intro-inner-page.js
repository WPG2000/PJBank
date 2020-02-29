$(document).ready(function(){	

/* -- */

/* ........................................ */
/*
$("#form_login li").click(function(){
	$(this).find("input").focus();
});//end click
*/
/* ........................................ */

/* -- */	

/* ........................................ */
	 $(".move_icon").animate({
		marginTop:'-25px',
		opacity:'0'		
	 },180).animate({
		marginTop:'0',
		opacity:'1'		
	 },800);	 
/* ........................................ */

	/* -- */

	/* ........................................ */
	var qtd = 0;
	/* ........................................ */

	/* -- */
	
	/* ............. text1 go1 ............. */
	var run_textgo1 = setInterval(function(){
        
    $(".intro_box #go1").hide().fadeIn(800).typedText("Migra", "slow");	
        
		qtd++;
		   
      if (qtd > 0) clearInterval(run_textgo1);
	  
	}, 800);	
	/* ............. /text1 ............. */
	
	/* -- */
	
	/* ............. text1 go2 ............. */
	var run_textgo2 = setInterval(function(){
        
    $(".intro_box #go2").hide().fadeIn(800).typedText("Seguros", "slow");	
        
		qtd++;
		   
      if (qtd > 0) clearInterval(run_textgo2);
	  
	}, 1200);	
	/* ............. /text1 ............. */
	
	/* -- */
	
	
	/* ............. text2 ............. */
	/*
	var run_text2 = setInterval(function(){
        
     $(".intro_box #text2").hide().fadeIn(1100).typedText("Olá", "");	 
        
		qtd++;
		   
      if (qtd > 0) clearInterval(run_text2);
	  
	}, 2200);	
	*/
	/* ............. /text2 ............. */
	
	/* -- */
	
	/* ............. intro ............. */
	if( $(window).width() > 1000){
	var run_intro = setInterval(function(){
        
       	$(".intro_wrapp").animate({
			marginLeft:'100%'
		},600);
        
		qtd++;
		   
      if (qtd > 0) clearInterval(run_intro);
	  
	}, 4200);
	}else{
		$(".intro_wrapp").hide();
	}
	/* ............ /intro ............. */
	
	/* -- */
	
	/* ............. formLogin ............. */
	if( $(window).width() > 1000){
	var run_formlogin = setInterval(function(){
        
       	$("#form_login").animate({
			right:'0'
		},600);
        
		qtd++;
		   
      if (qtd > 0) clearInterval(run_formlogin);
	  
	}, 5000);
	}else{
		$("#form_login").animate({
				right:'0'
			},600);
	}
	/* ............ /formLogin ............. */
	
	/* -- */
	
	/* ............. banner ............. */
	var run_banner = setInterval(function(){
	
	if( $(window).width() > 1000){
		$(".recept_banner").load("igniter/login/tpl/banner.tpl").hide().fadeIn(2000);
	}//end if                  
		qtd++;
		   
      if (qtd > 0) clearInterval(run_banner);
	  
	}, 5200);
	/* ............ /banner ............. */
	
	/* -- */

});//end doc