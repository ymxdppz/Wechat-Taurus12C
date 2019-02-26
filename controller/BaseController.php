<?php
	/**
	 * 
	 */
	class BaseController{

		protected $appid = null;

		protected $appsecret = null;
		
		function __construct(){
			$config = require_once "../config.php";
			$this -> appid = $config['appid'];
			$this -> appsecret = $config['appsecret'];
		}

		function curl_get($url){
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $url);
			//curl_setopt($ch, CURLOPT_HEADER, 1);
		  	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		  	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);//跳过证书验证
 			curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
		  	$data = curl_exec($ch);
		  	curl_close($ch);
		  	return $data;
		}

	}
?>