<meta charset="utf-8">

<li id="ddownlist_[@id]">
    <span class="icon icon-[@icone]"></span>
    <span class="text">[@nome_tela]</span>
    <input type="hidden" value="[@nome_tela]" class="hidden_nome_tela"/>
    <input type="hidden" value="[@engine]" class="hidden_engine"/>
    <input type="hidden" value="[@screen_label]" class="hidden_screen_label"/>
    <input type="hidden" value="[@screen_table]" class="hidden_screen_table"/>
    <input type="hidden" value="[@box_mode]" class="hidden_box_mode"/>
    <input type="hidden" value="[@form_mode]" class="hidden_form_mode"/>
</li>

<script>
    $(document).ready(function () {
        $("#ddownlist_[@id]").click(function () {

            /* -- */

            /* ................................... */
            var screen_label = $(this).find('.hidden_screen_label').val();
            var screen_table = $(this).find('.hidden_screen_table').val();
            var nome_tela = $(this).find('.hidden_nome_tela').val();
            var engine = $(this).find('.hidden_engine').val();
            var box_mode = $(this).find('.hidden_box_mode').val();
            var form_mode = $(this).find('.hidden_form_mode').val();

            var dados = $(this).serialize();
            //alert(screen_label);
            /* ................................... */

            /* -- */

            /* ................................... */
            if (screen_label == 'sair') {
                $.ajax({
                    type: "POST",
                    url: "model/login/logout.php",
                    data: dados,
                    success: function (data) {

                        location.reload();

                    }//end success
                });//end method

                return false;
            }// end if sair
            /* ................................... */

            /* -- */

            /* ................................... */
            if (screen_label == 'about') {

                $(".mbw_biglist").slideUp(800);
                $(".mbw_800x600").fadeIn(400);
                $(".mbw_800x600 .mb_body").load("engine/dynamic-success/php/index.php?action_nav_btn=action_nav_btn_about");

            }// end if about
            /* ................................... */

            /* -- */

            /* ................................... */
            if ((screen_label != 'about') && (screen_label != 'sair')) {
                $.ajax({
                    type: "GET",
                    url: "model/form-operation/update/up-nav-session.php?screen_label=" + screen_label + "&&nome_tela=" + nome_tela + "&&screen_table=" + screen_table + "&&engine=" + engine + "&&box_mode=" + box_mode + "&&form_mode=" + form_mode,
                    data: dados,
                    beforeSend: function () {

                    },
                    success: function (data) {

                        $("#er_title_box").load("engine/nav-bars/title-box/php/index.php");
                        $('.nome_tela span').html(nome_tela).hide().fadeIn(1000);
                        $(".mbw_biglist").slideUp(400);
                        $(".recept_box").hide();

                        if (screen_label == '') {

                            //$("#er_title_box").load("engine/nav-bars/title-box/php/index.php");
                            $("#rb_welcome").load("igniter/welcome/php/welcome_box.php").hide().fadeIn(1000);
                            $(".action_nav_wrapp").animate({bottom:'-100%'}, 600);
                            $("#er_section_menu").load("engine/nav-bars/section-menu/php/index.php");

                        } else {

                            if (screen_label == 'seguradoras') {
                                //$("#er_title_box").load("engine/nav-bars/title-box/php/index.php");
                                $("#rb_seguradoras").load("igniter/welcome/php/seguradoras.php").hide().fadeIn(1000);
                                $(".action_nav_wrapp").animate({bottom:'-100%'}, 600);
                                $("#er_section_menu").load("engine/nav-bars/section-menu/php/index.php");
                            } else {
                                //$("#er_title_box").load("engine/nav-bars/title-box/php/index.php");
                                $("#rb_" + screen_label).load("engine/" + engine + "/php/index.php?screen_label=" + screen_label + "&&screen_table=" + screen_table).hide().fadeIn(1000);
                                $("#er_action_nav").load("engine/nav-bars/action-nav/php/action-nav.php?screen_label=" + screen_label);
                                $("#er_section_menu").load("engine/nav-bars/section-menu/php/index.php");
                            }//end if/else seguradoras

                            /* ...................... */
                            var qtd = 0;
                            var run_modal = setInterval(function () {
                                $("#er_modal").load("engine/modal/php/modal.php?screen_label=" + screen_label);
                                qtd++;
                                if (qtd > 0) clearInterval(run_modal);
                            }, 400);
                            /* ...................... */

                            /* -- */

                        }//end else screenlabel==vazio

                    }//end success
                });//end method

                return false;

            }//end if != about||sair
        });//end click
    });//end doc
</script>