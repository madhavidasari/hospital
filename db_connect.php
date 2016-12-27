<?php
$conn = mysql_connect("hospserver.database.windows.net","madhan@hospserver","Welcome2server!") or die(mysql_error());
mysql_select_db("myphpdatabase", $conn)or die(mysql_error());
date_default_timezone_set('America/Chicago');
?>
