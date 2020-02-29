$(document).ready(function(){

    $('.logo_empresa .icon,.logo_empresa .text').click(function(){

        var screen_label = '';
        var nome_tela = '';

        var dados = $(this).serialize();

        if(screen_label_session=="dimob"){
            var urlSet = "/";
            function beforeSendFunc(){}
        }else{
            var urlSet = "model/form-operation/update/up-nav-session.php?screen_label="+screen_label+"&&nome_tela="+nome_tela;
            function beforeSendFunc(){
                $( ".menu_manager button" ).attr("disabled",true);
                $(".recept_box").html('<img src="engine/imgs/preloaders-gif/preloader-gif5.gif" class="preloader" />');
                $("#er_title_box").hide();
                $("#er_step_nav").html("");
                window.location.hash = "dashboard";
            }
        }

        $.ajax({
            type: "GET",
            url: urlSet,
            data: dados,
            beforeSend: function(){
                beforeSendFunc();
            },
            success: function( data ){

                setTimeout(function(){
                    $( ".menu_manager button" ).attr("disabled",false);
                }, 1000);


                setTimeout(function(){

                    $("#er_title_box").load("engine/nav-bars/title-box/php/index.php").fadeIn(1000);
                    $('.nome_tela span').html(nome_tela+" "+nome_empresa).hide().fadeIn(1000);
                    $(".recept_box").html("").hide();

                    if(screen_label=="dashboard"){

                        $("#rb_welcome").load("igniter/welcome/php/client-view.php").fadeIn(600);

                    }else if(screen_label=="sair"){

                        location.reload();
                        window.location.hash = "";

                    }else{

                        $("#rb_"+screen_label).load("engine/"+engine+"/php/"+engine+".php?action_nav_btn=action_nav_btn_novo").fadeIn(400);

                    }//end if/else


                    if(hidden_step_nav=="on"){
                        $("#er_step_nav").load("engine/nav-bars/step-nav/php/index.php").fadeIn(600);
                    }//end if

                    $("#er_modal").load("engine/modal/php/modal.php?screen_label="+screen_label_session);

                }, 600);

                //$("#er_breadcrumb").load("engine/nav-bars/breadcrumb/php/index.php");
                //$("#er_section_menu").load("engine/nav-bars/section-menu/php/index.php");
                //$("#er_action_nav").load("engine/nav-bars/action-nav/php/action-nav.php?screen_label="+screen_label);

                if( $(window).width() < 1024){
                    $(".er_group").css({
                        margin:'0 0 0 -100%'
                    });
                }//end if < 1024


            },//end success
            error: function(){
                alert(screen_label_session);
            }
        });//end method

        return false;

    });//end click

});//end doc