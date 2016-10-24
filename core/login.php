<?php
session_start();
include_once '../admin/Database.php';
$name = $_POST['name'];
$info = $_POST['info'];
$row=array();
$row2=array();
$addtest = $_POST['addtest'];//考试类型
if (empty($name) or empty($info)) {
    echo "<script>alert('姓名和身份证号码不能为空'); history.go(-1);</script>";
}elseif($name==$_SESSION['name'] && $info==$_SESSION['info']){
    echo "<script>window.location.href='answer.php';</script>";
}
else {
    $sql = "select * from user where info='$info'";
    $result = mysql_query($sql, $conn);
    if (mysql_num_rows($result) > 0) {
         while ($row = mysql_fetch_assoc($result)) {
           if($name == $row['name'] && $info == $row['info']){
                $time=time();
//                 $ip=$_SERVER['REMOTE_ADDR'];
                $sql2="select * from time";
                $result2=mysql_query($sql2,$conn);
                while ($row2=mysql_fetch_assoc($result2)){
                   if($addtest==$row2['addtest']){
                    $_SESSION["kaoshi_time"]=$row2['endtime'] - $row2['starttime'];
                     if($row2['starttime']<=$time+10*60 && $row2['endtime']>=$time){
                         $_SESSION["classify"]=$row2['classify']; 
                         $time22=$row2['endtime'];
                        if($row['insertflag']==0){
                            $sqlip="update user set insertflag=1,time='$time22' where info='$info'";
                            mysql_query($sqlip,$conn);
                            $_SESSION["insert"]=0;//date60插入状态
                        }
                        else{
                            $_SESSION["insert"]=1;
                        }
                        if(empty($row['ip'])||$row['ip']==""){ //ip为空，未提交
                            $_SESSION["name"] = $name;
                            $_SESSION["info"] = $info;
                            echo "登陆成功，系统正在抽题，请稍等";
                            if($addtest==2){
                                echo "<meta http-equiv=\"refresh\" content=\"0;url=adduser.php\"/>";
                            }else{
                                echo "<meta http-equiv=\"refresh\" content=\"0;url=user.php\"/>";
                            }
                            
                            break 2;                        
                        }else{
                            echo "<script>alert('您已参加过考试，不能重复登录哦'); history.go(-1);</script>";
                        }
                    }
                    else{
                        echo "<script>alert('当前时间段无考试安排，请考试开始后再登录系统');history.go(-1)</script>";
                        //echo "<meta http-equiv=\"refresh\" content=\"0;url=/Lijian/index.php\"/>";
                        break 2;
                        }
                }
                else {
                    echo "<script>alert('当前时间段无此类型的考试，请更换考试类型后重试');history.go(-1)</script>";
                    //echo "<meta http-equiv=\"refresh\" content=\"0;url=/Lijian/index.php\"/>";
                    break 2;
                }
                }
             }
             else {
                     echo "<script>alert('用户信息不正确，请重新输入'); history.go(-1);</script>";
                     break;
             }
        }
    }
    else {
                     echo "<script>alert('用户信息不正确，请重新输入'); history.go(-1);</script>";
          }
}
mysql_close($conn);