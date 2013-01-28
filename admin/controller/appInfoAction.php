<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Sky
 * Date: 13-1-26
 * Time: 下午2:17
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
    private $curpage = 1;
    private $perpage = 20;

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
        $id = $this->appInfoService->addAppInfo($this->app);
        header("location:".S_URL."/admincp.php?action=appInfoAction&actionName=updateAppInfo&app[id]=".$id['extra']['id']);
    }

    function updateAppInfo(){
        $app = $this->app;
        include template("addappinfo");
    }

    function  updateAppInfoPost(){
        $this->appInfoService->updateAppInfo($this->app);
        header("location:".S_URL."/admincp.php?action=appInfoAction&actionName=appList");
    }

    /**
     *<p>应用列表页面</p>
     * author:tc
      */
    function applist(){
        include template("appList");
    }
    /**
     * <p>查询列表方法，ajax</p>
     * ahtour : tc
     */
    function listPost(){
        $whereResult= $this->propertyFilter();
        echo urldecode(json_encode($this->appInfoService->findList($whereResult, $this->perpage, $this->curpage, "ajaxListCommit")));
    }

    public function setCurpage($curpage)
    {
        $this->curpage = $curpage;
    }

    public function getCurpage()
    {
        return $this->curpage;
    }

    public function setPerpage($perpage)
    {
        $this->perpage = $perpage;
    }

    public function getPerpage()
    {
        return $this->perpage;
    }

    public function setApp($app)
    {
        $this->app = $app;
    }

    public function getApp()
    {
        return $this->app;
    }
}
new appInfoAction();
?>
