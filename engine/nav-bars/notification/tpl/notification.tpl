<li id="user_name">
<span class="text">[@usuario_logado]</span>
</li>

<li id="notification">
<b class="tip_box">0</b>
<span class="icone icon-bell-o"></span>
</li>

<script>
$(document).ready(function(){
	
	/* -- */
	
	/* ........................................................................ */
	var notification_sum = '[@notification_sum]';
	if(notification_sum!='0'){
		
		$(".tip_box").show();		
		 	
			$("#notification .icone").animate({
				color:'#000'
			},400).animate({				
				marginLeft:'-10px'
			},80).animate({
				marginLeft:'0'
			},80).animate({
				marginLeft:'-10px'
			},80).animate({
				marginLeft:'0'
			},80).animate({
				marginLeft:'-10px'
			},80).animate({	
				marginLeft:'0'
			},80).animate({
				color:'#b1c7ea'
			},600);					
		  

		if(notification_sum>99){
			$(".tip_box").html("+99");
		}else{
			$(".tip_box").html(notification_sum);
		}
		
	}
	/* ........................................................................ */
	
	/* -- */		
	
	
});//end doc
</script>