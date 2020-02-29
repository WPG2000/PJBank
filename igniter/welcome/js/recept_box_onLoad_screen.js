//Ao recarregar a tela
setTimeout(function(){

    $(".menu_manager button").each(function(){

        var url = window.location.href;

        if(url.indexOf("#")==-1) {

            var url_key = "";
            //alert("Sem hash");

        }else{

            var url_key = url.split("#").pop();
            var url_key = url_key.split("_view")[0];
            var url_key = url_key.split("_pedido")[0];
            var url_key = url_key.split("_anexos")[0];
            var url_key = url_key.split("_agendamento")[0];
            window.history.pushState("", url_key, "#"+url_key);
            //alert("Com hash");

        }//end if/else

        var screen_label = $(this).find(".hidden_screen_label").val();

        if(url_key == screen_label){

            var engine_session = $(this).find(".hidden_engine").val();
            var form_mode = $(this).find('.hidden_form_mode').val();
            var nome_tela = $(this).find(".hidden_nome_tela").val();
            var hidden_step_nav = $(this).find(".hidden_step_nav").val();
            var hidden_action_nav = $(this).find(".hidden_action_nav").val();
            var tipo_user_logado = $(this).find('.hidden_tipo_user_logado').val();

            /*
            if(url.indexOf("_view")==-1){
                //...
            }else{
                engine_session="form-master";
            }//end if
            */
            //alert(engine_session);
            //alert(url_key);

            $.ajax({
                type: "GET",
                url: "model/form-operation/update/up-nav-session.php?screen_label="+screen_label+"&&nome_tela="+nome_tela+"&&nome_empresa="+screen_label+"&&screen_table=st&&engine="+engine_session+"&&box_mode=bm&&form_mode="+form_mode,
                success: function( data ){

                    //setTimeout(function(){

                    $(".recept_box").html("").hide();
                    $("#er_title_box").load("engine/nav-bars/title-box/php/index.php").fadeIn(200);

                    if(url_key=="dashboard"){

                        if(tipo_user_logado=="Inquilino"){
                            $("#rb_welcome").load("igniter/welcome/php/dashboard_loc.php").fadeIn(400);
                        }
                        if(tipo_user_logado=="Proprietário"){
                            $("#rb_welcome").load("igniter/welcome/php/dashboard_prop.php").fadeIn(400);
                        }

                    }else{

                        $("#rb_"+url_key).load("engine/"+engine_session+"/php/"+engine_session+".php?action_nav_btn=action_nav_btn_novo").fadeIn(400);

                    }//end if//else

                    if(hidden_step_nav=="on"){
                        $("#er_step_nav").load("engine/nav-bars/step-nav/php/index.php").fadeIn(600);
                    }//end if


                    //}, 600);

                }//end success

            });//end method


            return false;


        }else if(url_key==""){

            window.location.href = "igniter/login/php/logout.php";

        }//end if//else

    });//end each

}, 400);

/*
$(window).unload(function() {
return "Handler for .unload() called.";
});//end unload
*/

/*
window.addEventListener("beforeunload", function (event) {
event.preventDefault();
alert("Sair?");
});
*/