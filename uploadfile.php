<?php
/**
 * 上传图片
 * @author 张欢
 * @var unknown_type
 */
$ROOT = $_SERVER ['DOCUMENT_ROOT'] . substr ( $_SERVER ['PHP_SELF'], 0, strpos ( $_SERVER ['PHP_SELF'], '/', 2 ) + 1 );
include_once ('./include/main.inc.php');
include_once ('./include/common.inc.php');
include_once $ROOT . 'class/fileUtil.class.php';
include_once $ROOT . 'class/fileTypeCheck.php';

$id = $_POST ['id'];
$type = $_POST ['type'];
if($type==1){
    $typeArray = array ("JPG", "jpg" );

}else{
    $typeArray = array ("png","PNG");
}
$file_size = 10485760;
$isCheckType = true;
$dbname = $type==1?"b".$id.".jpg":($type==2?"m".$id:"m".$id."_2");
$filename =$type==1?"b".$id.".jpg":($type==2?"m".$id.".png":"m".$id."_2.png");
//文件大小确认
$path = FileUtilSave::saveFile ( $_FILES ['files'], $ROOT."images/".$filename, $typeArray, true,true);
if (is_file ( $path )) {
    $reuslt = array ("error" => "0", "serverpath" => ("/images/".$filename),"filepath"=>$dbname,"type"=>$type==1);
    echo urldecode ( json_encode ( $reuslt ) );
    exit ();
}
// echo $targetPath;
$reuslt = array ("error" => "1", "serverpath" => '', "id" => '' );
echo json_encode ( $reuslt );
exit ();
?>