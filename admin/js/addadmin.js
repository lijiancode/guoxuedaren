/**
 *
 */
function labelname(){
	var n=document.getElementById("name").value;

	if(n==""){
	document.getElementById("sure_name").innerHTML="用户名不能为空哦";
	document.f1.submit.disabled = true;
}
	else{
		document.getElementById("sure_name").innerHTML="该用户名可以被注册";
	}
}
function labelpwd(){
	var n=document.getElementById("pwd").value;
	var n1=document.getElementById("pwd1").value;

	if(n!=n1){
	document.getElementById("sure_pwd").innerHTML="两次输入的密码不一致";
}
	else if(n==""||n1==""){
		document.getElementById("sure_pwd").innerHTML="密码不能为空";
	}
	else{
		document.getElementById("sure_pwd").innerHTML="相同";
		document.f1.submit.disabled = false;
	}
}
function deletess(id){// 暂无调用
	if(window.confirm("确定要删除嘛?")){
		Window.Location="delete.php?id="+id;
	}

}
