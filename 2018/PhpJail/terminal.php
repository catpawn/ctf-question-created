<?php
	$sandbox = './sandbox/'.md5($_SERVER['REMOTE_ADDR']);
	@mkdir($sandbox,0777,true);
    @chdir($sandbox);

	function evalFilter($str){
		$str = strtolower($str);
		$filterArr = array('localhost','127.0.0.1','php','eval','exec','ls','cat','find','../','./','/');
		foreach($filterArr as $filter)
			$str = str_replace($filter,"fuck",$str);
		return $str;
	}

	if(isset($_GET["cmd"])){
		eval("?>".evalFilter($_GET['cmd']));
	}
	if(isset($_GET["code"])){
		highlight_file(__FILE__);
	}
?>