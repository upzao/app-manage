<?php
/**
 * 
 * 管理员数据连接
 * @author pangbin
 *
 */
class ManagerDao{

	function __construct(){}
	
	function getManager($manager,$plussql=''){
		$data = selecttable('manager', array(), $manager,$plussql);
		if(sizeof($data,1)){
			return $data;
		}
		return false;
	}
	
	function ajs($sql, $perpage, $curpage, $onclickMethod){
		 $sql = 'select * from ' . tname('manager') . $sql;
	    return multiAndResultForAjax($sql, $perpage, $curpage, $onclickMethod);
	}
	function add($manager){
		return inserttable("manager", $manager,1);
	}
	
	function update($manager,$wheresql){
		return updateTransaction('manager', $manager, $wheresql);
	}
}
?>