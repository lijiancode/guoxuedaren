<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>“电信杯”第三届山东省青少年“国学达人”挑战赛总决赛（预赛）
</title>
</head>
<body>
<div id="content">
<form action="clearip.php" method="post">
<div id="login">
<center>
<label>请输入要修改学生的身份证号码</label><input type="text" id="name" placeholder="身份证号码" name="name" style="width:180px; height:20px; line-height:20px; border-radius:6px;"/><br><p></p>
<input type="submit" name="submit" value="清除IP" style="width:80px; border-radius:2px; background-color:#F8F5F5"/>
<input type="reset"  name="reset" value="重置" style="width:80px; border-radius:2px; background-color:#F8F5F5"/>
</center>
</div>
</form>
</div>
</body>
</html>
<?php 
$name=$_POST['name'];
include_once 'Database.php';
$sql="update user set ip='',time='',score=0,usetime=0,num=0,sec=0,secend=0,starttime='' where info='$name'";
mysql_query($sql,$conn);
mysql_close($conn);
?>