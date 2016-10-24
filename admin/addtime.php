<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>“电信杯”第三届山东省青少年“国学达人”挑战赛总决赛（预赛）
</title>
</head>
<body>
<div id="content">
<form action="addtime.php" method="post">
<div id="login">
<center>
<label>请输入要增加时间学生的身份证号码</label>
<input type="text" id="name" placeholder="身份证号码" name="name" style="width:180px; height:20px; line-height:20px; border-radius:6px;"/><br>
<p></p>
<label>请输入要增加时间学生的身份证号码</label><input type="text" id="num" placeholder="请输入延长时间，单位为秒" name="num" style="width:180px; height:20px; line-height:20px; border-radius:6px;"/><br>
<p></p>
<input type="submit" name="submit" value="确定增加" style="width:80px; border-radius:2px; background-color:#F8F5F5"/>
<input type="reset"  name="reset" value="重置" style="width:80px; border-radius:2px; background-color:#F8F5F5"/>
</center>
</div>
</form>
</div>
</body>
</html>
<?php 
$name=$_POST['name'];
$num=$_POST['num'];
include_once 'Database.php';
$sql2 = "select * from user where info='$name'";
$result = mysql_query($sql2, $conn);
$row = mysql_fetch_assoc($result);
$time=$row['time']+$num;
$sql="update user set time='$time' where info='$name'";
mysql_query($sql,$conn);
mysql_close($conn);
?>