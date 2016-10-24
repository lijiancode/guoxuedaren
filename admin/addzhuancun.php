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
$sql = "SELECT * FROM `user` where addtest=2 ORDER BY score DESC,type2 DESC,type1 DESC,num ASC,id ";
$result = mysql_query($sql, $conn);
       while($row = mysql_fetch_array($result)) { // Ñ­»·ÊäÈëÊý¾Ý¿ªÊ¼£­£­£­£­£­£­£­£­£­£­£­£­£­£­£­£­£­£­£­£­
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
    if($sim['usetime']>=1){
        $ttt=($sim['usetime']-1)*20+$sim['sec'];
    }else{
        $ttt=$sim['usetime']*20+$sim['sec'];
    }
//     $ttt=$sim['usetime']*20+$sim['sec'];
    if($ttt>120){
        $ttt=120;
    }
    $tm1=floor($ttt/60);
    $tm2=$ttt%60;
    $time=$tm1."分钟".$tm2."秒";
//     $time=$time/2;
//     $time=round($time,2);
    $type1=$sim['type4'];
    $type2=$sim['type3'];
    $type3=$sim['type2'];
    $type4=$sim['type1'];
    $num++;
    $sqlsim="insert into adddetail(name,info,classify,area,score,time,type1,type2,type3,type4,num) value('$name','$info','$classify','$area','$score','$time','$type1','$type2','$type3','$type4','$num')";
    mysql_query($sqlsim,$conn);
}
$sqlrr="update time set flag=1 where id=3";
mysql_query($sqlrr, $conn);
echo "<script>history.go(-1);</script>";
}
mysql_close($conn);
