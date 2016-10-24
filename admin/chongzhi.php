<?php
include_once 'Database.php';
$sql="update time set flag=0 where id=3";
mysql_query($sql,$conn);
$sql1="delete from detail";
mysql_query($sql1,$conn);
mysql_close($conn);
echo "<meta http-equiv=\"refresh\" content=\"0;url=zhuancun.php\"/>";