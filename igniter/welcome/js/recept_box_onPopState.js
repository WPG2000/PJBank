//ao utilizar navArrows
//window.onpopstate = function(event) {
//$(window).bind("popstate", function(e) {
$(window).on('popstate', function () {

    $(".menu_manager button").each(function(){

        var url = window.location.href;
        var url_key = url.split("#").pop();

        //window.history.pushState("", screen_label_session, "#"+screen_label_session);

        var screen_label = $(this).find(".hidden_screen_label").val();

        if(url_key == screen_label){

            var engine_session = $(this).find(".hidden_engine").val();
            var form_mode = $(this).find('.hidden_form_mode').val();
            var nome_tela = $(this).find(".hidden_nome_tela").val();
            var hidden_step_nav = $(this).find(".hidden_step_nav").val();
            var hidden_action_nav = $(this).find(".hidden_action_nav").val();
            var tipo_user_logado = $(this).find('.hidden_tipo_user_logado').val();

            //alert(engine_session);

            $.ajax({
                type: "GET",
                url: "model/form-operation/update/up-nav-session.php?screen_label="+screen_label+"&&nome_tela="+nome_tela+"&&nome_empresa="+screen_label+"&&screen_table=st&&engine="+engine_session+"&&box_mode=bm&&form_mode="+form_mode,
                beforeSend: function(){

                    $(".recept_box").html('<img src="engine/imgs/preloaders-gif/preloader-gif5.gif" class="preloader" />');
                    $("#er_step_nav").html("");
                    $("#er_action_nav").html("");

                    $("#er_title_box").hide();

                    setTimeout(function(){
                        $(".recept_box").html("").hide();
                    }, 400);

                },
                success: function( data ){

                    setTimeout(function(){

                        $("#er_title_box").load("engine/nav-bars/title-box/php/index.php").fadeIn(200);

                        if(url_key=="dashboard"){

                            if(tipo_user_logado=="Inquilino"){
                                $("#rb_welcome").load("igniter/welcome/php/dashboard_loc.php").fadeIn(400);
                            }
                            if(tipo_user_logado=="Proprietário"){
                                $("#rb_welcome").load("igniter/welcome/php/dashboard_prop.php").fadeIn(400);
                            }

                        }else{

                            $("#rb_"+url_key).load("engine/"+engine_session+"/php/"+engine_session+".php?action_nav_btn=action_nav_btn_novo").fadeIn(200);

                        }//end if//else

                        /* ... */

                        if(hidden_step_nav=="on"){
                            $("#er_step_nav").load("engine/nav-bars/step-nav/php/index.php").fadeIn(600);
                        }//end if

                        $("#er_modal").load("engine/modal/php/modal.php?screen_label="+screen_label_session);

                    }, 600);

                }//end success

            });//end method

            return false;

        }//end if

    });//end each

});//end if popstate