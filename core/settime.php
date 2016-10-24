<?php
session_start();
$time1=$_POST['ct'];
$time2=time();
$litime=floor($time1/1000-$time2);
if(empty($_SESSION['settime1'])){
    $_SESSION['settime1']=$litime;
}
else{
    $litime=0;
}
echo $litime;
?>