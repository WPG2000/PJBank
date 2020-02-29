<meta charset="utf-8">

<div class="dropdown_wrapp">
    <div class="dropdown_box">

        <div class="dropdown_btn">
            <li>
                <span class="icon icon-menu6"></span>
                <span class="text"></span>
            </li>
        </div><!-- /dropdown_btn -->

        <div class="dropdown_body">

            <div class="ddown_arrow">
                <span class="icon icon-arrow_drop_up"></span>
            </div><!-- /ddown_arrow-->

            <div class="ddown_list">
                [@list_lines]
            </div><!-- /ddown_list-->

        </div><!-- /dropdown_body -->

    </div><!-- /dropdown_box -->
</div><!-- /dropdown_wrapp-->

<script>
    $(document).ready(function () {

        /* -- */

        /* ........................ DropdownBox .............................. */
        $(".dropdown_btn").click(function (e) {
            $(".dropdown_body").fadeOut(200);
            var drop_body = $(".dropdown_body").is(":visible");
            if (drop_body == true) {
                $(".dropdown_body").fadeOut(200);
                $(".dropdown_btn").removeClass("dropdown_btn_active");
            } else {
                $(this).parent().find(".dropdown_body").fadeIn(5);
                $(".dropdown_btn").removeClass("dropdown_btn_active");
                $(this).addClass("dropdown_btn_active");
            }
            e.stopPropagation();
        });//end click
        $(".dropdown_body li").click(function () {
            $(".dropdown_body").fadeOut(200);
            $(".dropdown_btn").removeClass("dropdown_btn_active");
        });//end click
        $(document).on('click', function (e) {
            $(".dropdown_body").fadeOut(200);
            $(".dropdown_btn").removeClass("dropdown_btn_active");
        });//end click
        /* ....................... /DropdownBox .............................. */

        /* -- */

    });//end doc
</script>