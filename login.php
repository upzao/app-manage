<?php
$ROOT = $_SERVER ['DOCUMENT_ROOT'] . substr ( $_SERVER ['PHP_SELF'], 0, strpos ( $_SERVER ['PHP_SELF'], '/', 2 ) + 1 );
include_once ($ROOT . 'include/main.inc.php');
include_once ($ROOT . 'include/common.inc.php');
include_once ($ROOT . 'class/actionClass.php');
include_once ($ROOT . 'admin/service/managerService.php');
/**
 * 
 * 管理员控制类
 * @author livesky
 *
 */
class Login extends ActionClass{

	private $managerService;
	private $manager;
	
	function __construct(){
		$this->managerService = new ManagerService();
		parent::__construct($this);
	}
	
	function index(){
		global $_SGLOBAL;
		getcookie(1);
		if($_SGLOBAL['id']>0){
			header("location:".S_URL."/admincp.php");
			exit;
		}
		$resultset = $this->managerService->login($this->manager);
		if($resultset['error']){
			include_once template("login");
			exit;
		}else{
			header("location:".S_URL."/admincp.php");
			exit;
		}
	}
	
	/**
	 * 
	 * @param unknown_type $manager
	 */
	public function loginPost($manager) {
		$resultset = $this->managerService->login($this->manager);
		echo urldecode(json_encode($resultset));
	}
	/**
	 * @return the $manager
	 */
	public function getManager() {
		return $this->manager;
	}

	/**
	 * @param field_type $manager
	 */
	public function setManager($manager) {
		$this->manager = $manager;
	}
}
new Login();
?>