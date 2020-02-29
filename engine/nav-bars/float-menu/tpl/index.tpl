<meta charset="utf-8">

<div class="float_menu_box">
<div class="fmb_header">
<span class="icon icon-list-alt"></span>
<span class="text">Título</span>
</div><!-- /fmb_header-->

<ul>

[@list_float_menu]

</ul>
</div><!-- /float_menu_box-->

<script>
$(document).ready(function(){
	
	/* -- */
	
	/* .......................................... */	
	var engine_session = ['@engine_session'];
	var screen_label = "[@screen_label]";	
	/* .......................................... */
	
	/* -- */
	
	/* .......................................... */
	
	/* .......................................... */
	
	/* -- */
	
	/* .......................................... */
	$(".search_master").keyup(function(){		
		var value = $(this).val();
		     console.log(value);	
			$(".box_master").each(function(){
				if ($(this).text().search(new RegExp(value, "i")) > -1) {
                $(this).show();
				}else{
					$(this).hide();
				}
			});//end each
			
			var box_master = $(".box_master").is(":visible"); 
			if(box_master!==true){
			//$(".box_master_wrapp").html("Vazio");
			}else{
			//$(".box_master_wrapp").html("");
			}
			
			
	});//end keyup	
	/* .......................................... */
	
	/* -- */
	
});//end doc
</script>