<?php
/*
require('class.phpmailer.php');
$mail = new PHPMailer();

$body = "Cuerpo del mensaje";

$mail->isSMTP(); 

// la dirección del servidor, p. ej.: smtp.servidor.com
$mail->Host = "mx1.hostinger.es";

// dirección remitente, p. ej.: no-responder@miempresa.com
$mail->From = "foro@zoroak-eroak.com";

// nombre remitente, p. ej.: "Servicio de envío automático"
$mail->FromName = "Foro Zoroak";
$mail->Port = 2525;
//$mail->SMTPSecure = 'plain';
// asunto y cuerpo alternativo del mensaje
$mail->Subject = "Asunto";
$mail->AltBody = "Cuerpo alternativo 
    para cuando el visor no puede leer HTML en el cuerpo"; 

// si el cuerpo del mensaje es HTML
$mail->MsgHTML($body);

// podemos hacer varios AddAdress
$mail->AddAddress("beinatr@gmail.com", "Beinat");

// si el SMTP necesita autenticación
$mail->SMTPAuth = true;
$mail->WordWrap   = 50;

// credenciales usuario
$mail->Username = "foro@zoroak-eroak.com";
$mail->Password = "ZoroForo159753"; 

if(!$mail->Send()) {
echo "Error enviando: " . $mail->ErrorInfo;
} else {
echo "¡¡Enviado!!";
}
die();*/
?>


<?php
/**
*
* @package phpBB3
* @version $Id$
* @copyright (c) 2005 phpBB Group
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
*
*/

/**
* @ignore
*/

$pass = $_POST['q5_password'];

$msg = $_POST['q3_mensaje'];
$asunto = $_POST['q4_asunto'];

if ($pass == "" || $msg == "" || $asunto == ""):
?>
<html><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="alternate" type="application/json+oembed" href="https://www.jotform.com/oembed/?format=json&amp;url=http%3A%2F%2Fwww.jotform.com%2Fform%2F41594529949371" title="oEmbed Form"><link rel="alternate" type="text/xml+oembed" href="https://www.jotform.com/oembed/?format=xml&amp;url=http%3A%2F%2Fwww.jotform.com%2Fform%2F41594529949371" title="oEmbed Form">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<meta name="HandheldFriendly" content="true">
<title>Formulario</title>
<link href="http://max.jotfor.ms/static/formCss.css?3.2.2177" rel="stylesheet" type="text/css">
<link type="text/css" rel="stylesheet" href="http://max.jotfor.ms/css/styles/nova.css?3.2.2177">
<link type="text/css" media="print" rel="stylesheet" href="http://max.jotfor.ms/css/printForm.css?3.2.2177">
<style type="text/css">
    .form-label{
        width:150px !important;
    }
    .form-label-left{
        width:150px !important;
    }
    .form-line{
        padding-top:12px;
        padding-bottom:12px;
    }
    .form-label-right{
        width:150px !important;
    }
    body, html{
        margin:0;
        padding:0;
        background:false;
    }

    .form-all{
        margin:0px auto;
        padding-top:0px;
        width:850px;
        color:#555 !important;
        font-family:'Lucida Grande';
        font-size:14px;
    }
</style>

<script src="http://max.jotfor.ms/static/prototype.forms.js" type="text/javascript"></script>
<script src="http://max.jotfor.ms/static/jotform.forms.js?3.2.2177" type="text/javascript"></script>
<script type="text/javascript" src="js/tinymce/tinymce.min.js"></script>

<script type="text/javascript">

	tinymce.init({
	    selector: "textarea"
	 });

   JotForm.init(function(){
      JotForm.alterTexts({"required":"Campo requerido.","requireOne":"Por lo menos un campo requerido","requireEveryRow":"Todas las filas son obligatorias.","alphabetic":"Este campo solo puede contener letras","numeric":"Este campo sólo admite valores numéricos","alphanumeric":"Este campo solo puede contener letras y números.","currency":"This field can only contain currency values.","incompleteFields":"Existen campos requeridos incompletos. Por favor complételos.","uploadFilesize":"Tamaño del archivo no puede ser mayor que:","confirmClearForm":"¿Está seguro de querer borra el formulario?","lessThan":"Tu cuenta debería ser menor o igual que","email":"Introduzca una dirección e-mail válida","uploadExtensions":"Solo puede subir los siguientes archivos:","pleaseWait":"Por favor, espere ...","confirmEmail":"Correo electrónico no coincide","submissionLimit":"¡Lo siento! Sólo se permite una entrada. Múltiples envíos están desactivados para este formulario.","gradingScoreError":"El puntaje total debería ser sólo \"menos que\" o \"igual que\"","inputCarretErrorA":"El valor introducido no puede ser menor que el mínimo especificado:","inputCarretErrorB":"Entrada no debe ser mas grande que el valor maximo:","maxDigitsError":"El máximo de dígitos permitido es","minSelectionsError":"El número mínimo de selección requerido es","maxSelectionsError":"El número máximo de selecciones es","pastDatesDisallowed":"La fecha debe ser futura","multipleFileUploads_typeError":"El fichero {file} posee una extensión no permitida. Sólo están permitidas las extensiones {extensions}.","multipleFileUploads_sizeError":"{file} es demasiado grande; el tamaño del archivo no debe superar los {sizeLimit}.","multipleFileUploads_minSizeError":"{file} is demasiado pequeño, el tamaño mínimo de fichero es: {minSizeLimit}.","multipleFileUploads_emptyError":"El fichero {file} está vacío; por favor, selecciona de nuevo los ficheros sin él.","multipleFileUploads_onLeave":"Se están cargando los ficheros, si cierras ahora, se cancelará dicha carga.","generalError":"Existen errores en el formulario, por favor corríjalos antes de continuar.","generalPageError":"Hay errores en esta página. Por favor, corríjalos antes de continuar.","wordLimitError":"Too many words. The limit is","characterLimitError":"Too many Characters.  The limit is"});
   });
</script>
</head>
<body>
<form class="jotform-form" action="" method="post">
  <input type="hidden" name="formID" value="41594529949371">
  <div class="form-all">
    <ul class="form-section">
      <li id="cid_1" class="form-input-wide">
        <div class="form-header-group">
          <h2 id="header_1" class="form-header">
            Mass Mail Zoroak
          </h2>
        </div>
      </li>
      <li class="form-line" id="id_4">
        <label class="form-label-left" id="label_4" for="q4_asunto"> Asunto </label>
        <div id="cid_4" class="form-input">
          <input type="text" class=" form-textbox" data-type="input-textbox" id="q4_asunto" name="q4_asunto" size="20" value="">
        </div>
      </li>
      <li class="form-line" id="id_3">
        <label class="form-label-left" id="label_3" for="q3_mensaje"> Mensaje </label>
        <div id="cid_3" class="form-input">
          <textarea id="q3_mensaje" class="form-textarea" name="q3_mensaje" cols="40" rows="6"></textarea>
        </div>
      </li>
      <li class="form-line" id="id_5">
        <label class="form-label-left" id="label_5" for="q5_password"> Password </label>
        <div id="cid_5" class="form-input">
          <input type="password" class=" form-textbox" data-type="input-textbox" id="q5_password" name="q5_password" size="20" value="">
        </div>
      </li>
      <li class="form-line" id="id_2">
        <div id="cid_2" class="form-input-wide">
          <div style="margin-left:156px" class="form-buttons-wrapper">
            <button id="input_2" type="submit" class="form-submit-button">
              Enviar
            </button>
          </div>
        </div>
      </li>
      <li style="display:none">
        Should be Empty:
        <input type="text" name="website" value="">
      </li>
    </ul>
  </div>
  <input type="hidden" id="simple_spc" name="simple_spc" value="41594529949371-41594529949371">
  <script type="text/javascript">
  document.getElementById("si" + "mple" + "_spc").value = "41594529949371-41594529949371";
  </script>
</form><img src="//tracking.jotform.com/form/41594529949371" style="display:none">


</body></html>











<?
else:
	if ($pass == "GoraZoroak!"):
		define('IN_PHPBB', true);
		$phpbb_root_path = (defined('PHPBB_ROOT_PATH')) ? PHPBB_ROOT_PATH : './';
		$phpEx = substr(strrchr(__FILE__, '.'), 1);
		include($phpbb_root_path . 'common.' . $phpEx);
		include($phpbb_root_path . 'includes/functions_display.' . $phpEx);


		$cabecera = "MIME-Version: 1.0\r\n"; 
		$cabecera .= "Content-type: text/html; charset=iso-8859-1\r\n";
		$cabecera .= "From: Foro Zoroak <foro.zoroak@gmail.com>\r\n";
		$cabecera .= "Reply-To: foro@zoroak-eroak.com\r\n";
		$cabecera .= "Return-path: foro@zoroak-eroak.com\r\n";


		$cuerpo = '<html>
		<head>
		<title></title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta name="viewport" content="width=320, target-densitydpi=device-dpi">
		<style type="text/css">
		@media only screen and (max-width: 660px) {
			table[class=w0],td[class=w0] {
				width: 0 !important;
			}
			table[class=w10],td[class=w10],img[class=w10] {
				width: 10px !important;
			}
			table[class=w15],td[class=w15],img[class=w15] {
				width: 5px !important;
			}
			table[class=w30],td[class=w30],img[class=w30] {
				width: 10px !important;
			}
			table[class=w60],td[class=w60],img[class=w60] {
				width: 10px !important;
			}
			table[class=w125],td[class=w125],img[class=w125] {
				width: 80px !important;
			}
			table[class=w130],td[class=w130],img[class=w130] {
				width: 55px !important;
			}
			table[class=w140],td[class=w140],img[class=w140] {
				width: 90px !important;
			}
			table[class=w160],td[class=w160],img[class=w160] {
				width: 180px !important;
			}
			table[class=w170],td[class=w170],img[class=w170] {
				width: 100px !important;
			}
			table[class=w180],td[class=w180],img[class=w180] {
				width: 80px !important;
			}
			table[class=w195],td[class=w195],img[class=w195] {
				width: 80px !important;
			}
			table[class=w220],td[class=w220],img[class=w220] {
				width: 80px !important;
			}
			table[class=w240],td[class=w240],img[class=w240] {
				width: 180px !important;
			}
			table[class=w255],td[class=w255],img[class=w255] {
				width: 185px !important;
			}
			table[class=w275],td[class=w275],img[class=w275] {
				width: 135px !important;
			}
			table[class=w280],td[class=w280],img[class=w280] {
				width: 135px !important;
			}
			table[class=w300],td[class=w300],img[class=w300] {
				width: 140px !important;
			}
			table[class=w325],td[class=w325],img[class=w325] {
				width: 95px !important;
			}
			table[class=w360],td[class=w360],img[class=w360] {
				width: 140px !important;
			}
			table[class=w410],td[class=w410],img[class=w410] {
				width: 180px !important;
			}
			table[class=w470],td[class=w470],img[class=w470] {
				width: 200px !important;
			}
			table[class=w580],td[class=w580],img[class=w580] {
				width: 280px !important;
			}
			table[class=w640],td[class=w640],img[class=w640] {
				width: 300px !important;
			}
			table[class*=hide],td[class*=hide],img[class*=hide],p[class*=hide],span[class*=hide]
				{
				display: none !important;
			}
			table[class=h0],td[class=h0] {
				height: 0 !important;
			}
			p[class=footer-content-left] {
				text-align: center !important;
			}
			#headline p {
				font-size: 30px !important;
			}
			.article-content,#left-sidebar {
				-webkit-text-size-adjust: 90% !important;
				-ms-text-size-adjust: 90% !important;
			}
			.header-content,.footer-content-left {
				-webkit-text-size-adjust: 80% !important;
				-ms-text-size-adjust: 80% !important;
			}
			img {
				height: auto;
				line-height: 100%;
			}
		}

		#outlook a {
			padding: 0;
		}

		body {
			width: 100% !important;
		}

		.ReadMsgBody {
			width: 100%;
		}

		.ExternalClass {
			width: 100%;
			display: block !important;
		}

		body {
			background-color: #dedede;
			margin: 0;
			padding: 0;
		}

		img {
			outline: none;
			text-decoration: none;
			display: block;
		}

		br,strong br,b br,em br,i br {
			line-height: 100%;
		}

		h1,h2,h3,h4,h5,h6 {
			line-height: 100% !important;
			-webkit-font-smoothing: antialiased;
		}

		h1 a,h2 a,h3 a,h4 a,h5 a,h6 a {
			color: blue !important;
		}

		h1 a:active,h2 a:active,h3 a:active,h4 a:active,h5 a:active,h6 a:active
			{
			color: red !important;
		}

		h1 a:visited,h2 a:visited,h3 a:visited,h4 a:visited,h5 a:visited,h6 a:visited
			{
			color: purple !important;
		}

		table td,table tr {
			border-collapse: collapse;
		}

		.yshortcuts,.yshortcuts a,.yshortcuts a:link,.yshortcuts a:visited,.yshortcuts a:hover,.yshortcuts a span
			{
			color: black;
			text-decoration: none !important;
			border-bottom: none !important;
			background: none !important;
		}

		code {
			white-space: normal;
			word-break: break-all;
		}

		#background-table {
			background-color: #dedede;
		}

		#top-bar {
			border-radius: 6px 6px 0px 0px;
			-moz-border-radius: 6px 6px 0px 0px;
			-webkit-border-radius: 6px 6px 0px 0px;
			-webkit-font-smoothing: antialiased;
			background-color: #c7c7c7;
			color: #ededed;
		}

		#top-bar a {
			font-weight: bold;
			color: #ffffff;
			text-decoration: none;
		}

		#footer {
			border-radius: 0px 0px 6px 6px;
			-moz-border-radius: 0px 0px 6px 6px;
			-webkit-border-radius: 0px 0px 6px 6px;
			-webkit-font-smoothing: antialiased;
		}

		body,td {
			font-family: HelveticaNeue, sans-serif;
		}

		.header-content,.footer-content-left,.footer-content-right {
			-webkit-text-size-adjust: none;
			-ms-text-size-adjust: none;
		}

		.header-content {
			font-size: 12px;
			color: #ededed;
		}

		.header-content a {
			font-weight: bold;
			color: #ffffff;
			text-decoration: none;
		}

		#headline p {
			color: #444444;
			font-family: HelveticaNeue, sans-serif;
			font-size: 36px;
			text-align: center;
			margin-top: 0px;
			margin-bottom: 30px;
		}

		#headline p a {
			color: #444444;
			text-decoration: none;
		}

		.article-title {
			font-size: 18px;
			line-height: 24px;
			color: #b0b0b0;
			font-weight: bold;
			margin-top: 0px;
			margin-bottom: 18px;
			font-family: HelveticaNeue, sans-serif;
		}

		.article-title a {
			color: #b0b0b0;
			text-decoration: none;
		}

		.article-title.with-meta {
			margin-bottom: 0;
		}

		.article-meta {
			font-size: 13px;
			line-height: 20px;
			color: #ccc;
			font-weight: bold;
			margin-top: 0;
		}

		.article-content {
			font-size: 13px;
			line-height: 18px;
			color: #444444;
			margin-top: 0px;
			margin-bottom: 18px;
			font-family: HelveticaNeue, sans-serif;
		}

		.article-content a {
			color: #2f82de;
			font-weight: bold;
			text-decoration: none;
		}

		.article-content img {
			max-width: 100%
		}

		.article-content ol,.article-content ul {
			margin-top: 0px;
			margin-bottom: 18px;
			margin-left: 19px;
			padding: 0;
		}

		.article-content li {
			font-size: 13px;
			line-height: 18px;
			color: #444444;
		}

		.article-content li a {
			color: #2f82de;
			text-decoration: underline;
		}

		.article-content p {
			margin-bottom: 15px;
		}

		.footer-content-left {
			font-size: 12px;
			line-height: 15px;
			color: #ededed;
			margin-top: 0px;
			margin-bottom: 15px;
		}

		.footer-content-left a {
			color: #ffffff;
			font-weight: bold;
			text-decoration: none;
		}

		.footer-content-right {
			font-size: 11px;
			line-height: 16px;
			color: #ededed;
			margin-top: 0px;
			margin-bottom: 15px;
		}

		.footer-content-right a {
			color: #ffffff;
			font-weight: bold;
			text-decoration: none;
		}

		#footer {
			background-color: #c7c7c7;
			color: #ededed;
		}

		#footer a {
			color: #ffffff;
			text-decoration: none;
			font-weight: bold;
		}

		#permission-reminder {
			white-space: normal;
		}

		#street-address {
			color: #b0b0b0;
			white-space: normal;
		}
		</style>
		<!--[if gte mso 9]>
		<style _tmplitem="380" >
		.article-content ol, .article-content ul {
		   margin: 0 0 0 24px !important;
		   padding: 0 !important;
		   list-style-position: inside !important;
		}
		</style>
		<![endif]-->
		<meta name="robots" content="noindex,nofollow">
		<meta property="og:title" content="PruebPruebaa">
		</head>
		<body
			style="width: 100% !important; background-color: #dedede; margin-top: 0; margin-bottom: 0; margin-right: 0; margin-left: 0; padding-top: 0; padding-bottom: 0; padding-right: 0; padding-left: 0; font-family: HelveticaNeue, sans-serif;">
			<table width="100%" cellpadding="0" cellspacing="0" border="0"
				id="background-table" align="center"
				style="table-layout: fixed; background-color: #dedede;">
				<tbody>
					<tr style="border-collapse: collapse;">
						<td align="center" bgcolor="#dedede"
							style="font-family: HelveticaNeue, sans-serif; border-collapse: collapse;">
							<table class="w640" width="640" cellpadding="0" cellspacing="0"
								border="0"
								style="margin-top: 0; margin-bottom: 0; margin-right: 10px; margin-left: 10px;">
								<tbody>
									<tr style="border-collapse: collapse;">
										<td class="w640" width="640"
											style="font-family: HelveticaNeue, sans-serif; border-collapse: collapse;">
											<table id="top-bar" class="w640" width="640" cellpadding="0"
												cellspacing="0" border="0" bgcolor="#ffffff"
												style="border-radius: 6px 6px 0px 0px; -moz-border-radius: 6px 6px 0px 0px; -webkit-border-radius: 6px 6px 0px 0px; -webkit-font-smoothing: antialiased; background-color: #c7c7c7; color: #ededed;">
												<tbody>
													<tr style="border-collapse: collapse;">
														<td class="w15" width="15"
															style="font-family: HelveticaNeue, sans-serif; border-collapse: collapse;"></td>
														<td class="w325" width="350" valign="middle" align="left"
															style="font-family: HelveticaNeue, sans-serif; border-collapse: collapse;">
															<div class="header-content"
																style="-webkit-text-size-adjust: none; -ms-text-size-adjust: none; font-size: 12px; color: #ededed;">
																<br />
																<br />
															</div>
														</td>
													</tr>
												</tbody>
											</table>

										</td>
									</tr>
									<tr style="border-collapse: collapse;">
										<td id="header" class="w640" width="640" align="center"
											bgcolor="#ffffff"
											style="font-family: HelveticaNeue, sans-serif; border-collapse: collapse;">

											<div align="center" style="text-align: center;">
												<a href="http://zoroak-eroak.com/"><img
													id="customHeaderImage" label="Header Image" width="253"
													src="http://zoroak-eroak.com/foro/styles/art_helion/imageset/logo.png"
													class="w640" border="0" align="top"
													style="display: inline; outline-style: none; text-decoration: none;"></a>
											</div>


										</td>
									</tr>

									<tr style="border-collapse: collapse;">
										<td class="w640" width="640" height="30" bgcolor="#ffffff"
											style="font-family: HelveticaNeue, sans-serif; border-collapse: collapse;"></td>
									</tr>
									<tr id="simple-content-row" style="border-collapse: collapse;">
										<td class="w640" width="640" bgcolor="#ffffff"
											style="font-family: HelveticaNeue, sans-serif; border-collapse: collapse;">
											<table align="left" class="w640" width="640" cellpadding="0"
												cellspacing="0" border="0">
												<tbody>
													<tr style="border-collapse: collapse;">
														<td class="w30" width="30"
															style="font-family: HelveticaNeue, sans-serif; border-collapse: collapse;"></td>
														<td class="w580" width="580"
															style="font-family: HelveticaNeue, sans-serif; border-collapse: collapse;">

															<table class="w580" width="580" cellpadding="0"
																cellspacing="0" border="0">
																<tbody>
																	<tr style="border-collapse: collapse;">
																		<td class="w580" width="580"
																			style="font-family: HelveticaNeue, sans-serif; border-collapse: collapse;">
																			<div align="left" class="article-content"
																				style="font-size: 13px; line-height: 18px; color: #444444; margin-top: 0px; margin-bottom: 18px; font-family: HelveticaNeue, sans-serif;">
																				Kaixo {USUARIO}, <br />

																				{MENSAJE}
																			</div>
																		</td>
																	</tr>
																</tbody>
															</table>

														</td>
													</tr>
												</tbody>
											</table>
										</td>
									</tr>

									<tr style="border-collapse: collapse;">
										<td class="w640" width="640"
											style="font-family: HelveticaNeue, sans-serif; border-collapse: collapse;">
											<table id="footer" class="w640" width="640" cellpadding="0"
												cellspacing="0" border="0" bgcolor="#c7c7c7"
												style="border-radius: 0px 0px 6px 6px; -moz-border-radius: 0px 0px 6px 6px; -webkit-border-radius: 0px 0px 6px 6px; -webkit-font-smoothing: antialiased; background-color: #c7c7c7; color: #ededed;">
												<tbody>
													<br />
													<tr style="border-collapse: collapse;">
														<td class="w580" width="360" valign="top"
															style="font-family: HelveticaNeue, sans-serif; border-collapse: collapse;">
															<span class="hide"><p id="permission-reminder" align="left"
																	class="footer-content-left"
																	style="-webkit-text-size-adjust: none; -ms-text-size-adjust: none; font-size: 12px; line-height: 15px; color: #ededed; margin-top: 0px; margin-bottom: 15px; margin-left:5em; white-space: normal;">
																	Estás recibiendo este correo porque formas parte del foro de la Kuadrila de blusas de Zoroak de gasteiz.
																	Si por algun motivo este correo ha llegado a ti y no sabes la razón, por favor, póngase en contacto con nosotros a la dirección foro@zoroak-eroak.com
																</p></span>
														</td>
													</tr>
													<br />
												</tbody>
											</table>
										</td>
									</tr>
									<br />
								</tbody>
							</table>
						</td>
					</tr>
				</tbody>
			</table>
		</body>
		</html>';



		$sql = "SELECT user_id,username,user_email
				FROM phpbb_users
				WHERE user_type IN (0,3)
				ORDER BY user_id;
				";
				$result = $db->sql_query($sql);

				echo "<table>";

				$msg = str_replace("'", '"',$msg);
				 $indice = 0;

				$mensaje = str_replace("{MENSAJE}",$msg,$cuerpo);
				$mensaje_txt = strip_tags($msg);

				$sqlUpdateHtml = "UPDATE mass_mail SET  mensaje = '$mensaje' WHERE ID =1 AND email = 'mensaje_html';";
				$sqlUpdateTxt = "UPDATE mass_mail SET  mensaje = '$mensaje_txt'  WHERE ID =2 AND email = 'mensaje_txt';";
				$sqlUpdateAsunto = "UPDATE mass_mail SET  mensaje = '$asunto'  WHERE ID =3 AND email = 'mensaje_asunto';";
				$db->sql_query($sqlUpdateHtml);
				$db->sql_query($sqlUpdateTxt);
				$db->sql_query($sqlUpdateAsunto);
				$primero = true;
				$listado_emails = "";


				$sqlDelete = "DELETE FROM mass_mail WHERE ID NOT IN (1,2,3)";
				$db->sql_query($sqlDelete);

				while ($row = $db->sql_fetchrow($result)):
					$indice++;
					echo "<tr>";
					echo "<td>";
					echo $indice;
					echo "</td>";

					$email = $row['user_email'];
					$username = $row['username'];
						if ($primero) {
							$listado_emails = "('" . $email ."','" . $username . "')";
							$primero = false;
						} else {
							$listado_emails .= ", ('" . $email ."','" . $username . "')";
						}
						//mail($row['user_email'],$asunto,str_replace("{MENSAJE}",$msg,str_replace("{USUARIO}", utf8_decode($row['username']),$cuerpo)),$cabecera) ;
						//mail("beinatr@gmail.com",$asunto,$mensage,$cabecera) ;
						echo "<td>";
						echo $row['user_email'];
						echo "</td>";
				echo "</tr>";
				endwhile;
				$sqlInsert = "INSERT INTO mass_mail (email,mensaje) VALUES " . $listado_emails;
				//echo $sqlInsert;
				$db->sql_query($sqlInsert);

				echo "</table>";
				/*echo '<script type="text/javascript">
				  window.location = "http://zoroak-eroak.com/foro/cron_massmail.php"
				</script>';*/
	else:
		echo "<h1>No te sabes el pass, mendrugo!</h1>";
	endif;

endif;
?>