$("document").ready(function(){

    //tooltip
    $('.logo_empresa .icon').hover(
        function (e) {
            $(this).find(".dy_grid_tooltip").show();
            e.stopPropagation();
        },
        function (e) {
            $(this).find(".dy_grid_tooltip").hide();
            e.stopPropagation();
        }
    );//end hover

    /*
    if( $(window).width() < 1024){
        $(".dy_grid_tooltip").remove();
    }//end if < 1024
    */

});//end doc