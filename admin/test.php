<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>“电信杯”第三届山东省青少年“国学达人”挑战赛总决赛（预赛）
</title>
</head>
<body>
<div id="content">
<form action="test.php" method="post">
<div id="login">
<center>
<label>请输入要修改学生的身份证号码</label><input type="text" id="name" placeholder="身份证号码" name="name" style="width:180px; height:20px; line-height:20px; border-radius:6px;"/><br><p></p>
<input type="submit" name="submit" value="重新答题" style="width:80px; border-radius:2px; background-color:#F8F5F5"/>
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
// $sql="update user set time='',ip='',usetime=0,score=0,type1=0,type2=0,type3=0,type4=0,sec=0,num=0,secend=0,starttime='',temptime='' where info='$name'";
// mysql_query($sql,$conn);
// $sql1="update state set result='',mark='' where info='$name' where info='$name'";
// mysql_query($sql1,$conn);
$sql="delete from state where info='$name'";
mysql_query($sql,$conn);
$sql1="delete from data60 where info='$name'";
mysql_query($sql1,$conn);
$sql2="update user set time='',ip='',usetime=0,score=0,type1=0,type2=0,type3=0,type4=0,sec=0,num=0,secend=0,starttime='',temptime='',insertflag=0 where info='$name'";
mysql_query($sql2,$conn);
// $sql1="update state set result='',mark='' where info='$name' where info='$name'";
// mysql_query($sql1,$conn);
?>