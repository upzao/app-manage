<?php
include_once ($ROOT.'admin/dao/authorityDao.php');
/**
 * 
 * 权限判断控制层
 * @author xsj
 *
 */
class AuthorityService{
	
	private $authDao;
	
	function __construct(){
		$this->authDao = new AuthorityDao();
	}
	
	function getAll(){
		return $this->authDao->find("");
	}
	
	/**
	 * 
	 * 判断是否有操作权限
	 * @param unknown_type $authStr
	 */
	function hasCurAuth($authStr){
		global $_SGLOBAL;
		if(AuthorityService::SUPE_ADMIN()){
			return true;
		}
		$auth = $this->getCurrentOpAuth($authStr);
		if(sizeof($auth, 1)){
			return true;
		}
		return false;
	}
	/**
	 * 
	 * 获取当前权限数据
	 * @param String $actionMethod 当前操作权限方法名
	 * @return 当前权限数组
	 */
	public function getCurrentOpAuth($authstr){
		global $_SGLOBAL;
		$auth = $this->authDao->find(array("ename"=>$authstr));
		if(sizeof($auth,1)){
			$auids = explode(",", $_SGLOBAL['authority']);
			if(AuthorityService::SUPE_ADMIN()){//超级管理员
				return $auids[0];
			}
			if(in_array($auth[0]['id'], $auids)){//拥有权限
				return $auids[0];
			}
		}
		return array();
	}
	
	/**
	 * 判断当前权限是否拥有可编辑
	 * @param unknown_type $authstr
	 * @return true --- has power <br>  false --- no power
	 */
	public function hasEditAuth($authstr){
		global $_SGLOBAL;
		if(AuthorityService::SUPE_ADMIN()){
			return true;
		}
		if($this->hasCurAuth($authstr)&&AuthorityService::hasEdit()){
			return true;
		}
		return false;
	}
	
	/**
	 * 判断管理员是否是超级管理员
	 * Enter description here ...
	 */
	public static function SUPE_ADMIN(){
		global $_SGLOBAL;
		if(strcmp(100, $_SGLOBAL['roletype'])==0){//超级管理员
			return true;
		}
		return false;
	}
	
	/**
	 * 判断用户是否有进入网站的权限
	 * Enter description here ...
	 */
	public static function HAS_POWER_IN_TO_ANIMATION($powerid){
		$haspower = false;
		switch ($powerid){
			case 100:$haspower = true;
			case 1:$haspower = true;
			case 2:$haspower = true;break;
			case 0:$haspower = false;
			default:$haspower = false;break;
		}
		return $haspower;
	}
	
	/**
	 * 判断是否拥有编辑权限
	 */
	public static function hasEdit(){
		global $_SGLOBAL;
		if(AuthorityService::SUPE_ADMIN()){
			return true;
		}
		if($_SGLOBAL['roletype']==2){
			return true;
		}
		return false;
	}
	
}

?>