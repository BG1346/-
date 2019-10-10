<?php
defined('BASEPATH') OR exit('No direct script access allowed');
header("Access-Control-Allow-Origin: *");

class Index extends CI_Controller {

    function __construct()
	{
		parent::__construct();
		$this->load->database();
        $this->load->model('spot_m');
		// $this->load->helper('form');
		$this->load->library('image_lib');
		// $this->load->library('encryption');
		// $this->encryption->initialize(
		// 	array(
		// 		'cipher'=> 'aes-256',
		// 		'mode' => 'ctr',
		// 		'key' => ''
		// 	)
		// );
		// define('KEY', '21409512408764867149294859283728347923');
		// define('KEY_128', substr(KEY, 0, 128/8));
		// define('KEY_256', substr(KEY, 0, 256/8));
	}
    // public function get_by_kind(){
    //     $search_word = $page_url = '';
	// 	$uri_segment = 5;

	// 	$kind = $_GET['kind'];
	// 	// //주소중에서 q(검색어) 세그먼트가 있는지 검사하기 위해 주소를 배열로 변환
    //     // $uri_array = $this->segment_explode($this->uri->uri_string());
    //     $uri_array = array();

		// if( in_array('q', $uri_array) ) {
		// 	//주소에 검색어가 있을 경우의 처리. 즉 검색시
		// 	$search_word = urldecode($this->url_explode($uri_array, 'q'));

		// 	// 페이지네이션용 주소
		// 	$page_url = '/q/'.$search_word;
		// 	$uri_segment = 7;
		// }

        // //페이지네이션 라이브러리 로딩 추가
		// $this->load->library('pagination');

		// //페이지네이션 설정
        // $config['base_url'] = '/bbs/board/lists/ci_board'.$page_url.'/page/'; //페이징 주소
        // $config['base_url'] = '/ggy/index/lists/store'.$page_url.'/page/';
        // $config['total_rows'] = $this->board_m->get_list($this->uri->segment(3), 'count', '', '', $search_word); //게시물의 전체 갯수
        // $config['total_rows'] = $this->board_m->get_list($this->uri->segment(3, 'ci_board'), 'count', '', '', $search_word); //게시물의 전체 갯수
        // $config['total_rows'] = $this->store_m->get_list($this->uri->segment(3, 'store'), 'count', '', '', $search_word, $kind); //게시물의 전체 갯수
		// $config['per_page'] = 200; //한 페이지에 표시할 게시물 수
		// $config['uri_segment'] = $this->uri->segment(5, 2); //페이지 번호가 위치한 세그먼트
		// $config['uri_segment'] = $uri_segment;

		// //페이지네이션 초기화
		// $this->pagination->initialize($config);
		// //페이징 링크를 생성하여 view에서 사용할 변수에 할당
		// $data['pagination'] = $this->pagination->create_links();

		// //게시판 목록을 불러오기 위한 offset, limit 값 가져오기
        // $data['page'] = $page = $this->uri->segment($uri_segment, 1);
		// $page = $this->uri->segment($uri_segment, 1);
		// $page = 5;

		// if ( $page > 1 )
		// {
		// 	$start = (($page/$config['per_page'])) * $config['per_page'];
		// }
		// else
		// {
		// 	$start = ($page-1) * $config['per_page'];
		// }

		// $limit = $config['per_page'];

        // $data['list'] = $this->board_m->get_list($this->uri->segment(3), '', $start, $limit, $search_word);
        // $data['list'] = $this->board_m->get_list($this->uri->segment(3), '', $start, $limit);
        // $data['list'] = $this->board_m->get_list($this->uri->segment(3, 'ci_board'), '', $start, $limit);
        // $data['list'] = $this->board_m->get_list('ci_board', '', $start, $limit);
		// $data['list'] = $this->store_m->get_list($this->uri->segment(3, 'store'), '', $start, $limit, $search_word);
		// $list = $this->store_m->get_list($this->uri->segment(3, 'store'), '', $start, $limit, $search_word, $kind);
		// exit(json_encode($list));
	
		// $this->load->view('list_v', $data);
	// }
	public function index(){
        $search_word = $page_url = '';
		$uri_segment = 5;

		$table = 'spot';
		$category = '';
		$subcategory = '';

		if(isset($_GET['table'])){
			$table = $_GET['table'];
		}
		if(isset($_GET['category'])){
			$category = $_GET['category'];
		}
		if(isset($_GET['subcategory'])){
			$subcategory = $_GET['subcategory'];
		}

		


		// //주소중에서 q(검색어) 세그먼트가 있는지 검사하기 위해 주소를 배열로 변환
        // $uri_array = $this->segment_explode($this->uri->uri_string());
        // $uri_array = array();

		// if( in_array('q', $uri_array) ) {
		// 	//주소에 검색어가 있을 경우의 처리. 즉 검색시
		// 	$search_word = urldecode($this->url_explode($uri_array, 'q'));

		// 	// 페이지네이션용 주소
		// 	$page_url = '/q/'.$search_word;
		// 	$uri_segment = 7;
		// }

        // //페이지네이션 라이브러리 로딩 추가
		// $this->load->library('pagination');

		// //페이지네이션 설정
        // $config['base_url'] = '/ggy/index/lists/store'.$page_url.'/page/';
        // $config['total_rows'] = $this->store_m->get_list($this->uri->segment(3, 'spot'), 'count', '', '', $search_word, $kind); //게시물의 전체 갯수
		// $config['per_page'] = 20; //한 페이지에 표시할 게시물 수
		// $config['uri_segment'] = $this->uri->segment(5, 2); //페이지 번호가 위치한 세그먼트

		// //페이지네이션 초기화
		// $this->pagination->initialize($config);
		// //페이징 링크를 생성하여 view에서 사용할 변수에 할당
		// $data['pagination'] = $this->pagination->create_links();

		// //게시판 목록을 불러오기 위한 offset, limit 값 가져오기
        // $data['page'] = $page = $this->uri->segment($uri_segment, 1);
		// $page = $this->uri->segment($uri_segment, 1);
		// $page = 5;

		// if ( $page > 1 )
		// {
		// 	$start = (($page/$config['per_page'])) * $config['per_page'];
		// }
		// else
		// {
		// 	$start = ($page-1) * $config['per_page'];
		// }

		// $limit = $config['per_page'];

        // $data['list'] = $this->board_m->get_list($this->uri->segment(3), '', $start, $limit, $search_word);
        // $data['list'] = $this->board_m->get_list($this->uri->segment(3), '', $start, $limit);
        // $data['list'] = $this->board_m->get_list($this->uri->segment(3, 'ci_board'), '', $start, $limit);
        // $data['list'] = $this->board_m->get_list('ci_board', '', $start, $limit);
		$data['list'] = $this->spot_m->get_list($table, '', '', '', '', $category, $subcategory);
		// $data['category'] = $this->spot_m->get_category($table);
		// $data['subcategory'] = $this->spot_m->get_subcategory($table, $category);
		// $list = $this->store_m->get_list($this->uri->segment(3, 'store'), '', $start, $limit, $search_word, $kind);
		$data['method'] = 'index';

		$this->load->view('index_v', $data);
	}
	public function search(){
		$table = 'spot';
		$category = '';
		$subcategory = '';
		$s_word = '';

		if(isset($_GET['table']))	$table = $_GET['table'];
		if(isset($_GET['s_word']))	$s_word = $_GET['s_word'];

		$data['list'] = $this->spot_m->get_list($table, '', '', '', $s_word, $category, $subcategory);
		$this->load->view('index_v', $data);
	}
	
	public function view(){
		$id = $_GET['id'];
		$table = 'spot';
		$data['data'] = $this->spot_m->get_view($table, $id);
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
