<?php
define('DB_USER','');
define('DB_PASSWORD','');
define('DB_NAME','');
define('DB_HOST','localhost');
/**
* 
*/
class Db 
{
	private $db;
	function __construct()
	{	
		$this->db = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME) OR die('error');
	}

	public static function init(){
		return new Db;
	}
	public function query($sql){
		$exec = $this->db->query($sql);
		if(!$exec){
			die($this->db->error);
		}else{
			return $exec;
		}
	}
	
	public function escape($string){
		return $this->db->real_escape_string($string);
	}
}
?>