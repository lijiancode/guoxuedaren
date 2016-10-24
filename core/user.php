<?php
session_start();
include_once '../admin/Database.php';
$info=$_SESSION['info'];
$name=$_SESSION['name'];
if (empty($info)||empty($name)) {//登陆session操作
    echo "<meta http-equiv=\"refresh\" content=\"0;url=../index.php\"/>";
 } 
 elseif($_SESSION['insert']!=1){
    $sql = "select * from user where info='$info'";
    $sql2="select * from time";
    $result = mysql_query($sql, $conn);
        while ($row = mysql_fetch_assoc($result)) {
            $data = $row;
        }//data数组存储登录用户信息
    $result2 = mysql_query($sql2, $conn);
        while ($row2 = mysql_fetch_assoc($result2)) {
            $data2 = $row2;
        }//data2数组存储管理员设置信息
    if(!empty($data2['titype'])){
            $arr40=array();
            $type=$data['classify'];
            if($data2['titype']==1){
//                 $sqlnum="select id from vote where classify=1";
                $sqlnum="select id from vote where classify='$type'";
            }
            else{
                $sqlnum="select id from vote where classify='$type'";
            }
            $resultnum = mysql_query($sqlnum, $conn);
            $number=mysql_num_rows($resultnum);

            if ($number>0) {
                while ($rownum = mysql_fetch_assoc($resultnum)) { // 循环输入数据开始－－－－－－－－－－－－－－－－－－－－
                    $datanum[] = $rownum;
                }
               
                foreach ($datanum as $datasim){
                    array_push($arr40, $datasim["id"]);
                }
            }

        $dataid=$arr40; 
        shuffle($dataid);
        if($_SESSION["insert"]!=1){
               $infotemp=$_SESSION['info'];
             for($yi=0;$yi<count($dataid);$yi++){
               $sqlid = "insert into data60(info,num) values('$infotemp','$dataid[$yi]')";
               mysql_query($sqlid, $conn);
             }
             $str123="";
             for($yii=0;$yii<count($dataid);$yii++){
                 $teid=$dataid[$yii];
                 $sqltotal="select * from vote where id='$teid'";
                 $resulttotal=mysql_query($sqltotal,$conn);
                 $rowtotal=mysql_fetch_assoc($resulttotal);
                 $ttt=$yii+1;
                 $tempname=$_SESSION['name'];
                 $tempinfo=$_SESSION['info'];
                 $tempclassify=$rowtotal['classify'];
                 $tempscore=$rowtotal['score'];
                 $tempanswer=$rowtotal['result'];
                 $tempkind=$rowtotal['type'];
                 $temptitle=$rowtotal['title'];
                 $tempnum=$rowtotal['num'];
                 $tempcontent=$rowtotal['content'];
                 $str123=$str123.','.'('.$teid.','.$ttt.','.'\''.$tempinfo.'\''.',\''.$tempname.'\','.$tempclassify.','.$tempscore.','.'\'\''.','.'\'\''.','.$tempanswer.','.$tempkind.',\''.$temptitle.'\','.$tempnum.',\''.$tempcontent.'\')';
             }
             $str123=ltrim($str123,",");
             $tempsql = "insert into state(sid,flag,info,name,classify,score,result,mark,answer,kind,title,num,content) values ".$str123;
             mysql_query($tempsql,$conn);
             
              $_SESSION["insert"]=1;//保存已经插入状态
           }
           mysql_close($conn);
            echo "<script>window.location.href=\"answer.php\";</script>";
     }
    else{
        echo "您所在的分组不允许参加此类型的题目，请联系管理员";
        echo "<meta http-equiv=\"refresh\" content=\"2;url=../index.php\"/>";
    }
    $time=time();
    $time=$time+1800;
    $sqltime="update user set time='$time' where info='$info'";
    mysql_query($sqltime);
    $_SESSION['time']=$time;
    mysql_close($conn);
} 
else{    
    $sql = "select * from user where info='$info'";
    $sqltem="select * from time";
    $resulttem=mysql_query($sqltem,$conn);
    $rowtem=mysql_fetch_assoc($resulttem);
    $result = mysql_query($sql, $conn);
    $row = mysql_fetch_assoc($result);
    $time=time();
    if(!empty($row['starttime'])||$row['starttime']!=""){
        $sqllijian="update user set starttime='$time',temptime=123 where info='$info'";
        mysql_query($sqllijian,$conn);
    }
    // $_SESSION['time2']=$rowtem['starttime'];
    if($rowtem['addtest']==1){
        $time=$rowtem['endtime'];
        if(empty($row['time'])){
            $sqlip="update user set time='$time' where info='$info'";
            mysql_query($sqlip,$conn);
//             $_SESSION['time']=$time+30*60;
              $_SESSION['time']=$time;
        }else{
            $_SESSION['time']=$row['time'];
//             $_SESSION['time']=$row['time']+30*60;
        }
    }elseif ($rowtem['addtest']==2){
        if(empty($row['time'])){
            $sqlip="update user set time='$time' where info='$info'";
            mysql_query($sqlip,$conn);
            $_SESSION['time']=$time+2*60+2;
        }else{
            $_SESSION['time']=$row['time']+2*60+2;
        }
    }
    else{
        if(empty($row['time'])){
            $sqlip="update user set time='$time' where info='$info'";
            mysql_query($sqlip,$conn);
            $_SESSION['time']=$time+10*60;
        }else{
            $_SESSION['time']=$row['time'];
        }
    }
    echo "<script>window.location.href=\"answer.php\";</script>";
    mysql_close($conn);
}
?>