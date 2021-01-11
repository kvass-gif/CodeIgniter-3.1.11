<?php
class FakerModel extends CI_Model{

	public function __construct()
	{
		$this->load->database();
	}

	private function delData($result_array, $table){

		if(count($result_array)){
			foreach($result_array as $element){
				$this->db->where('id', $element['id'])->from($table);
				$this->db->delete();
			}
		}

	}
	private function insertData($data, $table){
		
		
		foreach($data as $element){
			$this->db->insert($table, $element);	
		}

	}
	 
	public function setDataToTable($data, $cleanBefore, $tableName){

		$result_array = $this->getDataFromTable($tableName);
		if($cleanBefore)
			$this->delData($result_array,$tableName);
		$this->insertData($data, $tableName);

	}

	public function getDataFromTable($tableName){
		return $this->db->get($tableName)->result_array();
	}

	
}
?>