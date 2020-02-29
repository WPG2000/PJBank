$("#er_header").load("engine/nav-bars/header/php/header.php");
$("#er_title_box").load("engine/nav-bars/title-box/php/index.php").hide().fadeIn(2000);
$("#er_menu_manager").load("engine/nav-bars/menu-manager/php/index.php");
$("#er_modal").load("engine/modal/php/modal.php?screen_label="+screen_label_session);
//$("#er_pin_box").load("engine/pin-box/index.php");

setTimeout(function(){
    $("#er_reminder_tag").load("engine/reminder-tag/php/index.php");
}, 4000);