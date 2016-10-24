<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Insert title here</title>
</head>
<body>
<center>
	<h3>系统信息</h3>
	<table width="70%" border="1" cellpadding="5" cellspacing="0" bgcolor="#cccccc">
		<tr>
			<th>操作系统</th>
			<td><?php echo PHP_OS;?></td>
		</tr>
		<tr>
			<th>Apache版本</th>
			<td><?php echo apache_get_version();?></td>
		</tr>
		<tr>
			<th>PHP版本</th>
			<td><?php echo PHP_VERSION;?></td>
		</tr>
		<tr>
			<th>运行方式</th>
			<td><?php echo PHP_SAPI;?></td>
		</tr>
	</table>
	<h3>软件信息</h3>
	<table width="70%" border="1" cellpadding="5" cellspacing="0" bgcolor="#cccccc">
		<tr>
			<th>系统名称</th>
			<td>国学达人后台管理系统</td>
		</tr>
		<tr>
			<th>开发团队</th>
			<td>李健</td>
		</tr>
		<tr>
			<th>公司名称</th>
			<td>山东鲁晨电子商务科技有限公司</td>
		</tr>
		<tr>
			<th>成功案例</th>
			<td><a href="http://www.lezhi.ren">乐之人</a></td>
		</tr>
	</table>
</center>
</body>
</html>