if((user_loc_session=="SIM")&&(user_prop_session=="SIM")){

    $(".loc_prop_choose_box").show();

    $(".loc_prop_choose_box li").click(function(){

        var hidden_choose_box = $(this).find(".hidden_choose_box").val();

            if(hidden_choose_box=="prop"){
                var hcb_label = "<div class='hcb_label'><div>Carregando dados do <b>Proprietário</b></div> <img src='engine/imgs/logo-empresa/vistaOffice-icon.png' /></div>";
            }
            if(hidden_choose_box=="inq"){
                var hcb_label = "<div class='hcb_label'><div>Carregando dados do <b>Inquilino</b></div> <img src='engine/imgs/logo-empresa/vistaOffice-icon.png' /></div>";
            }

                $.ajax({
                    type: "GET",
                    url: "model/form-operation/update/up-tipo-user.php?hidden_choose_box="+hidden_choose_box,
                    beforeSend : function(){
                        $(".loc_prop_choose_box li").fadeOut(200);
                        $(".lpc_box_title").fadeOut(200);

                        setTimeout(function(){
                            $(".lpc_box_progress span").html('<img src="engine/imgs/preloaders-gif/preloader-gif5.gif" />');
                            $(".lpc_box_choosed_label span").html(hcb_label).fadeIn(400);;
                        }, 200);
                    },
                    success: function(data){

                        //alert(data);

                        setTimeout(function(){
                            location.reload();
                        }, 1000);

                    }//end success

        });//end method

        return false;

    });//end click

}//end if