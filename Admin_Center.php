<?php
include ('includes/admin_header.html');
?>
<?php

//检测是否登录，若没登录则转向登录界面
if(!isset($_SESSION['userid'])){
    echo '您尚未登录，即将跳转到登录页面';
    echo '<META HTTP-EQUIV="Refresh" CONTENT="2; URL=Login_V.php">';
    exit();
}
//包含数据库连接文件
include('class/conn.php');
$userid = $_SESSION['userid'];
$username = $_SESSION['username'];
$user_query = mysqli_query($mysqli,"select * from user where uid=$userid limit 1");
$row = mysqli_fetch_array($user_query);
$email = $row['email'];
$class = $row['class'];
echo '<div>';
echo '用户信息：<br />';
echo '用户ID：',$userid,'<br />';
echo '用户名：',$username,'<br />';
echo "邮箱：$email<br />";
    if($class=="1")
        {
            echo '身份：普通用户<br />';
        }
    if($class=="0")
        {
            echo '身份：管理员<br />';
        }
echo '注册日期：',date("Y-m-d", $row['regdate']),'<br />';
echo '<a href="Login_C.php?action=logout">注销</a>';
echo '</div>';
?>
<?php include ('includes/admin_footer.html'); ?>