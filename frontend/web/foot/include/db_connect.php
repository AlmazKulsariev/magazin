<?php
$db_host		= 'localhost';
$db_user		= 'admin';
$db_pass		= 'kulsariev';
$db_database	= 'footstore'; 

$link = mysql_connect($db_host,$db_user,$db_pass);

mysql_select_db($db_database,$link) or die("��� ���������� � �� ".mysql_error());
mysql_query("SET names cp1251");
?>