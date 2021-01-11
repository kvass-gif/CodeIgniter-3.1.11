<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FakerController extends CI_Controller{
	
	private function generateFakeCategories($qty){

		$categories = [];
		for($i = 0; $qty>$i; $i++)
			$categories[] = ['name'=>$this->faker->word];
		$this->FakerModel->setDataToTable($categories, false, 'categories');

		
	}

	private function generateFakeAuthors($qty){

		$authors = [];
		for($i = 0; $qty>$i; $i++){
			$authors[] = [
				'name'=> $this->faker->name,
				'email' => $this->faker->email,
				'phone' => $this->faker->phoneNumber,
				'login' => $this->faker->userName,
				'pass' => $this->faker->password                
			];
		}
		$this->FakerModel->setDataToTable($authors, false,'authors');
		
	}

	private function generateFakePosts($qty, $categories, $authors){
		$posts = [];
		$status = [
			'saved', 'posted', 'inprocess', 'rejected','approved'
		];
			for($i = 0; $qty>$i; $i++){
				$categoryId = rand($categories[0]['id'], end($categories)['id']);
				$authorId = rand($authors[0]['id'], end($authors)['id']);
			
				$posts[] = [
					'author_id'=>$authorId,
					'category_id'=>$categoryId,
					'title' => $this->faker->sentences(rand(1,5), true),
					'content' => $this->faker->paragraphs(rand(5,10), true),
					'status' => $status[rand(0,count($status) - 1)],
					'date' => $this->faker->dateTimeBetween('-10 years','now', 'UTC')->format('Y-m-d H:i:sP')   
				];
			}
			$this->FakerModel->setDataToTable($posts, false,'posts');
		}
		
	private function generateFakePostPhotos($qty, $posts){
		$photos = [];
		for($i = 0; $qty>$i; $i++){
			$photos[] = [
				'id_post' => rand($posts[0]['id'],end($posts)['id']),
				'Photo_Path' => $this->faker->imageUrl(640, 480)
			];
		}
		$this->FakerModel->setDataToTable($photos, false,'post_photos');
	}
	private function generateFakePostLikes($qty, $authors, $posts) {
		$likes = [];
		for($i = 0; $qty>$i; $i++){
			$likes[] = [
				'author_id' => rand($authors[0]['id'],end($authors)['id']),
				'post_id' => rand($posts[0]['id'],end($posts)['id']),
				'status' => rand(0,1)
			];
		}
		$this->FakerModel->setDataToTable($likes, false,'post_likes');
	}
	private function generateFakeComments($qty, $authors, $posts) {
		$comments = [];
		for($i = 0; $qty>$i; $i++){
			
			$id_post = rand(0,count($posts)-1);
			
			$comments[] = [
				'id_author' => rand($authors[0]['id'],end($authors)['id']),
				'id_post' => $posts[$id_post]['id'],
				'text' => $this->faker->sentences(rand(1,5), true),
				'date_time'=>$this->faker->dateTimeBetween($posts[$id_post]['date'],'now', 'UTC')->format('Y-m-d H:i:sP')
			];
			
		}
		
		$this->FakerModel->setDataToTable($comments, false,'comments');
	}

	public function generateFakeDataToDatabase($qtyCategories, $qtyAuthors, $qtyPosts, $qtyPostLikes, $qtyComments, $qtyPostPhotos){
		
		
		$this->faker = Faker\Factory::create('uk_UA');
		$this->load->model('FakerModel');

		$this->generateFakeCategories($qtyCategories);
		$this->generateFakeAuthors($qtyAuthors);

		$categories = $this->FakerModel->getDataFromTable('categories');
		$authors = $this->FakerModel->getDataFromTable('authors');
		$this->generateFakePosts($qtyPosts,$categories,$authors);

		$posts = $this->FakerModel->getDataFromTable('posts');
		$this->generateFakePostPhotos($qtyPostPhotos,$posts);
		$this->generateFakePostLikes($qtyPostLikes, $authors, $posts);
		$this->generateFakeComments($qtyComments, $authors, $posts);

		$this->load->view('success.php');
		
	}


	public function FakeMain(){

		$this->load->view('FakeMain');
	}

	

	

}
?> 