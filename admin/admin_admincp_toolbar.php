<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type"
	content="text/html; charset=<?=$charset?>" />
<title>Tool Bar</title>
<link type="text/css" rel="stylesheet" href="admin/images/style_lp.css" />
<script language="javascript" type="text/javascript"
	src="include/js/admin.js"></script>
<script type="text/javascript"
	src="templates/app/js/jquery-1.8.3.js">
		
</script>
</head>

<body id="header">
	<div id="sitetitle"><strong><?=$alang ['homepage_management']?></strong>
	<a></a>
	</div>
	<div id="topmenu">
		<ul>
			<?=$toobar?>
		</ul>
	</div>
	<!--<a href="javascript:;" onclick="sideSwitch();" id="sideswitch"
		class="opened"><?=$alang ['toolbar_sideswitch']?></a>
	
	--><div id="topinfo">
		<ul>
			<li>&nbsp;&nbsp;</li>
			<li class="sitehomelink"><a href="<?=S_URL?>/" target="_blank"><?=$alang ['spacecp_home_index_url']?></a></li>
			<li>&nbsp;</li>
			<li class="logout"><a href="<?=S_URL?>/login.php?actionName=loginOut"
				target="_parent"><?=$alang ['toolbar_logout']?></a></li>
		</ul>
	</div>
<div class="fixs">
	<div class="fixs_left"></div>
	<div class="fixs_right"></div>
</div>
<script>
	$('.current')[0].click();
	$('#mainframe', window.parent.document).attr('src',$(".current").attr('href'));
</script>
</body>
</html>
