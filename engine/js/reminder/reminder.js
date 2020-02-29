(function($) {

	$.fn.reminder = function( options ) {
		
		//default settings
		var settings = $.extend({
			
			start    : true,					
			
		}, options);

		//return settings	
		return this.each( function() {			
			
			/* -- */	
			
			/*.......... start ........... */
			if (settings.start) {																													
							
					
					/* -- */
					
					/* ........................... */	
					/* ........................... */	
					
					/* -- */
					
					/* ............. BtnReminder .............. */	
					$(".btn_reminder").click(function(e){																						
						
						$(this).find(".reminder_body").toggle();
						$(".dropdown_body").fadeOut(200);
						
						e.stopPropagation();				
						
					});//end click

					$(document).on('click', function (e) { 
					
						$(".reminder_body").hide();	
						
							e.stopPropagation();				
						
					});//end click 					
					/* ............ /BtnReminder .............. */	
					
					/* -- */
			
			}else{
				
				//else start false here.
				
			}//end if/else start	
			/*......... /start ........... */
			
			/* -- */										
			
		});//end return

	};//end fn

}(jQuery));//end func
