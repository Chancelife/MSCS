<?php

$db_host="localhost";                                           //连接的服务器地址
$db_user="chance";                                                  //连接数据库的用户名
$db_psw="PHjGCBVpPb53Zxzz";                                                  //连接数据库的密码
$db_name="mscs";  
$db_conn=false;                                         //连接的数据库名称

$mysqli=new mysqli();
$mysqli->connect($db_host,$db_user,$db_psw,$db_name);

$connection =mysqli_connect($db_host,$db_user,$db_psw,$db_name);

if ( $connection ) {
         echo "数据库连接成功!";

         
}else {
         echo "数据库连接失败";

}


$mysqli->close();

?>