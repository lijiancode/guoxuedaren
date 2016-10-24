<?php
session_start();
include_once '../admin/Database.php';
if(empty($_SESSION['time2'])){
	$_SESSION['time2']=time();
}
$logins=time();
$info=$_SESSION['info'];
$sql="select * from user where info='$info'";
$result=mysql_query($sql,$conn);
$row=mysql_fetch_assoc($result);
if(empty($row['starttime'])){
	$sqlupdate="update user set starttime='$logins' where info='$info'";
    mysql_query($sqlupdate,$conn);
}
echo $logins;
mysql_close($conn);
?>