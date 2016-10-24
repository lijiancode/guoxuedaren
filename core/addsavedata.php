<?php
include_once '../admin/include.php';
$info=$_SESSION['info'];
$chk22=$_POST['chk22'];
$chk11=$_POST['chk11'];
// echo json_encode($chk11);
$ids = implode(',', array_keys($chk22));
$sql = "UPDATE addstate SET result = CASE flag ";
foreach ($chk22 as $id => $ordinal) {
    $sql .= sprintf("WHEN %d THEN %d ", $id, $ordinal);
}
$sql .= "END WHERE flag IN ($ids) and info='$info'";
// mysql_query($sql,$conn);
if(mysql_query($sql,$conn)){
    echo "11";
}else{
    echo "12";
}
$ids11 = implode(',', array_keys($chk11));
$sql11 = "UPDATE addstate SET mark = CASE flag ";
foreach ($chk11 as $id11 => $ordinal11) {
    $sql11 .= sprintf("WHEN %d THEN %d ", $id11, $ordinal11);
}
$sql11 .= "END WHERE flag IN ($ids11) and info='$info'";
mysql_query($sql11,$conn);
// $sql22="update user set num=2 where info='$info'";
// mysql_query($sql22,$conn);
mysql_close($conn);