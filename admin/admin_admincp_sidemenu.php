<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?=$_SCONFIG['charset']?>" />
<title>Sidemenu</title>
<link href="<?=IMG_DIR?>/style_lp.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?=S_URL?>/include/js/admin.js"></script>
<script type="text/javascript" src="<?=S_URL?>/templates/<?=S_TEMPLE?>/js/jquery.1.7.2.mini.js"></script>
<base target="mainframe" />
</head>

<body id="side">

<!--线路管理-->
<?=$sidemenu?>
<script type="text/javascript">
$(".current")[0].click();
treeView();
</script>
</body>
</html>