<?php
session_start();
include_once '../admin/Database.php';
$info=$_SESSION['info'];
$name=$_SESSION['name'];
$row=array();
$temppname=$name;
if (empty($info)||empty($name)) {//��½session����
    echo "<meta http-equiv=\"refresh\" content=\"0;url=../index.php\"/>";
}
else{
//     $sql = "select * from user where info='$info'";
//     $result = mysql_query($sql, $conn);
//     $row = mysql_fetch_assoc($result);
    $sql2="select result,mark from state where info='$info'";
    $reldata = mysql_query($sql2, $conn);
    if(mysql_num_rows($reldata)>0){
        while ($row2 = mysql_fetch_assoc($reldata)) {
            $data2[] = $row2;
        }
    }
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>ɽ������ѧ�����조��ѧ���ˡ���ս����Ԥ����
</title>
<link href="../css/user.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="../js/jquery.min.js"></script>
<script>
  $(document).ready(function () {
		showtime();
		timekeeper();
   });
	function showtime(){
		var endtime="<?php echo $_SESSION['time'];?>";
// 		console.log(endtime);
		var nowtime=new Date().getTime();
// 		console.log(nowtime);
		var left=parseInt(endtime)-parseInt(nowtime)/1000;
		var muni=parseInt(left/60);
		var secon=parseInt(left%60);
		document.getElementById('time').innerHTML="���뿼�Խ�����ʣ"+muni+"��"+secon+"��";
		if(left>0){
		  setTimeout(showtime,1000);
        }else{
          	document.getElementById('time').innerHTML="���Խ���!";
        	window.location.href="result.php";
       }
	}  
	 var count=0;
     function timekeeper(){
  	 $.post("time.php",{ct:count},function(result,status){
			if(status!='success'){
				alert("�ӷ�������ȡʱ��ʧ��!");
			}else{
				count=result;
				count++;
			}
	  });
   	setTimeout(timekeeper,30000);
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
</script>
</head>
<body>
<div id="contain">
<div class="top">
��ӭ<?php echo $name?>ͬѧ�μӵ�����ɽ��ʡ�����ꡰ��ѧ���ˡ���ս��
<div style="float:left;font-size:15px;margin-top:10px;margin-left:50px;">����ʱ��<label style="color: red">30����</label>���ܷ�<label style="color: red">100��</label>&nbsp;&nbsp;</div>
<div id="time" style="float:left;font-size:15px;margin-top:10px;"></div>
</div>
<div class="content">
<table border="1px" width="900px" height="auto">
<tr>
<th width="150px" id="con1">
</th>
<th width="600px" style="text-align: left" id="con2">
</th>
<th width="150px" id="con3"></th>
</tr>
<tr>
<td width="100px">
ѡ��
</td>
<td colspan=2 style="text-align: left" id="con4"></td>
</tr>
<tr>
<td>��</td>
<td colspan=2 style="text-align: left" id="con5">
</td>
</tr>
</table>
</div>

<div id="resu">
<?php 
$jishu=0;
foreach ($data2 as $box25){
    $jishu++;
 ?>
 <div id="<?php echo $jishu-1;?>" class="diva" style="background-color:<?php if($box25["mark"]=="1")
     echo "#ff9800";
 elseif (!empty($box25["result"])){
     echo "#06ff06";
 }
 else{
     echo "#9e9e9e";
 } ?>"><?php echo $jishu;?></div>
<?php }?>
<script type="text/javascript">
var finn=0;
var boxid=0;
$('.diva').click(function(e){
	var chk_value=[];
	var chk_value2=[];
	$('input[name="remark"]:checked').each(function(){
        chk_value.push($(this).val());
    });
    $('input[name="cate"]:checked').each(function(){
      chk_value2.push($(this).val());
    });
     boxid=$(e.target).attr('id');
     if(chk_value.length!=0){
     	 $("#"+finn).css("background-color","#ff9800");
     }
     else if(chk_value2.length!=0){
    	// console.log(boxid);
    	 $("#"+finn).css("background-color","#06ff06");
     }
     else{
    	 $("#"+finn).css("background-color","#9e9e9e");
     }
	var number=parseInt(boxid)+1;
    $.post("selectdata.php",{bid:boxid,chk1:chk_value,chk2:chk_value2},function(result,status){
			if(status!='success'){
				alert("���ݻ�ȡʧ��,��������");
			}else{
// 				console.log(result);
				var json1=eval('('+result+')');
                $('#con1').html("��"+number+"��");
                $('#con2').html(json1.title);
                if(json1.mark==1){
                $('#con3').html("���<input type='checkbox' name='remark' checked='checked'  value='1'>");	
                }
                else{
                	$('#con3').html("���<input type='checkbox' name='remark'  value='1'>");	
                }
                $('#con4').html(json1.content);
                var retarr=(json1.ret).split("");
                var cott=json1.num;
                var insett="";
                var i=1;
                var jj=0;
                for(i=1;i<=cott;i++){
                    if(i==1){
                   	   if(retarr.length>=i){
                             if(($.inArray("1",retarr))>-1)
                            	 insett=insett+"A<input type='checkbox' name='cate' checked='checked' value='1'>&nbsp;&nbsp;"
                            	 else
                            	 insett=insett+"A<input type='checkbox' name='cate' value='1'>&nbsp;&nbsp;"
                       }else
                          		insett=insett+"A<input type='checkbox' name='cate' value='1'>&nbsp;&nbsp;"
                    }
                     
                      else if(i==2){
                    	  if(retarr.length>=1){
                    		  if(($.inArray("2",retarr))>-1)
                             	 insett=insett+"B<input type='checkbox' name='cate' checked='checked' value='2'>&nbsp;&nbsp;"
                             	 else
                             	 insett=insett+"B<input type='checkbox' name='cate' value='2'>&nbsp;&nbsp;"
                        	 }else
                           		insett=insett+"B<input type='checkbox' name='cate' value='2'>&nbsp;&nbsp;"
                          }
                   	    else if(i==3){
                   	    	if(retarr.length>=1){
                   	    		if(($.inArray("3",retarr))>-1)
                               	 insett=insett+"C<input type='checkbox' name='cate' checked='checked' value='3'>&nbsp;&nbsp;"
                               	 else
                               	 insett=insett+"C<input type='checkbox' name='cate' value='3'>&nbsp;&nbsp;"
                          	   }else
                             		insett=insett+"C<input type='checkbox' name='cate' value='3'>&nbsp;&nbsp;"
                       	    }
                     	     else if(i==4){
                      	    	if(retarr.length>=1){
                      	    		if(($.inArray("4",retarr))>-1)
                                   	 insett=insett+"D<input type='checkbox' name='cate' checked='checked' value='4'>&nbsp;&nbsp;"
                                   	 else
                                   	 insett=insett+"D<input type='checkbox' name='cate' value='4'>&nbsp;&nbsp;"
                              	   }else
                                 		insett=insett+"D<input type='checkbox' name='cate' value='4'>&nbsp;&nbsp;"
                         	     }
                         	 else if(i==5){
                          		if(retarr.length>=1){
                          			if(($.inArray("5",retarr))>-1)
                                   	 insett=insett+"E<input type='checkbox' name='cate' checked='checked' value='5'>&nbsp;&nbsp;"
                                   	 else
                                   	 insett=insett+"E<input type='checkbox' name='cate' value='5'>&nbsp;&nbsp;"
                              	   }else
                                 		insett=insett+"E<input type='checkbox' name='cate' value='5'>&nbsp;&nbsp;"
                             	 }
                             	 else if(i==6){
                              		if(retarr.length>=1){
                              			if(($.inArray("6",retarr))>-1)
                                       	 insett=insett+"F<input type='checkbox' name='cate' checked='checked' value='6'>&nbsp;&nbsp;"
                                       	 else
                                       	 insett=insett+"F<input type='checkbox' name='cate' value='6'>&nbsp;&nbsp;"
                                  	   }else
                                     		insett=insett+"F<input type='checkbox' name='cate' value='6'>&nbsp;&nbsp;"
                                 	 }
                }
                $('#con5').html(insett);
			}
		});
	finn=boxid;
// 	console.log(finn);
});
$('#0').click();
</script>
</div>
<div id="btlogin">
 <button type="button" style="width:120px;height:40px;background-color:#5cb85c;border-color:#4cae4c;" onclick="show_result()">����</button>
 <script type="text/javascript">
function show_result(){
	$('#0').click();
	var r=confirm(""+"<?php echo $temppname;?>"+"ͬѧȷ��Ҫ�����𣿽�����Խ���");
	if(r==true){
		window.location.href="result.php";
	}
	else{
	}
}
</script>
</div>
</form>
<div id="infome">����˵��:
1.����Ϸ���ʾ�����ֿɽ��д��⣬���֡�1�������1�⣬�Դ����ơ�</br>
<label style="margin-left: 162px;">
2.������Ŀδ����ʱ��ʾΪ��ǰ��ɫ����������ʾΪ��ɫ�������Ŀ��ʾΪ��ɫ��
</label></div>
</div>
<div id="foott"></div>

</body>
</html>
<?php }?>