<?php
include ('includes/user_header.html');
?>

<?php

//注销登录
if(isset($_GET['action'])) 
{
    if($_GET['action'] == "logout"){
    unset($_SESSION['userid']);
    unset($_SESSION['username']);
    echo '注销登录成功！';
    echo '<META HTTP-EQUIV="Refresh" CONTENT="2; URL=Login_V.php">';
    echo '两秒后返回登录界面';
    exit;
    }
}

//登录
if(!isset($_POST['submit'])){
    exit('非法访问!');
}
$username = htmlspecialchars($_POST['username']);
$password = MD5($_POST['password']);

//包含数据库连接文件
require('class/conn.php');
//检测用户名及密码是否正确
$check_query = mysqli_query($mysqli,"select uid,class from user where username='$username' and password='$password' 
limit 1");
if($result = mysqli_fetch_array($check_query)){
    //登录成功
    $_SESSION['username'] = $username;
    $_SESSION['userid'] = $result['uid'];
    if($result['class']=="1"){
        echo $username,' 欢迎你！进入 <a href="User_Center.php">User Center</a><br />';
        echo '或点击<a href="login.php?action=logout">Logout</a><br />';
        echo '2秒后将跳转至用户欢迎页<br />';
        echo '<META HTTP-EQUIV="Refresh" CONTENT="2; URL=User_Index.php">';
        exit;
        }
    else if($result['class']=="0"){
        echo $username,' 欢迎你！进入 <a href="Admin_Center.php">Admin Center</a><br />';
        echo '或点击<a href="login.php?action=logout">Logout</a><br />';
        echo '2秒后将跳转至管理员欢迎页<br />';
        echo '<META HTTP-EQUIV="Refresh" CONTENT="2; URL=Admin_Index.php">';
        exit;
    }
} else {
    exit('登录失败！点击此处 <a href="javascript:history.back(-1);">Back</a> Try Again');
}
?>

<?php include ('includes/user_footer.html'); ?>