<?php

error_reporting(0);

    Class imovelMaster{

        function imovLocaliza($id,$show_imovel_id,$getImovelByContrato){

            include("../../../model/sessions/session-global.php");
            include("../../../model/conecta/conecta-gregorisoft.php");
            include("../../../model/conecta/conecta-imoboffice.php");

            if($getImovelByContrato=="yes"){
                $sql_contratoById = "SELECT gre_imovel_id FROM gre_contratos_loc WHERE id = $id";
                $rs_contratoById = mysqli_query($connect_imoboffice, $sql_contratoById);
                $array_contratoById = mysqli_fetch_assoc($rs_contratoById);
                $gre_imovel_id = $array_contratoById['gre_imovel_id'];
                $id = $gre_imovel_id;
            }

            $sql_imovLocaliza = "SELECT * FROM gre_imovel WHERE id = $id";
            $rs_sql_imovLocaliza = mysqli_query($connect_imoboffice, $sql_imovLocaliza);
            $fetch_imovLocaliza = mysqli_fetch_assoc($rs_sql_imovLocaliza);

            if($show_imovel_id=='yes'){
                $imovel_id = "<b>$id</b> - ";
            }else{
                $imovel_id = "";
            }

            $imo_Logradouro = trim($fetch_imovLocaliza['imo_Logradouro']);
            $imo_numero = $fetch_imovLocaliza['imo_numero'];
            $imo_Compl = $fetch_imovLocaliza['imo_Compl'];
            $imo_Compl2 = $fetch_imovLocaliza['imo_Compl2'];
            if(isset($imo_Compl)OR isset($imo_Compl2)){
                $word_separator1 = " - ";
            }
            $imo_Bairro = $fetch_imovLocaliza['imo_Bairro'];
            $imo_Cep = $fetch_imovLocaliza['imo_Cep'];
            $imo_Cidade = $fetch_imovLocaliza['imo_Cidade'];
            $imo_UF = $fetch_imovLocaliza['imo_UF'];

            $sql_imovCidade = "SELECT * FROM gre_cidade WHERE CIDADE_CODIGO = '$imo_Cidade'";
            $rs_sql_imovCidade = mysqli_query($connect_gregorisoft, $sql_imovCidade);
            $query_imovCidade = mysqli_fetch_assoc($rs_sql_imovCidade);
            $nome_cidade = $query_imovCidade['CIDADE_DESCRICAO'];
            mysqli_close($connect_gregorisoft);

            $imovLocaliza = "$imovel_id $imo_Logradouro, $imo_numero - $imo_Compl $imo_Compl2 $word_separator1 $imo_Bairro $imo_Cep - $nome_cidade/$imo_UF";

            return array($imovLocaliza,$id);

            mysqli_close($connect_imoboffice);

        }//end func imovelMaster

    }//end main class

?>



