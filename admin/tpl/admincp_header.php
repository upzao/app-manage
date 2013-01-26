<?php

/*
	[SupeSite/X-Space] (C)2001-2006 Comsenz Inc.
	管理员后台页头

	$RCSfile: admincp_header.php,v $
	$Revision: 1.35 $
	$Date: 2007/03/05 15:31:11 $
*/

if(!defined('IN_SUPESITE_ADMINCP')) {
	exit('Access Denied');
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?=$_SCONFIG['charset']?>" />
<title>Administrator's Control Panel</title>
<link href="<?=IMG_DIR?>/style.css" rel="stylesheet" type="text/css" />
<link href="<?=S_URL?>/images/edit/edit.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
var siteUrl = "<?=S_URL?>";
</script>
<script language="javascript" type="text/javascript" src="<?=S_URL?>/include/js/common.js"></script>
<script language="javascript" type="text/javascript" src="<?=S_URL?>/images/edit/edit.js"></script>
<script language="javascript" type="text/javascript" src="<?=S_URL?>/include/js/admin.js"></script>
<script language="javascript" type="text/javascript" src="<?=S_URL?>/include/js/ajax.js"></script>
</head>

<body id="main">