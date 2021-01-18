<?php
function cmp($a, $b) {
	$date1 = $a['date_time'];
	$data2 = $b['date_time'];
	if ($date1 == $data2) {
		return 0;
	}
	return ($date1 > $data2) ? -1 : 1;
}


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

	public function getDataForCategoryList($idCategory){
		
		$data['categoryName'] = $this->db->get_where('categories', array('id' => $idCategory))->result_array()[0]['name'];
		$list = $this->db->get_where('posts', array('category_id' => $idCategory))->result_array();
		$data['categories'] = $this->FakerModel->getDataFromTable('categories');
		$data['list'] = [];

		foreach($list as $value){
			
			$data['list'][] = [
				'id' => $value['id'],
				'title' => $value['title'],
				'author' => $this->db->get_where('authors', array('id' => $value['author_id']))->result_array(),
				'date' => $value['date']
			];
			
		}
		
		return $data;
	}

		private function debag($obj){
			echo "<pre>";
			var_dump($obj);
			echo "</pre>";
		}
		 function getDataForBlogPage($idPost){


		$data = [
			"post"  => [],
			"comments"  => [],
			"photos"  => [],
			"likes"  => [],
		];

		$data["post"] = $this->db->
		get_where('posts', array('id' => $idPost))
		->result_array();

		

		$data["comments"] = $this->db->
		get_where('comments', array('id_post' => $idPost))
		->result_array();

		
		// $this->debag($data["comments"]);

		uasort($data["comments"], 'cmp');
		// echo '____________________________________________';
		// $this->debag($data["comments"]);

		
		$data["photos"]= $this->db->
		get_where('post_photos', array('id_post' => $idPost))
		->result_array();

		$data["likes"]= $this->db->
		get_where('post_likes', array('post_id' => $idPost))
		->result_array();

		return $data;
	}


	public function DataForMain(){
		$data = [
			'categories'=>[],
			'longerBlog'=>[],
			'randBlog1'=>[],
			'randBloig2'=>[]
		];
		
		$data['categories'] = $this->db->get('categories')->result_array();
		
		$posts = $this->db->get('posts')->result_array();

		$max = 0;
		$maxId = 0;
		foreach($posts as $value){

			if(count($value) > $max){
				$max = count($value);
				$maxId = $value['id'];
			}
		}

		$data['longerBlog'] = $this->db->get_where('posts', array('id' => $maxId))->result_array()[0];
		$data['randBlog1'] = $this->db->get_where('posts', array('id' => rand($posts[0]['id'], end($posts)['id'])))->result_array()[0];
		$data['randBlog2'] = $this->db->get_where('posts', array('id' => rand($posts[0]['id'], end($posts)['id'])))->result_array()[0];
		return $data;
	}

	
}
?>