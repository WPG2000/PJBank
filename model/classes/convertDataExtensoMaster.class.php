<?php

    /*
     *
     *** wpg ***
     *
     * $DataExtensoMaster_sourceValueNumbers = valor numerico relacionado a data, pode ser o mesApenas ou a data inteira. Se for a data de hj o valor deve ser vazio;
     * $DataExtensoMaster_sourceValueFormat = 'fullDate','monthOnly'; Informe se vc estah enviando a data inteira ou somente o mes;
     * $DataExtensoMaster_sourceValueStored = 'today', 'userGets'; Informe se a data enviada eh de sua escolha(manual/bd) ou se equivalente a dataDeHj;
     *
     * - variaveis de saida:
     * - $DataExtensoMaster_mes = $DataExtensoMaster[0];
     * - $DataExtensoMaster_full = $DataExtensoMaster[1]
     *
     * *********
     *
     * */

    Class convertDataExtensoMaster{

        function DataExtensoMaster($DataExtensoMaster_sourceValueNumbers,$DataExtensoMaster_sourceValueFormat,$DataExtensoMaster_sourceValueStored){

            //DataExtensoMaster_sourceValueStored userGets
            if($DataExtensoMaster_sourceValueStored=="today") {
                $DataExtensoMaster_sourceValueNumbers = date("Y-m-d");
            }
            if($DataExtensoMaster_sourceValueStored=="userGets") {
                $DataExtensoMaster_sourceValueNumbers = $DataExtensoMaster_sourceValueNumbers;
            }

            //DataExtensoMaster_sourceValueFormat
            if($DataExtensoMaster_sourceValueFormat=="fullDate"){
                $DataExtensoMaster_sourceValueNumbers = explode("-",$DataExtensoMaster_sourceValueNumbers);
                $DataExtensoMaster_sourceValueFormat_dia = $DataExtensoMaster_sourceValueNumbers[2];
                $DataExtensoMaster_sourceValueFormat_mes = $DataExtensoMaster_sourceValueNumbers[1];
                $DataExtensoMaster_sourceValueFormat_ano = $DataExtensoMaster_sourceValueNumbers[0];
            }
            if($DataExtensoMaster_sourceValueFormat=="monthOnly"){
                $DataExtensoMaster_sourceValueFormat_mes = $DataExtensoMaster_sourceValueNumbers;
            }

            //DataExtensoMaster_sourceValueFormat_mes
            switch ($DataExtensoMaster_sourceValueFormat_mes) {
                case "01":    $mes = Janeiro;     break;
                case "02":    $mes = Fevereiro;   break;
                case "03":    $mes = Março;       break;
                case "04":    $mes = Abril;       break;
                case "05":    $mes = Maio;        break;
                case "06":    $mes = Junho;       break;
                case "07":    $mes = Julho;       break;
                case "08":    $mes = Agosto;      break;
                case "09":    $mes = Setembro;    break;
                case "10":    $mes = Outubro;     break;
                case "11":    $mes = Novembro;    break;
                case "12":    $mes = Dezembro;    break;
            }

            $DataExtensoMaster_full = $DataExtensoMaster_sourceValueFormat_dia." de ".$mes." de ".$DataExtensoMaster_sourceValueFormat_ano;

            return array($mes,$DataExtensoMaster_full);

        }//end func

    }//end class

?>