<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_database = "database";
$database_database = "database";
$username_database = "raidlabs";
$password_database = "raidlabs";
$database = mysql_pconnect($hostname_database, $username_database, $password_database) or trigger_error(mysql_error(),E_USER_ERROR); 
?>