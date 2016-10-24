<?php
include_once 'Database.php';
$sql="select * from user where time !=''";
$result = mysql_query($sql, $conn);
$num=mysql_num_rows($result);// 未交卷人数
$sql2="select * from user where ip ='' and time=''";
$result2 = mysql_query($sql2, $conn);
$num2=mysql_num_rows($result2); //未登陆人数
if ($result&& $result2){
	echo "参加人数".$num;
}
$sql3="select * from user where ip ='' and time!=''";
$result3 = mysql_query($sql3, $conn);
$num3=mysql_num_rows($result3);//正在答题人数
if($result3){
	echo "<br>"."正在答题人数".$num3;
}
?>