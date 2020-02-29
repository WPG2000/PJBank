<?php

error_reporting(0);

Class proprietarioMaster{

    function proprietarioDados($idContrato,$show_proprietario_id){

        $queryString = explode("&&",$_SERVER['QUERY_STRING']);
        $queryString = $queryString[2];

        if($queryString=="details=yes"){
            $pathConfig = "../../../..";
        }else{
            $pathConfig = "../../..";
        }

        include("$pathConfig/model/sessions/session-global.php");
        include("$pathConfig/model/conecta/conecta-gregorisoft.php");
        include("$pathConfig/model/conecta/conecta-imoboffice.php");

        $sql_contratoById = "SELECT * FROM gre_contratos_loc WHERE id = $idContrato";
        $rs_sql_contratoById = mysqli_query($connect_imoboffice, $sql_contratoById);
        $fetch_contratoById = mysqli_fetch_assoc($rs_sql_contratoById);
        $imovelId_byContrato = $fetch_contratoById['gre_imovel_id'];

        $sql_greBeneficByImovelId = "SELECT * FROM gre_benefic WHERE gre_imovel_id = $imovelId_byContrato";
        $rs_sql_greBeneficByImovelId = mysqli_query($connect_imoboffice, $sql_greBeneficByImovelId);
        $fetch_greBeneficByImovelId = mysqli_fetch_assoc($rs_sql_greBeneficByImovelId);
        $pessoaId_byGreBenefic = $fetch_greBeneficByImovelId['gre_pessoas_id'];

        if($show_proprietario_id=='yes'){
            $proprietario_id = "<b>$pessoaId_byGreBenefic</b> - ";
        }else{
            $proprietario_id = "";
        }
        $sql_proprietarioDados = "SELECT * FROM gre_pessoas WHERE id = $pessoaId_byGreBenefic";
        $rs_sql_proprietarioDados = mysqli_query($connect_imoboffice, $sql_proprietarioDados);
        $fetch_proprietarioDados = mysqli_fetch_assoc($rs_sql_proprietarioDados);
        $proprietario_NomeFantasia = $fetch_proprietarioDados['Nome_Fantasia'];
        $proprietario_CPFCNPJ = $fetch_proprietarioDados['CPFCNPJ'];
        $proprietarioDados = "$proprietario_id $proprietario_NomeFantasia";

        mysqli_close($connect_imoboffice);

        return array($proprietarioDados,$proprietario_CPFCNPJ);

    }//end func proprietarioDados

}//end main class

?>



