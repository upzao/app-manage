<?php

/*
	[SupeSite/X-Space] (C)2001-2006 Comsenz Inc.
	管理员管理页面

	$RCSfile: admincp.php,v $
	$Revision: 1.65 $
	$Date: 2007/03/30 21:10:14 $
*/
$ROOT = $_SERVER ['DOCUMENT_ROOT'] . substr ( $_SERVER ['PHP_SELF'], 0, strpos ( $_SERVER ['PHP_SELF'], '/', 2 ) + 1 );
include_once ('./include/main.inc.php');
include_once ($ROOT.'admin/service/managerService.php');
@define ( 'IN_SUPESITE_ADMINCP', TRUE );

define ( 'IMG_DIR', S_URL . '/admin/images' );
define ( 'CPURL', S_URL . '/admincp.php' );
//配置错误页面
$ERROR_PAGE = array('page'=>'noaccess',"package"=>"");
$action = empty ( $_GET ['action'] ) ? '' : $_GET ['action'];
getcookie ( 1 );
$uid = $_SGLOBAL ['id'];
//管理员登录
if (empty ( $uid ) && ! $uid > 0) {
	header("location:".S_URL."/login.php");
	exit;
}
$tid = $_SGLOBAL['tid'];
include_once ($ROOT.'admin/service/authorityService.php');
if(!AuthorityService::HAS_POWER_IN_TO_ANIMATION($_SGLOBAL['roletype'])){
	$url = S_URL;
	print<<<EOF
	<script>
		alert("您还未被赋予权限!");
		window.location.href="$url/login.php?actionName=loginOut";
	</script>
EOF;
}
/*else{
	$url = S_URL;
	if(!AuthorityService::SUPE_ADMIN()){
		if(empty($_SGLOBAL['authority'])){
			print<<<EOF
	<script>
		alert("您还未被赋予权限!");
		window.location.href="$url/login.php?actionName=loginOut";
	</script>
EOF;
		}
	}
}*/
//语言包
include_once (S_ROOT . './language/admincp.lang.php');

//记录log
/*@$fp = fopen ( S_ROOT . './log/admincplog.php', 'a' );
@flock ( $fp, 2 );
@fwrite ( $fp, "<?exit?>$_SGLOBAL[timestamp]\t$_SGLOBAL[supe_username]\t$_SGLOBAL[onlineip]\t" . $_SERVER ['QUERY_STRING'] . "\n" );
@fclose ( $fp );*/

include_once (S_ROOT . './include/common.inc.php');
include_once (S_ROOT . './function/html.func.php');
include_once (S_ROOT . './function/admin.func.php');
include_once (S_ROOT . './function/cache.func.php');

if (! empty ( $action )) {
	$theurl = CPURL . '?action=' . $action;
	switch ($action) {
		case 'index' :
		case 'settings' :
			include_once (S_ROOT . './admin/tpl/admincp_header.php');
			include_once ('./admin/admin_' . $action . '.php');
			include_once (S_ROOT . './admin/tpl/admincp_footer.php');
			break;
		case 'toolbar' :
			$menuService = new ManagerService();
			$toobar = "";
			if(!empty($_SGLOBAL['roletype'])&&$_SGLOBAL['roletype']>0){
				$toobar = $menuService->getToolBar();
			}
			include_once (S_ROOT . './admin/admin_admincp_toolbar.php');
			break;
		case 'sidemenu' :
			$menuService = new ManagerService();
			$sidemenu = "";
			if(!empty($_SGLOBAL['roletype'])&&$_SGLOBAL['roletype']>0){
				$sidemenu = $menuService->getSidmenu();
			}
			include_once (S_ROOT . './admin/admin_admincp_sidemenu.php');
			break;
		default :
			if($action=='home'){
				$dbver = $_SCONFIG ['dbver'];
				if (empty ( $_GET ['showinfo'] )) {
				} else {
					$groups = $_SGLOBAL ['db']->result ( $_SGLOBAL ['db']->query ( "SELECT COUNT(*) FROM " . tname ( 'groups' ) ), 0 );
					$month = $_SGLOBAL ['timestamp'] - 3600 * 24 * 30;
					$day = $_SGLOBAL ['timestamp'] - 3600 * 24;
					$data_length = 0;
					$query = $_SGLOBAL ['db']->query ( "SHOW TABLE STATUS FROM `" . $dbname . "` LIKE '$tablepre%'" );
					while ( $value = $_SGLOBAL ['db']->fetch_array ( $query ) ) {
						$data_length = $data_length + $value ['Data_length'] + $value ['Index_length'];
					};
					$data_length = formatsize ( $data_length );
					$inforstr = <<<END
				<tr>
				<td>$alang[few_stations_open_space]: $spaces</td>
				<td>$alang[few_stations_open_group]: $groups</td>
				</tr>
				<tr>
				<td>$alang[information_released_within_a_few_points]: $items</td>
				<td></td>
				</tr>
				<tr>
				<td colspan="2"><hr size="1" style="color:#FFFFFF"></td>
				</tr>
				<tr>
				<td>$alang[several_additional_space_within_30_days]: $spaces_month</td>
				<td>$alang[within_24_hours_the_number_of_new_space]: $spaces_day</td>
				</tr>
				<tr>
				<td>$alang[add_info_within_30_days_of_a_few]: $items_month</td>
				<td>$alang[several_add_info_within_24_hours]: $items_day</td>
				</tr>
				<tr>
				<td>$alang[mysql_has_used_space]: $data_length</td>
				<td>$alang[upload_annex_size]: $attachs</td>
				</tr>
END;
				}
				include_once (S_ROOT . './admin/tpl/admincp_home.php');
			}else{
				$ACTIONURL = './admin/controller/' . str_replace ( '-', '/', $action );
				if(file_exists($ACTIONURL . ".php")){
					include_once ($ROOT . $ACTIONURL . ".php");
				}else{
					echo '页面不存在';
				}
			}
			break;
	}
} else {
	include_once (S_ROOT . './admin/tpl/admincp_index.php');
}

?>