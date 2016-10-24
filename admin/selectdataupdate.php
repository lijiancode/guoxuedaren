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
<link href="css/adddata.css" rel="stylesheet" type="text/css">
<title>Insert title here</title>
</head>
<body>
<center>
<table width="80%"  border="1" cellpadding="5" cellspacing="0" bgcolor="#cccccc">
<tr><th>修改参赛题目详细信息</th></tr>
</table>
<p></p>
<form action="selectupdatedata.php" method="post">
<table width="80%"  border="1" cellpadding="5" cellspacing="0" bgcolor="#cccccc">
<tr>
<td width="120px;">
<input type="hidden" id="liid" name="liid" value='<?php echo $n;?>'>
题目:
<?php if($ss['type']==1){?>
<select name="type">
<option value="1" selected = "selected">常规性单选题个数</option>
<option value="2" >综合性单选题个数</option>
<option value="3" >常规性多选题个数</option>
<option value="4" >综合性多选题个数</option>
</select>
<?php }elseif($ss['type']==2){?>
<select name="type">
<option value="1" >常规性单选题个数</option>
<option value="2" selected = "selected">综合性单选题个数</option>
<option value="3" >常规性多选题个数</option>
<option value="4" >综合性多选题个数</option>
</select>
<?php }elseif ($ss['type']==3){?>
<select name="type">
<option value="1" >常规性单选题个数</option>
<option value="2" >综合性单选题个数</option>
<option value="3" selected = "selected">常规性多选题个数</option>
<option value="4" >综合性多选题个数</option>
</select>
<?php }else{?>
<select name="type">
<option value="1" >常规性单选题个数</option>
<option value="2" >综合性单选题个数</option>
<option value="3" >常规性多选题个数</option>
<option value="4" selected = "selected">综合性多选题个数</option>
</select>
<?php }?>
</td>
<td>
<textarea rows="3" cols="20" id="title" name="title"><?php echo $ss['title'];?></textarea>
</td>
</tr>
<tr>
<td>分类：
<select name="classify">
<option value="1" <?php if($ss['classify']==1) echo "selected = 'selected'";?>>全部</option>
<option value="2" <?php if($ss['classify']==2) echo "selected = 'selected'";?>>小学组</option>
<option value="3" <?php if($ss['classify']==3) echo "selected = 'selected'";?>>初中组</option>
<option value="4" <?php if($ss['classify']==4) echo "selected = 'selected'";?>>高中组</option>
<option value="5" <?php if($ss['classify']==5) echo "selected = 'selected'";?>>大学组</option>
</select>
</td>
<td>分值：
<select name="score">
<option value="1" <?php if($ss['score']==1) echo "selected = 'selected'";?>>0.5</option>
<option value="2" <?php if($ss['score']==2) echo "selected = 'selected'";?>>1.5</option>
<option value="3" <?php if($ss['score']==3) echo "selected = 'selected'";?>>2</option>
<option value="4" <?php if($ss['score']==4) echo "selected = 'selected'";?>>3.5</option>
</select>
</td>
</tr>
<tr>
<td>选择项:</td>
<td>
<textarea rows="4" cols="20" name="content"><?php echo $ss['content'];?></textarea>
</td>
</tr>
<tr>
<td>答案个数:</td>
<td>
<select name="num">
<option value="1" <?php if($ss['num']==1) echo "selected = 'selected'";?>>1</option>
<option value="2" <?php if($ss['num']==2) echo "selected = 'selected'";?>>2</option>
<option value="3" <?php if($ss['num']==3) echo "selected = 'selected'";?>>3</option>
<option value="4" <?php if($ss['num']==4) echo "selected = 'selected'";?>>4</option>
<option value="5" <?php if($ss['num']==5) echo "selected = 'selected'";?>>5</option>
</select>
</td>
</tr>
<tr>
<td>正确答案:<?php echo $ss['result'];?></td>
<td>
A<input type="checkbox" name="result[]" value='1' <?php if(!empty(strstr($ss['result'], '1'))) echo "checked='checked'";?>>
B<input type="checkbox" name="result[]" value='2' <?php if(!empty(strstr($ss['result'], '2'))) echo "checked='checked'";?>>
C<input type="checkbox" name="result[]" value='3' <?php if(!empty(strstr($ss['result'], '3'))) echo "checked='checked'";?>>
D<input type="checkbox" name="result[]" value='4' <?php if(!empty(strstr($ss['result'], '4'))) echo "checked='checked'";?>>
E<input type="checkbox" name="result[]" value='5' <?php if(!empty(strstr($ss['result'], '5'))) echo "checked='checked'";?>>
F<input type="checkbox" name="result[]" value='6' <?php if(!empty(strstr($ss['result'], '6'))) echo "checked='checked'";?>>
G<input type="checkbox" name="result[]" value='7' <?php if(!empty(strstr($ss['result'], '7'))) echo "checked='checked'";?>>
H<input type="checkbox" name="result[]" value='8' <?php if(!empty(strstr($ss['result'], '8'))) echo "checked='checked'";?>>
</td>
</tr>
<tr>
<td></td>
<td>
<input type="submit" value="提交">
<input type="reset" value="重置">
</td>
</tr>
</table>
</form>
</center>
</body>
</html>