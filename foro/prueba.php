<?php
define('IN_PHPBB', true);
$phpbb_root_path = (defined('PHPBB_ROOT_PATH')) ? PHPBB_ROOT_PATH : './';
$phpEx = substr(strrchr(__FILE__, '.'), 1);
include($phpbb_root_path . 'common.' . $phpEx);
include($phpbb_root_path . 'includes/functions_display.' . $phpEx);

$sql = "SELECT Distinct `user_email` 
FROM  `phpbb_users` 
WHERE user_email <> ''";
$result = $db->sql_query($sql);
echo "<table>";
while ($row = $db->sql_fetchrow($result)){
	echo "<tr>";
	echo "<td>";
	echo $row['user_email'];
	echo "</tr>";
	echo "</td>";
}
echo "</table>";