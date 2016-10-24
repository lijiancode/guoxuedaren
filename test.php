<?php 
// include_once 'admin/Database.php';
// for($i=1;$i<=250;$i++){
//     $str="t".$i;
//     if($i<10){
//         $tt="00".$i;
//     }elseif ($i<100){
//         $tt="0".$i;
//     }
//     elseif ($i<1000){
//         $tt=$i;
//     }
//     $str1="201610100000000".$tt;
//    $sql="insert into user value('','$str','1','$str1','1','5','0','','0','','0','0','0','0','0','0','')";
//    mysql_query($sql,$conn);
// }
session_start();
$time1=$_POST['ct'];
$time2=time();
$litime=floor($time1/1000-$time2);
$_SESSION['litime']=$litime;
echo $litime;
?>