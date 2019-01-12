<?php

$db_host = 'localhost';
$db_user ='admin';
$db_pass = '12345678';
$db_database = 'db_foto';

$link = mysql_connect($db_host,$db_user,$db_pass);
mysql_select_db($db_database,$link)or die("нет соединения с базой".mysql_error());
mysql_query("SET name UTF-8");
?>