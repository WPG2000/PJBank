(function($) {

	$.fn.dropDownBox = function( options ) {
		
		//default settings
		var settings = $.extend({
			
			start    : true,					
			
		}, options);

		//return settings	
		return this.each( function() {			
			
			/* -- */	
			
			/*.......... start ........... */
			if (settings.start) {																													
				
				$(".dropdown_btn, .picture_user").click(function(e){

					var dropdown_body = $(this).parent().find(".dropdown_body").is(":visible");
					
					if(dropdown_body==true){
						$(".dropdown_body").fadeOut(200);		
						$(this).parent().find(".dropdown_body").fadeOut(10).animate({marginTop:'-1px',opacity:'0'},0);		
						$(this).removeClass("page_box_header_active");
					}else{
						$(".dropdown_body").fadeOut(200);
						$(this).parent().find(".dropdown_body").fadeIn(10).animate({marginTop:'3px',opacity:'1'},100);
						$(this).addClass("page_box_header_active");
					}			   	   
				   e.stopPropagation();
				
				$(".reminder_body").hide();
					
				});//end click
				
				$(".dropdown_body li").click(function(){
				   $(".dropdown_body").fadeOut(200);
				   $(".dropdown_body").animate({marginTop:'-10px'},0);
				});//end click
				
				$(document).on('click', function (e) {    
					$(".dropdown_body").fadeOut(200).animate({marginTop:'-1px',opacity:'0'},0);	
					$(".dropdown_btn, .picture_user").removeClass("page_box_header_active");
				});//end click 	
			
			}//end if	
			/*......... /start ........... */
			
			/* -- */										
			
		});//end return

	};//end fn

}(jQuery));//end func
