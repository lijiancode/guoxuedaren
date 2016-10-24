<?php
$sum=0;
$totalsum=0;
$type1=0;
$type2=0;
$type3=0;
$type4=0;
$totaltype1=0;
$totaltype2=0;
$totaltype3=0;
$totaltype4=0;
session_start();
$info=$_SESSION['info'];
if (empty($_SESSION["name"]) && empty($_SESSION["info"])) {//登陆session操作
    echo "<meta http-equiv=\"refresh\" content=\"0;url=..\index.php\"/>";
}
include_once '../admin/Database.php';
$sqlsum="select * from user where info='$info'";
$resultsum=mysql_query($sqlsum,$conn);
$rowsum=mysql_fetch_assoc($resultsum);
if(empty($rowsum['temptime'])|| $rowsum['temptime']==""){
   $numsum=$rowsum['usetime'];
}else{
    if($rowsum['usetime']<$rowsum['sec']+$rowsum['secend']){
    $numsum=$rowsum['sec']+$rowsum['secend'];
     }
     else{
       $numsum=$rowsum['usetime'];
     }
}
$sqlrel="select * from addstate  where info='$info'";
$result=mysql_query($sqlrel,$conn);
while ($rowrel=mysql_fetch_assoc($result)){
    $datarel[]=$rowrel;
}
foreach ($datarel as $data){
    if($data['result']==$data['answer']){
        if($data['score']==1){
            $sum=$sum+0.5;
            $type1++;
        }
        elseif ($data['score']==2){
            $sum=$sum+3.5;
            $type2++;
        }
    }
    if($data['score']==1){
        $totaltype1++;
    }
    elseif ($data['score']==2){
        $totaltype2++;
    }
}
$ip=$_SERVER['REMOTE_ADDR'];
if($totaltype1!=0){
//     $totaltype1=($type1/$totaltype1)*100;
//     $totaltype1=round($totaltype1,2);
    $totaltype1=$type1;

}
if($totaltype2!=0){
//     $totaltype2=($type2/$totaltype2)*100;
//     $totaltype2=round($totaltype2,2);
    $totaltype2=$type2;
}
// $time=time()%20-3;
$sqlip="update user set ip='$ip',score='$sum',type1='$totaltype1',type2='$totaltype2',num='$numsum' where info='$info'";
mysql_query($sqlip,$conn);
mysql_close($conn);
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<link href="../css/index.css" rel="stylesheet" type="text/css">
<title>“电信杯”第三届山东省青少年“国学达人”挑战赛总决赛（加试赛）
</title>
</head>
<body>
<div style="width: 1000px; height: 605px; margin: 0 auto;">
<div style="width: 1000px; height:175px;"><img src="../img/top.gif"></div>
<div style="width: 1000px; height: 250px; padding-top: 150px;">
<center>
<?php
echo "欢迎".$_SESSION["name"]."参加本次比赛,";
echo "您的总分".$sum."分";
?></center>
<p></p></br>
<center><button type="button" onclick="loginout()" style="width:114px;height:37px; outline: 0; border-width: 0; background-image: url(../img/out.gif);" onclick="show_result()"></button></center>
<script type="text/javascript">
function loginout(){
window.location.href="../index.php";
}
</script>
</div>
<div style="width: 1000px; height: 33px;"><img src="../img/button.gif"></div>
</div>
</body>
</html>
<?php
$_SESSION['info']="";
$_SESSION['name']="";
?>