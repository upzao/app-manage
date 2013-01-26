<?php
include_once ($ROOT . 'admin/dao/managerDao.php');
include_once ($ROOT . 'admin/dao/authorityDao.php');
include_once ($ROOT . 'class/crypt3Des.php');
/**
 * ����Աҵ���
 * @author pangbin
 *
 */
class ManagerService {
	
	private $managerDao;
	private $authorityDao;
	private $DES;
	private $result;
	
	public function __construct() {
		$this->managerDao = new ManagerDao ();
		$this->authorityDao = new AuthorityDao();
		$this->DES = new Crypt3Des(BASE64_KEY, BASE64_IV);
		$this->result = array ("error" => false, "state" => 0, "url" => "", "msg" => "", "extra" => array () );
	}
	/**
	 * ��¼ҵ��
	 * @param unknown_type $manager
	 * @return true --success false -- failer
	 */
	public function login($manager) {
		global $_SGLOBAL;
		$manager ['mpsw'] = md5 ( $manager ['mpsw'] );
		if ($temp = $this->managerDao->getManager ( $manager )) {
			$tmanager = $temp [0];
			$psw = $tmanager ['mpsw'];
			$username = $tmanager ['mname'];
			$id = $tmanager ['id'];
			$auidstr = $tmanager ['auidstr'];
			$tid = $tmanager ['tid'];
			//��ȡ�û���
			$cookievalue = authcode ( "$psw\t$username\t$id\t$auidstr\t$tid\t", 'ENCODE' );
			//session�洢
			session_start ();
			$_SGLOBAL['id']=$tmanager['id'];
			$_SESSION ['auth'] = $cookievalue;
			@list ( $psw, $username, $id, $auidstr, $tid ) = explode ( "\t", authcode ( $cookievalue, 'DECODE' ) );
			$this->result ['error'] = false;
		} else {
			$this->result ['error'] = true;
		}
		$_SGLOBAL['id']=0;
		return $this->result;
	}
	//����Ա��¼����
	function adminchecke($manager) {
		global $_SGLOBAL;
		$member = array ();
		if ($temp = $this->managerDao->getManager ( $manager )) {
			$tmanager = $temp [0];
			$_SGLOBAL ['id'] = $tmanager ['id'];
			$_SGLOBAL ['roletype'] = $tmanager ['roletype'];
			$_SGLOBAL ['name'] = $tmanager ['mname'];
			$_SGLOBAL ['tid'] = $tmanager ['tid'];
			$_SGLOBAL ['authority'] = "";
			if (! empty ( $tmanager ['auidstr'] )) {
				if (strcmp ( md5 ( 'admin' ), $tmanager ['auidstr'] ) == 0) {
					$_SGLOBAL ['authority'] = $tmanager ['auidstr'];
				} else {
					$_SGLOBAL ['authority'] = $tmanager['auidstr'];
				}
			}
		} else {
			//�û�����
			$_SGLOBAL ['id'] = 0;
			sclearcookie ();
		}
	}
	/**
	 * ����Ȩ��
	 * @param unknown_type $austr
	 */
	private function auth_json_decode($austr) {
		return json_decode ( $austr );
	}
	
 /**
     * ��ѯ
     * @param unknown_type $whereResult	
     * @param unknown_type $perpage
     * @param unknown_type $curpage
     * @param unknown_type $onclickMethod
     * @author xsj
     * @version 1.0 2012-09-04 23:50
     */
    function findWayPage ($whereResult, $perpage, $curpage, $onclickMethod)
    {
    	if(strlen($whereResult)>0){
    		$whereResult.=" and roletype!=100 ";
    	}else{
    		$whereResult.=" where roletype!=100 ";
    	}
    	$results = $this->managerDao->ajs($whereResult, $perpage, $curpage, $onclickMethod);
    	array_walk($results['result'], array($this,"managerToTable"));
        $results['result'] = urlencode(implode("",$results['result']));
        return $results;
    }
	
    private function managerToTable(&$value){
    	$managertype = $value['roletype']=="2"?"����Ա":($value['roletype']=="1"?"�����":"ϵͳ����Ա");
    	$del = "";
    	if($value['roletype']!=100){
    		$id = $value['id'];
    		$mid = $id;
			//$del = "<a mid='$mid' onclick='javascript:editmanager(this)'>�༭</a>";
			
    	}
    	$del = "���޲���";
    	$value="<tr><td>".$value['nickname']."</td><td>$managertype</td><td>$del</td></tr>";
    }
    
	public function getToolBar() {
		global $_SGLOBAL;
		if (AuthorityService::SUPE_ADMIN()) {
			$toolsBar .= '<li><a class="current" href="' . CPURL . '?action=appInfoAction&actionName=applist" target="mainframe" onclick="channelNav(this, \'sidemenu_block\');">Ӧ�ù���</a></li>';
		} else {
			$toolsBar .= '<li><a class="current" href="' . CPURL . '?action=appInfoAction&actionName=applist" target="mainframe" onclick="channelNav(this, \'sidemenu_block\');">Ӧ�ù���</a></li>';
		}
		return $toolsBar;
	}
	
	/**
	 * 
	 * ��ȡ��һ���˵�
	 * @param unknown_type $selectnum Ĭ��ѡ����С�� �������Ҫ
	 */
	public function getSidmenu() {
		global $_SGLOBAL;
		if (AuthorityService::SUPE_ADMIN()) {
			$types = $this->authorityDao->find ( "", " order by id asc " );
			$sidemenu = '<div id="sidemenu_block" style="display: block;"><h3>Ӧ�ù���</h3> <ul>';
			$i=0;
			foreach ( $types as $value ) {
				$strarr = explode ( "-", $value ['ename'] );
				if (sizeof ( $strarr ) > 2) {
					$actionName = $strarr [2];
					$actionClass = $strarr [0] ."-". $strarr [1];
					$divid = $strarr [1] . $strarr [2];
					$sessionarr [] = $value ['ename'];
				} else {
					$actionName = $strarr [1];
					$actionClass = $strarr [0];
					$divid = $strarr [0] . $strarr [1];
					$sessionarr [] = $value ['ename'];
				}
				if($i==0){
					$class=" class='current' ";
				}else{
					$class = " ";
				}
				$i++;
				$sidemenu .= '<li><a id="'.$value ['ename'].'" href="'.S_URL.'/admincp.php?action='.$actionClass.'&actionName='.$actionName.'"'.$class.'>&nbsp;&nbsp;' . $value ['zname'] . '</a></li>';
			}
			$sidemenu .= '</ul></div>';
			$sidemenu .='';
			session_start ();
			$_SESSION ['menu'] = $sessionarr;
		} else {
			$tids = $_SGLOBAL ['authority'];
			$sidemenu = '<div id="sidemenu_block" style="display: block;" class="current"><h3>Ӧ�ù���</h3> <ul>';
			if($_SGLOBAL['roletype']==1){
				$types = $this->authorityDao->find ( "  ename != 'specialAction-addspecial'", " order by id asc " );
			}else{
				$types = $this->authorityDao->find ( " id not in (5)", " order by id asc " );
			}
			$i = 0;
			foreach ( $types as $value ) {
				$strarr = explode ( "-", $value ['ename'] );
				if (sizeof ( $strarr ) > 2) {
					$actionName = $strarr [2];
					$actionClass = $strarr [0] . $strarr [1];
					$divid = $strarr [1] . $strarr [2];
					$sessionarr [] = $value ['ename'];
				} else {
					$actionName = $strarr [1];
					$actionClass = $strarr [0];
					$divid = $strarr [0] . $strarr [1];
					$sessionarr [] = $value ['ename'];
				}
				if($i==0){
					$class=" class='current' ";
				}else{
					$class = " ";
				}
				$sidemenu .= '<li><a id="'.$value ['ename'].'" href="'.S_URL.'/admincp.php?action='.$actionClass.'&actionName='.$actionName.'" '.$class.' >&nbsp;&nbsp;' . $value ['zname'] . '1</a></li>';
				$i++;
			}
			$sidemenu .= '</ul></div>';
			$sidemenu .='';
			session_start ();
			$_SESSION ['menu'] = $sessionarr;
		}
		return $sidemenu;
	}
	
	/**
	 * ��ӹ���Ա
	 */
	function addmanager($manager){
		$manager['mpsw']=md5($manager['mpsw']);
		$manager['nickname']=iconv("utf-8", "GBK", $manager['nickname'] );
		$id = $this->managerDao->add($manager);
	}
	
/**
	 * ��ӹ���Ա
	 */
	function updatemanager($manager){
		global $_SGLOBAL;
		if(($manager['roletype']-1)==0){
			$manager['auidstr'] = "1,2,3,4";
		}else{
			foreach ($manager['power'] as $value){
				if(is_numeric($value)){
					$manager['auidstr'][] = $value;
				}else{
					$this->result['error']=true;
					$this->result['state']=1;
					return $this->result;
				}
			}
			$manager['auidstr']=implode(",", $manager['auidstr']);
		}
		$upid = $manager['upid']; 
		unset($manager['upid']);
		unset($manager['mspsw']);
		unset($manager['power']);
		
		$manager['mpsw']=md5($manager['mpsw']);
		$_SGLOBAL['db']->queryTransaction("BEGIN");
		$query = $this->managerDao->update($manager,array("id"=>$this->DES->decrypt($upid)));
		if($query){
			$this->result['error']=false;
			$_SGLOBAL['db']->queryTransaction("COMMIT");
			return $this->result;
		}
		$this->result['error']=true;
		return $this->result;
	}
	
	function getinfo($manager){
		$array = array("id"=>$this->DES->decrypt($manager['id']));
		if($temp=$this->managerDao->getManager($array)){
			$this->result['error']=false;
			$this->result['extra']=$temp;
			return $this->result;
		}
		$this->result['error']=true;
		return $this->result;
	}
	
	/**
	 * �ж��û���Ψһ
	 * @param array $manager
	 * @return Ambigous <boolean, multitype:unknown >
	 */
	function uniqueManger(array $manager){
		$result=$this->managerDao->getManager(array('mname'=>$manager['mname']));
		return $result;
	}
	
}
?>