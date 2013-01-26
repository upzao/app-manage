<?php
$ROOT = $_SERVER ['DOCUMENT_ROOT'] . substr ( $_SERVER ['PHP_SELF'], 
		0, strpos ( $_SERVER ['PHP_SELF'], '/', 2 ) + 1 );
include_once('./include/main.inc.php');
include_once('./include/common.inc.php');
getcookie();
$uid = $_SGLOBAL ['id'];
//№ЬАнФ±µЗВј

if (!empty ( $uid ) &&  $uid > 0) {
	header ( "location:".S_URL."/admincp.php" );
	exit;
}

header("location:".S_URL."/login.php");

?>