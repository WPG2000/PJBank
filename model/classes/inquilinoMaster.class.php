<?php

error_reporting(0);

Class inquilinoMaster{

    function inquilinoDados($id,$show_inquilino_id){

        include("../../../model/sessions/session-global.php");
        include("../../../model/conecta/conecta-gregorisoft.php");
        include("../../../model/conecta/conecta-imoboffice.php");

        $sql_inquilinoDados = "SELECT * FROM gre_pessoas WHERE id = $id";
        $rs_sql_inquilinoDados = mysqli_query($connect_imoboffice, $sql_inquilinoDados);
        $fetch_inquilinoDados = mysqli_fetch_assoc($rs_sql_inquilinoDados);

        if($show_inquilino_id=='yes'){
            $inquilino_id = "<b>$id</b> - ";
        }else{
            $inquilino_id = "";
        }

        $inquilino_NomeFantasia = $fetch_inquilinoDados['Nome_Fantasia'];
        $inquilino_CPFCNPJ = $fetch_inquilinoDados['CPFCNPJ'];

        $inquilinoDados = "$inquilino_id $inquilino_NomeFantasia";

        mysqli_close($connect_imoboffice);

        return array($inquilinoDados,$inquilino_CPFCNPJ);

    }//end func inquilinoDados

}//end main class

?>



