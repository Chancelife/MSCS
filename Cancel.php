<?php
include ('includes/user_header.html');
?>

<?php
header("Content-Type: text/html; charset=utf-8");
if(!isset($_SESSION['userid'])){
    echo '您尚未登录，即将跳转到登录页面';
    echo '<META HTTP-EQUIV="Refresh" CONTENT="2; URL=Login_V.php">';
    exit();
}else
{
    $uid = $_SESSION['userid'];
    $username = $_SESSION['username'];
}
if(!isset($_POST['cancel'])) 
{
echo '非法的请求，即将返回选课列表';
echo '<META HTTP-EQUIV="Refresh" CONTENT="2; URL=ShowCourse.php">';
return; 
}
require('class/conn.php');

if($_POST['cancel']=='cancel'){             //获取表单信息
$cid = $_POST['cid'];
$cname = $_POST['cname'];
}
$sql="select cid,uid from enroll where cid='$cid' and uid='$uid' limit 1";
$check_query = mysqli_query($mysqli,$sql);
if(mysqli_fetch_array($check_query)){
    $sql = "delete from enroll where cid='$cid' and uid='$uid'";
    if(mysqli_query($mysqli,$sql)){
    echo('删除课程：'.$cname.'成功！');
    echo '<META HTTP-EQUIV="Refresh" CONTENT="2; URL=ShowCourse.php?user='.$username.'">';
    echo '两秒后再次返回选课界面';
    }
}
?>



<?php include ('includes/user_footer.html'); ?>