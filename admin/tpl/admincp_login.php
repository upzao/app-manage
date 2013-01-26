<?php

/*
	[SupeSite/X-Space] (C)2001-2006 Comsenz Inc.
	管理员后台登录

	$RCSfile: admincp_login.php,v $
	$Revision: 1.12 $
	$Date: 2007/03/05 15:31:11 $
*/

if(!defined('IN_SUPESITE_ADMINCP')) {
	exit('Access Denied');
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>SupeSite Administrator's Control Panel</title>
<meta http-equiv="Content-Type" content="text/html; charset=<?=$charset?>">
</head>
<body style="background: #FFF; color: #000; font: 75% Arial, Helvetica, sans-serif;">
<div style="position: absolute; left: 50%; top: 50%; width: 500px; height: 230px; margin-left: -250px; margin-top: -115px;">
	<div style="border: 1px solid #CCC; background: #EEE; padding: 5px;">
		<form method="post" name="login" action="<?=S_URL?>/admincp.php" style="background: #FFF url(<?=S_URL?>/admin/images/loginlogo.gif) no-repeat 40px 50%; margin: 0; padding: 20px 0 20px 180px;">
			<fieldset style="border: none; border-left: 1px solid #EEE; padding-left: 3em;">
				<p style="margin: 0.5em 0;">登录为：<strong><?=stripslashes($_SGLOBAL['supe_username'])?></strong>&nbsp;&nbsp;<a href="<?=S_URL?>/pagerefresh.php" target="_blank">退出</a></p>
				<p style="margin: 0.5em 0;">密　码：<input type="password" id="admin_password" name="admin_password" style="width: 10em; border: 1px solid #CCC; padding: 4px 2px;"></p>
				<?if(empty($_SCONFIG['noseccode'])) {?><p style="margin: 0.5em 0;">验证码：<input type="text" name="seccode" style="width: 5em; border: 1px solid #CCC; padding: 4px 2px;"> <img id="xspace-imgseccode" src="<?=S_URL?>/batch.seccode.php" align="absmiddle" /></p><?}?>
				<p style="margin: 0.5em 0;">　　　　<input type="submit" class="button" name="dologinbtn" value="登录管理平台" style="background: #DDD; border-top: 1px solid #EEE; border-right: 1px solid #BBB; border-bottom: 1px solid #BBB; border-left: 1px solid #EEE; padding: 3px; cursor: pointer;" /></p>
			</fieldset>
			<input type="hidden" name="dologin" value="yes" />
		</form>
	</div>
	<p style="margin: 0.5em 0; text-align: center; font-size: 10px;">
		Powered by <a href="http://www.supesite.com" target="_blank" style="color: #006"><b>SupeSite</b></a> <?=S_VER?>
		&copy; 2001-2007 <a href="http://www.comsenz.com" target="_blank" style="color: #006">Comsenz Inc.</a></p>
</div>
<script language="JavaScript" type="text/javascript">
<!--
	document.getElementById('admin_password').focus();
//-->
</script>
</body>
</html>
