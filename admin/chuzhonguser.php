<?php
include_once 'include.php';
// $sql = "select * from user";
$sql = "SELECT * FROM `user` where classify=3 ORDER BY score DESC,usetime ASC,sec ASC,type4 DESC,type3 DESC,type2 DESC,type1 DESC";
$result = mysql_query($sql, $conn);
if (mysql_num_rows($result) > 0) {
    while ($row = mysql_fetch_assoc($result)) { // 循环输入数据开始－－－－－－－－－－－－－－－－－－－－
        $data[] = $row;
    }
}
mysql_query($conn);
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<script type="text/javascript" src="js/addadmin.js"></script>
<title>参与人管理界面</title>
</head>
<body>
<center>
<table width="80%"  border="1" cellpadding="5" cellspacing="0" bgcolor="#cccccc">
<tr><th colspan='5'>参与人信息详情页面</th></tr>
<tr>
<th><a href="selectuser.php" target="rightFrame" style="text-decoration:none;color:red;">全部</a></th>
<th><a href="daxueuser.php" target="rightFrame" style="text-decoration:none;color:red;">大学</a></th>
<th><a href="gaozhonguser.php" target="rightFrame" style="text-decoration:none;color:red;">高中</a></th>
<th><a href="chuzhonguser.php" target="rightFrame" style="text-decoration:none;color:red;">初中</a></th>
<th><a href="xiaoxueuser.php" target="rightFrame" style="text-decoration:none;color:red;">小学</a></th>
</tr>
</table>
<!-- <table width="80%"  border="1" cellpadding="5" cellspacing="0" bgcolor="#cccccc"> -->
<?php
$flag=0;
foreach ($data as $ss) {
    $flag++;
?>
<table width="80%"  border="1" cellpadding="5" cellspacing="0" bgcolor="#cccccc" style="margin-top: 10px;">
<tr>
<td>姓名:<?php echo $ss['name']; ?>&nbsp;&nbsp;&nbsp;&nbsp;<a href="deleteuser.php?id=<?php echo $ss['id']?>">删除</a></td>
<td>身份证信息：<?php echo $ss['info']; ?></td>
</tr>
<tr>
<td>是否加试：</td>
<td><?php
if($ss['addtest']=='1')
echo "否";
else echo "是";?>&nbsp;&nbsp;&nbsp;&nbsp;<a href="updateuser.php?id=<?php echo $ss['id']?>">加试</a></td>
</tr>
<tr>
<td>分数：<?php echo $ss['score']; ?></td>
<td>分组：
<?php
if($ss['classify']=='1')
    echo "全部";
  else if($ss['classify']=='2')
    echo "小学组";
      else if($ss['classify']=='3')
        echo "初中组";
        elseif($ss['classify']=='4')
            echo "高中组";
        else 
            echo "大学组";
            ?></td>
</tr>
<tr>
<td>用时：</td>
<td><?php echo $ss['time']; ?></td>
</tr>
</table>
<?php
}
?>


</center>
</body>
</html>