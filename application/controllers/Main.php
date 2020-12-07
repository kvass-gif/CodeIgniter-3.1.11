<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Main extends CI_Controller
{

	private $links = [
		'Subscribe', 'Large', 'Search', 'Sign up', 'World', 'U.S', 'Technology', 'Design', 'Culture', 'Business', 'Politics', 'Opinion',
		'Science', 'Health', 'Style', 'Travel', 'Continue reading...', 'World', 'Design', 'Mark', 'dis parturient montes', 'Jacob', 'Chris', 'Older',
		'Newer', 'March 2014', 'February 2014', 'January 2014', 'December 2013', 'November 2013', 'October 2013', 'September 2013',
		'August 2013', 'July 2013', 'June 2013', 'May 2013', 'April 2013', 'GitHub', 'Twitter', 'Facebook'
	];
	private $url = 'http://localhost:8080/CodeIgniter-3.1.11/index.php/main/view/';

	public function index()
	{
		$data['url'] = $this->url;
		$data['links'] = $this->links;
		$this->load->view('main.php', $data);
	}
	public function view($name = null)
	{
		// var_dump($name);
		$data['title'] = $name;
		$this->load->view('blog.php', $data);
	}
}
