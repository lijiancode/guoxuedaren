<?php
include_once 'include.php';
$n = $_GET['id'];
$sql = "select * from vote where id=".$n;
$result = mysql_query($sql, $conn);
$ss=mysql_fetch_assoc($result);
mysql_close($conn);
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>查看参赛题目详细信息</title>
</head>
<body>
<center>
<table width="80%"  border="1" cellpadding="5" cellspacing="0" bgcolor="#cccccc">
<tr>
<td>题目</td>
<td><?php echo $ss['title']; ?></td>
</tr>
<tr>
<td>类别：<?php if($ss['type']=='1') echo "常规性单选题";
elseif($ss['type']=='2') echo "综合性单选题";
elseif($ss['type']=='3') echo "常规性多选题";
elseif($ss['type']=='4') echo "综合性多选题";
?></td>
<td>
<table><tr><td>分类:<?php if($ss['classify']=='1')
    echo "全部";
    else if($ss['classify']=='2')
        echo "小学组";
         else if($ss['classify']=='3')
            echo "初中组";
            elseif($ss['classify']=='4')
                echo "高中组";
            else echo "大学组";
            ?></td>
                <td width="20px;"></td>
   <td>
       分值：<?php if($ss['score']=='1')
       echo "0.5分";
    else if($ss['score']=='2')
       echo "1.5分";
       else if($ss['score']=='3')
           echo "2分";
           else
               echo "3.5分";?></td></tr></table></td>
</tr>
<tr>
<td>选项内容</td>
<td><?php echo $ss['content'];?></td>
</tr>

<tr>
<td>正确选项</td>
<td>
<?php echo $ss['result'];?>
</td>
</tr>
</table>
<p></p>
<button onclick="back()";>返回</button>
<script>
function back(){
	history.go(-1);
}
</script>
</center>
</body>
</html>
