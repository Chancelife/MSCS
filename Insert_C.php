<?php
include ('includes/admin_header.html');
?>


<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" href="css/Insert.css" type="text/css">
</head>
<?php


if(!isset($_SESSION['userid'])){
    echo '您尚未登录，即将跳转到登录页面';
    echo '<META HTTP-EQUIV="Refresh" CONTENT="2; URL=Login_V.php">';
    exit();
}else
{
    $uid = $_SESSION['userid'];
    $username = $_SESSION['username'];
}

if(!isset($_POST['submit'])){
    echo '非法的请求，即将返回课程列表';
    echo '<META HTTP-EQUIV="Refresh" CONTENT="2; URL=Showlist.php">';
    return; 
}

if($_POST['submit']=='submit'){             //获取表单信息
$course_name = $_POST['course_name'];
$course_des = $_POST['course_des'];
$course_cla = $_POST['course_cla'];
$course_lang = $_POST['course_lang'];
$course_coll = $_POST['course_coll'];
$course_plat = $_POST['course_plat'];
$course_img = $_FILES['course_img'];
}
$course_des = str_replace("'" , "\'", $course_des);

require('class/conn.php');
$db_sql="";
//未填项提醒标记
$name_flag = "normal";
$cla_flag = "normal";
$plat_flag = "normal";
$img_flag= "";


$sql="INSERT INTO course (c_name,c_intro,c_clas,c_lang,c_coll,c_plat)
VALUES
('$course_name','$course_des','$course_cla','$course_lang','$course_coll','$course_plat')";

if ( $mysqli ) {
         $db_conn = "数据库连接正常";
         if($course_name!=null&&$course_cla!=null&&$course_plat!=null)
         {
            if (mysqli_query($mysqli,$sql))
            {
                $db_sql="成功上传MOOC信息";
            }
            else
            {
               $db_sql="上传MOOC信息失败";
            }
         }
         else{
            $db_sql="请检查必填项:";
            if($course_name==null)
            {
                $name_flag = "warning";
                $db_sql .= " 课程名称 ";
            }
            if($course_cla==null)
            {
                $cla_flag = "warning";
                $db_sql .= " 课程分类 ";
            }
            if($course_plat==null)
            {
                $plat_flag = "warning";
                $db_sql .= " 授课平台 ";
            }
         }
}else {
         $db_conn = "数据库连接失败";
}
    if($db_sql=="成功上传MOOC信息")
    {
        require('Upload.php');
        }


$mysqli->close();                                        //连接的数据库名称
 
echo<<<EOT
<table width="350" border="1" cellpadding="0" cellspacing="0"> 
<tr> 
<td height="25" align="center"> 课程名称:</br>$course_name</td> 
</tr> 
<tr> 
<td height="25" align="center" valign="middle" class="$name_flag">课程描述：</br>$course_des</td> 
</tr> 
<tr>
<td height="25" align="center" valign="middle">$img_flag</td>
</tr>
<tr> 
<td height="25" align="center" valign="middle" class="$cla_flag">课程分类：</br>$course_cla</td> 
</tr> 
<tr> 
<td height="25" align="center" valign="middle">授课语言：</br>$course_lang</td> 
</tr> 
<tr> 
<td height="25" align="center" valign="middle">授课院校：</br>$course_coll</td> 
</tr> 
<tr> 
<td height="25" align="center" valign="middle" class="$plat_flag">授课平台：</br>$course_plat</td> 
</tr> 
<tr> 
<td height="25" align="center" valign="middle">$db_conn</td>
</tr> 
<tr> 
<td height="25" align="center" valign="middle"><div style="color:#F00">$db_sql</div></td> 
</tr> 
<tr> 
<td height="25" align="center" valign="middle"><input type="button" onclick="javascript:history.back(-1);" value="返回上一页"></td> 
</tr>
</table>
EOT;
?> 
<?php include ('includes/admin_footer.html'); ?>