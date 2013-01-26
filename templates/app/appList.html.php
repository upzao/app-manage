<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=GBK">
<title>应用管理列表</title>
<script type="text/javascript" src="{S_URL}/templates/{S_TEMPLE}/js/jquery-1.8.3.js"></script>
<link href="{IMG_DIR}/style.css" rel="stylesheet" type="text/css" />
<link type="text/css"
	href="{S_URL}/templates/{S_TEMPLE}/css/supplier_right.css"
	rel="stylesheet"
/>
<script src="{S_URL}/templates/{S_TEMPLE}/js/artDialog.source.js?skin={ALERT_SKIN}"></script>
<script type="text/javascript" src="{S_URL}/templates/{S_TEMPLE}/js/plugins/iframeTools.source.js"></script>
<style type="text/css">
a{cursor: pointer;}
</style>
</head>
<body class="body">
    应用名称:
	<input id="cname" />
	<input type="button" value=" 搜索 " onclick="ajaxListCommit(1)" id="commit">
	<a class="openPage">新建应用信息</a>
<div class='rfm'></div>
<div style="margin-top: 10px;margin-bottom: 10px">
	<table class="listtable" cellSpacing="0" cellPadding="0" >
		<thead>
			<tr>
				<td>应用名称</td>
				<td>应用连接</td>
			</tr>
		</thead>
		<tbody id="goodsListTable">
		</tbody>
	</table>
</div>
<div id="mulitpage"></div>
<script type="text/javascript">
    $(document).ready(ajaxListCommit(1));
    function ajaxListCommit(page) {
    	$('#goodsListTable').html("<tr align='center'>"
					    				+"<td colspan='2'>查询中……</td>"
				    			   +"</tr>");
    	var cname = $("#cname").val();
    	var prams = {
    	    "actionName" : "listPost",
    	    "filter_LIKE_subject" : cname,
    	    "curpage" : page
    	};
    	$.post('{S_URL}/admincp.php?action=appInfoAction', prams,
    		function(json) {
    		    if (json) {
	    			var data = (typeof json == 'string') ? $.parseJSON(json) : json;
	    			$('#goodsListTable').html(data.result);
	    			$('#mulitpage').html(data.mulitpage);
    		    }
			}
		);
    }

    $(".openPage").bind("click", function() {
   	 	window.location.href='{S_URL}/admincp.php?action=appInfoAction&actionName=addappInfo';
    });

</script>
</body>
</html>