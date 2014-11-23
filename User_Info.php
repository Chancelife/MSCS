<?php
include ('includes/admin_header.html');
?>

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
require('class/conn.php');
$db_sql;
$db_rs;

//$sql="select c_name,c_intro,c_clas,c_lang,c_coll,c_plat from course";
$sql="select * from user";

         $db_rs = mysqli_query($mysqli,$sql)or die(mysql_error());
echo "<table>";
while($row = mysqli_fetch_array($db_rs))
  {
    
    $user_id = $row['uid'];
    $user_name = $row['username'];
    $user_pass= $row['password'];
    $user_email = $row['email'];
    $user_date = $row['regdate'];
    echo "<tr>";
    echo "</td><td>   ".$user_id ."</td><td>   " . $user_name . "</td><td> " . $user_email . "</td><td>    " . $user_date . "</td></br>";
    echo "</tr>";
    }
echo "</table>";
?>

<?php 
//回收
$mysqli->close();
include ('includes/admin_footer.html'); ?>