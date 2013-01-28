<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=GBK">
    <title>添加应用信息</title>
    <link rel="stylesheet" href="{S_URL}/templates/{S_TEMPLE}/css/default/default.css"/>
    <link type="text/css" href="{S_URL}/templates/{S_TEMPLE}/css/supplier_right.css" rel="stylesheet"/>

    <script type="text/javascript" src="{S_URL}/templates/{S_TEMPLE}/js/jquery-1.8.3.js"></script>
    <link type="text/css" href="{S_URL}/templates/{S_TEMPLE}/css/imageover/demo.css" rel="stylesheet"/>
    <link type="text/css" href="{S_URL}/templates/{S_TEMPLE}/css/imageover/style_common.css" rel="stylesheet"/>
    <link type="text/css" href="{S_URL}/templates/{S_TEMPLE}/css/imageover/style1.css" rel="stylesheet"/>
    <link type="text/css" href="{S_URL}/templates/{S_TEMPLE}/css/sortable/jquery-ui-1.9.2.custom.min.css" rel="stylesheet" />

    <script src="{S_URL}/templates/{S_TEMPLE}/js/artDialog.source.js?skin={ALERT_SKIN}"></script>
    <script type="text/javascript" src="{S_URL}/templates/{S_TEMPLE}/js/plugins/iframeTools.source.js"></script>

    <style type="text/css">
            /* sortable css start */
        #sortable li {
            margin: 3px 3px 3px 0;
            padding: 1px;
            float: left;
            width: 100px;
            height: 90px;
            position: relative;
        }

        #sortable li img {
            width: 100px;
            height: 90px;
            -moz-border-radius-topleft: 4px;
        }

        #sortable li a {
            top: 5px;
            right: 5px;
            position: absolute;
            cursor: pointer;
        }

        .ui-icon:hover {
            background-image:
                url({S_URL}/templates/{S_TEMPLE}/css/sortable/images/ui-icons_454545_256x240.png);
        }
            /* sortable css end */
        .rfm {	margin: 0 auto;	width: 500px;	border-bottom: 1px dotted #CDCDCD;}
        .rfmsolid {	margin: 0 auto;	width: 500px;	border-bottom: 1px solid #000000;	font:18px bold ;	padding:20px 2px 2px 0px;	color:#5f9de0;	font-family:"微软雅黑", "黑体";}
        .rfm th {	padding-right: 10px;	width: 9em;	text-align: right;}
        .rfm th, .rfm td {	padding: 10px 2px;	vertical-align: top;	line-height: 24px;}
        .rfm td {	width: 17em;}
        .rq{	color: #FF0000;}
        table {	empty-cells: show;	border-collapse: collapse;}
        .cb-enable, .cb-disable, .cb-enable span, .cb-disable span { background: url({S_URL}/templates/{S_TEMPLE}/js/iphone-style-switches/switch.gif) repeat-x; display: block; float: left; }
        .cb-enable span, .cb-disable span { line-height: 30px; display: block; background-repeat: no-repeat; font-weight: bold; }
        .cb-enable span { background-position: left -90px; padding: 0 10px; }
        .cb-disable span { background-position: right -180px;padding: 0 10px; }
        .cb-disable.selected { background-position: 0 -30px; }
        .cb-disable.selected span { background-position: right -210px; color: #fff; }
        .cb-enable.selected { background-position: 0 -60px; }
        .cb-enable.selected span { background-position: left -150px; color: #fff; }
        .switch label { cursor: pointer; }
        .switch input { display: none; }
    </style>
</head>
<body>
<form name="example" method="post" id='form' action="{S_URL}/admincp.php?action=appInfoAction" enctype="multipart/form-data">
    <input type="hidden" name="actionName" value="addAppInfoPost">
    <div class="steps">
        <div class="step_one"></div>
    </div>
    <div class="addGoods">
        <div class="addGoods_one_left" style="height:600px;">
            <div class="rfmsolid">
               添加应用信息
            </div>
            <div class="rfm">
                <table>
                    <tbody>
                    <tr>
                        <th>
                            <span class="rq">*</span>
                            <label>应用名称:</label>
                        </th>
                        <td>
                            <input id="subject" type="text"  name="app[subject]"  size="25" maxlength="15">
                        </td>
                        <td>
                            <i id='valispecialName' style="display: none; ">请填写应用名称</i>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="rfm" >
                <table>
                    <tbody>
                    <tr>
                        <th><span class="rq">*</span><label>应用路径:</label></th>
                        <td>
                            &nbsp;&nbsp;http://<input id="url"  type="text"  name="app[url]" size="25" maxlength="15" >
                        </td>
                        <td>
                            <kbd>&nbsp;&nbsp;&nbsp;&nbsp;</kbd>
                            <i id='valispecialtel' style="display: none; ">请填写应用路径</i>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>

            <div class="rfm">
                <table>
                    <tbody>
                    <tr>
                        <th>
                            <label>&nbsp;</label>
                        </th>
                        <td>
                            <input id="appInfoButton" type="button" name="button" onclick="validata()"  value=" 下一步 " />
                        </td>
                        <td>&nbsp;</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</form>
<input type="hidden" name="filecount" id="filecount" value="0">
<script type="text/javascript">
    $(function(){
        $('#subject').focus(function(){
            $('#valispecialName').hide(250);
        });
        $('#url').focus(function(){
            $('#valispecialtel').hide(250);
        });
    });
    function validata(){
        if($('#subject').val().replace('\s+','').length==0){
            $('#valispecialName').slideDown(250);
            return false;
        }
        if($('#url').val().replace('\s+','').length==0){
            $('#valispecialtel').slideDown(250);
            return false;
        }
        $('#form').submit();
    }
</script>
</body>
</html>
