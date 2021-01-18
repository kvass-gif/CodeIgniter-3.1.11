<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SiteController extends CI_Controller{
	
	public function Main(){

		$this->load->model('FakerModel');

		// $categories = $this->FakerModel->getDataFromTable('categories');

		$data = $this->FakerModel->DataForMain();

		// echo "<pre>";
		// var_dump($data);
		// echo "</pre>";

		// $data = [
		// 	'categories'=>$categories
		// ];

		$this->load->view('header.php', $data);
		$this->load->view('bro.php', $data);
		
	}

	public function CategoryList($idCategory)
	{
		$this->load->model('FakerModel');
		$data = $this->FakerModel->getDataForCategoryList($idCategory);

		$this->load->view('header.php', $data);
		$this->load->view('category.php', $data);
	}

	public function Post($id){
		$this->load->model('FakerModel');
	
		$data = [
			'categories' => $this->FakerModel->getDataFromTable('categories')
		];
		$post = $this->FakerModel->getDataForBlogPage($id);
		// echo "<pre>";
		// 	var_dump($post);
		// 	echo "</pre>";

		$this->load->view('header.php', $data);
		$this->load->view('body.php', $post);
	}
	

	

}
?> 