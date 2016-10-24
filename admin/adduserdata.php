<?php
include_once 'include.php';
$name = $_POST['name'];
$sex = $_POST['sex'];
$info = $_POST['info'];
$addtest = $_POST['addtest'];
$classify=$_POST['classify'];
$area=$_POST['area'];
$sql = "insert into user (name,sex,info,addtest,classify,area) values('$name','$sex','$info','$addtest','$classify','$area')";
if (mysql_query($sql, $conn)) {
    echo "<script>alert('参与者添加成功'); history.go(-1);</script>";
} else {
    echo "<script>alert('参与者添加失败，请重新添加'); history.go(-1);</script>";
}
mysql_close($conn);