<?php
	require_once "BaseController.php";
	/**
	 * 
	 */
	class Login extends BaseController{
		
		function __construct(){
			parent::__construct();
		}

		public function getCode2Session($code){
			$url = "https://api.weixin.qq.com/sns/jscode2session?appid=".$this->appid."&secret=".$this->appsecret."&js_code=".$code."&grant_type=authorization_code";
			$info = $this -> curl_get($url);
		}
	}
?>