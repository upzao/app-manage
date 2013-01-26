<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Frameset//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-frameset.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?=$_SCONFIG['charset']?>" />
<title>旅游管理平台</title>
</head>

<frameset rows="100,*" frameborder="no" border="0" framespacing="0">
  <frame src="<?=CPURL?>?action=toolbar" name="topframe" scrolling="no" id="topframe" title="topframe" />
  <frameset id="mainframeset" cols="205,*" frameborder="no" border="0" framespacing="0" >
    <frame src="<?=CPURL?>?action=sidemenu" name="leftframe" scrolling="no" noresize="noresize" id="leftframe" title="leftframe" />
    <frame src="" name="mainframe" id="mainframe" title="mainframe" />
  </frameset>
</frameset>
<noframes>
<body>
</body>
</noframes>
</html>