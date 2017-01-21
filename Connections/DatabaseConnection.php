<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_DatabaseConnection = "localhost";
$database_DatabaseConnection = "video_uploader";
$username_DatabaseConnection = "root";
$password_DatabaseConnection = "";
$DatabaseConnection = mysql_pconnect($hostname_DatabaseConnection, $username_DatabaseConnection, $password_DatabaseConnection) or trigger_error(mysql_error(),E_USER_ERROR); 
?>