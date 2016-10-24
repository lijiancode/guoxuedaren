<?php
include_once 'Database.php';
$starttime=$_POST['starttime'];
$endtime=$_POST['endtime'];
$addtest=$_POST['addtest'];
$titype=$_POST['titype'];
$normal1=$_POST['normal1'];
$type1=$_POST['type1'];
$normal2=$_POST['normal2'];
$type2=$_POST['type2'];
$starttime=timetranfer($starttime);
$endtime=timetranfer($endtime);
$sql="update time set starttime='$starttime',endtime='$endtime',addtest='$addtest',titype='$titype',normal1='$normal1',type1='$type1',normal2='$normal2',type2='$type2' where id=3";
if(mysql_query($sql, $conn)){
    echo "设置成功";
   // echo "<script>history.go(-1);</script>";
}
else{
    echo "数据插入错误";
}
mysql_close($conn);
function timetranfer($time){
    list($year,$month,$day,$hour,$minute,$second)=split("[-T: ]", $time);
    $second=mktime($hour,$minute,$second,$month,$day,$year);
    $second=$second-8*60*60;
    return $second;
}