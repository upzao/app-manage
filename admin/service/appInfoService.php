<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Sky
 * Date: 13-1-26
 * Time: ÏÂÎç1:23
 * To change this template use File | Settings | File Templates.
 */
include_once($ROOT . 'admin/dao/appInfoDao.php');
class appInfoService
{
    private $appInfoDao;
    private $result;

    function _construct(){
        $this->appInfoDao = new appInfoDao();
        $this->result = array("error"=>true,"msg"=>"","state"=>"","extra"=>array(),"url"=>"");
    }

    function addAppInfo($app){
       $id = $this->appInfoDao->addAppInfo($app);
        if($id>0&&is_numeric($id)){
            $this->result['error']=false;
            $this->result['extra']['id']=$id;
            return $this->result;
        }else{
            $this->result['error']=true;
            return $this->result;
        }
    }

    function updateAppInfo($app){
        global $_SGLOBAL;
        $wheresql = array("id"=>$app['id']);
        unset($app['id']);
        $_SGLOBAL['db']->queryTransaction("BEGIN");
        $query = $this->appInfoDao->updateAppInfo($app,$wheresql);
        if($query){
            $this->result['error']=false;
            $_SGLOBAL['db']->queryTransaction("COMMIT");
            return $this->result;
        }
        $_SGLOBAL['db']->queryTransaction("ROLLBACK");
        $this->result['error']=true;
        return $this->result;
    }
}
