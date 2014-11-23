<?php
include ('includes/admin_header.html');
?>
<head>
<link rel="stylesheet" href="css/Showlist.css" type="text/css">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>课程列表</title>
</head>

<?php
header("Content-Type: text/html; charset=utf-8");
 
require('class/conn.php');
$db_sql;
$db_rs;

//$sql="select c_name,c_intro,c_clas,c_lang,c_coll,c_plat from course";
$sql="select * from course";

         $db_rs = mysqli_query($mysqli,$sql)or die(mysql_error());

  echo "<table>";
while($row = mysqli_fetch_array($db_rs))
  {
  $temp = $row['c_id'];
  echo "<form name='couse_submit' method='post' action='Update_V.php'> <tr class='cell'>";
  echo "<td class='disable'><input type='text' name='id' value='$temp'>" . "</td><td>" . $row['c_name'] . "</td><td>" . $row['c_clas'] . "</td><td>" . $row['c_lang'] . "</td>";
  echo "<td>" . $row['c_coll'] . "</td><td>" . $row['c_plat'] . "</td>";
  echo "<td>" . "<input name='submit' type='submit' value='修改' /></td>";
  echo "<td>" . "<input name='submit' type='submit' value='删除' /></td>";
  echo "</tr>";
  echo "</form> ";
  }
  echo "</table>";
  
//mysql_data_seek($db_rs, 0);
//a定位索引0

//回收
mysqli_free_result($db_rs); 
$mysqli->close(); 
?>
<?php include ('includes/admin_footer.html'); ?>