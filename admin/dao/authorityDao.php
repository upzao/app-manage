<?php

class AuthorityDao{
	
	function __construct(){}
	function find($sql,$plussql=''){
		$arr = selecttable('authority', array(), $sql,$plussql);
		if(sizeof($arr, 1)){
			return $arr;
		}
		return false;
	}
	
}

?>