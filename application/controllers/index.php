<?php
defined('BASEPATH') OR exit('No direct script access allowed');
header("Access-Control-Allow-Origin: *");

class Index extends CI_Controller {
    function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model('Spot_m');
		$this->load->library('pagination');
	}
	public function index(){
		$this->load->view('mainJumbo_v');
	}
	public function check_if_i_like($id = ''){
		$table = 'LIKE';
		$ip = $this->input->ip_address();
		if(isset($_GET['id']))	$id = $_GET['id'];
		$result = $this->Spot_m->check($table, $id, $ip);
		// echo '<br>'.$result.'<br>';
		// if($result == null){
		// 	die('null2');
		// }
		// else if( $result == '1'){
		// 	die('1');
		// }
		// else if($result == '0'){
		// 	die('0');
		// }

		// die(gettype($result));
		if(isset($_GET['ajax']))
			die($result);
		return $result;
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
		// if(isset($_GET['category_list']))	$table = $_GET['category'];
		// if(isset($_GET['subcategory_list']))	$table = $_GET['subcategory'];
		if(isset($_GET['category']))	$category = $_GET['category'];
		if(isset($_GET['subcategory']))	$subcategory = $_GET['subcategory'];

		

		// init pagination
		$uri_segment = 3;
		$page_url = '';
		$config['base_url'] = '/index/map_page/';
		// $config['base_url'] = 'http://localhost/index.php/test/page/';
		// $config['total_rows'] = 200;

		//set pagination num_links, set total page 5.
		$config['total_rows'] = $this->Spot_m->get_list('spot', 'count', '', '', '', $category, $subcategory); //게시물의 전체 갯수
		$config['per_page'] = 7;
		// $cur_page = $this->uri->segment($uri_segment, $config['per_page']);
		$cur_page = $this->uri->segment($uri_segment, $config['per_page'])/$config['per_page'] + 1;
		$last_page = ceil($config['total_rows'] / $config['per_page']);
		if($cur_page == 1 || $last_page - $cur_page == 0)
			$config['num_links'] = 4;
		else if($cur_page == 2 || $last_page - $cur_page == 1)
			$config['num_links'] = 3;
		else
			$config['num_links'] = 2;
		
		if($config['total_rows'])
		
		$config['uri_segment'] = $uri_segment;

		$config['full_tag_open'] = '<pagination_wrapper>';
		$config['full_tag_close'] = '</pagination_wrapper>';

		$config['cur_tag_open'] = '<pagination_cur_tag>';
		$config['cur_tag_close'] = '</pagination_cur_tag>';

		$config['num_tag_open'] = '<pagination_num_tag>';
		$config['num_tag_close'] = '</pagination_num_tag>';

		$config['first_tag_open'] = '<pagination_first_tag>';
		$config['first_link'] = '<img src="/image/btn_first.png">';
		$config['first_tag_close'] = '</pagination_first_tag>';
		$config['prev_tag_open'] = '<pagination_prev_tag>';
		$config['prev_link'] = '<img src="/image/btn_prev.png">';
		$config['prev_tag_close'] = '</pagination_prev_tag>';
		
		$config['next_tag_open'] = '<pagination_next_tag>';
		$config['next_link'] = '<img src="/image/btn_next.png">';
		$config['next_tag_close'] = '</pagination_next_tag>';
		$config['last_tag_open'] = '<pagination_last_tag>';
		$config['last_link'] = '<img src="/image/btn_last.png">';
		$config['last_tag_close'] = '</pagination_last_tag>';



		$this->pagination->initialize($config);
		$data['pagination'] = $this->pagination->create_links();


		
		$page = $this->uri->segment($uri_segment, 1);
		if ( $page > 1 )
		{
			$start = (($page/$config['per_page'])) * $config['per_page'];
		}
		else
		{
			$start = ($page-1) * $config['per_page'];
		}

		$limit = $config['per_page'];

		$data['spot_list'] = $this->Spot_m->get_list($table, '', '', '', '', $category, $subcategory);
		$data['pagination_list'] = $this->Spot_m->get_list($table, '', $start, $limit, '', $category, $subcategory);
		$data['category_list'] = $this->Spot_m->get_category($table);
		$data['subcategory_list'] = $this->Spot_m->get_subcategory('SUBCATEGORY', $category);



		// echo $this->pagination->create_links();
		$this->load->view('map_v', $data);
	}
	public function categorize_page(){
		$this->load->view('navBar_v');
		$this->categorization();
	}
	public function categorization(){
		$table = 'spot';
		$category = '';
		$subcategory = '';

		if(isset($_GET['table']))	$table = $_GET['table'];
		if(isset($_GET['category']))	$category = $_GET['category'];
		if(isset($_GET['subcategory']))	$subcategory = $_GET['subcategory'];

		// echo $data['list'].length;
		

		$data['spot_list'] = $this->Spot_m->get_list($table, '', '', '', '', $category, $subcategory);
		$data['category_list'] = $this->Spot_m->get_category($table);
		$data['subcategory_list'] = $this->Spot_m->get_subcategory('SUBCATEGORY', $category);
	
		$like_list = array();
		for($i=0 ; $i<count($data['spot_list']) ; $i++){
			$like_list[$data['spot_list'][$i]->id] = $this->check_if_i_like($data['spot_list'][$i]->id);
		}
		$data['like_list'] = $like_list;
		$this->load->view('categorization_v', $data);
	}
	
	public function search(){
		$table = 'spot';
		$category = '';
		$subcategory = '';
		$s_word = '';

		if(isset($_GET['table']))	$table = $_GET['table'];
		if(isset($_GET['s_word']))	$s_word = $_GET['s_word'];
		$data['spot_list'] = $this->Spot_m->get_list($table, '', '', '', $s_word, $category, $subcategory);
		$this->load->view('navBar_v');
		$this->load->view('categorization_v', $data);
	}
	
	
	// 사용자가 좋아요 버튼을 눌렀을 때 
	public function toggle_like(){
		$table = 'LIKE';
		$id = '';
		$ip = $this->input->ip_address();
		if(isset($_GET['id']))	$id = $_GET['id'];
		$result = $this->Spot_m->toggle_like($table, $id, $ip);
		if(isset($_GET['ajax'])){
			if($result == 0){
				die('0');
			}
			else{
				die('1');
			}
		}
		return $result;
	}
	// 게시글을 눌렀을 때 상세보기를 보여주는 페이지
	public function spot_view(){
		$id = $_GET['id'];
		$table = 'spot';
		$data['data'] = $this->Spot_m->get_view($table, $id);
		$data['like_bool'] = $this->check_if_i_like();
		$this->load->view('navBar_v', $data);
		$this->load->view('spot_view_v', $data);
	}
    public function _remap($method)
    {
		if(!isset($_GET['ajax'])){
			$this->load->view('header_v');
			$this->load->view('header_v_m');
		}
       if( method_exists($this, $method) )
       {
           $this->{"{$method}"}();
       }

		if(!isset($_GET['ajax'])){
			$this->load->view('footer_v');
		}
   }
}
