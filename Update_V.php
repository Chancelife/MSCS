<?php
include ('includes/admin_header.html');
?>
<head>
<link rel="stylesheet" href="css/Update.css" type="text/css">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>更新确认</title>
</head>
<?php
header("Content-Type: text/html; charset=utf-8");
/**
 * @author 
 * @copyright 2014
 */
$button;
require('class/conn.php');
if(!isset($_POST['submit'])) {
    return ;
    echo "<input type='button' onclick='javascript:history.back(-1);' value='选择有误，请返回上一页重试'>";
}
 
if($_POST['submit']=='修改'){
    $course_id= $_POST['id'];
    $button="修改";
    }
if($_POST['submit']=='删除'){
    $course_id= $_POST['id'];
    $button="确认删除";
    }

$flag = $course_id;
//查询标记
$db_sql;
$db_rs;

$sql="select * from course where c_id='$flag'";

if ( $mysqli ) {
         $db_conn = "数据库连接成功!";
         $db_rs = mysqli_query($mysqli,$sql)or die(mysql_error());
}else {
         $db_conn = "数据库连接失败";
}

$mysqli->close();          //关闭数据库
$row = mysqli_fetch_array($db_rs);//初始化结果
$course_name = $row['c_name'];
$course_des = $row['c_intro'];
$course_cla = $row['c_clas'];
$course_lang = $row['c_lang'];
$course_coll = $row['c_coll'];
$course_plat = $row['c_plat'];


echo<<<EOT
<table width="464" height="120" border="1" cellpadding="0" cellspacing="0"> 
<form name="couse_submit" method="post" action="Update_C.php"> 
<tr> 
<td class="disable"><input name="id" type="text" value="$flag"/></td> 
</tr>
<tr> 
<td width="114" height="30" align="center" >课程名称*</td> 
<td width="163" height="30" align="center"><input name="course_name" type="text" value="$course_name"/></td> 
</tr> 
<tr> 
<td align="center">课程描述</td> 
<td height="30" align="center"><textarea name="course_des" rows="10" cols="45" >$course_des</textarea></td> 
</tr> 
<tr> 
<td align="center">课程分类*</td></td> 
<td height="30" align="center"><input name="course_cla" type="text" value="$course_cla"/></td>
</tr> 
<tr> 
<td align="center">授课语言</td></td>
<td height="30" align="center"><input name="course_lang" type="text" value="$course_lang"/></td> 
</tr> 
<tr> 
<td align="center">授课院校</td></td> 
<td height="30" align="center"><input name="course_coll" type="text" value="$course_coll"/></td> 
</tr> 
<tr> 
<td align="center">授课平台*</td></td> 
<td height="30" align="center"><input name="course_plat" type="text" value="$course_plat"/></td> 
</tr> 
<tr> 
<td> </td> 
<td height="25" align="center">  <input name="submit" type="submit" value="$button" />
                                <input name="submit" type="submit" value="返回" /></td> 
</tr> 
<tr><td height="25" align="center">注意：</td>
    <td height="25" align="center">*为必填项，请不要删除</td></tr>
</form> 
</table> 
EOT;
?>
<?php include ('includes/admin_footer.html'); ?>