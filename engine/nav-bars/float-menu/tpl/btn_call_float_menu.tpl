<meta charset="utf-8">

<div class="btn_call btn_call_filters_mode" id="btn_call_subcategoy">
<span class="icon icon-list-alt"></span>
<span class="text"></span>
</div><!-- /btn_call-->

<script>
$(document).ready(function(){
	
	/* -- */
	
	/* .......................................... */	
	//var engine_session = ['@engine_session'];
	//var screen_label = "[@screen_label]";	
	/* .......................................... */
	
	/* -- */
	
	/* .......................................... */
	$('#btn_call_subcategoy').on('click', function (e) {
    e.stopPropagation();
    // Set the effect type
    var effect = 'slide';
    // Set the options for the effect type chosen
    var options = { direction: 'right' };
    // Set the duration (default: 400 milliseconds)
    var duration = 300;
    $('.float_menu_box').toggle(effect, options, duration);
	});

	$('.float_menu_box').on('click', function(e){
		e.stopPropagation();
	});

	$(document).on('click', function () {
		$('.float_menu_box').hide('slide', {direction: 'right'}, 400);
	});
	/* .......................................... */
	
	/* -- */
	
	/* .......................................... */

	/* .......................................... */
	
	/* -- */
	
});//end doc
</script>