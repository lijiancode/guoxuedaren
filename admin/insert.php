<?php
include_once 'include.php';
$type=$_POST['type'];
$title = $_POST['title'];
$content = $_POST['content'];
$num = $_POST['num'];
$classify=$_POST['classify'];
$score=$_POST['score'];
$result="";//考生答案
foreach ($_POST['result'] as $sim){
    $result .=$sim;
}
$datas = array();//定义去除空值数组
$str ="";
$data = [$title,$num,$content,$result,$classify,$score];
    for( $i=0; $i<count($data);$i++){ //拼接sql字符串
        $str =$str."'".$data[$i]."'".",";
    }
    $strs = substr($str, 0,strlen($str)-1); //去除字符串中最后的逗号
    $sql = "insert into vote values('',$type,".$strs.")";
    if(mysql_query($sql,$conn)){
        echo "<script>alert('数据插入成功'); history.go(-1);</script>";
    }
    else {
        echo "<script>alert('数据插入失败，请重新输入'); history.go(-1);</script>";
    }
    mysql_close($conn);