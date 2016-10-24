<?php
include_once 'include.php';
$sql = "select * from vote";
$result = mysql_query($sql, $conn);
if (mysql_num_rows($result) > 0) {
    while ($row = mysql_fetch_assoc($result)) { // 循环输入数据开始－－－－－－－－－－－－－－－－－－－－
        $data[] = $row;
    }
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>查看参赛题目</title>
<style type="text/css">
a{
	text-decoration:none;
}
</style>
</head>
<body>
<center>
<table width="80%"  border="1" cellpadding="5" cellspacing="0" bgcolor="#cccccc">
<tr><th>查看参赛题目</th></tr>
</table>
<table width="80%"  border="1" cellpadding="5" cellspacing="0" bgcolor="#cccccc">
<?php
$flag=0;
foreach ($data as $ss) {
    $flag++;
?>
<tr>
<td>题目<?php echo $flag;?></td>
<td>
<a href="selectdatadetail.php?id=<?php echo $ss['id']?>">
<?php echo $ss['title']; ?>
</a>
&nbsp;&nbsp;&nbsp;&nbsp;<a href="delete.php?id=<?php echo $ss['id']?>">删除</a>
&nbsp;&nbsp;&nbsp;&nbsp;<a href="selectdataupdate.php?id=<?php echo $ss['id']?>">修改</a>
</td>
</tr>
<?php
}
?>
</table>

</center>
</body>
</html>