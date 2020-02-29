<?php

    Class dimobCalcular{

        function sourceFieldsFor_GreDimob($ano){

            $this->deleteNotEditedsRows($ano);

            return array();
        }

        function deleteNotEditedsRows($ano){
            include("../../../../model/sessions/session-global.php");
            include("../../../../model/conecta/conecta-imoboffice.php");

            $sql_deleteNotEditedsRows = "DELETE FROM gre_dimob WHERE editado='NAO'";
            $rs_sql_deleteNotEditedsRows = mysqli_query($connect_imoboffice, $sql_deleteNotEditedsRows);

            mysqli_close($connect_imoboffice);

            $this->selectSourceFields($ano);
        }

        function selectSourceFields($ano){

            include("../../../../model/sessions/session-global.php");
            include("../../../../model/conecta/conecta-imoboffice.php");

            $sql_sourceFieldsFor_GreDimob = "
                                             SELECT                             
                                                contrato.ID AS CODIGO_CONTRATO,
                                                contrato.gre_imovel_id,
                                                contrato.Valor_Aluguel,
                                                contrato.gre_pessoas_id AS inquilinoID,
                                                eventos.Referencia,                                                
                                                dem.ID AS ID_DEMO,
                                                dem.Data_Repassado,
                                                gre_lanctos.Data_Pagamento,
                                                gre_benefic.Percentual, 
                                                gre_benefic.gre_pessoas_id as proprietarioID,                                                                                                          
                                              (
                                              (SELECT COALESCE(SUM(Valor), 0) FROM gre_eventos rb Inner Join gre_taxas ON gre_taxas.ID = rb.gre_taxas_id WHERE rb.gre_extratos_id = dem.ID AND rb.gre_contratos_loc_id = contrato.id AND gre_taxas.id = 1 AND rb.Creditar_para = 'Proprietario')-
                                              (SELECT COALESCE(SUM(Valor), 0) FROM gre_eventos rb Inner Join gre_taxas ON gre_taxas.ID = rb.gre_taxas_id WHERE rb.gre_extratos_id = dem.ID AND rb.gre_contratos_loc_id = contrato.id AND gre_taxas.id = 1 AND rb.Cobrar_de = 'Proprietario')
                                              ) AS RENDA_BRUTA,   
                                              
                                              (                                                                                                                                                                                                 
                                              (SELECT COALESCE(SUM(Valor), 0) FROM gre_eventos rb Inner Join gre_taxas ON gre_taxas.ID = rb.gre_taxas_id WHERE rb.gre_extratos_id = dem.ID AND (rb.gre_contratos_loc_id = contrato.id OR rb.gre_extratos_id = dem.id) AND (gre_taxas.id = 2 OR gre_taxas.id = 3) AND rb.Creditar_para = 'Imobiliaria')                                                          
                                              ) AS TX_ADM,
                                             
                                             (SELECT COALESCE(SUM(Valor), 0) FROM gre_eventos rb Inner Join gre_taxas ON gre_taxas.ID = rb.gre_taxas_id WHERE rb.gre_extratos_id = dem.ID AND rb.gre_contratos_loc_id = contrato.id AND gre_taxas.id = 19) AS IRRF            
                                             
                                             FROM 
                                                gre_eventos eventos            
                                             INNER JOIN gre_imovel ON gre_imovel.id = eventos.gre_imovel_id
                                             INNER JOIN gre_benefic ON gre_benefic.gre_imovel_id = gre_imovel.id 
                                             INNER JOIN gre_extratos dem ON dem.id = eventos.gre_extratos_id and gre_benefic.gre_pessoas_id = dem.gre_pessoas_id
                                             INNER JOIN gre_contratos_loc contrato ON contrato.id = eventos.gre_contratos_loc_id
                                             INNER JOIN gre_lanctos ON gre_lanctos.gre_extratos_id = dem.id AND gre_lanctos.gre_extratos_id = dem.id                                                                                                                                                
                                            GROUP BY 
                                                gre_benefic.gre_pessoas_id ,contrato.id,dem.id             
                                            ORDER BY 
                                                gre_benefic.gre_pessoas_id,contrato.id, dem.id 
                                            DESC              
                                            ";

            $rs_sql_sourceFieldsFor_GreDimob = mysqli_query($connect_imoboffice, $sql_sourceFieldsFor_GreDimob);
            $rs_sql_sourceFieldsFor_GreDimob_numRows = mysqli_num_rows($rs_sql_sourceFieldsFor_GreDimob);

            if($rs_sql_sourceFieldsFor_GreDimob_numRows > 0) {
               $this->fillGreDimob($ano,$rs_sql_sourceFieldsFor_GreDimob);
            }//end if>0

            mysqli_close($connect_imoboffice);
        }

        function fillGreDimob($ano,$rs_sql_sourceFieldsFor_GreDimob){

            date_default_timezone_set('America/Sao_Paulo');
            $dataHjFull = date("Y-m-d H:i:s");

            include("../../../../model/sessions/session-global.php");
            include("../../../../model/conecta/conecta-imoboffice.php");

            while ($row = mysqli_fetch_array($rs_sql_sourceFieldsFor_GreDimob)) {

                    $CODIGO_CONTRATO = $row['CODIGO_CONTRATO'];
                    $RENDA_BRUTA = $row['RENDA_BRUTA'];
                    $TX_ADM = $row['TX_ADM'];
                    $IRRF = $row['IRRF'];
                    $ID_DEMO = $row['ID_DEMO'];

                    $Data_Pagamento = $row['Data_Pagamento'];
                    $Data_Pagamento_explode = explode("-",$Data_Pagamento);
                    $Data_PagamentoAno = $Data_Pagamento_explode[0];

                    $Data_Repassado = $row['Data_Repassado'];
                    $Data_Repassado_explode = explode("-",$Data_Repassado);
                    $Data_RepassadoAno = $Data_Repassado_explode[0];

                    $proprietarioID = $row['proprietarioID'];
                    $inquilinoID = $row['inquilinoID'];
                    $gre_imovel_id = $row['gre_imovel_id'];

                    $evento_referencia = $row['Referencia'];
                    $evento_referencia = explode("/",$evento_referencia);
                    $evento_referenciaMes = $evento_referencia[0];
                    $evento_referenciaAno = $evento_referencia[1];

                    //verificar gre_extrato_id e proprietarioID
                    $sql_insert_GreDimob = "
                                             INSERT INTO gre_dimob(
                                                            gre_contratos_loc_id,
                                                            gre_imovel_id,
                                                            gre_pessoas_id,
                                                            proprietarioID,
                                                            mes,
                                                            ano,
                                                            vlr_aluguel,
                                                            vlr_administracao,
                                                            vlr_irrf,
                                                            gre_extratos_id,
                                                            data_hora,
                                                            divide_ir,
                                                            renda_bruta,
                                                            adm_bruta,
                                                            valor_ir_total,
                                                            desc_renda,
                                                            desc_adm,
                                                            data_repassado,
                                                            editado,
                                                            user_nome
                                                        )VALUES(
                                                            '$CODIGO_CONTRATO',
                                                            '$gre_imovel_id',
                                                            '$inquilinoID',
                                                            '$proprietarioID',
                                                            '$evento_referenciaMes',
                                                            '$evento_referenciaAno',
                                                            '$RENDA_BRUTA',
                                                            '$TX_ADM',
                                                            '$IRRF',
                                                            '$ID_DEMO',
                                                            '$dataHjFull',
                                                            '',
                                                            '$RENDA_BRUTA',
                                                            '$TX_ADM',
                                                            '$IRRF',
                                                            '',
                                                            '',
                                                            '$Data_Pagamento',
                                                            'NAO',
                                                            ''
                                                        )
                                                    ";

                    if($Data_PagamentoAno==$ano){
                        $rs_sql_insert_GreDimob = mysqli_query($connect_imoboffice, $sql_insert_GreDimob);
                    }

            }//end while dimobCalcular

            mysqli_close($connect_imoboffice);

            $this->deleteNotEditedEquivalentRows();
        }

        function deleteNotEditedEquivalentRows(){

            include("../../../../model/sessions/session-global.php");
            include("../../../../model/conecta/conecta-imoboffice.php");

            $sql_deleteNotEditedEquivalentRows = "
                                                    select *, count(*) as repeticoes, max(id) as ultimo_registro
                                                    from gre_dimob
                                                    group by proprietarioID,gre_extratos_id,data_repassado,mes
                                                    having count(*) > 1
                                                  ";
            $rs_sql_deleteNotEditedEquivalentRows = mysqli_query($connect_imoboffice, $sql_deleteNotEditedEquivalentRows);
            $deleteNotEditedEquivalentRows_numRows = mysqli_num_rows($rs_sql_deleteNotEditedEquivalentRows);

            if($deleteNotEditedEquivalentRows_numRows > 0){

                while ($row = mysqli_fetch_array($rs_sql_deleteNotEditedEquivalentRows)) {
                        $ultimo_registro = $row['ultimo_registro'];

                        $deleteNotEditedEquivalentRows = "DELETE FROM gre_dimob WHERE id=$ultimo_registro";
                        $rs_deleteNotEditedEquivalentRows = mysqli_query($connect_imoboffice, $deleteNotEditedEquivalentRows);
                }

            }
            mysqli_close($connect_imoboffice);
        }

        function dimobTotalRegistrosCalculados(){
            include("../../../../model/sessions/session-global.php");
            include("../../../../model/conecta/conecta-imoboffice.php");

            $sql_dimobTotalRegistrosCalculados = "SELECT * FROM gre_dimob";
            $rs_sql_dimobTotalRegistrosCalculados = mysqli_query($connect_imoboffice, $sql_dimobTotalRegistrosCalculados);
            $dimobTotalRegistrosCalculados = mysqli_num_rows($rs_sql_dimobTotalRegistrosCalculados);

            mysqli_close($connect_imoboffice);

            return ($dimobTotalRegistrosCalculados);
        }

    }//end class dimobCalcular

?>