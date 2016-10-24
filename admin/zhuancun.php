<?php
session_start();
$num=0;
include_once '../admin/Database.php';
$insertsql="select * from time";
$resultinsert=mysql_query($insertsql, $conn);
$rowinsert = mysql_fetch_array($resultinsert);
if($rowinsert['flag']==1){
    echo "<script>history.go(-1);</script>";
}
else{
$sql = "SELECT * FROM `user` ORDER BY score DESC,type4 DESC,type2 DESC,type3 DESC,type1 DESC,num ASC,id ";
$result = mysql_query($sql, $conn);
       while($row = mysql_fetch_array($result)) { // 循环输入数据开始－－－－－－－－－－－－－－－－－－－－
              $data[] = $row;
       }
foreach ($data as $sim){
    $name=$sim['name'];
    $info=$sim['info'];
    $classify=$sim['classify'];
    if($classify==1){
        $classify="全部";
    }elseif($classify==2){
        $classify="小学组";
    }elseif($classify==3){
        $classify="初中组";
    }elseif($classify==4){
        $classify="高中组";
    }elseif($classify==5){
        $classify="大学组";
    }
    $area=$sim['area'];
    $score=$sim['score'];
    $ttt=$sim['num'];    
    if($ttt>1800){
        $ttt=1800;
    }
    $tm1=floor($ttt/60);
    $tm2=$ttt%60;
    $time=$tm1."分".$tm2."秒";
//     $time=$time/2;
//     $time=round($time,2);
    $type1=$sim['type4'];
    $type2=$sim['type3'];
    $type3=$sim['type2'];
    $type4=$sim['type1'];
    $num++;
    $sqlsim="insert into detail(name,info,classify,area,score,time,type1,type2,type3,type4,num) value('$name','$info','$classify','$area','$score','$time','$type1','$type2','$type3','$type4','$num')";
    mysql_query($sqlsim,$conn);
}
$sqlrr="update time set flag=1 where id=3";
mysql_query($sqlrr, $conn);
echo "<script>history.go(-1);</script>";
}
mysql_close($conn);
