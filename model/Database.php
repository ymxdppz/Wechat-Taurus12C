<?php
	/**
	 * 
	 */
	class Database{
		protected $dbms='mysql';     				//数据库类型
		protected $host='localhost'; 		//数据库主机名
		protected $dbName='blog';    			//使用的数据库
		protected $user='root';      				//数据库连接用户名
		protected $pass='123456';          	//对应的密码
		private $db = null;
		private static $instance;

		private function __construct($config = false){
			if($config){
				$this->host = $config['host'];
				$this->dbName = $config['dbname'];
				$this->user = $config['user'];
				$this->pass = $config['pass'];
			}
			$this->db = $this->connectDb();
		}

		public function __clone(){}

		public static function GetInstance($config=false){  
	        if (!(self::$instance instanceof self)){  
	            self::$instance = new self($config);  
	        }  
	        return self::$instance;  
	    }  

		private function connectDb(){
			$dsn= $this->dbms.":host=".$this->host.";dbname=".$this->dbName;
			try {
		    	$db = new PDO($dsn,$this->user,$this->pass); //初始化一个PDO对象
			} catch (PDOException $e) {
			    die ("Error!: " . $e->getMessage() . "<br/>");
			}
			return $db;

		}

	}
?>