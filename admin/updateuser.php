<?php
include_once 'include.php';
$n = $_GET['id'];
$sql = "update user set addtest=2,time='',ip='',usetime=0,score=0,type1=0,type2=0,type3=0,type4=0,sec=0 where id='$n'";
$result = mysql_query($sql, $conn);
if ($result){
    echo "<meta http-equiv=\"refresh\" content=\"0;url=selectuser.php\"/>";
}
else {
    echo "error".mysql_error();
}

?>