<?php

$db_host="localhost";                                           //���ӵķ�������ַ
$db_user="chance";                                                  //�������ݿ���û���
$db_psw="PHjGCBVpPb53Zxzz";                                                  //�������ݿ������
$db_name="mscs";  
$db_conn=false;                                         //���ӵ����ݿ�����

$mysqli=new mysqli();
$mysqli->connect($db_host,$db_user,$db_psw,$db_name);

$connection =mysqli_connect($db_host,$db_user,$db_psw,$db_name);

if ( $connection ) {
         echo "���ݿ����ӳɹ�!";

         
}else {
         echo "���ݿ�����ʧ��";

}


$mysqli->close();

?>