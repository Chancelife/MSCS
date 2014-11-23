<?php
include ('includes/user_header.html');
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
if(!isset($_POST['enroll'])) 
{
echo '非法的请求，即将返回选课列表';
echo '<META HTTP-EQUIV="Refresh" CONTENT="2; URL=ShowCourse.php">';
return; 
}

if($_POST['enroll']=='enroll'){             //获取表单信息
$cid = $_POST['cid'];
$cname = $_POST['cname'];
}

require('class/conn.php');
$db_sql;
$db_rs;

$sql="select cid,uid from enroll where cid='$cid' and uid='$uid' limit 1";
$check_query = mysqli_query($mysqli,$sql);
if(mysqli_fetch_array($check_query)){
        echo '用户 ',$username,'已选课程 ',$cname,'。<a href="javascript:history.back(-1);">返回</a>';
        exit;
    }
    $regdate = time();
    $sql = "INSERT INTO enroll(cid,uid,time)VALUES('$cid','$uid','$regdate')";
    if(mysqli_query($mysqli,$sql)){
    echo('注册课程：'.$cname.'成功！');
    echo '<META HTTP-EQUIV="Refresh" CONTENT="2; URL=ShowCourse.php?user='.$username.'">';
    echo '两秒后再次返回选课界面';
}
?>

<?php include('includes/user_footer.html'); ?>