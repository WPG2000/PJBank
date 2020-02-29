<?php
error_reporting(0);

session_start();

$session_ARimobiliariaLoginDimob_key = $_SESSION['ARimobiliariaLoginDimob_key'];
$session_ARimobiliariaLoginDimob_idempr = $_SESSION['ARimobiliariaLoginDimob_idempr'];
$session_ARimobiliariaLoginDimob_NomeFantasia = $_SESSION['ARimobiliariaLoginDimob_NomeFantasia'];

$id_empr_key = $_SESSION['id_empr_key'];
$id_empr = $_SESSION['id_empr'];
$id_usuario_logado = $_SESSION['id_usuario_logado'];

$CPFCNPJ_usuario_logado = $_SESSION['CPFCNPJ'];

$tipo_Repasse_usuario_logado = $_SESSION['tipo_Repasse'];
$dia_Repasse_usuario_logado = $_SESSION['dia_Repasse_usuario_logado'];
$forma_Pagto_usuario_logado = $_SESSION['forma_Pagto'];

$nome_cliente = $_SESSION['Nome_Cliente'];//$nome_cliente = utf8_encode($_SESSION['Nome_Cliente']);

$primeiro_nome_cli = explode(" ", $nome_cliente);
$primeiro_nome_cli = $primeiro_nome_cli[0];

$url_cliente = $_SESSION['url'];
$site_cliente = $_SESSION['hiddenAuthSite_session'];

$login = $_SESSION['login'];
$senha = $_SESSION['senha'];

$user_loc_session = $_SESSION['Inquilino'];
$user_prop_session = $_SESSION['Proprietario'];

if($user_loc_session=="SIM"){
	$tipo_de_usuario = "Inquilino";
}
if($user_prop_session=="SIM"){
	$tipo_de_usuario = "Proprietário";
}

$IDLOCADOR = $_SESSION['id'];

$erro_user_senha = $_SESSION['erro_user_senha'];

$gre_bancos_id_gre_pessoas = $_SESSION['gre_bancos_id_gre_pessoas'];
$Agencia_gre_pessoas = $_SESSION['Agencia_gre_pessoas'];
$Agencia_Dig_gre_pessoas = $_SESSION['Agencia_Dig_gre_pessoas'];			
$Conta_gre_pessoas = $_SESSION['Conta_gre_pessoas'];
$Conta_Dig_gre_pessoas = $_SESSION['Conta_Dig_gre_pessoas'];
$email_gre_pessoas = $_SESSION['email_gre_pessoas'];
$Favorecido_gre_pessoas = $_SESSION['Favorecido_gre_pessoas'];
$Favorecido_CPFCNPJ_gre_pessoas = $_SESSION['Favorecido_CPFCNPJ_gre_pessoas'];
$dados_bancarios_usuario_logado = "Agência: ".$Agencia_gre_pessoas." - ".$Agencia_Dig_gre_pessoas." / "." Conta: ".$Conta_gre_pessoas." - ".$Conta_Dig_gre_pessoas;

$Nome_Fantasia_gre_empresa = $_SESSION['Nome_Fantasia_gre_empresa'];
$Razzao_Social_gre_empresa = $_SESSION['Razzao_Social_gre_empresa'];
$CPF_CNPJ_gre_empresa = $_SESSION['CPF_CNPJ_gre_empresa'];					
$Logradouro_gre_empresa = $_SESSION['Logradouro_gre_empresa'];					
$Numero_gre_empresa = $_SESSION['Numero_gre_empresa'];					
$Complemento_gre_empresa = $_SESSION['Complemento_gre_empresa'];
$Cidade_gre_empresa = mb_convert_case($_SESSION['Cidade_gre_empresa'], MB_CASE_TITLE, "UTF-8");
$Bairro_gre_empresa = $_SESSION['Bairro_gre_empresa'];
$CEP_gre_empresa = $_SESSION['CEP_gre_empresa'];
$UF_gre_empresa = $_SESSION['UF_gre_empresa'];
$Email_gre_empresa = $_SESSION['Email_gre_empresa'];
$Telefone_gre_empresa = $_SESSION['Telefone_gre_empresa'];
$CRECI_gre_empresa = $_SESSION['CRECI_gre_empresa'];
$ender_empresa = $Logradouro_gre_empresa." ".$Numero_gre_empresa." / ".$Complemento_gre_empresa." ".$Bairro_gre_empresa." - ".$Cidade_gre_empresa." - ".$UF_gre_empresa;

$preference_email_area_restrita = $_SESSION['preference_email_area_restrita'];
if($preference_email_area_restrita=="suporte@gregorisoft.com.br"){
	$informar_cadastro_email_pref = "Se essa mensagem chegou no email suporte, informe ao cliente para realizar o cadastro de seu email nas preferências do Porthus.";
}else{
	$informar_cadastro_email_pref = "";
}
?>