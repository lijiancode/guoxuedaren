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
<tr><th>请输入比赛标题和选项，有几个选项填几行即可</th></tr>
</table>
<p></p>
<form action="insert.php" method="post">
<table width="80%"  border="1" cellpadding="5" cellspacing="0" bgcolor="#cccccc">
<tr>
<td width="120px;">题目:
<select name="type">
<option value="1">常规性单选题个数</option>
<option value="2">综合性单选题个数</option>
<option value="3">常规性多选题个数</option>
<option value="4">综合性多选题个数</option>
</select>
</td>
<td>
<textarea rows="3" cols="20" id="title" name="title"></textarea>
</td>
</tr>
<tr>
<td>分类：
<select name="classify">
<option value="1">全部</option>
<option value="2">小学组</option>
<option value="3">初中组</option>
<option value="4">高中组</option>
<option value="5">大学组</option>
</select>
</td>
<td>分值：
<select name="score">
<option value="1">0.5</option>
<option value="2">1.5</option>
<option value="3">2</option>
<option value="4">3.5</option>
</select>
</td>
</tr>
<tr>
<td>选择项:</td>
<td>
<textarea rows="4" cols="20" name="content"></textarea>
</td>
</tr>
<tr>
<td>答案个数:</td>
<td>
<select name="num">
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
</select>
</td>
</tr>
<tr>
<td>正确答案:</td>
<td>
A<input type="checkbox" name="result[]" value='1'>
B<input type="checkbox" name="result[]" value='2'>
C<input type="checkbox" name="result[]" value='3'>
D<input type="checkbox" name="result[]" value='4'>
E<input type="checkbox" name="result[]" value='5'>
F<input type="checkbox" name="result[]" value='6'>
G<input type="checkbox" name="result[]" value='7'>
H<input type="checkbox" name="result[]" value='8'>
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