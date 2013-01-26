<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Sky
 * Date: 13-1-26
 * Time: ÏÂÎç2:17
 * To change this template use File | Settings | File Templates.
 */
$ROOT = $_SERVER ['DOCUMENT_ROOT'] . substr ( $_SERVER ['PHP_SELF'], 0, strpos ( $_SERVER ['PHP_SELF'], '/', 2 ) + 1 );
include_once ($ROOT . 'include/main.inc.php');
include_once ($ROOT . 'include/common.inc.php');
include_once ($ROOT . 'class/actionClass.php');
include_once ($ROOT . 'admin/service/appInfoService.php');
class appInfoAction extends ActionClass
{
    private $app;
    private $appInfoService;

    function __construct(){
        $this->appInfoService = new appInfoService();
        parent::__construct($this);
    }

    public function addappInfo(){
        $app = $this->app;
        include template("addapp");
    }

    function  addAppInfoPost(){
        $app = $this->app;
        $result = $this->appInfoService->addAppInfo($this->app);
        echo urldecode(json_encode($result));
    }
}
new appInfoAction();
?>
