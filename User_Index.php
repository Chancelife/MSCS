<?php
include ('includes/user_header.html');
?>
<?php


if(!isset($_SESSION['userid'])){
    echo '您尚未登录，即将跳转到登录页面';
    echo '<META HTTP-EQUIV="Refresh" CONTENT="2; URL=Login_V.php">';
    exit();
}
$userid = $_SESSION['userid'];
$username = $_SESSION['username'];

echo 'User:'.$username.', Welcome Back!';


?>
<?php include ('includes/user_footer.html'); ?>