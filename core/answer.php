<?php
session_start();
$litime=$_SESSION['litime'];
include_once '../admin/Database.php';
$info=$_SESSION['info'];
$name=$_SESSION['name'];
$row=array();
$hh=0;
$temppname=$name;
if (empty($info)||empty($name)) {//登陆session操作
    echo "<meta http-equiv=\"refresh\" content=\"0;url=../index.php\"/>";
}
else{
    $sqlti="select * from time";
    $reltime = mysql_query($sqlti, $conn);
    $rowtime = mysql_fetch_assoc($reltime);
    $starttime=$rowtime['starttime'];
     $jieshutime1="<center><span style='font-size:20pt;font-blod:true;color: blue'><br/><br/><br/><br/>欢迎&nbsp;&nbsp;".$name."&nbsp;&nbsp;同学参见比赛<br/><br/><br/><br/>目前距预赛开始还剩<span style='font-size:20pt;font-blod:true;color: red'>";
     $jieshutime2="</span><br/><br/><br/><br/>比赛时间：".date('Y-m-d H:i',$rowtime['starttime']+8*3600)."&nbsp;至&nbsp;".date('Y-m-d H:i',$rowtime['endtime']+8*3600)."</span></center>";
    
    $sql="SELECT * FROM state WHERE info='$info'";
    $relda = mysql_query($sql, $conn);
    if(mysql_num_rows($relda)>0){
        while ($row1 = mysql_fetch_assoc($relda)) {
            $data1[] = $row1;
        }
    }
    $sql2="select result,mark from state where info='$info'";
    $reldata = mysql_query($sql2, $conn);
    if(mysql_num_rows($reldata)>0){
        while ($row2 = mysql_fetch_assoc($reldata)) {
            $data2[] = $row2;
        }
    }
    mysql_close($conn);
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>山东理工大学第三届“国学达人”挑战赛（预赛）
</title>
<link href="../css/user.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="../js/jquery.min.js"></script>
<script>
    var starttime="<?php echo $starttime;?>";//统一设置开始时间
    var endtime="<?php echo $_SESSION['time'];?>";//统一交卷时间
    var shichang="<?php echo $_SESSION['kaoshi_time'];?>"//考试时长
    var nowtime="<?php echo time();?>";//现在时间 开始时间
    var nowtime2="<?php echo time();?>";//现在时间 预加载
    var timecount;
    var zyj_ks="<?php echo $jieshutime1;?>";
    var zyj_js="<?php echo $jieshutime2;?>";
    function timeright(){//每五秒从服务器校对时间
	  	 $.post("timeright.php",{},function(result,status){
				if(status!='success'){
//	 				alert("从服务器获取时间失败!");
				}else{
					nowtime2=result;
					nowtime=result;
				}
		  });
		  timecount= setTimeout(timeright,5000);
	 }
  $(document).ready(function () {
	    timeright();//校对时间
	    hiddenshow();//预加载显示  
		  showtime();//时间倒计时
		  showww();
		  showdatacolor();	
   });
  function wwait(){//答题开始调用，写入开始时间
	  	 $.post("wait.php",{},function(result,status){
				if(status!='success'){
//	 				alert("从服务器获取时间失败!");
				}else{
				}
		  });
  }
  
  function hiddenshow(){	        
			var left2=parseInt(starttime)-parseInt(nowtime2);
			var muni2=parseInt(left2/60);
			var secon2=parseInt(left2%60);
			document.getElementById('shtime').innerHTML=zyj_ks+muni2+"分"+secon2+"秒"+zyj_js;
			nowtime2++;
			if(left2>1){
			  $("#waittime").hide();
			  setTimeout(hiddenshow,1000);
	        }else{
	        	wwait();
            // console.log('kaishijishi');
            var Atimecount=parseInt(parseInt(shichang)/60)
            document.getElementById('Lshichang').innerHTML=parseInt(parseInt(shichang)/60)+"分钟";
	        	 $("#shtime").hide();
	        	 $("#waittime").show();
	        	 $('#waittime').css('visibility', 'visible');	        	
	        	timekeeper();
	       }
		
	  }
 
    function showdatacolor(){
    	 $.post("showdatacolor.php",{},function(result,status){
  			if(status!='success'){
//   				alert("从服务器获取时间失败!");
  			}else{
  	  	  		var datatet=eval('('+result+')');
  				var ty=0;  				
  				for(ty=0;ty<datatet.length;ty++){
  					var tyy=ty+1;
  	  				var th1=datatet[ty]['result'];
  	  				var th2=$('input[name="a'+tyy+'[]"]');
  					if(datatet[ty]['mark']=="1"){
  						$('input[name="remark'+tyy+'"]').attr("checked",true);
  					}
  					if(th1.indexOf('1')>=0){
  						th2.eq(0).attr("checked","checked");
  	  			    }
  					if(th1.indexOf('2')>=0){
  						th2.eq(1).attr("checked","checked");
  	  			    }
  					if(th1.indexOf('3')>=0){
  						th2.eq(2).attr("checked","checked");
  	  			    }
  					if(th1.indexOf('4')>=0){
  						th2.eq(3).attr("checked","checked");
  	  			    }
  					if(th1.indexOf('5')>=0){
  						th2.eq(4).attr("checked","checked");
  	  			    }
  					if(th1.indexOf('6')>=0){
  						th2.eq(5).attr("checked","checked");
  	  			    }
  				
  	  			}
  			}
  	  });
    }
	function showtime(){
		nowtime++;
		var left=parseInt(endtime)-parseInt(nowtime);
		if(left>parseInt(shichang)){
			left=parseInt(shichang);
		}
		var muni=parseInt(left/60);
		var secon=parseInt(left%60);
		if(secon>=0 && secon<=9){
               secon="0"+secon;
			}
		document.getElementById('time').innerHTML=""+muni+"分"+secon+"秒";//("+endtime+")
		if(left>0){
		  setTimeout(showtime,1000);
    }else{
        	  // console.log(left);
          	document.getElementById('time').innerHTML="考试结束!";
          	$('#tijiao1').click();
       }
	 }
  function timekeeper(){
  	 $.post("time.php",{},function(result,status){
			if(status!='success'){
// 				alert("从服务器获取时间失败!");
			}else{

				endtime=result;
				// endtime=1476976400;
				// console.log(result);
			}
	  });
   	setTimeout(timekeeper,10000);
   }
     function showww(){//从数据看读取数据写入到答案中
    	 var e;
    	 for(e=1;e<=60;e++){
    	 	var e1=e-1;
    	 	var chk_value=[];
    	 	var chk_value2=[];
    	 	   $('input[name="a'+e+'[]"]:checked').each(function(){
    	 		      chk_value2.push($(this).val());
    	 		    });
    	 	   $('input[name="remark'+e+'"]:checked').each(function(){
    	         chk_value.push($(this).val());
    	         });
    	  
    	      if(chk_value.length!=0){
    	      	 $("#"+e1).css("background-color","#ff9800");
    	      }
    	      else if(chk_value2.length!=0){
    	     	 $("#"+e1).css("background-color","#06ff06");
    	      }
    	      else{
    	     	 $("#"+e1).css("background-color","#9e9e9e");
    	      }
    	 }
    	 setTimeout(showww,2000);
    	 }
  $(document).ready(function() { 
	  $(document).bind("keydown",function(e){ 
	  e=window.event||e; 
	  if(e.keyCode==116){ 
	  e.keyCode = 0; 
	  return false; 
	  } 
	  }); 
	  });
  $(document).ready(function() { 
	  $(document).bind("contextmenu",function(e) { 
	  return false; 
	  }); 
	  });
  function savadata(){//保存按钮触发函数
	  var si=1;
	  var chk_value11= new Array(61);
	  var chk_value22=new Array(61);
	  for(si=1;si<=60;si++){
		  var temp="";
		  var chk11="";
		  $('input[name="a'+si+'[]"]:checked').each(function(){
 		      temp=temp+$(this).val();
 		    });
		  $('input[name="remark'+si+'"]:checked').each(function(){
			  chk11=$(this).val();
	 	     });
		  if(temp!=""){
		     chk_value22[si]=temp;
		   }
		  if(chk11!=""){
			     chk_value11[si]=chk11;
		  }
		   
	  }
	    $.post("savedata.php",{chk22:chk_value22,chk11:chk_value11},function(result,status){
			if(status!='success'){
				alert("数据获取失败,请检查网络");
			}else{
// 				console.log(result);
				if(result=="11"){
					$("#saveinfo").show();
					var t2=setTimeout("savainfos()",1000);
// 					window.clearTimeout(t2);
				 }
				else{
				}
			}
		});  
  }
  function savainfos(){//隐藏保存成功提示
	  $("#saveinfo").hide();
  }
</script>
</head>
<body style="background-color:silver;margin:0;">
<div id="shtime"></div>
<div id="waittime" style="width:100%;height:auto;visibility:hidden">
<div id="left_resu">
<img src="../img/info.gif">
</div>
<div id="resukuang" style="background-color:#abdbe6;">
<div id="resu" style="background-color:#e7f8ff;border: 1px;border-color: blue;">
<div style="width: 180px; height:30px;">
<span style="width:100px;height:30px;margin-left:10px;">距预赛结束</span>
<span id="time" style="font-size:18px;color: red"></span>
</div>
<?php 
$jishu=0;
foreach ($data2 as $box25){
    $jishu++;
 ?>
 <a href="#<?php echo "table".$jishu;?>"><div id="<?php echo $jishu-1;?>" class="diva" style="background-color:<?php if($box25["mark"]=="1")
     echo "#ff9800";
 elseif (!empty($box25["result"])){
     echo "#06ff06";
 }
 else{
     echo "#9e9e9e";
 } ?>"><?php echo $jishu;?>
 </div>
 </a>
<?php }?>
</div></div>
<div id="savabuttons">
<button id="savedate" style="width:114px;height:37px;margin-left:30px;margin-top:20px; background-image: url(../img/baocun.gif);outline: 0; border-width: 0;cursor:pointer;" onclick="savadata()"></button>
<div id="saveinfo" style="width:120px;height:37px;margin:10px auto;display:none; color:red">您已成功保存</div>
</div>
<div id="contain">
<div style="width: 1000px; height: 175px;"><img src="../img/top.gif"></div>
<div class="top">

<div style="float:left;font-size:18px;margin-top:10px;">欢迎<?php echo $name;?>同学,预赛题型为“不定项选择题”，总分<label style="color: red">100分</label>，考试时间<label id="Lshichang" style="color: red">30分钟</label>。</div>
<div id="time" style="float:left;font-size:18px;margin-top:10px; color: red"></div>
</div>
<div class="content">
<form action="save.php" method="post" name="form1">

<?php foreach ($data1 as $dds){
$hh++;?>
<table border="1" width="900" id="<?php echo "table".$hh;?>" height="auto"  style="margin-top: 10px;<?php if ($hh&1){echo "background-color:#fefefe; ";}else{echo "background-color:transparent; ";}?>">
<tr>
<th width="150" id="con1">
第&nbsp;<span style="color:blue;"><?php echo $hh;?>&nbsp;</span>题
</th>
<th width="600" style="text-align: left" id="con2">
<?php echo $dds['title'];?>
</th>
<th id="con3">
标记<input type='checkbox' name='remark<?php echo $hh?>' value='1'>
</th>
</tr>
<tr>
<td width="150">
选项
</td>
<td colspan=2 style="text-align: left" id="con4">
<?php echo $dds['content'];?>
</td>
</tr>
<tr>
<td width="150">答案</td>
<td colspan=2 style="text-align: left" id="con5">
<?php for($i=0;$i<$dds['num'];$i++){
if($i==0)
    $tt="A";
elseif($i==1)
    $tt="B";
elseif($i==2)
    $tt="C";
    elseif($i==3)
    $tt="D";
    elseif($i==4)
    $tt="E";
    elseif($i==5)
    $tt="F";
    elseif($i==6)
    $tt="G";
    ?>
    <?php echo $tt?><input type='checkbox' name='a<?php echo $hh?>[]'  value='<?php echo $i+1;?>'>&nbsp;&nbsp;
    <?php }?>
</td>
</tr>
</table>
<?php }?>
<button type="submit" id="tijiao" style="width:114px;height:37px;margin-left:780px;margin-top:20px;cursor:pointer; background-image: url(../img/save.gif);outline: 0; border-width: 0;"></button>
<button type="submit" id="tijiao1" style="width:120px;height:40px; visibility:hidden"></button>
</form>
</div>
<script type="text/javascript">
$('#tijiao').click(function(){
	if((confirm(""+"<?php echo $temppname;?>"+"同学确定要交卷吗？交卷后考试结束"))==true){
		$('form1').submit();
	}else{
        return false;
	}
});
</script>
</form>
</div>
<div id="foott"><img src="../img/button.gif"></div>
</div>
</body>
</html>
<?php }?>