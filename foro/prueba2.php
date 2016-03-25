<script>/*
setTimeout(function(){
   window.location.reload(1);
}, 60000);*/
</script>
<?php
require('class.phpmailer.php');

define('IN_PHPBB', true);
		$phpbb_root_path = (defined('PHPBB_ROOT_PATH')) ? PHPBB_ROOT_PATH : './';
		$phpEx = substr(strrchr(__FILE__, '.'), 1);
		include($phpbb_root_path . 'common.' . $phpEx);
		include($phpbb_root_path . 'includes/functions_display.' . $phpEx);

$mail = new PHPMailer();
$mail->isSMTP(); 
$mail->Host = "mx1.hostinger.es";
$mail->From = "foro@zoroak-eroak.com";
$mail->FromName = "Foro Zoroak";
$mail->Port = 2525;
$mail->SMTPAuth = true;
$mail->WordWrap   = 50;
$mail->Username = "foro@zoroak-eroak.com";
$mail->Password = "ZoroForo159753"; 
$sql = "SELECT mensaje
		FROM mass_mail
		WHERE ID IN (1,2,3)
		ORDER BY ID;
		";
$result = $db->sql_query($sql);
$row = $db->sql_fetchrow($result);
$msgHtml = "hola"; //$row['mensaje'];
$row = $db->sql_fetchrow($result);
$msgTxt = "hola"; //$row['mensaje'];
$row = $db->sql_fetchrow($result);
$msgAsunto = "hola"; //$row['mensaje']"";


echo $msgAsunto;
echo "<hr />";
echo $msgTxt;
echo "<hr />";
echo $msgHtml;



$ind = 0;
//while ($ind <= 100):
	$ind++;
	$mail->Subject = $msgAsunto;
	$mail->MsgHTML($msgHtml);
	$mail->AltBody = $msgTxt; 
	$mail->AddAddress("beinatr@gmail.com");

	if(!$mail->Send()) {
		echo "Error enviando: " . $mail->ErrorInfo;
		break;
	} else {
	echo $ind . " ENVIADO! <br />";
	}
//endwhile;

echo "<hr /> FIN!";
$sqlInsert = "INSERT INTO mass_mail (email) VALUES" . $listado_emails;
//echo $sqlInsert;
//$db->sql_query($sqlInsert);
?>