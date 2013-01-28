<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=GBK">
    <title>{WEB_TAB_TITLE}</title>
    <link rel="stylesheet" href="{S_URL}/templates/{S_TEMPLE}/css/default/default.css"/>
    <link type="text/css" href="{S_URL}/templates/{S_TEMPLE}/css/supplier_right.css" rel="stylesheet"/>

    <script type="text/javascript" src="{S_URL}/templates/{S_TEMPLE}/js/jquery-1.8.3.js"></script>
    <!-- jquery radio plugins start-->
    <script src="{S_URL}/templates/{S_TEMPLE}/js/jquery-ui-1.9.2.custom.min.js"></script>
    <!-- jquery radio plugins end-->
    <link type="text/css" href="{S_URL}/templates/{S_TEMPLE}/css/imageover/demo.css" rel="stylesheet"/>
    <link type="text/css" href="{S_URL}/templates/{S_TEMPLE}/css/imageover/style_common.css" rel="stylesheet"/>
    <link type="text/css" href="{S_URL}/templates/{S_TEMPLE}/css/imageover/style1.css" rel="stylesheet"/>
    <link type="text/css" href="{S_URL}/templates/{S_TEMPLE}/css/sortable/jquery-ui-1.9.2.custom.min.css" rel="stylesheet" />
    <!-- flash jquery -->
    <link href="{S_URL}/templates/{S_TEMPLE}/js/uploadify-v3.1/uploadify.css" type="text/css" rel="stylesheet" />
    <script type="text/javascript" src="{S_URL}/templates/{S_TEMPLE}/js/uploadify-v3.1/jquery.uploadify-3.1.js"></script>
    <!-- flash jquery end -->

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
    <script type="text/javascript">
        var hasAlert=false;
        var hasAlert2=false;
        var videoHasAlert=false;
        var type=1;
        var uplaodLimit=6;
        var hasSubmit=true;
        var hasSubmit2=true;
        var divid='imageUploadDiv';
        var divid2='imageUploadDiv2';
        var divid3='imageUploadDiv3';
        $(document).ready(function() {
            $("#coverimage").uploadify({
                'swf': '{S_URL}/templates/{S_TEMPLE}/js/uploadify-v3.1/uploadify.swf',
                'uploader'   : '{S_URL}/uploadfile.php',
                'method':'post',
                'formData':{"id":"{$app[id]}","type":"1"},
                'buttonImage':'{S_URL}/templates/{S_TEMPLE}/images/select_images.png',
                'width'     : '138',
                'height'    : '41',
                'preventCaching' :true,
                'multi'     : true,
                'fileTypeDesc'  : 'jpg,JPG',
                'fileTypeExts'	: '*.JPG; *.jpg',
                'fileObjName' :'files',
                'queueSizeLimit':1,
                'fileSizeLimit' : "5MB",
                'queueID': 'queeid',
                'onUploadSuccess':function(file, data, response){
                    var datas = (typeof data == 'string') ? $.parseJSON(data): data;
                    if(datas.error==0){
                        $('#imageUploadDiv').append('<div class="view view-first">'
                                +'<img  alt="" height="180px" width="220px" src="{S_URL}'+datas.serverpath+'">'
                                +'<input type="hidden" name="app[bigname]" value="'+datas.filepath+'"/>'
                                +'<div class="mask" >'
                                +'<a href="#" class="info" onclick="delTitlePage(this)">删除</a>'
                                +'</div>'
                                +'</div>');
                    }
                },
                'onUploadStart' :function(file){

                },
                'onSelect':function(){
                    $('#valicoverimage').hide(250);
                    hasAlert3=false;
                    if($('#'+divid).find('.view').length>=1){
                        if(!hasAlert){
                            $('#coverimage').uploadify('cancel',"*");
                            alert("图片限一张");
                        }else
                            hasAlert=true;
                    }
                },
                'onUploadComplete':function(){
                    hasSubmit=true;
                }
            });
            $("#coverimage2").uploadify({
                'swf': '{S_URL}/templates/{S_TEMPLE}/js/uploadify-v3.1/uploadify.swf',
                'uploader'   : '{S_URL}/uploadfile.php',
                'method':'post',
                'formData':{"id":"{$app[id]}","type":"2"},
                'buttonImage':'{S_URL}/templates/{S_TEMPLE}/images/select_images.png',
                'width'     : '138',
                'height'    : '41',
                'preventCaching' :true,
                'multi'     : true,
                'fileTypeDesc'  : 'png,PNG',
                'fileTypeExts'	: '*.PNG; *.png',
                'fileObjName' :'files',
                'fileSizeLimit' : "5MB",
                'queueID': 'queeid2',
                'onUploadSuccess':function(file, data, response){
                    var datas = (typeof data == 'string') ? $.parseJSON(data): data;
                    if(datas.error==0){
                        $('#imageUploadDiv2').append('<div class="view view-first">'
                                +'<img  alt="" height="180px" width="220px" src="{S_URL}'+datas.serverpath+'">'
                                +'<input type="hidden" name="app[name]" value="'+datas.filepath+'"/>'
                                +'<div class="mask" >'
                                +'<a href="#" class="info" onclick="delTitlePage(this)">删除</a>'
                                +'</div>'
                                +'</div>');
                    }
                },
                'onUploadStart' :function(file){
                },
                'onSelect':function(){
                    $('#valicoverimage').hide(250);
                    hasAlert3=false;
                    if($('#'+divid2).find('.view').length>=1){
                        if(!hasAlert2){
                            $('#coverimage2').uploadify('cancel',"*");
                            alert("图片限一张");
                        }else
                            hasAlert2=true;
                    }
                },
                'onUploadComplete':function(){
                    hasSubmit2=true;
                }
            });
            $("#coverimage3").uploadify({
                'swf': '{S_URL}/templates/{S_TEMPLE}/js/uploadify-v3.1/uploadify.swf',
                'uploader'   : '{S_URL}/uploadfile.php',
                'method':'post',
                'formData':{"id":"{$app[id]}","type":"3"},
                'buttonImage':'{S_URL}/templates/{S_TEMPLE}/images/select_images.png',
                'width'     : '138',
                'height'    : '41',
                'preventCaching' :true,
                'multi'     : true,
                'fileTypeDesc'  : 'png,PNG',
                'fileTypeExts'	: '*.PNG; *.png',
                'fileObjName' :'files',
                'fileSizeLimit' : "5MB",
                'queueID': 'queeid3',
                'onUploadSuccess':function(file, data, response){
                    var datas = (typeof data == 'string') ? $.parseJSON(data): data;
                    if(datas.error==0){
                        $('#imageUploadDiv3').append('<div class="view view-first">'
                                +'<img  alt="" height="180px" width="220px" src="{S_URL}'+datas.serverpath+'">'
                                +'<div class="mask" >'
                                +'<a href="#" class="info"onclick="delTitlePage(this)">删除</a>'
                                +'</div>'
                                +'</div>');
                    }
                },
                'onUploadStart' :function(file){
                },
                'onSelect':function(){
                    $('#valicoverimage').hide(250);
                    hasAlert3=false;
                    if($('#'+divid3).find('.view').length>=1){
                        if(!hasAlert3){
                            $('#coverimage3').uploadify('cancel',"*");
                            alert("图片限一张");
                        }else
                            hasAlert3=true;
                    }
                },
                'onUploadComplete':function(){
                    hasSubmit3=true;
                }
            });

        });
    </script>
</head>
<body>
<form name="example" method="post" id='form' action="{S_URL}/admincp.php?action=appInfoAction" enctype="multipart/form-data">
    <input type="hidden" name="actionName" value="updateAppInfoPost">
    <input type="hidden" name="app[id]" value="{$app['id']}">
    <div class="steps">
        <div class="step_one"></div>
    </div>
    <div class="addGoods">
        <div class="addGoods_one_left" style="height:600px;">
            <div class="rfmsolid">
                添加应用信息
            </div>

            <div class="rfm" id="uploadImage1">
                <table>
                    <tbody>
                    <tr>
                        <th>
                            <span class="rq">*</span>
                            <label>应用封面:</label>
                        </th>
                        <td align="left">
                            <input id='coverimage' type="file"  size="25" maxlength="15" width="140">
                            <input type="hidden" name="app[bigname]" id="cover1">
                            <div id="queeid"></div>
                        </td>
                        <td>
                            <div>
                                图片规格：宽 406  X 高   231
                            </div>
                            <i id='valicoverimage' style="display: none; ">&nbsp;</i>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="rfm" id="uploadImage2">
                <table>
                    <tbody>
                    <tr>
                        <th>
                            <span class="rq">*</span>
                            <label>按钮图片:</label>
                        </th>
                        <td align="left">
                            <input id='coverimage2' type="file"  size="25" maxlength="15" width="140">
                            <input type="hidden" name="app[name]" id="cover2">
                            <div id="queeid2"></div>
                        </td>
                        <td>
                            <div>
                                图片规格：宽 108  X 高  120
                            </div>
                            <i id='valicoverimage2' style="display: none; ">&nbsp;</i>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="rfm" id="uploadImage3">
                <table>
                    <tbody>
                    <tr>
                        <th>
                            <span class="rq">*</span>
                            <label>按钮图片2:</label>
                        </th>
                        <td align="left">
                            <input id='coverimage3' type="file"  size="25" maxlength="15" width="140">
                            <div id="queeid3"></div>
                        </td>
                        <td>
                            <div>
                                图片规格：宽 109  X 高  121
                            </div>
                            <i id='valicoverimage3' style="display: none; ">&nbsp;</i>
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
                            <input id="appInfoButton" type="button" name="button" onclick="validata()"  value=" 保存 " />
                        </td>
                        <td>&nbsp;</td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="rfm" style="height: 1600px;"></div>
        </div>
        <div class="addGoods_one_right" id="imageUploadDiv" style="height:200px;width: 300px;">
            <div class="yulan_imgs" >封面图片预览区域</div>
        </div>
        <div class="addGoods_one_right " id="imageUploadDiv2" style="height:200px;width: 300px;">
            <div class="yulan_imgs" >按钮图片预览区域</div>
<!--            <ul id="sortable">-->
<!--            </ul>-->
        </div>
        <div class="addGoods_one_right" id="imageUploadDiv3" style="height:200px;width: 300px;">
            <div class="yulan_imgs" >按钮图片预览区域</div>
        </div>
    </div>
</form>
<input type="hidden" name="filecount" id="filecount" value="0">
<script type="text/javascript">
    $(function(){
        $('#coverimgshow').click(function(){
            $('#valicoverimage').hide(250);
        });
        $('#coverimgshow2').click(function(){
            $('#valicoverimage2').hide(250);
        });
        $('#coverimgshow3').click(function(){
            $('#valicoverimage3').hide(250);
        });
    });
    function validata(){
        if(!hasSubmit||!hasSubmit2||!hasSubmit3){
            alert('还有未上传成功的文件，请稍等。');
            return false;
        }
        if($('#'+divid).find('.view').length==0){
            $('#valicoverimage').text('请选择图片');
            $('#valicoverimage').slideDown(250);
            return false;
        }
        if($('#'+divid2).find('.view').length==0){
            $('#valicoverimage2').text('请选择图片');
            $('#valicoverimage2').slideDown(250);
            return false;
        }
        if($('#'+divid3).find('.view').length==0){
            $('#valicoverimage3').text('请选择图片');
            $('#valicoverimage3').slideDown(250);
            return false;
        }
        $('#form').submit();
    }


    /**
     * 删除预览的div
     */
    function delImage(o){
            $(o).parent().remove();
    }

    /**
     * 删除封面
     */
    var delTitlePage=function(o){
        $(o).parent().parent().remove();
    }
</script>
</body>
</html>
