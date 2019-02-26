<?php
	function __autoload($class){
		$file = "../controller/".$class.".php";
		if(file_exists($file)){
			include $file;
		}
	}
?>