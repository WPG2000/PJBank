<?php

Class dimobGerarArquivo{

    function sourceFieldsFor_dimobGerarArquivo($requestArray){

        $this->createDimobFile_content($requestArray);

    }

    function createDimobFile_content($requestArray){

        include("../../../../model/conecta/conecta-imoboffice.php");
        include("../../../../model/functions/acentos.php");
        include("../../../../model/functions/unMask.php");

        $anoCalendario = $requestArray[0];
        $cnpj_imobiliaria = unMask($requestArray[1]);
        $cpf_responsavelImobiliaria = unMask($requestArray[2]);
        //$endLine = PHP_EOL;
        $endLine = "\r\n";

        $selectDadosContribuinte = $this->selectDadosContribuinte();

        $dadosContribuinte_nomeFantasia = str_replace($comAcentos, $semAcentos, $selectDadosContribuinte[0]);
        $dadosContribuinte_nomeFantasia = strtoupper($dadosContribuinte_nomeFantasia);

        $dadosContribuinte_enderCompleto = str_replace($comAcentos, $semAcentos, $selectDadosContribuinte[1]);
        $dadosContribuinte_enderCompleto = strtoupper($dadosContribuinte_enderCompleto);
        $dadosContribuinte_enderCompleto = unMask($dadosContribuinte_enderCompleto);

        $dadosContribuinte_uf = $selectDadosContribuinte[2];
        $dadosContribuinte_uf = strtoupper($dadosContribuinte_uf);

        $dadosCidadeContribuinte = str_replace($comAcentos, $semAcentos, $selectDadosContribuinte[4]);

        $selectCodigoCidadeContribuinte = $this->selectCodigoCidadeContribuinte($dadosCidadeContribuinte,$dadosContribuinte_uf);
        $cidadeContribuinte_codigoRF = $selectCodigoCidadeContribuinte[0];

        //Linha01
        $createDimobFile_content ="";
        $createDimobFile_content .= str_pad("DIMOB",374,' ',STR_PAD_RIGHT);
        $createDimobFile_content .= $endLine;
        $createDimobFile_content .= str_pad("R01",3,'0',STR_PAD_LEFT);//01-Tipo
        $createDimobFile_content .= str_pad("$cnpj_imobiliaria",14,'0',STR_PAD_LEFT);//02-CNPJ do declarante
        $createDimobFile_content .= str_pad("$anoCalendario",4,'0',STR_PAD_LEFT);//03-Ano-calendario
        $createDimobFile_content .= str_pad("",1,'0',STR_PAD_RIGHT);//04-Declarac Retificadora
        $createDimobFile_content .= str_pad("",10,'0',STR_PAD_RIGHT);//05-Numero do recibo(se for retificadora)
        $createDimobFile_content .= str_pad("",1,'0',STR_PAD_RIGHT);//06-Situac Especial
        $createDimobFile_content .= str_pad("",8,'0',STR_PAD_RIGHT);//07-Data do Evento situac especial
        $createDimobFile_content .= str_pad("",2,'0',STR_PAD_RIGHT);//08-Codigo situac especial
        $createDimobFile_content .= substr(str_pad($dadosContribuinte_nomeFantasia,60,' ',STR_PAD_RIGHT),0,60);//09-Nome Empresarial
        $createDimobFile_content .= str_pad("$cpf_responsavelImobiliaria",11,'0',STR_PAD_LEFT);//10-CPF do Responsavel pela pessoa juridica perante a RFB
        $createDimobFile_content .= str_pad("$dadosContribuinte_enderCompleto",120,' ',STR_PAD_RIGHT);//11-Enderec Completo do contribuinte
        $createDimobFile_content .= str_pad("$dadosContribuinte_uf",2,' ',STR_PAD_RIGHT);//12-UF do contribuinte
        $createDimobFile_content .= str_pad("$cidadeContribuinte_codigoRF",4,'0',STR_PAD_LEFT);//13-Codigo do Municipio do Contribuinte
        $createDimobFile_content .= str_pad("",20,' ',STR_PAD_RIGHT);//14-Reservado
        $createDimobFile_content .= str_pad("",10,' ',STR_PAD_RIGHT);//15-Reservado
        $createDimobFile_content .= $endLine;//16-Delimitador de Registro

        //Linha02
        $sql_greDimob = "SELECT * FROM gre_dimob WHERE ano = $anoCalendario GROUP BY gre_contratos_loc_id ORDER BY gre_contratos_loc_id";
        $rs_sql_greDimob = mysqli_query($connect_imoboffice, $sql_greDimob);

        $numeroSequencial_increment = 1;

        while ($row = mysqli_fetch_array($rs_sql_greDimob)){

                $greDimob_greContratosLocID = $row['gre_contratos_loc_id'];
                $greDimob_greImovelID = $row['gre_imovel_id'];
                $greDimob_grePessoasID = $row['gre_pessoas_id'];
                $greDimob_proprietarioID = $row['proprietarioID'];
                $greDimob_vlrAluguel = unMask($row['vlr_aluguel']);
                $greDimob_vlrAdministracao = unMask($row['vlr_administracao']);
                $greDimob_vlrIRRF = unMask($row['vlr_irrf']);

                $selectDadosProprietario = $this->selectDadosProprietario($greDimob_proprietarioID);
                $proprietarioCPFCNPJ = unMask($selectDadosProprietario[0]);

                $proprietarioNome = str_replace($comAcentos, $semAcentos,$selectDadosProprietario[1]);
                $proprietarioNome = strtoupper($proprietarioNome);

                $selectDadosInquilino = $this->selectDadosInquilino($greDimob_grePessoasID);
                $inquilinoCPFCNPJ = unMask($selectDadosInquilino[0]);

                $inquilinoNome = str_replace($comAcentos, $semAcentos,$selectDadosInquilino[1]);
                $inquilinoNome = strtoupper($inquilinoNome);

                $selectDadosContratoLoc = $this->selectDadosContratoLoc($greDimob_greContratosLocID);
                $contratoLocDataInicio = implode("",array_reverse(explode("-",$selectDadosContratoLoc[0])));

                $selectDadosImovel = $this->selectDadosImovel($greDimob_greImovelID);

                $imovel_ender = unMask($selectDadosImovel[0]);
                $imovel_ender = str_replace($comAcentos, $semAcentos, $imovel_ender);
                $imovel_ender = strtoupper($imovel_ender);

                $imovel_cidade = $selectDadosImovel[1];
                $imovel_cidade = strtoupper($imovel_cidade);

                $imovel_CEP = unMask($selectDadosImovel[2]);

                $imovel_UF = $selectDadosImovel[3];
                $imovel_UF = strtoupper($imovel_UF);

                $cidadeCodigoRF_R02 = $selectDadosImovel[4];

                //01-Tipo
                $createDimobFile_content .= "R02";

                //02-CNPJ da filial Contribuinte (Tamanho 14 preenchido com vazios)
                $createDimobFile_content .= str_pad("$cnpj_imobiliaria",14,' ',STR_PAD_LEFT);

                //03-Ano-calendario (Tamanho 4)
                $createDimobFile_content .= str_pad("$anoCalendario",4,'0',STR_PAD_LEFT);

                //04-Numero sequencial (Tamanho 5 com zeros a esqueda)
                $createDimobFile_content .= str_pad("$numeroSequencial_increment",5,'0',STR_PAD_LEFT);

                //05-CPF/CNPJ proprietario(Tamanho 14 preenchido com vazios a direita)
                $createDimobFile_content .= str_pad("$proprietarioCPFCNPJ",14,' ',STR_PAD_RIGHT);

                //06-Nome do Proprietario (Tamanho 60 vazios a direita)
                $createDimobFile_content .= substr(str_pad("$proprietarioNome",60,' ',STR_PAD_RIGHT),0,60);

                //07-CPF/CNPJ inquilino (Tamanho 14 vazios a direita)
                $createDimobFile_content .= str_pad("$inquilinoCPFCNPJ",14,' ',STR_PAD_RIGHT);

                //08-Nome do Inquilino (Tamanho 60 vazios a direita)
                $createDimobFile_content .= substr(str_pad("$inquilinoNome",60,' ',STR_PAD_RIGHT),0,60);

                //9-ID do contrato (Tamanho 6 zero a esquerda)
                $createDimobFile_content .= str_pad("$greDimob_greContratosLocID",6,'0',STR_PAD_LEFT);

                //10-Data Inicio do Contrato (Formato diamesano DDMMYYYY)
                $createDimobFile_content .= str_pad("$contratoLocDataInicio",8,'0',STR_PAD_LEFT);

                //11,12,13 - Valor aluguel, vlr adm e vlr imposto por mes do contrato
                $valoresPorMesDoContrato = $this->valoresPorMesDoContrato($greDimob_greContratosLocID);
                $createDimobFile_content .= $valoresPorMesDoContrato;

                //14-Letra U (Tamanho 1)
                $createDimobFile_content .= str_pad("U",1,' ',STR_PAD_LEFT);

                //15-Logradouro Numero Complemento do contrato (Tamanho 60 com vazios a direita)
                $createDimobFile_content .= substr(str_pad("$imovel_ender",60,' ',STR_PAD_RIGHT),0,60);

                //16-CEP (Tamanho 8 com zero a esquerda)
                $createDimobFile_content .= str_pad("$imovel_CEP",8,'0',STR_PAD_LEFT);

                //17-Codigo RF do municipio (Tamanho 4 com zero a esquerda)
                $createDimobFile_content .= substr(str_pad("$cidadeCodigoRF_R02",4,'0',STR_PAD_LEFT),0,4);

                //18-Espaço vazio de 20 caracteres (Tamanho 20)
                $createDimobFile_content .= str_pad("",20,' ',STR_PAD_RIGHT);

                //19-UF do imovel (Tamanho 2)
                $createDimobFile_content .= str_pad("$imovel_UF",2,' ',STR_PAD_LEFT);

                //20- Espaço vazio (Tamanho 10)
                $createDimobFile_content .= str_pad("",10,' ',STR_PAD_RIGHT);

                //21- Delimitador de Registro
                $createDimobFile_content .= $endLine;

                $numeroSequencial_increment++;
        }//end while

        //rodapeh
        $createDimobFile_content .= str_pad("T9",102,' ',STR_PAD_RIGHT);//23- T9(Tamanho 102 com espaço vazio)

        $this->createDimobFile_saveInFolder($createDimobFile_content,$anoCalendario);
    }

    function createDimobFile_saveInFolder($createDimobFile_content,$anoCalendario){

        include("../../../../model/sessions/session-global.php");

        date_default_timezone_set('America/Sao_Paulo');
        $dataHjFull_fileFormat = date("d-m-Y_H-i-s");
        $horaHjFull_fileFormat = date("His");

        $filePath = "../../../../docs/dimobArquivo/$session_ARimobiliariaLoginDimob_idempr/";
        $fileName = "DIMOB".$anoCalendario."_".$horaHjFull_fileFormat."_porthus.txt";
        $filePutContent = $filePath.$fileName;

        if(!file_exists($filePath)){ mkdir($filePath, 0777, true); }

        file_put_contents($filePutContent, $createDimobFile_content);

        $this->insertGreDimobArquivoGerado($fileName);

    }

    function insertGreDimobArquivoGerado($fileName){

        include("../../../../model/conecta/conecta-imoboffice.php");

        date_default_timezone_set('America/Sao_Paulo');
        $dataHjFull = date("Y-m-d H:i:s");

        $insert_greDimobArquivoGerado = "
                                             INSERT INTO gre_dimob_arquivoGerado(
                                                            nomeArquivo,
                                                            dataHoraRegistro
                                                        )VALUES(
                                                            '$fileName',
                                                            '$dataHjFull'
                                                        )";

        $rs_insert_greDimobArquivoGerado = mysqli_query($connect_imoboffice,$insert_greDimobArquivoGerado);

        mysqli_close($connect_imoboffice);
    }

    function valoresPorMesDoContrato($greDimob_greContratosLocID){

        include("../../../../model/conecta/conecta-imoboffice.php");

        $sqlMesesPorContrato = "select * from gre_dimob where gre_contratos_loc_id = $greDimob_greContratosLocID";
        $rs_sqlMesesPorContrato = mysqli_query($connect_imoboffice, $sqlMesesPorContrato);

        $row = mysqli_fetch_assoc($rs_sqlMesesPorContrato);

        $slotMonths_01 = "000000000000000000000000000000000000000000";
        $slotMonths_02 = "000000000000000000000000000000000000000000";
        $slotMonths_03 = "000000000000000000000000000000000000000000";
        $slotMonths_04 = "000000000000000000000000000000000000000000";
        $slotMonths_05 = "000000000000000000000000000000000000000000";
        $slotMonths_06 = "000000000000000000000000000000000000000000";
        $slotMonths_07 = "000000000000000000000000000000000000000000";
        $slotMonths_08 = "000000000000000000000000000000000000000000";
        $slotMonths_09 = "000000000000000000000000000000000000000000";
        $slotMonths_10 = "000000000000000000000000000000000000000000";
        $slotMonths_11 = "000000000000000000000000000000000000000000";
        $slotMonths_12 = "000000000000000000000000000000000000000000";

        $vlr_aluguel = preg_replace("/[^0-9]/", "",$row['vlr_aluguel']);
        $vlr_administracao = preg_replace("/[^0-9]/", "",$row['vlr_administracao']);
        $vlr_irrf = preg_replace("/[^0-9]/", "",$row['vlr_irrf']);

        $mes = $row['mes'];

        switch ($mes) {
            case "01":
            case "1":
                $slotMonths_01 = str_pad("$vlr_aluguel",14,'0',STR_PAD_LEFT).str_pad("$vlr_administracao",14,'0',STR_PAD_LEFT).str_pad("$vlr_irrf",14,'0',STR_PAD_LEFT);
                break;
            case "02":
            case "2":
                $slotMonths_02 = str_pad("$vlr_aluguel",14,'0',STR_PAD_LEFT).str_pad("$vlr_administracao",14,'0',STR_PAD_LEFT).str_pad("$vlr_irrf",14,'0',STR_PAD_LEFT);
                break;
            case "03":
            case "3":
                $slotMonths_03 = str_pad("$vlr_aluguel",14,'0',STR_PAD_LEFT).str_pad("$vlr_administracao",14,'0',STR_PAD_LEFT).str_pad("$vlr_irrf",14,'0',STR_PAD_LEFT);
                break;
            case "04":
            case "4":
                $slotMonths_04 = str_pad("$vlr_aluguel",14,'0',STR_PAD_LEFT).str_pad("$vlr_administracao",14,'0',STR_PAD_LEFT).str_pad("$vlr_irrf",14,'0',STR_PAD_LEFT);
                break;
            case "05":
            case "5":
                $slotMonths_05 = str_pad("$vlr_aluguel",14,'0',STR_PAD_LEFT).str_pad("$vlr_administracao",14,'0',STR_PAD_LEFT).str_pad("$vlr_irrf",14,'0',STR_PAD_LEFT);
                break;
            case "06":
            case "6":
                $slotMonths_06 = str_pad("$vlr_aluguel",14,'0',STR_PAD_LEFT).str_pad("$vlr_administracao",14,'0',STR_PAD_LEFT).str_pad("$vlr_irrf",14,'0',STR_PAD_LEFT);
                break;
            case "07":
            case "7":
                $slotMonths_07 = str_pad("$vlr_aluguel",14,'0',STR_PAD_LEFT).str_pad("$vlr_administracao",14,'0',STR_PAD_LEFT).str_pad("$vlr_irrf",14,'0',STR_PAD_LEFT);
                break;
            case "08":
            case "8":
                $slotMonths_08 = str_pad("$vlr_aluguel",14,'0',STR_PAD_LEFT).str_pad("$vlr_administracao",14,'0',STR_PAD_LEFT).str_pad("$vlr_irrf",14,'0',STR_PAD_LEFT);
                break;
            case "09":
            case "9":
                $slotMonths_09 = str_pad("$vlr_aluguel",14,'0',STR_PAD_LEFT).str_pad("$vlr_administracao",14,'0',STR_PAD_LEFT).str_pad("$vlr_irrf",14,'0',STR_PAD_LEFT);
                break;
            case "10":
                $slotMonths_10 = str_pad("$vlr_aluguel",14,'0',STR_PAD_LEFT).str_pad("$vlr_administracao",14,'0',STR_PAD_LEFT).str_pad("$vlr_irrf",14,'0',STR_PAD_LEFT);
                break;
            case "11":
                $slotMonths_11 = str_pad("$vlr_aluguel",14,'0',STR_PAD_LEFT).str_pad("$vlr_administracao",14,'0',STR_PAD_LEFT).str_pad("$vlr_irrf",14,'0',STR_PAD_LEFT);
                break;
            case "12":
                $slotMonths_12 = str_pad("$vlr_aluguel",14,'0',STR_PAD_LEFT).str_pad("$vlr_administracao",14,'0',STR_PAD_LEFT).str_pad("$vlr_irrf",14,'0',STR_PAD_LEFT);
                break;
        }

        $slotMonths = $slotMonths_01.$slotMonths_02.$slotMonths_03.$slotMonths_04.$slotMonths_05.$slotMonths_06.$slotMonths_07.$slotMonths_08.$slotMonths_09.$slotMonths_10.$slotMonths_11.$slotMonths_12;

        $valoresPorMesDoContrato = $slotMonths;

        return($valoresPorMesDoContrato);
    }

    function selectDadosContribuinte(){

        include("../../../../model/sessions/session-global.php");
        include("../../../../model/conecta/conecta-imoboffice.php");

        $sql_dadosContribuinte = "SELECT * FROM gre_empresa WHERE id = $session_ARimobiliariaLoginDimob_idempr";
        $rs_sql_dadosContribuinte = mysqli_query($connect_imoboffice, $sql_dadosContribuinte);
        $fetch_dadosContribuinte = mysqli_fetch_assoc($rs_sql_dadosContribuinte);
        mysqli_close($connect_imoboffice);

        $dadosContribuinte_nomeFantasia = $fetch_dadosContribuinte['Nome_Fantasia'];
        $dadosContribuinte_logradouro = $fetch_dadosContribuinte['Logradouro'];
        $dadosContribuinte_numero = $fetch_dadosContribuinte['Numero'];
        $dadosContribuinte_complemento = $fetch_dadosContribuinte['Complemento'];
        $dadosContribuinte_cidade = $fetch_dadosContribuinte['Cidade'];
        $dadosContribuinte_bairro = $fetch_dadosContribuinte['Bairro'];
        $dadosContribuinte_cep = $fetch_dadosContribuinte['CEP'];
        $dadosContribuinte_uf = $fetch_dadosContribuinte['UF'];
        $dadosContribuinte_enderCompleto = "$dadosContribuinte_logradouro$dadosContribuinte_numero$dadosContribuinte_complemento$dadosContribuinte_bairro$dadosContribuinte_cep$dadosContribuinte_cidade$dadosContribuinte_uf";

        return array($dadosContribuinte_nomeFantasia,$dadosContribuinte_enderCompleto,$dadosContribuinte_uf,$dadosContribuinte_cep,$dadosContribuinte_cidade);
    }

    function selectCodigoCidadeContribuinte($dadosCidadeContribuinte,$dadosContribuinte_uf){

        $mysql_host_gregorisoft = "159.65.47.1";
        $mysql_database_gregorisoft = "gregorisoft";
        $mysql_user_gregorisoft = "gregorisoft";
        $mysql_password_gregorisoft = "0sr0p5rrur6m20";

        $connect_gregorisoft = mysqli_connect($mysql_host_gregorisoft, $mysql_user_gregorisoft, $mysql_password_gregorisoft, $mysql_database_gregorisoft);

        mysqli_set_charset($connect_gregorisoft,"utf8");

        $sql_cidadeContribuinte = "SELECT CODIGO_RF FROM gre_cidade WHERE ((CIDADE_DESCRICAO = '$dadosCidadeContribuinte' AND UFE_SG = '$dadosContribuinte_uf') OR CIDADE_CODIGO='$dadosCidadeContribuinte')";
        $rs_sql_cidadeContribuinte = mysqli_query($connect_gregorisoft, $sql_cidadeContribuinte);
        $fetch_cidadeContribuinte = mysqli_fetch_assoc($rs_sql_cidadeContribuinte);

        $cidadeContribuinte_codigoRF = $fetch_cidadeContribuinte['CODIGO_RF'];

        mysqli_close($connect_gregorisoft);

        return array($cidadeContribuinte_codigoRF);
    }

    function selectDadosProprietario($greDimob_proprietarioID){

        include("../../../../model/conecta/conecta-imoboffice.php");

        $sql_dadosProprietario = "SELECT Nome_Fantasia,CPFCNPJ FROM gre_pessoas WHERE id = $greDimob_proprietarioID";
        $rs_sql_dadosProprietario = mysqli_query($connect_imoboffice, $sql_dadosProprietario);
        $fetch_dadosProprietario = mysqli_fetch_assoc($rs_sql_dadosProprietario);

        $dadosProprietario_CPFCNPJ = $fetch_dadosProprietario['CPFCNPJ'];
        $dadosProprietario_nomeFantasia = $fetch_dadosProprietario['Nome_Fantasia'];

        mysqli_close($connect_imoboffice);

        return array($dadosProprietario_CPFCNPJ,$dadosProprietario_nomeFantasia);
    }

    function selectDadosInquilino($greDimob_grePessoasID){

        include("../../../../model/conecta/conecta-imoboffice.php");

        $sql_dadosInquilino = "SELECT Nome_Fantasia,CPFCNPJ FROM gre_pessoas WHERE id = $greDimob_grePessoasID";
        $rs_sql_dadosInquilino = mysqli_query($connect_imoboffice, $sql_dadosInquilino);
        $fetch_dadosInquilino = mysqli_fetch_assoc($rs_sql_dadosInquilino);

        $dadosInquilino_CPFCNPJ = $fetch_dadosInquilino['CPFCNPJ'];
        $dadosInquilino_nomeFantasia = $fetch_dadosInquilino['Nome_Fantasia'];

        mysqli_close($connect_imoboffice);

        return array($dadosInquilino_CPFCNPJ,$dadosInquilino_nomeFantasia);
    }

    function selectDadosContratoLoc($greDimob_greContratosLocID){

        include("../../../../model/conecta/conecta-imoboffice.php");

        $sql_dadosContratoLoc = "SELECT Data_Inicio FROM gre_contratos_loc WHERE id = $greDimob_greContratosLocID";
        $rs_sql_dadosContratoLoc = mysqli_query($connect_imoboffice, $sql_dadosContratoLoc);
        $fetch_dadosContratoLoc = mysqli_fetch_assoc($rs_sql_dadosContratoLoc);

        $dadosContratoLoc_DataInicio = $fetch_dadosContratoLoc['Data_Inicio'];

        mysqli_close($connect_imoboffice);

        return array($dadosContratoLoc_DataInicio);
    }

    function selectDadosImovel($greDimob_greImovelID){

        include("../../../../model/conecta/conecta-imoboffice.php");

        $sql_dadosImovel = "SELECT * FROM gre_imovel WHERE id = $greDimob_greImovelID";
        $rs_sql_dadosImovel = mysqli_query($connect_imoboffice, $sql_dadosImovel);
        $fetch_dadosImovel = mysqli_fetch_assoc($rs_sql_dadosImovel);

        $dadosImovel_imoLogradouro = $fetch_dadosImovel['imo_Logradouro'];
        $dadosImovel_imoNumero = $fetch_dadosImovel['imo_numero'];
        $dadosImovel_imoComplemento = $fetch_dadosImovel['imo_Compl'];
        $dadosImovel_imoCidade = $fetch_dadosImovel['imo_Cidade'];
        $dadosImovel_imoCEP = $fetch_dadosImovel['imo_CEP'];
        $dadosImovel_imoUF = $fetch_dadosImovel['imo_UF'];
        $dadosImovel_ender = $dadosImovel_imoLogradouro.$dadosImovel_imoNumero.$dadosImovel_imoComplemento;

        $selectCodigoRFcidade = $this->selectCodigoCidadeContribuinte($dadosImovel_imoCidade,"");
        $cidadeCodigoRF_R02 = $selectCodigoRFcidade[0];

        mysqli_close($connect_imoboffice);

        return array($dadosImovel_ender,$dadosImovel_imoCidade,$dadosImovel_imoCEP,$dadosImovel_imoUF,$cidadeCodigoRF_R02);
    }

}//end mainClass

?>