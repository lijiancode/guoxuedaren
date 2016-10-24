<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<link href="css/login.css" rel="stylesheet" type="text/css">
<title>国学达人后台登录</title>
</head>
<body>
<div class="content">
<form action="login.php" method="post">
<div class="left"><!--登陆界面左边部分-->
<div id="content"></div><!--左部上部分内容填充-->
<center>
<label>用户名：</label><input type="text" id="name" placeholder="请输入用户名" name="name" style="width:180px; height:20px; line-height:20px; border-radius:6px;"/><br><p></p>
<label>密&nbsp;码：</label><input type="password" placeholder="请输入密码" id="pwd" name="pwd" style="width:180px; height:20px; border-radius:6px; line-height:20px;"><br>
<p></p>
<input type="submit" name="submit" value="提交" style="width:80px; border-radius:2px; background-color:#F8F5F5"/>
<input type="reset"  name="reset" value="重置" style="width:80px; border-radius:2px; background-color:#F8F5F5"/>
</center></div>
<div class="right"><!--登陆界面右边部分-->

</div>


</form>
</div>
</body>
</html>