<html>
<head>
<title>设置时间</title>
</head>
<body>
<center>
<table width="60%"  border="1" cellpadding="5" cellspacing="0" bgcolor="#cccccc">
<form action="timesave.php" method="post">
<tr>
<td><label>请输入开始时间:</label>
<input type="datetime-local" id="starttime" name="starttime">
</td>
</tr>
<tr>
<td>
<label>请输入结束时间:</label>
<input type="datetime-local" id="endtime" name="endtime">
</td>
</tr>
<tr>
<td>
<label>请选择考试类型:</label>
<select name="addtest">
<option value="1">预赛</option>
<option value="2">加试赛</option>
<option value="3">考前测试</option>
</select>
</td>
</tr>
<tr>
<td>
<label>请选择题目类型:</label>
<select name="titype">
<option value="1">全部</option>
<option value="2">小学组</option>
<option value="3">初中组</option>
<option value="4">高中组</option>
<option value="5">大学组</option>
</select>
</td>
</tr>
<tr>
<td><label>常规性单选题个数</label>
<input type="number" name="normal1" value="24">
</td>
</tr>
<tr>
<td>
<label>综合性单选题个数</label>
<input type="number" name="type1" value="16">
</td>
</tr>
<tr>
<td>
<label>常规性多选题个数</label>
<input type="number" name="normal2" value="12">
</td>
</tr>
<tr>
<td>
<label>综合性多选题个数</label>
<input type="number" name="type2" value="8">
</td>
</tr>
<tr>
<td>
<input type="submit" value="提交">
</td>
</tr>
</form>
</table>
</center>
</body>
</html>