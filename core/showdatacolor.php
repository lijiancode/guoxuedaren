<?php
include_once '../admin/include.php';
$info=$_SESSION['info'];
$sql="SELECT result,mark FROM state WHERE info='$info'";
$data1=array();
$relda = mysql_query($sql, $conn);
if(mysql_num_rows($relda)>0){
    while ($row1 = mysql_fetch_assoc($relda)) {
        $data1[] = $row1;
    }
}
mysql_close($conn);
echo json_encode($data1);