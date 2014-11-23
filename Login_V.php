<?php
include ('includes/user_header.html');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>用户登录</title>
<style type="text/css">
    html{font-size:12px;}
    fieldset{width:520px; margin: 0 auto;}
    legend{font-weight:bold; font-size:14px;}
    label{float:left; width:70px; margin-left:10px;}
    .left{margin-left:80px;}
    .right{margin-left:40px}
    .input{width:170px;}
    span{color: #666666;}
</style>
<script language=JavaScript>
<!--

function InputCheck(LoginForm)
{
  if (LoginForm.username.value == "")
  {
    alert("请输入用户名!");
    LoginForm.username.focus();
    return (false);
  }
  if (LoginForm.password.value == "")
  {
    alert("请输入密码!");
    LoginForm.password.focus();
    return (false);
  }
}

//-->
</script>
<?php
    $username_temp = "";
    if(isset($_GET['user'])) 
{   
    $username_temp = $_GET['user'];
    }else{

    }
?>
</head>
<body>
<div>
<fieldset>
<legend>Login</legend>
<form name="LoginForm" method="post" action="Login_C.php" onSubmit="return InputCheck(this)">
<p>
<label for="username" class="label">Username:</label>
<input id="username" name="username" value="<?php echo $username_temp?>" type="text" class="input" />
<p/>
<p>
<label for="password" class="label">Password:</label>
<input id="password" name="password" type="password" class="input" />
<p/>
<p>
<input type="submit" name="submit" value="  Submit  " class="left" />
<a href="Reg_V.php"><input type="button" name="Reg" value="  Register  " class="right"/></a>
</p>
</form>
</fieldset>
</div>
</body>
</html>

<?php include ('includes/user_footer.html'); ?>