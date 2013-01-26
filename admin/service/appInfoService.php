<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Sky
 * Date: 13-1-26
 * Time: 下午1:23
 * To change this template use File | Settings | File Templates.
 */
include_once($ROOT . 'admin/dao/appInfoDao.php');
class appInfoService
{
    private $appInfoDao;
    private $result;

    function __construct()
    {
        $this->appInfoDao = new appInfoDao();
        $this->result = array("error" => true, "msg" => "", "state" => "", "extra" => array(), "url" => "");
    }

    function addAppInfo($app)
    {
        $id = $this->appInfoDao->addAppInfo($app);
        if ($id > 0 && is_numeric($id)) {
            $this->result['error'] = false;
            $this->result['extra']['id'] = $id;
            return $this->result;
        } else {
            $this->result['error'] = true;
            return $this->result;
        }
    }

    function updateAppInfo($app)
    {
        global $_SGLOBAL;
        $wheresql = array("id" => $app['id']);
        unset($app['id']);
        $_SGLOBAL['db']->queryTransaction("BEGIN");
        $query = $this->appInfoDao->updateAppInfo($app, $wheresql);
        if ($query) {
            $this->result['error'] = false;
            $_SGLOBAL['db']->queryTransaction("COMMIT");
            return $this->result;
        }
        $_SGLOBAL['db']->queryTransaction("ROLLBACK");
        $this->result['error'] = true;
        return $this->result;
    }

    /**<p>ajax查询方法</p>
     * author:tc
     * @param $whereResult
     * @param $perpage
     * @param $curpage
     * @param $onclickMethod
     * @return mixed
     */
    function findList($whereResult, $perpage, $curpage, $onclickMethod)
    {
        $results = $this->appInfoDao->ajx($whereResult, $perpage, $curpage, $onclickMethod);
        array_walk($results['result'], array($this, "managerToTable"));
        $results['result'] = urlencode(implode("", $results['result']));
        return $results;
    }

    /**
     * <p>合并应用查询列表table数据的方法</p>
     * author:tc
     * @param $val
     */
    private function managerToTable(&$val)
    {
        $id = $val['id'];
        $subject = $val['subject'];
        $val = "<tr>" .
            "<td>" . $subject . "</td>" .
            "<td>".$val['url']."</td>".
            "</tr>";
    }
}
