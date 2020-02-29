$(document).ready(function(){

    $('#nav-icon1,#nav-icon2,#nav-icon3,#nav-icon4').click(function(){
        $(this).toggleClass('open');
    });//end click
    $('.bc_modal_body a').click(function(){
        $('#nav-icon3').toggleClass('open');
        $(".bc_modal_body .icone_checked").hide();
        $(this).find(".icone_checked").toggle();
        $(".bc_modal_body span").removeClass("text_active");
        $(this).find("span").addClass("text_active");
    });//end click
    $(".mobile_menu").click(function () {
        $(".mbw_biglist").slideToggle(400);
        $(".mbw_biglist .mb_body").load("engine/nav-bars/screen-nav/php/index.php").hide().fadeIn(600);
    });//end click

});//end doc