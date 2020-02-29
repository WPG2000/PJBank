<meta charset="utf-8">

<li id="[@id_primary]">
<span class='icon icon-list'></span>
<span class='text'>[@id_sub_categoria] - [@sub_categoria]</span>
<input type="hidden" class="hidden_id_categoria" value="[@id_category_filter]" />
</li>

<script>
$(document).ready(function(){
	
	/* -- */
	
	/* .......................................... */	
	var engine_session = '[@engine_session]';
	var screen_label = "[@screen_label]";	
	//var id_categoria = "[@id_categoria]";		
	var read_id = "[@screen_label]";	
	/* .......................................... */
	
	/* -- */
	
	/* .......................................... */
	$("#[@id_primary]").click(function(){
		var read_id = $(this).attr("id");	
		var hidden_id_categoria = $(this).find(".hidden_id_categoria").val();	
		//alert(read_id);
		$(".recept_box").hide();
		$("#rb_"+screen_label).load("engine/"+engine_session+"/php/index.php?screen_label="+screen_label+"&&action_nav_btn=action_nav_btn_sub_category_filter&&id_sub_category_filter="+read_id+"&&id_category_filter="+hidden_id_categoria).fadeIn(400);
	});//end click
	/* .......................................... */
	
	/* -- */
	
	/* .......................................... */
	
	/* .......................................... */
	
	/* -- */
	
});//end doc
</script>