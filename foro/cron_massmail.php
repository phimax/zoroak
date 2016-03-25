<?php /* <script>
setTimeout(function(){
   window.location.reload(1);
}, 60000);
</script> */?>
<?php

require('class.phpmailer.php');

define('IN_PHPBB', true);
		$phpbb_root_path = (defined('PHPBB_ROOT_PATH')) ? PHPBB_ROOT_PATH : './';
		$phpEx = substr(strrchr(__FILE__, '.'), 1);
		include($phpbb_root_path . 'common.' . $phpEx);
		include($phpbb_root_path . 'includes/functions_display.' . $phpEx);

$sql = "SELECT mensaje
		FROM mass_mail
		WHERE ID IN (1,2,3)
		ORDER BY ID;
		";
$result = $db->sql_query($sql);
$row = $db->sql_fetchrow($result);
$msgHtml = $row['mensaje'];
$row = $db->sql_fetchrow($result);
$msgTxt = $row['mensaje'];
$row = $db->sql_fetchrow($result);
$msgAsunto = $row['mensaje'];


$sql = "SELECT ID,email,mensaje
		FROM mass_mail
		WHERE ID  NOT IN (1,2,3)
		ORDER BY ID LIMIT 6;
		";
$result = $db->sql_query($sql);
$ind = 0;
$listado_ids = "";
$primero = true;
while ($ind <= 6 && $row = $db->sql_fetchrow($result)):
	$email = $row['email'];
	$username = $row['mensaje'];
	$id = $row['ID'];

	$ind++;
	$mail = new PHPMailer();
	/*
	 * PARA DEBUGEAR PONER $mail->SMTPDebug  = 1; 
	 */
	$mail->SMTPDebug  = 1;
	$mail->isSMTP(); 
	$mail->Host = "mx1.hostinger.es";
	//$mail->From = "foro@zoroak-eroak.com";
	$mail->From = "";
	$mail->FromName = "Foro Zoroak";
	$mail->Port = 2525;
	$mail->SMTPAuth = true;
	$mail->WordWrap   = 50;
	$mail->Username = "foro@zoroak-eroak.com";
	$mail->Password = "ZoroForo159753";
	$mail->Subject = $msgAsunto;
	$mail->MsgHTML(str_replace("{USUARIO}", utf8_encode($username), $msgHtml));
	$mail->AltBody = $msgTxt; 
	$mail->AddAddress($email);
	if(!$mail->Send()) {
		echo "<strong>";
		echo "Error enviando: " . $mail->ErrorInfo;
		echo "</strong>";
		break;
	} else {
		echo "Enviado a " . $email;
		echo "<br />";
		if ($primero) {
			$listado_ids = $id;
			$primero = false;
		} else {
			$listado_ids .= "," . $id;
		}
	}
endwhile;

echo "<hr /> FIN!";
if ($listado_ids != "") {
	$sqlDelete = "DELETE FROM mass_mail WHERE ID IN (" . $listado_ids . ")";
	$db->sql_query($sqlDelete);
	//echo "<br />" . $sqlDelete;
}

$sql = "SELECT COUNT(ID) AS total
		FROM mass_mail
		WHERE ID  NOT IN (1,2,3);
		";
$result = $db->sql_query($sql);
$row = $db->sql_fetchrow($result);
echo "<br /> QUEDAN POR PROCESAR: " . $row['total'];

?>