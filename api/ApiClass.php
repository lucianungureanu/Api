<?php
/**
* 
*/
include('config.php');
class Api
{
	public $data;

	public function Api($data = array()){
		 	$this->data = $data;
	}

	public function insert(){

		$sql = "INSERT INTO ".$this->data['entity_type']." SET ";
		unset($this->data['entity_type']);
		$db = Db::init();
		foreach ($this->data as $column => $value) {
			$sql .= "`".$column."` =  '".htmlentities($db->escape($value))."',"; 
		}
		$sql = substr($sql, 0 ,-1);
		$db->query($sql);
		// echo $sql;
		// $this->data;



	}
	public function delete(){
			$sql = "DELETE FROM ".$this->data['entity_type']." WHERE id = '".(int)$this->data['entity_id']."'";
			
		Db::init()->query($sql);

		return 'sters';
	}
	public function update(){
		$sql = "UPDATE ".$this->data['entity_type']." SET ";		
		$db = Db::init();
		foreach ($this->data['data'] as $column => $value) {
			$sql .= "`".$column."` =  '".htmlentities($db->escape($value))."',"; 
		}
		$sql = substr($sql, 0 ,-1);
		$sql .= " WHERE id='".(int)$this->data['entity_id']."'";
		$db->query($sql);
	}	

	public function getList(){
		$sql = "SELECT * FROM ".$this->data['entity_type'];
		$query = Db::init()->query($sql);
		$data = array();
		while($row = $query->fetch_assoc()){
		  		array_push($data, $row);
		}
		echo json_encode($data);

	}
	public function getRow(){
		$sql = "SELECT * FROM ".$this->data['entity_type']." WHERE id='".(int)$this->data['entity_id']."'";
		$query = Db::init()->query($sql);
		$row = $query->fetch_assoc();
	
		echo json_encode($row);
	}


	public function login(){
		$sql = "SELECT * FROM users WHERE name='".$this->data['name']."' and password='".$this->data['password']."' ";
		$query = Db::init()->query($sql);
		$row = $query->num_rows;
		if($row>0){
		echo true;	
		}
		else{
  		echo false;
		}

	}
}

?>