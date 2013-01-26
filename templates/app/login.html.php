<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>后台登录</title>
<script type="text/javascript" src="{S_URL}/templates/{S_TEMPLE}/js/jquery.1.7.2.mini.js"></script>
<script src="{S_URL}/templates/{S_TEMPLE}/js/artDialog.source.js?skin={ALERT_SKIN}"></script>
<script type="text/javascript" src="{S_URL}/templates/{S_TEMPLE}/js/plugins/iframeTools.source.js"></script>
<style>
	body{ background:#ccd8f2; margin:0; padding:0; font-family:"微软雅黑", "黑体"; overflow: hidden;background: url({S_URL}/templates/{S_TEMPLE}/images/login_bg.jpg) repeat; width:100%; height:100%;}
	label{color:white;}
	.main{ margin:0 auto; position:relative;}
	.login_area{ margin:0 auto; width:407px; height:239px;  margin-top:10%; background:url({S_URL}/templates/{S_TEMPLE}/images/login.png) no-repeat;}
	.login_area tr td{ line-height:30px;}
	.login_area input{ width:180px; height:20px;}
	input{width:183px;height:28px;}
	a{outline: none;border: none;}
	img{border:none;}
</style>
<script type="text/javascript">
		function login(){
			var mname = $("#username").val();
			var psw = $("#psw").val();
			var data = {"actionName":"loginPost","manager[mname]":mname,"manager[mpsw]":psw};
			$.post("{S_URL}/login.php",data,function(json) {
				if(json){
					var datas = (typeof json == 'string') ? $.parseJSON(json): json;
					if(!datas.error){
						window.location.href="{S_URL}/admincp.php";
					}else{
					    art.dialog.tips('用户名或密码不正确').time(2);
					}
					
				}
			});
		}
	</script>
</head>

<body scroll="no">
	<div class="main">
		<div class="login_area">
			<table cellspacing="0" cellpadding="0" width="407" height="239">
				<tr>
					<td rowspan="4" width="40" height="79">&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td height="40"><label>用户名：</label></td>
					<td><input type="text"  name="username" id="username" /></td>
				</tr>
				<tr>
					<td height="40"><label>密&nbsp;&nbsp; 码：</label></td>
					<td><input type="password"  name="psw" id="psw"/></td>
				</tr>
				<tr>
					<td height="80">&nbsp;</td>
					<td><a href="javascript:void(0);" onclick="javascript:login();return false;"><img src="{S_URL}/templates/{S_TEMPLE}/images/login_button.png" /></a></td>
				</tr>
			</table>

		</div>
	</div>
	
</body>
</html>
