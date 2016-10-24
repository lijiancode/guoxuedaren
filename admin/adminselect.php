<?php
include_once 'include.php';
$sql = "select * from vip";
$result = mysql_query($sql, $conn);
if (mysql_num_rows($result) > 0) {
    while ($row = mysql_fetch_assoc($result)) { // 循环输入数据开始－－－－－－－－－－－－－－－－－－－－
        $data[] = $row;
    }
}
mysql_close($conn);
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<script type="text/javascript" src="js/addadmin.js"></script>
<title>管理员界面</title>
</head>
<body>
<center>
<table width="80%"  border="1" cellpadding="5" cellspacing="0" bgcolor="#cccccc">
<tr><th>管理员信息详情页面</th></tr>
</table>
<table width="80%"  border="1" cellpadding="5" cellspacing="0" bgcolor="#cccccc">
<?php
$flag=0;
foreach ($data as $ss) {
    $flag++;
?>
<tr>
<td>管理员<?php echo $flag;?></td>
<td>姓名:<?php echo $ss['name']; ?>&nbsp;&nbsp;&nbsp;&nbsp;</td>
</tr>
<?php
}
?>
</table>

</center>
</body>
</html>