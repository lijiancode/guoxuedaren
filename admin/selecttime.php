<?php
include_once 'include.php';
$sql = "select * from time";
$result = mysql_query($sql, $conn);
if (mysql_num_rows($result) > 0) {
    while ($row = mysql_fetch_assoc($result)) { // 循环输入数据开始－－－－－－－－－－－－－－－－－－－－
        $data[] = $row;
    }
}
date_default_timezone_set("Asia/Shanghai");
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<script type="text/javascript" src="js/addadmin.js"></script>
<title>查看时间设置</title>
</head>
<body>
<center>
<table width="80%"  border="1" cellpadding="5" cellspacing="0" bgcolor="#cccccc">
<tr><th>比赛设置查看</th></tr>
</table>
<table width="80%"  border="1" cellpadding="5" cellspacing="0" bgcolor="#cccccc">
<?php
$flag=0;
foreach ($data as $ss) {
    $flag++;
?>
<tr>
<td>开始时间</td>
<td><?php echo date('Y-m-d H:i',$ss[starttime]);?></td>
</tr>
<tr>
<td>结束时间</td>
<td><?php echo date('Y-m-d H:i',$ss['endtime']);?></td>
</tr>
<tr>
<td>比赛类型</td>
<td><?php 
 if($ss['addtest']==1){
 echo "预赛";
 }elseif ($ss['addtest']==2){
 echo "加试赛";
 }elseif ($ss['addtest'==3]){
 echo "考前测试";
 }
?></td>
</tr>
<tr>
<td>参加组员</td>
<td><?php 
 if($ss['titype']==1){
 echo "全部";
 }elseif ($ss['titype']==2){
 echo "小学组";
 }elseif ($ss['titype'==3]){
 echo "初中组";
 }elseif ($ss['titype'==4]){
 echo "高中组";
 }elseif ($ss['titype'==5]){
 echo "大学组";
 }
?>
</td>
</tr>
<tr>
<td>常规性单选题个数</td>
<td>
<?php echo $ss['normal1'];?>
</td>
</tr>
<tr>
<td>综合性单选题个数</td>
<td><?php echo $ss['type1']; ?></td>
</tr>
<tr>
<td>常规性多选题个数</td>
<td><?php echo $ss['normal2']; ?></td>
</tr>
<tr>
<td>综合性多选题个数</td>
<td><?php echo $ss['type2']; ?></td>
</tr>
<?php
}
?>
</table>

</center>
</body>
</html>