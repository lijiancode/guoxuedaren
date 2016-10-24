<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<script type="text/javascript" src="js/addadmin.js"></script>
<title>增加参与人</title>
</head>
<body>
<center>
<table width="60%"  border="1" cellpadding="5" cellspacing="0" bgcolor="#cccccc">
<tr><th>请填写参与人信息</th></tr>
</table>
<p></p>
<form action="adduserdata.php" method="post" name="f1">
<table width="60%"  border="1" cellpadding="5" cellspacing="0" bgcolor="#cccccc">
<tr>
<td width="120px;">参与者姓名:
</td>
<td><input type="text" id="name" name="name" onBlur="labelname()"><label id="sure_name" style="display:inline"></label></td>
</tr>
<tr>
<td>性别:</td>
<td>
<select name="sex">
<option value="1">男</option>
<option value="2">女</option>
</select>
</td>
</tr>
<tr>
<td>身份证信息:</td>
<td><input type="text" name="info" ></td>
</tr>
<tr>
<td>是否参加复试:</td>
<td>
<select name="addtest">
<option value="1">否</option>
<option value="2">是</option>
</select>
</td>
</tr>
<tr>
<td>分组:</td>
<td>
<select name="classify">
<option value="1">全部</option>
<option value="2">小学组</option>
<option value="3">初中组</option>
<option value="4">高中组</option>
<option value="5">大学组</option>
</select>
</td>
</tr>
<tr>
<td>所在学校</td>
<td>
<textarea rows="3" cols="20" id="area" name="area"></textarea>
</td>
</tr>
<tr>
<td></td>
<td>以下信息无需手工填写</td>
</tr>
<tr>
<td>分数:</td>
<td><input type="text" name="score"></td>
</tr>
<tr>
<td>用时:</td>
<td><input type="text" name="time" ></td>
</tr>
<tr>
<td>名次:</td>
<td><input type="text" name="rank" ></td>
</tr>
<tr>
<td>IP:</td>
<td><input type="text" name="ip" ></td>
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