<?php
include_once 'include.php';
$n = $_GET['id'];
$sql = "delete from user where id=".$n;
$result = mysql_query($sql, $conn);
if ($result){
    echo "删除成功";
    echo "<meta http-equiv=\"refresh\" content=\"1;url=selectuser.php\"/>";
}
else {
    echo "error".mysql_error();
}

?>