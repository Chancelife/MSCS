<?php
include ('includes/admin_header.html');
?>
<?php


if(!isset($_SESSION['userid'])){
    echo 'ÄúÉÐÎ´µÇÂ¼£¬¼´½«Ìø×ªµ½µÇÂ¼Ò³Ãæ';
    echo '<META HTTP-EQUIV="Refresh" CONTENT="2; URL=Login_V.php">';
    exit();
}
$userid = $_SESSION['userid'];
$username = $_SESSION['username'];

echo 'User:'.$username.', Welcome Back!';


?>
<?php include ('includes/admin_footer.html'); ?>