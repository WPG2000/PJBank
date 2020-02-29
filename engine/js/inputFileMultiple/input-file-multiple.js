/*

 * William P.G. - inputFileMultiple
 
 * Recurso para selcionar multiplos arquivos
 
*/

(function($) {

	$.fn.inputFileMultiple = function( options ) {
		
		var settings = $.extend({
			
			start    : true,
			//position : 'right',
			
		}, options);

		return this.each( function() {			
			
			/* -- */	
			
			/* ............ Start ................ */
			if (settings.start) {
				
				$(".input_file_multiple_box input").change(function(){																		
					
					 var names = [];
						
						for (var i = 0; i < $(this).get(0).files.length; ++i) {
							names.push($(this).get(0).files[i].name);
						}//end for
						
						var quantidade_de_arquivos = names.length;
						
						if(quantidade_de_arquivos>1){
							plural_text_quantidade = "s"
						}else{
							plural_text_quantidade = ""
						}
						
						$(this).parent().find(".ifm_label .text").html(quantidade_de_arquivos+" arquivo"+plural_text_quantidade+" selecionado"+plural_text_quantidade);
						$(this).parent().find(".ifm_label").css({
							margin:'20px'
						});
						$(this).closest(".input_file_multiple_box_wrapp").find(".input_file_multiple_box").css({
							height:'60px'
						});
					
				});//end change

				$(".ifm_btn_remover").click(function(){					
										
					$(this).closest(".input_file_multiple_box_wrapp").find("input").val("");
					$(this).closest(".input_file_multiple_box_wrapp").find(".ifm_label .text").html("Arraste e solte seus arquivos aqui ou clique/toque para selecionar.");					
					$(this).closest(".input_file_multiple_box_wrapp").find(".ifm_label").css({
						margin:''
					});
					$(this).closest(".input_file_multiple_box_wrapp").find(".input_file_multiple_box").css({
						height:''
					});
				});//end click
				
			}//end if		
			/* ............ Start ................ */
										
			/* -- */	
			
		});//end return

	};//end fn

}(jQuery));//end func
