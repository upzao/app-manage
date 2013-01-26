<?php
include_once ($ROOT.'admin/dao/authorityDao.php');
/**
 * 
 * Ȩ���жϿ��Ʋ�
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
	 * �ж��Ƿ��в���Ȩ��
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
	 * ��ȡ��ǰȨ������
	 * @param String $actionMethod ��ǰ����Ȩ�޷�����
	 * @return ��ǰȨ������
	 */
	public function getCurrentOpAuth($authstr){
		global $_SGLOBAL;
		$auth = $this->authDao->find(array("ename"=>$authstr));
		if(sizeof($auth,1)){
			$auids = explode(",", $_SGLOBAL['authority']);
			if(AuthorityService::SUPE_ADMIN()){//��������Ա
				return $auids[0];
			}
			if(in_array($auth[0]['id'], $auids)){//ӵ��Ȩ��
				return $auids[0];
			}
		}
		return array();
	}
	
	/**
	 * �жϵ�ǰȨ���Ƿ�ӵ�пɱ༭
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
	 * �жϹ���Ա�Ƿ��ǳ�������Ա
	 * Enter description here ...
	 */
	public static function SUPE_ADMIN(){
		global $_SGLOBAL;
		if(strcmp(100, $_SGLOBAL['roletype'])==0){//��������Ա
			return true;
		}
		return false;
	}
	
	/**
	 * �ж��û��Ƿ��н�����վ��Ȩ��
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
	 * �ж��Ƿ�ӵ�б༭Ȩ��
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