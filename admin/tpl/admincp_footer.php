<?php

/*
	[SupeSite/X-Space] (C)2001-2006 Comsenz Inc.
	管理员后台页脚

	$RCSfile: admincp_footer.php,v $
	$Revision: 1.17 $
	$Date: 2007/03/12 22:31:02 $
*/

if(!defined('IN_SUPESITE_ADMINCP')) {
	exit('Access Denied');
}
?>
<br>
<div id="footer">
	Powered by <a href="http://www.supesite.com" target="_blank"><strong>Supe<span>Site</span></strong></a> <em><?=S_VER?></em> 
	&copy; 2001-2007 <a href="http://www.comsenz.com" target="_blank">Comsenz Inc.</a>
	<!--P><?echo debuginfo();?></P-->
</div>
</div>
<iframe id="phpframe" name="phpframe" width="0" height="0" marginwidth="0" frameborder="0" src="about:blank"></iframe>
</body>
</html>
<?
if(D_BUG) include_once(S_ROOT.'./include/debug.inc.php');
?>