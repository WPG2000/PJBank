
$(document).ready(function(){

    $("table").css({opacity:'1'});

    if(screen_label_session=="repasses"){

        $('.table_'+screen_label_session).DataTable({
            //"autoWidth": true,
            "lengthChange":false,
            "pageLength": 12,
            "filter":true,
            "responsive":responsive_config,
            //"scrollY": "400px",

            "columnDefs": [
                { "visible": false, "targets": group_target },
                { className: "desktop", "targets": [ group_target ],  },
            ],
            "order": [[ group_target, 'asc' ]],
            "displayLength": 10,
            "drawCallback": function ( settings ) {
                var api = this.api();
                var rows = api.rows( {page:'current'} ).nodes();
                var last=null;
                var group_label = "&nbsp Proprietário: ";

                api.column(group_target, {page:'current'} ).data().each( function ( group, i ) {

                    if ( last !== group ) {
                        $(rows).eq( i ).before(
                            '<tr class="group"><td colspan="5">'+group_label+group+'</td></tr>'
                        );
                        last = group;
                    }//end if

                });//end api_column

            }//end func settings

        });//end dataTable

    }else if(screen_label_session=="meus_arquivos"){

        $('.table_'+screen_label_session).DataTable({
            //"autoWidth": true,
            "lengthChange":false,
            "pageLength": 12,
            "filter":true,
            "ordering": false,
            "responsive":responsive_config,
            //"scrollY": "400px",

            "columnDefs": [
                { "visible": false, "targets": group_target },
                { className: "desktop", "targets": [ group_target ],  },
            ],
            "order": [[ group_target, 'asc' ]],
            "displayLength": 10,
            "drawCallback": function ( settings ) {
                var api = this.api();
                var rows = api.rows( {page:'current'} ).nodes();
                var last=null;
                var group_label = "Contrato: ";

                api.column(group_target, {page:'current'} ).data().each( function ( group, i ) {

                    if ( last !== group ) {
                        $(rows).eq( i ).before(
                            '<tr class="group"><td colspan="5">'+group_label+group+'</td></tr>'
                        );
                        last = group;
                    }//end if

                });//end api_column

            }//end func settings

        });//end dataTable

    }else{


        $('.table_'+screen_label_session).DataTable({
            //"autoWidth": true,
            "lengthChange":false,
            "pageLength": 10,
            "filter":true,
            "responsive":true,
        });//end dataTable

    }//end if/else

});//end doc

