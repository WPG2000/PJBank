if(
    (screen_label_session=='manutenc_solic')||
    (screen_label_session=='pedido_desocup')||
    (screen_label_session=='ressarcimento')||
    (screen_label_session=='mensagem')
){

    $(".gft_recept_create_new").load("engine/dynamic-grid/php/application-dynamic-grid-filters/dynamic-grid-create-new.php");

}//end if