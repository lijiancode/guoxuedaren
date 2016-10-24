<?php 
session_start();
session_unset();
session_destroy();
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<link href="css/index.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="js/jquery.min.js"></script>
<title>“电信杯”第三届山东省青少年“国学达人”挑战赛总决赛（预赛）
</title>
</head>
<body>
<div id="content">
<form action="core/login.php" method="post">
<div id="login">
<center>
<input type="text" id="name" placeholder="请输入姓名" name="name" style="width:180px; height:20px; line-height:20px; border-radius:6px;"/><br><p></p>
<input type="text" placeholder="请输入身份证号码" id="info" name="info" style="width:180px; height:20px; border-radius:6px; line-height:20px;"><br>
<p></p>
</div>
</center>
<center>
<div style="width: 300px; height: 30px; padding-left: 20px; ">
<select name="addtest" style="height: 28px; display: block; margin-left: 20px; float: left;">
<option value="1">预赛</option>
<option value="2">加试赛</option>
<option value="3">考前测试</option>
</select>
<input type="submit" name="submit" value="" style="width:72px; height: 28px;background-image: url(img/start.gif); outline: none;"/>
<input type="reset"  name="reset" value="" style="width:72px; margin-left: 10px; height: 28px;background-image: url(img/reset.gif); outline: none;"/>	
</div>
</center>
</form>
<!-- 预赛答题系统使用说明：</br>
第一步，参赛选手输入考生姓名、身份证号，选择比赛环节后（默认为“预赛”）点击“开始考试”按钮进入答题界面。如遇信息输入错误可点击“重置”，重新输入。</br>
第二步，进入答题界面后，点击界面右侧显示的数字栏进行答题，数字“1”代表第1题，以此类推。也可选择在试题上直接作答。</br>
第三步，界面上方设有参赛选手的信息及时间提示，右侧设有“标记”按钮，可供参赛选手进行标记。答题时，请点击“答案”一栏中相应选项后的方框选择答案，答题完毕后点击界面右侧显示的数字进入相应题目的答题。</br>
第四步，所有题目作答完毕后，点击交卷按钮，提交试卷。系统会进行提交确认提示。</br>
第五步，答题系统界面将显示参赛选手成绩，点击“退出”按钮，退出系统。</br> -->
</div>
</body>
</html>