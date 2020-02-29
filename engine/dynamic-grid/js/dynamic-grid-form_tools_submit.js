$(document).ready(function(){

    $('.grid_form').submit(function() {

        var dados = $( this ).serialize();

        $.ajax({
            type: "POST",
            url: "engine/dynamic-grid/php/dynamic-grid.php?gridFormToolsSubmit=yes",
            data: dados,
            beforeSend: function(){
                $("body").css({cursor:'wait'});
                $(".btn_dGrid_filter_all .icon").removeClass("icon-search6");
                $(".btn_dGrid_filter_all .icon").html("<img src='engine/imgs/preloaders-gif/mini-preloader3.gif' width='18px' height='18px' />");
            },
            success: function( data ){

                $("body").css({cursor:''});
                //$(".btn_dGrid_filter_all").toggleClass("");
                $("#rb_"+screen_label_session).html(data);

            }//end success

        });//end method

        return false;
    });

});//end doc