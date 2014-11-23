<?php
include ('includes/user_header.html');
?>
<head>
<link rel="stylesheet" href="css/ShowCourse.css" type="text/css">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>选课列表</title>
</head>
<?php
header("Content-Type: text/html; charset=utf-8");
 
require('class/conn.php');
$db_sql;
$db_rs;

//$sql="select c_name,c_intro,c_clas,c_lang,c_coll,c_plat from course";
$sql="select * from course";

         $db_rs = mysqli_query($mysqli,$sql)or die(mysql_error());

while($row = mysqli_fetch_array($db_rs))
  {
    $temp = $row['c_id'];
    $course_name = $row['c_name'];
    $course_des = $row['c_intro'];
    $course_cla = $row['c_clas'];
    $course_lang = $row['c_lang'];
    $course_coll = $row['c_coll'];
    $course_plat = $row['c_plat'];
    
        $img_path = "./image/".$temp."/course_img.png";
    if(!file_exists($img_path))
        $img_path = "./image/".$temp."/course_img.jpg";
    if(!file_exists($img_path))
        $img_path = "./image/".$temp."/course_img.jpeg";
    if(!file_exists($img_path))
        $img_path = "./image/".$temp."/course_img.bmp";
    if(!file_exists($img_path))
        $img_path = "./image/".$temp."/course_img.gif";
    echo<<<EOT
<div class="outer">
    <div class="course">
    <table class="ctable">
    <form name="couse_enroll" method="post" action="Enroll.php" enctype="multipart/form-data"> 
    <tr>
        <td><input class="hide" name="cid" type="text" value="$temp"></input></td>
    </tr>
    <tr>
        <td><input class="hide" name="cname" type="text" value="$course_name"></input></td>
    </tr>
    <tr>
        <td><img class="cimg" src="$img_path"  alt="$course_name" /></td>
    </tr>
    <tr>
        <td class="cname"><p>$course_name</p></td>
    </tr>
    <tr>
    <td><hr /></td>
    </tr>
    <tr>
        <td class="clist"><p>$course_cla</p></td>
    </tr>
    <tr>
        <td class="clist"><p>$course_coll</p></td>
    </tr>
    <tr>
        <td class="clist"><p>$course_plat</p></td>
    </tr>
    <tr>
        <td  class="clist"><input name="enroll" type="submit" value="enroll"></input></td>
    </tr>
    </form>
    </table>
</div>
</div>
EOT;
  }
//mysql_data_seek($db_rs, 0);
//a定位索引0


?>



<?php 
//回收
mysqli_free_result($db_rs); 
$mysqli->close();
include ('includes/user_footer.html'); ?>