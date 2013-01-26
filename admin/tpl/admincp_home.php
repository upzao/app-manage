<?php

/*
	[SupeSite/X-Space] (C)2001-2006 Comsenz Inc.
	管理员后台首页

	$RCSfile: admincp_home.php,v $
	$Revision: 1.24 $
	$Date: 2007/03/23 16:29:13 $
*/

if(!defined('IN_SUPESITE_ADMINCP')) {
	exit('Access Denied');
}
?>
<table summary="" id="pagehead" cellpadding="0" cellspacing="0" border="0" width="100%">
	<tr>
		<td><h1><?=$alang['admincp_home_welcome']?></h1></td>
	</tr>
</table>
<table cellpadding="0" cellspacing="0" width="100%" border="0">
	<tr>
		<td valign="top">
			<table cellpadding="0" cellspacing="0" border="0" width="100%" class="maintable">

				<tr>
					<td>
					
					<table cellpadding="2" cellspacing="2" border="0" width="100%">
					<tr>
						<td>程序代码文件版本: <?=S_VER?> (<?=S_RELEASE?>) &nbsp; [<a href="http://www.supesite.com/update.php?release=<?=S_RELEASE?>&dbver=<?=$dbver?>" target="_blank" style="color:red;">检测新版本</a>]</td>
						<td>程序数据结构版本: <?=$dbver?></td>
					</tr>
					<?=$inforstr?>
					</table>
					
					</td>
				</tr>
			</table>
					
			<br />		
					
			<table cellpadding="0" cellspacing="0" border="0" width="100%" class="maintable">
				<tr>
					<td>					
					
						<table cellpadding="0" cellspacing="0" border="0" width="100%" id="quicklinks">
							<tr>
								<td><a href="<?=CPURL?>?action=spacenews&op=add"><img src="<?=IMG_DIR?>/icon_post.gif" alt="" /><?=$alang['admincp_home_news_add']?></a></td>
								<td><a href="<?=CPURL?>?action=blocks"><img src="<?=IMG_DIR?>/icon_module.gif" alt="" /><?=$alang['admincp_header_action_block']?></a></td>
							</tr>
							<tr>
								<td><a href="<?=CPURL?>?action=tags"><img src="<?=IMG_DIR?>/icon_tag.gif" alt="" /><?=$alang['admincp_home_tag_manage']?></a></td>
								<td><a href="<?=CPURL?>?action=spaces"><img src="<?=IMG_DIR?>/icon_user.gif" alt="" /><?=$alang['admincp_home_user_manage']?></a></td>
							</tr>
						</table>
						
					</td>
				</tr>
			</table>
		</td>
		<td style="background:url(<?=IMG_DIR?>/logo_back.gif) no-repeat bottom; padding-bottom:140px;" width="260">
			<table cellpadding="0" cellspacing="0" width="180" border="0" style="margin: 0 auto;">
				<tr>
					<td width="7" height="7"><img src="<?=IMG_DIR?>/y_box_01.gif" alt="" /></td>
					<td style="background:url(<?=IMG_DIR?>/y_box_02.gif) repeat-x;"><img src="<?=IMG_DIR?>/y_box_02.gif" alt="" /></td>
					<td width="6"><img src="<?=IMG_DIR?>/y_box_03.gif" alt="" /></td>
				</tr>
				<tr>
					<td style="background:url(<?=IMG_DIR?>/y_box_04.gif) repeat-y;"><img src="<?=IMG_DIR?>/y_box_04.gif" alt="" /></td>
					<td style="background:#FCFFEF;">
						<ul id="supelinks">
							<li><a href="http://www.supesite.com" target="_blank"><?=$alang['admincp_home_index_url']?></a></li>
							<li><a href="http://www.supesite.com/bbs.html" target="_blank"><?=$alang['admincp_home_bbs_url']?></a></li>
						</ul>
						&copy; 2001-2007 <a href="http://www.comsenz.com/" target="_blank">Comsenz Inc.</a><br />产品著作权号:2006SR12090
					</td>
					<td style="background:url(<?=IMG_DIR?>/y_box_05.gif) repeat-y;"><img src="<?=IMG_DIR?>/y_box_05.gif" alt="" /></td>
				</tr>
				<tr>
					<td height="28" style="vertical-align:top;"><img src="<?=IMG_DIR?>/y_box_06.gif" alt="" /></td>
					<td style="background:url(<?=IMG_DIR?>/y_box_07.gif) repeat-x top;"><img src="<?=IMG_DIR?>/y_box_09.gif" alt="" /></td>
					<td style="vertical-align:top;"><img src="<?=IMG_DIR?>/y_box_08.gif" alt="" /></td>
				</tr>
			</table>
		</td>
	</tr>
</table>
