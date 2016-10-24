<?php
set_time_limit(0);
include_once 'Database.php';
$deletedata="delete from adddata60";
mysql_query($deletedata,$conn);
$deletedata1="delete from addstate";
mysql_query($deletedata1,$conn);
// $deletedata2="update user set time='',ip='',usetime=0,score=0,type1=0,type2=0,type3=0,type4=0,sec=0";
// mysql_query($deletedata2,$conn);
$sql="select * from user where addtest=2";
$result = mysql_query($sql, $conn);
while ($row = mysql_fetch_assoc($result)) {
    $data[] = $row;
}
foreach ($data as $sim){
    $arr40=array();
    $dataid=array();
    $datanum=array();
    $type=$sim['classify'];
    $sqlnum="select id from addvote where classify='$type'";
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
    shuffle($arr40);
    $str11="";
    $infotemp=$sim['info'];
    for($yi=0;$yi<10;$yi++){
        $str11=$str11.','.'('.$infotemp.','.$arr40[$yi].')';
    }
    $str11=ltrim($str11,",");
     $sqlid = "insert into adddata60(info,num) values ".$str11;
     mysql_query($sqlid, $conn);
     
    $str1="";
    for($yii=0;$yii<count($arr40);$yii++){
        $teid=$arr40[$yii];
        $sqltotal="select * from addvote where id='$teid'";
        $resulttotal=mysql_query($sqltotal,$conn);
        $rowtotal=mysql_fetch_assoc($resulttotal);
        $ttt=$yii+1;
        $tempname=$sim['name'];
        $tempinfo=$sim['info'];
        $tempclassify=$rowtotal['classify'];
        $tempscore=$rowtotal['score'];
        $tempanswer=$rowtotal['result'];
        $tempkind=$rowtotal['type'];
        $temptitle=$rowtotal['title'];
        $tempnum=$rowtotal['num'];
        $tempcontent=$rowtotal['content'];
        $str1=$str1.','.'('.$teid.','.$ttt.','.'\''.$tempinfo.'\''.',\''.$tempname.'\','.$tempclassify.','.$tempscore.','.'\'\''.','.'\'\''.','.$tempanswer.','.$tempkind.',\''.$temptitle.'\','.$tempnum.',\''.$tempcontent.'\')';
    }
    $str1=ltrim($str1,",");
    $tempsql = "insert into addstate(sid,flag,info,name,classify,score,result,mark,answer,kind,title,num,content) values ".$str1;
    mysql_query($tempsql,$conn);
    $insertflag="update user set insertflag=1 where info='$infotemp'";
    mysql_query($insertflag,$conn);
}
echo "success";