<?php
include_once 'include.php';
if (empty($_SESSION["name"]) and empty($_SESSION['pwd'])) {//登陆session操作
    echo "<meta http-equiv=\"refresh\" content=\"0;url=index.php\"/>";
} else {
    ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<link href="css/index.css" rel="stylesheet" type="text/css">
<title>国学达人挑战赛</title>
<style type="text/css">
li {list-style-type:none;
line-height:30px;
};
</style>
</head>
<body>
<div id="header"></div>
<div class="left">
<ul>
<li><a href="state.php" target="rightFrame" style="text-decoration:none;color:#000000;">答题状态</a></li>
<li><a href="adddata.php" target="rightFrame" style="text-decoration:none;color:#000000;">添加比赛题目</a></li>
<li><a href="selectdata.php" target="rightFrame" style="text-decoration:none;color:#000000;">管理比赛题目</a></li>
<li><a href="time.php" target="rightFrame" style="text-decoration:none;color:#000000;">考试相关设置</a></li>
<li><a href="selecttime.php" target="rightFrame" style="text-decoration:none;color:#000000;">查看考试相关设置</a></li>
<li><a href="adduser.php" target="rightFrame" style="text-decoration:none;color:#000000;">增加参与人</a></li>
<li><a href="selectuser.php" target="rightFrame" style="text-decoration:none;color:#000000;">管理参与人</a></li>
<li><a href="addadmin.php" target="rightFrame" style="text-decoration:none;color:#000000;">增加管理员</a></li>
<li><a href="adminselect.php" target="rightFrame" style="text-decoration:none;color:#000000;">查看管理员</a></li>
<li><a href="baobiao.php" target="rightFrame" style="text-decoration:none;color:#000000;">下载报表</a></li>
<li><a href="test.php" target="rightFrame" style="text-decoration:none;color:#000000;">重新答题</a></li>
<li><a href="clearip.php" target="rightFrame" style="text-decoration:none;color:#000000;">清除IP</a></li>
<li><a href="warning.php" target="rightFrame" style="text-decoration:none;color:#000000;">分配试题</a></li>
<li><a href="addtime.php" target="rightFrame" style="text-decoration:none;color:#000000;">增加时间</a></li>
<li><a href="addinsertdata.php" target="rightFrame" style="text-decoration:none;color:#000000;">分配加试试题</a></li>
</ul>
</div>
<div class="right">
<iframe src="main.php"  frameborder="0" name="rightFrame" width="100%" height="800px"></iframe>
</div>
</body>
</html>

<?php }?>