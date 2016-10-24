<?php
include_once 'include.php';
$type=$_POST['type'];
$title = $_POST['title'];
$content = $_POST['content'];
$num = $_POST['num'];
$classify=$_POST['classify'];
$score=$_POST['score'];
$result="";//考生答案
$liid=$_POST['liid'];
foreach ($_POST['result'] as $sim){
    $result .=$sim;
}

$sql = "update vote set type='$type',title='$title',num='$num',content='$content',result='$result',classify='$classify',score='$score' where id='$liid' ";
if(mysql_query($sql,$conn)){
    echo "<script>alert('数据修改成功'); history.go(-1);</script>";
}
else {
    echo "<script>alert('数据修改失败，请重新输入'); history.go(-1);</script>";
}
mysql_close($conn);