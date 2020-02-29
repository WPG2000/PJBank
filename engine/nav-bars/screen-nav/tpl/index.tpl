<meta charset="utf-8">

<div class="screen_nav_wrapp">
<ul>

[@list_lines]

</ul>
</div><!-- /screen_nav_wrapp-->

<script>
$(document).ready(function(){
	
	/* -- */
	
	/* .......................................... */	
	var d = 150, factor = d / 3 * 2;
	$(".screen_nav_wrapp span").each(function(){
		$(this).delay(d = d + factor).animate({marginLeft:'0'},600);
	});	
	/* .......................................... */	
	
	/* -- */
	
	/* .......................................... */	
	$(".screen_nav_wrapp ul li").click(function(){	
		$("#nav-icon3").toggleClass('open');
	});//end click	
	/* .......................................... */	
	
	/* -- */
	
});//end doc
</script>