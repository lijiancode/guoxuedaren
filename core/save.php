<?php
set_time_limit(0);
session_start();
include_once '../admin/Database.php';
$info=$_SESSION['info'];
$jiaojuanshijian=time();
$mysql1="select * from user where info='$info'";
$mysql2=mysql_query($mysql1,$conn);
$mysql3=mysql_fetch_assoc($mysql2);
$strattime=$mysql3['starttime'];
$mysql4=$jiaojuanshijian-$strattime;//秒数 连续
$duansecond=$jiaojuanshijian-$_SESSION['time2'];
$sqlupdate="update user set usetime='$mysql4',secend='$duansecond' where info='$info'";
mysql_query($sqlupdate,$conn);
$data=array();
$mark=array();
for($j=1;$j<=60;$j++){
    $result="";
    foreach( $_POST['a'.$j] as $ii)
    {
        $result .= $ii;
    }
    $mm=$_POST['remark'.$j];
    $data[$j]=$result;
    $mark[$j]=$mm;
}
$ids = implode(',', array_keys($data));
$sql = "UPDATE state SET result = CASE flag ";
foreach ($data as $id => $ordinal) {
    $sql .= sprintf("WHEN %d THEN %d ", $id, $ordinal);
}
$sql .= "END WHERE flag IN ($ids) and info='$info'";
$resultinsert=mysql_query($sql,$conn);
$idss = implode(',', array_keys($mark));
$sql2 = "UPDATE state SET mark = CASE flag ";
foreach ($mark as $id1 => $ordinal1) {
    $sql2 .= sprintf("WHEN %d THEN %d ", $id1, $ordinal1);
}
$sql2 .= "END WHERE flag IN ($idss) and info='$info'";
mysql_query($sql2,$conn);
if($resultinsert){
    echo "正在保存答案，计算成绩，请等待...";
    echo "<meta http-equiv=\"refresh\" content=\"3;url=result.php\"/>";
}
else{
    echo "答案提交失败，请重新提交";
    echo "<meta http-equiv=\"refresh\" content=\"3;url=answer.php\"/>";
}
