$(document).ready(function(){

    $('.title_box .btn_back').click(function(){

        var dados = $(this).serialize();

        $.ajax({
            type: "GET",
            url: "model/form-operation/update/up-nav-session.php?screen_label="+screen_label+"&&nome_tela="+nome_tela,
            data: dados,
            beforeSend: function(){
                $(".recept_box").html('<img src="engine/imgs/preloaders-gif/preloader-gif5.gif" class="preloader" />');
                $("#er_title_box").hide();
            },
            success: function( data ){

                setTimeout(function(){

                    $(".recept_box").html("").hide();
                    $("#rb_welcome").load("igniter/welcome/php/client-view.php").fadeIn(400);
                    $("#er_title_box").load("engine/nav-bars/title-box/php/index.php").hide().fadeIn(2000);

                }, 600);

            }//end success
        });//end method

        return false;

    });//end click

});//end doc