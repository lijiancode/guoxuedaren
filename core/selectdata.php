<?php 
session_start();
include_once '../admin/Database.php';
$boxid=$_POST['bid']+1;
$info=$_SESSION['info'];
$act=1;
if(empty($_SESSION['coot'])){
    $_SESSION['coot']=1;
    $act=$_SESSION['coot'];
}
else{
    $act=$_SESSION['coot'];
}
$chk1=$_POST['chk1'];
$chk2=$_POST['chk2'];
$strchk2=implode("", $chk2);
$sqlmark="update state set mark='$chk1[0]',result='$strchk2' where info='$info' and flag='$act'";
mysql_query($sqlmark,$conn);
$sql="SELECT * FROM vote WHERE id=(select sid FROM state WHERE info='$info' and flag='$boxid')";
$reldata = mysql_query($sql, $conn);
$row2 = mysql_fetch_assoc($reldata);
$sqlflag="select result ret,mark from state where info='$info' and flag='$boxid'";
$flagdata=mysql_query($sqlflag,$conn);
$row3=mysql_fetch_assoc($flagdata);
$row4=array_merge($row2,$row3);
echo json_encode($row4);
$_SESSION['coot']=$boxid;
mysql_close($conn);
?>