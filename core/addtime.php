<?php
include_once '../admin/include.php';
$info=$_SESSION['info'];
// $kaoshitime=$_SESSION['kaoshi_time'];
$kaoshitime=120;
if(empty($_SESSION['time2'])){ //防止异常退出，由于前面已经赋值，正常情况执行不到
    $_SESSION['time2']=time();
}
$nowtt=time();
$sessionnum=$_SESSION['time2'];
$timecha = $nowtt-$sessionnum;
$sqltime="select * from user where info='$info'";
$timeresult=mysql_query($sqltime,$conn);
$timeqq=mysql_fetch_assoc($timeresult);
$timecha=$timecha+$timeqq['sec'];
// echo $nowtt."|".$sessionnum."|".$timecha."|".$timeqq['sec'];
if($timecha>$kaoshitime){
     $sqlupdate="update user set sec='$kaoshitime' where info='$info'";
     // mysql_query($sqlupdate,$conn);
     // echo $time['time']-$time['time'];//减去一个数，保证立刻结束
     // echo $time['time'];
     // echo $time['time']-10;
}
else
{
	$sqlupdate="update user set sec='$timecha' where info='$info'";
	// mysql_query($sqlupdate,$conn);
	// echo $time['time'];
}
if(mysql_query($sqlupdate,$conn)){
    $_SESSION['time2']=time();
}
// echo $timeqq['time'];
mysql_close($conn);
?>