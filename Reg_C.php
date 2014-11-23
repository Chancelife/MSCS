<?php
include ('includes/user_header.html');
?>

<?php
if(!isset($_POST['submit'])){
    
    echo '非法访问!即将返回注册页面';
    echo '<META HTTP-EQUIV="Refresh" CONTENT="2; URL=Reg_V.php">';
}
$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];

if(!preg_match('/^[\w\x80-\xff]{3,15}$/', $username)){
    exit('错误：用户名不符合规定。<a href="javascript:history.back(-1);">返回</a>');
}
if(strlen($password) < 4){
    exit('错误：密码长度不符合规定。<a href="javascript:history.back(-1);">返回</a>');
}
if(!preg_match('/^([0-9A-Za-z\\-_\\.]+)@([0-9a-z]+\\.[a-z]{2,3}(\\.[a-z]{2})?)$/i', $email)){
    exit('错误：电子邮箱格式错误。<a href="javascript:history.back(-1);">返回</a>');
}

include('class/conn.php');

$check_query = mysqli_query($mysqli,"select uid from user where username='$username' limit 1");
if(mysqli_fetch_array($check_query)){
    echo '错误：用户名 ',$username,' 已存在。<a href="javascript:history.back(-1);">返回</a>';
    exit;
}

$password = MD5($password);
$regdate = time();
$sql = "INSERT INTO user(username,password,class,email,regdate)VALUES('$username','$password','1','$email',
$regdate)";
if(mysqli_query($mysqli,$sql)){
    echo('用户注册成功！');
    echo '<META HTTP-EQUIV="Refresh" CONTENT="2; URL=Login_V.php?user='.$username.'">';
    echo '两秒后返回登录界面';
} else {
    echo '抱歉！添加数据失败：',mysql_error(),'<br />';
    echo '点击此处 <a href="javascript:history.back(-1);">返回</a> 重试';
}
?>
<?php include ('includes/user_footer.html'); ?>