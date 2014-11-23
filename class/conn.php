<?php # Script 18.4 - mysqli_connect.php
// This file contains the database access information. 
// This file also establishes a connection to MySQL 
// and selects the database.

// Set the database access information as constants:
$db_host="localhost";           //连接的服务器地址
$db_user="chance";              //连接数据库的用户名
$db_psw="PHjGCBVpPb53Zxzz";     //连接数据库的密码
$db_name="mscs";
$db_conn;

// Make the connection:
//$dbc = @mysqli_connect (DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
$mysqli=new mysqli();
$mysqli->connect($db_host,$db_user,$db_psw,$db_name);

// If no connection could be made, trigger an error:
if (!$mysqli) {
	trigger_error ('Could not connect to MySQL: ' . mysqli_connect_error() );
} else { // Otherwise, set the encoding:
	mysqli_set_charset($mysqli, 'utf8');
    //echo '连接成功';
}