<html>
<head>
<title>Script to test the mail() php function</title>
<style type="text/css">
font,th,td,p { font-family: Verdana, Arial, Helvetica, sans-serif }
.bodyline	{ background-color: #FFFFFF; border: 1px #98AAB1 solid; }
.forumline	{ background-color: #FFFFFF; border: 2px #006699 solid; }
td.row1	{ background-color: #EFEFEF; }
th	{
	color: #FFA34F; font-size: 11px; font-weight : bold;
	background-color: #006699; height: 25px;
}
th.thHead { font-size: 12px; border-width: 1px 1px 0px 1px; }
.maintitle	{
	font-weight: bold; font-size: 22px; font-family: "Trebuchet MS",Verdana, Arial, Helvetica, sans-serif;
	text-decoration: none; line-height : 120%; color : #000000;
}
.gen { font-size : 12px; color : #000000; }
.copyright		{ font-size: 10px; font-family: Verdana, Arial, Helvetica, sans-serif; color: #444444; letter-spacing: -1px;}
a.copyright		{ color: #444444; text-decoration: none;}
a.copyright:hover { color: #000000; text-decoration: underline;}
input,textarea, select {
	color : #000000;
	font: normal 11px Verdana, Arial, Helvetica, sans-serif;
	border-color : #000000;
}
input.post, textarea.post, select {
	background-color : #FFFFFF;
}
input { text-indent : 2px; }
</style>
</head>
<body bgcolor="#e5e5e5" link="#006699" text="#000000" vlink="#5493b4">
<table align="center" border="0" cellpadding="10" cellspacing="0" width="100%">
	<tbody>
		<tr>
			<td class="bodyline">
      			<table border="0" cellpadding="0" cellspacing="0" width="100%">
        			<tbody>
        				<tr>
          					<td align="center" valign="middle" width="100%"><span class="maintitle"><span class="maintitle">Script to test the mail() php function</span></span></td>
        				</tr>
        			</tbody>
      			</table>
				<br />
				<form action="test_mail.php" method="post" target="_top">
					<table class="forumline" align="center" border="0" cellpadding="4" cellspacing="1" width="100%">
  						<tbody>
							<tr>
								<th class="thHead" height="25" nowrap>THis a php script that test the mail() function of your hoster. If is not activated or if it not allow to send email in BCC it will dispaly an error.<br /> 
								Feel the form with 2 differents emails adresses, and the script will send an email to theses adresses.</th>
  							</tr>
  							<tr>
								<td class="row1">
              						<table border="0" cellpadding="3" cellspacing="1" width="100%">
                						<tbody>
                							<tr>
                  								<td colspan="2" align="center"><font color='red'><b>You need to inter 2 DIFFERENT mail adresse</b></font></td>
                							</tr>
                							<tr>
                  								<td align="right" width="45%"><span class="gen">Email adresse 1:</span></td>
                  								<td><input type="text" name="destinataire1"></td>
											</tr>
                							<tr>
												<td align="right" width="45%"><span class="gen">Email adresse 2:</span></td>
                  								<td><input type="text" name="destinataire2"></td>
                							</tr>
                							<tr align="center">
                  								<td colspan="2"> <input type="submit" value="Send the mail" name="submit" /></td>
                							</tr>
                						</tbody>
              						</table>
            					</td>
  							</tr>
						</tbody>
					</table>
				</form>
<?php
if(isset($_POST['destinataire1']) && isset($_POST['destinataire2']))
{
$headers ='Bcc: '. $_POST['destinataire1'] . "," . $_POST['destinataire2'] . "\n";
$headers .='Content-Type: text/plain; charset="UTF-8"'."\n";
$headers .='Content-Transfer-Encoding: 8bit'; 

$destinataire = $_POST['destinataire1'];
$sujet = "Test the mail() php function";
$message = "Great!! \n\n It's seems to work!! \n\n Congratulations!";

$envoi1 = mail($destinataire, $sujet, $message);
$envoi2 = mail('undisclosed-recipients:;', $sujet, $message, $headers);

	if($envoi1 == true && $envoi2 == true)
	{
	echo "<font color='green'><b>The email has been sent with succes.<br /><br />The mail function is activated.<br />Check if you recevie it!!</b></font><br />";
	}
	else if($envoi1 == true && $envoi2 == false)
	{
	echo "<font color='red'><b>The mail function is activated. But it not support the bcc....</b></font><br />";
	}
	else 
	{
	echo "<font color='red'><b>The mail function is desactivated.....</b></font><br />";
	}
	
}

?>
				<br />
			</td>
		</tr>
	</tbody>
</table>
</body>
</html>