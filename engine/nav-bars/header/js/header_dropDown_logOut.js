$(document).ready(function(){

    $('.ddown_list #logout').click(function(){

        var hidden_location = site_cliente;
        if(hidden_location==""){
            var idEmprEncode = $.base64.encode(id_empr);
            hidden_location = "?a="+idEmprEncode;
        }else{
            hidden_location = "http://"+hidden_location;
        }

        var dados = $(this).serialize();

        $.ajax({
            type: "GET",
            data: dados,
            url: "igniter/login/php/logout.php?header_logout=yes",
            beforeSend: function(){
                $(".recept_box").html('<img src="engine/imgs/preloaders-gif/preloader-gif5.gif" class="preloader" style="margin-top:12%;" />');
            },
            success: function() {

                setTimeout(function () {
                    window.location.href = hidden_location;
                }, 1000);

            }

            });//end method

        return false;

    });//end click

});//end doc