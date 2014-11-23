<?php
include ('includes/user_header.html');
?>

<style type="text/css">
    html{font-size:12px;}
    fieldset{width:520px; margin: 0 auto;}
    legend{font-weight:bold; font-size:14px;}
    label{float:left; width:70px; margin-left:10px;}
    .left{margin-left:80px;}
    .input{width:150px;}
    span{color: #666666;}
</style>

<fieldset>
<legend>Register</legend>
<form name="RegForm" method="post" action="Reg_C.php" onSubmit="return InputCheck(this)">
<p>
<label for="username" class="label">Username:</label>
<input id="username" name="username" type="text" class="input" />
<span>(必填，3-15字符长度，支持汉字、字母、数字及_)</span>
<p/>
<p>
<label for="password" class="label">Password:</label>
<input id="password" name="password" type="password" class="input" />
<span>(必填，不得少于4位)</span>
<p/>
<p>
<label for="repass" class="label">Confirm Password:</label>
<input id="repass" name="repass" type="password" class="input" />
<span>(再次输入密码)</span>
<p/>
<p>
<label for="email" class="label">E-mail Address:</label>
<input id="email" name="email" type="text" class="input" />
<span>(必填)</span>
<p/>
<p>
<input type="submit" name="submit" value="  Submit  " class="left" />
</p>
</form>
</fieldset>

<script language=JavaScript>
<!--

function InputCheck(RegForm)
{
  if (RegForm.username.value == "")
  {
    alert("用户名不可为空!");
    RegForm.username.focus();
    return (false);
  }
  if (RegForm.password.value == "")
  {
    alert("必须设定登录密码!");
    RegForm.password.focus();
    return (false);
  }
  if (RegForm.repass.value != RegForm.password.value)
  {
    alert("两次密码不一致!");
    RegForm.repass.focus();
    return (false);
  }
  if (RegForm.email.value == "")
  {
    alert("电子邮箱不可为空!");
    RegForm.email.focus();
    return (false);
  }
}

//-->
</script>

<?php include ('includes/user_footer.html'); ?>