<?php
include ('includes/admin_header.html');
?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>更新课程</title>
</head>

<?php
header("Content-Type: text/html; charset=utf-8");
/**
 * @author 
 * @copyright 2014
 */
if(!isset($_POST['submit'])) 
return ; 
$course_id = $_POST['id'];
$course_name = $_POST['course_name'];
$course_des = $_POST['course_des'];
$course_cla = $_POST['course_cla'];
$course_lang = $_POST['course_lang'];
$course_coll = $_POST['course_coll'];
$course_plat = $_POST['course_plat'];

$button;
$c_id;
$sql;
require('class/conn.php');
$db_rs;

if ( $mysqli ) {
         $db_conn = "数据库连接成功!";
}else {
         $db_conn = "数据库连接失败";
}
 

if($_POST['submit']=='修改'){
    $button="修改";
    $sql="UPDATE course SET c_name='$course_name',c_intro='$course_des',c_clas='$course_cla',c_lang='$course_lang',c_coll='course_coll',c_plat='course_plat' where c_id=$course_id";
    mysqli_query($mysqli,$sql)or die(mysql_error());
    echo "修改成功，即将返回课程列表";
    echo '<META HTTP-EQUIV="Refresh" CONTENT="2; URL=Showlist.php">';
    exit;
    }
if($_POST['submit']=='确认删除'){
    $button="删除";
    $sql="DELETE FROM course where c_id=$course_id";
    mysqli_query($mysqli,$sql)or die(mysql_error());
    echo "删除成功，即将返回课程列表";
    echo '<META HTTP-EQUIV="Refresh" CONTENT="2; URL=Showlist.php">';
    exit;
    }
if($_POST['submit']=='返回'){
    echo "操作取消，即将返回课程列表";
    echo '<META HTTP-EQUIV="Refresh" CONTENT="2; URL=Showlist.php">';
    }
$mysqli->close();          //关闭数据库
//echo "$button";
//echo "$course_id";

?>
<?php include ('includes/admin_footer.html'); ?>