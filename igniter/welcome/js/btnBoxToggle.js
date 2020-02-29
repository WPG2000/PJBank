$(document).ready(function(){

    $("#page_box_dashboards .bm_inner_header_btn_toggle").click(function(){
        $(this).parents(".box_master").find(".bm_group_body").slideToggle(200);
    });//end click

    $(".box_master").css({
        cursor:'auto'
    });

});//end doc