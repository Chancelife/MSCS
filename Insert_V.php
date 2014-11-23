<?php
include ('includes/admin_header.html');

if(!isset($_SESSION['userid'])){
    echo '您尚未登录，即将跳转到登录页面';
    echo '<META HTTP-EQUIV="Refresh" CONTENT="2; URL=Login_V.php">';
    exit();
}else
{
    $uid = $_SESSION['userid'];
    $username = $_SESSION['username'];
}
?>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" href="css/Insert.css" type="text/css">
</head>


<table id="insert" width="320" height="90" border="1" cellpadding="0" cellspacing="0" > 
<form name="couse_submit" method="post" action="Insert_C.php" enctype="multipart/form-data"> 
<tr> 
<td width="114" height="30" align="center" >课程名称*</td> 
<td width="163" height="30" align="center"><input name="course_name" type="text" /></td> 
</tr> 
<tr>
<td align="center">课程图片</td>
<td align="center">
<font style="letter-spacing:1px" color="#FF0000">*只允许上传格式为</font><br />
<font style="letter-spacing:1px" color="#FF0000">jpg|png|bmp|jpeg|gif</font><br />
<font style="letter-spacing:1px" color="#FF0000">小于100Kb的图片</font><br />
<input name="course_img" type="file"/> 
</td>
</tr>
<tr> 
<td align="center">课程描述</td> 
<td height="30" align="center"><textarea name="course_des" rows="8" cols="19"></textarea></td> 
</tr> 
<tr> 
<td align="center">课程分类*</td></td> 
<td height="30" align="center"><input name="course_cla" type="text" /></td>
</tr> 
<tr> 
<td align="center">授课语言</td></td>
<td height="30" align="center"><input name="course_lang" type="text" /></td> 
</tr> 
<tr> 
<td align="center">授课院校</td></td> 
<td height="30" align="center"><input name="course_coll" type="text" /></td> 
</tr> 
<tr> 
<td align="center">授课平台*</td></td> 
<td height="30" align="center"><input name="course_plat" type="text" /></td> 
</tr> 
<tr> 
<td></td> 
<td height="25" align="center">  <input name="submit" type="submit" value="submit" /></td> 
</tr>
<tr><td height="25" align="center">注意：</td>
    <td height="25" align="center">*为必填项</td></tr>
</form> 
</table> 

<?php include ('includes/admin_footer.html'); ?>