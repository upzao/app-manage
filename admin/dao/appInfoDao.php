<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Sky
 * Date: 13-1-26
 * Time: 下午1:00
 * To change this template use File | Settings | File Templates.
 */
class appInfoDao
{
    function __construct(){}

    /**添加app
     * @param $appinfo
     * @return mixed
     */
    function addAppInfo($appinfo){
        return inserttable("applist",$appinfo,1);
    }

    /**更新app
     * @param $app
     * @param $wheresql
     * @return return
     */
    function updateAppInfo($app,$wheresql){
        return updateTransaction("applist",$app,$wheresql);
    }

    /**<p>ajax查询方法</p>
     * author:tc
     * @param $sql
     * @param $perpage
     * @param $curpage
     * @param $onclickMethod
     * @return array
     */
    function ajx($sql, $perpage, $curpage, $onclickMethod) {
        $sql = 'select * from ' . tname ( 'applist' ) . $sql." order by que desc";
        return multiAndResultForAjax ( $sql, $perpage, $curpage, $onclickMethod );
    }
}
