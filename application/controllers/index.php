<?php
defined('BASEPATH') OR exit('No direct script access allowed');
header("Access-Control-Allow-Origin: *");

class Index extends CI_Controller {
    function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model('spot_m');
		$this->load->model('board_m');
		$this->load->library('image_lib');
	}
	public function index(){
		$this->load->view('navbar_v');
		$this->load->view('mainJumbo_v');
		$this->categorization();
		$this->map();
		$this->board();
	}
	public function map_page(){
		$this->load->view('navBar_v');
		$this->map();
	}
	public function map(){
		$table = 'spot';
		$category = '';
		$subcategory = '';

		if(isset($_GET['table']))	$table = $_GET['table'];
		if(isset($_GET['category']))	$table = $_GET['category'];
		if(isset($_GET['subcategory']))	$table = $_GET['subcategory'];

		$data['list'] = $this->spot_m->get_list($table, '', '', '', '', $category, $subcategory);
		$this->load->view('map_v', $data);
	}
	public function board_page(){
		$this->load->view('navbar_v');
		$this->board();
	}
	public function board(){
		$table = 'board';
		// $category = '';

		if(isset($_GET['table']))	$table = $_GET['table'];
		// if(isset($_GET['category']))	$table = $_GET['category'];
		// if(isset($_GET['subcategory']))	$table = $_GET['subcategory'];

		$data['list'] = $this->board_m->get_list($table, '', '', '', '', '', '');
		$this->load->view('board_v', $data);
	}
	public function categorize_page(){
		$this->load->view('navbar_v');
		$this->categorization();
	}
	public function categorization(){
		$table = 'spot';
		$category = '';
		$subcategory = '';

		if(isset($_GET['table']))	$table = $_GET['table'];
		if(isset($_GET['category']))	$category = $_GET['category'];
		if(isset($_GET['subcategory']))	$subcategory = $_GET['subcategory'];

		$data['list'] = $this->spot_m->get_list($table, '', '', '', '', $category, $subcategory);
		$this->load->view('categorization_v', $data);
	}
	public function search(){
		$table = 'spot';
		$category = '';
		$subcategory = '';
		$s_word = '';

		if(isset($_GET['table']))	$table = $_GET['table'];
		if(isset($_GET['s_word']))	$s_word = $_GET['s_word'];
		$data['list'] = $this->spot_m->get_list($table, '', '', '', $s_word, $category, $subcategory);
		// $this->load->view('index_v', $data);
		$this->load->view('navbar_v');
		$this->load->view('categorization_v', $data);
	}
	
	public function view(){
		$id = $_GET['id'];
		$table = 'spot';
		$data['data'] = $this->spot_m->get_view($table, $id);
		$this->load->view('navbar_v', $data);
		$this->load->view('view_v', $data);
        // $this->load->view('view_v', $data);
    }
    public function _remap($method)
    {
		$table = 'spot';
		$category = '';
		$subcategory = '';
		if(isset($_GET['category'])){
			$category = $_GET['category'];
		}
		if(isset($_GET['subcategory'])){
			$subcategory = $_GET['subcategory'];
		}
		$data['category'] = $this->spot_m->get_category($table);
		$data['subcategory'] = $this->spot_m->get_subcategory('spot', $category);
		$data['method'] = $method;
       $this->load->view('header_v', $data);

       if( method_exists($this, $method) )
       {
           $this->{"{$method}"}();
       }

       //푸터 include
       $this->load->view('footer_v');
   }
}
