<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<script type="text/javascript" src="js/addadmin.js"></script>
<title>增加管理员</title>
</head>
<body>
<center>
<table width="60%"  border="1" cellpadding="5" cellspacing="0" bgcolor="#cccccc">
<tr><th>请填写管理员信息</th></tr>
</table>
<p></p>
<form action="insert_admin.php" method="post" name="f1">
<table width="60%"  border="1" cellpadding="5" cellspacing="0" bgcolor="#cccccc">
<tr>
<td width="120px;">管理员姓名:
</td>
<td><input type="text" id="name" name="name" onBlur="labelname()"><label id="sure_name" style="display:inline"></label></td>
</tr>
<tr>
<td>登陆密码:</td>
<td><input type="password" id="pwd" name="pwd" ></td>
</tr>
<tr>
<td>确认密码:</td>
<td><input type="password" id="pwd1" name="pwd1" onBlur="labelpwd()"><label id="sure_pwd" style="display:inline"></label></td>
</tr>
<tr>
<td>电子邮箱:</td>
<td><input type="mail" name="mail" ></td>
</tr>
<tr>
<td></td>
<td>
<input type="submit" id="submit" value="提交">
<input type="reset" value="重置">
</td>
</tr>
</table>
</form>
</center>
</body>
</html>