<?php
defined('BASEPATH') OR exit('No direct script access allowed');
header("Access-Control-Allow-Origin: *");

class Index extends CI_Controller {
    function __construct()
	{
		parent::__construct();
		$this->load->database();

		$this->load->model('Spot_m');
		$this->load->model('Board_m');
		$this->load->model('Auth_m');

		$this->load->library('pagination');
		$this->load->library('image_lib');
		$this->load->library('encryption');
		$this->load->library('form_validation');
		$this->load->library('email');
		
		
		$this->load->helper('form');
		$this->load->helper('alert');
		$this->load->helper('url');
		$this->load->helper('file');
		
		$this->encryption->initialize(
			array(
				'cipher'=> 'aes-256',
				'mode' => 'ctr',
				'key' => ''
			)
		);
		define('KEY', '21409512408764867149294859283728347923');
		define('KEY_128', substr(KEY, 0, 128/8));
		define('KEY_256', substr(KEY, 0, 256/8));
	}
	public function index(){
		$this->load->view('mainJumbo_v');
		// $string = read_file('./upload/test.png');
		// echo 'start : '.$string.'    end<br>';
	}
	public function check_if_i_like($id = ''){
		$table = 'LIKE';
		$ip = $this->input->ip_address();
		if(isset($_GET['id']))	$id = $_GET['id'];
		$result = $this->Spot_m->check($table, $id, $ip);
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
		$this->load->view('/map/map_v', $data);
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

		

		




		// $config['image_library'] = 'gd2';		
		// $config['create_thumb'] = TRUE;
		// $config['maintain_ratio'] = TRUE;
		// $config['thumb_marker'] = '';
		// // $config['width'] = 75;
		// $config['height'] = 150;
		// $this->load->library('image_lib', $config);
		
		// // file list 구하기
		// $dir = "image/";
		// // 핸들 획득
		// $handle  = opendir($dir);
		// $files = array();
		
		// // 디렉터리에 포함된 파일을 저장한다.
		// while (false !== ($filename = readdir($handle))) {
		// 	if($filename == "." || $filename == "..")
		// 		continue;
		// 	// 파일인 경우만 목록에 추가한다.
		// 	if(is_file($dir . "/" . $filename))
		// 		$files[] = $filename;
		// }
		

		// // image 썸네일화
		// // 핸들 해제 
		// closedir($handle);
		
		// // 정렬, 역순으로 정렬하려면 rsort 사용
		// // sort($files);
		
		// // 파일명을 출력한다.
		// foreach ($files as $f) {
		// 	// echo gettype('image/'.$f);
		// 	$config['source_image'] = 'image/'.$f;
		// 	$config['new_image'] ='image_mobile/'.$f;
		// 	// echo 'filename : '.$f;
		// 	// echo $this->image_lib->display_errors();
		// 	$this->image_lib->initialize($config);
		// 	$this->image_lib->resize();
		// } 
		// $this->image_lib->clear();
		
		

		$data['spot_list'] = $this->Spot_m->get_list($table, '', '', '', '', $category, $subcategory);
		$data['category_list'] = $this->Spot_m->get_category($table);
		$data['subcategory_list'] = $this->Spot_m->get_subcategory('SUBCATEGORY', $category);
	
		$like_list = array();
		for($i=0 ; $i<count($data['spot_list']) ; $i++){
			$like_list[$data['spot_list'][$i]->id] = $this->check_if_i_like($data['spot_list'][$i]->id);
		}
		$data['like_list'] = $like_list;
		$this->load->view('/spotlist/categorization_v', $data);
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
		$this->load->view('/spotlist/categorization_v', $data);
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
		$this->load->view('/spotlist/spot_view_v', $data);
	}
	public function signup()
	{
		$this->load->view('navBar_v');
		//폼 검증할 필드와 규칙 사전 정의
		$this->form_validation->set_rules('email', '이메일', 'required');
		$this->form_validation->set_rules('password', '비밀번호', 'required');
		$this->form_validation->set_rules('password2', '비밀번호2', 'required|matches[password]');
		// $this->form_validation->set_rules('password', 'Password', 'required|matches[password');
		// $this->form_validation->set_rules('passconf', 'Password Confirmation', 'required|matches[password]');
		$this->form_validation->set_rules('nickname', '닉네임', 'required');
        

		// echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
		
		if ( $this->form_validation->run() == TRUE )
  		{
			$auth_data = array(
				'email' => $this->input->post('email', TRUE),
				'password' => $this->input->post('password', TRUE),
				'nickname' => $this->input->post('nickname', TRUE)
			);
			$data['auth_data'] = $auth_data;
			// die($_POST['email']);
			if($this->Auth_m->same_email_detected($_POST['email'])){
				// die('sdkfj');
				$data['error_message']	= '중복된 이메일입니다.';
				$this->load->view('/auth/signup_v', $data);
			}
	 		else{
				$result = $this->Auth_m->signup($auth_data);
				if ( $result ){
					//세션 생성
					$newdata = array(
						'email'     => $result->email,
						'logged_in' => TRUE,
						'nickname' => $result->nickname
					);
					$this->session->set_userdata($newdata);
					$this->load->view('/auth/certificate_v');
				}
				else{
					alert('아이디나 비밀번호를 확인해 주세요.', $this->load->view('/auth/signup_v'));
					exit;
				}
			}
  		}
		else{
	 		//쓰기폼 view 호출
	 		$this->load->view('/auth/signup_v');
		}
	}
	public function certificate(){
		$this->form_validation->set_rules('cert_number', '인증번호', 'required|numeric');
		// if($this->form_validation->run() == FALSE)
		// 	$this->load->view('certificate_v');

		if($this->form_validation->run() == TRUE){
			$input_email = $this->input->post('email', TRUE);
			$input_nickname = $this->input->post('nickname', TRUE);
			$input_cert_number = $this->input->post('cert_number', TRUE);

			$check = $this->Auth_m->check_cert_number($input_email, $input_cert_number);
			$data['auth_data'] = array(
				'email' => $input_email,
				'nickname' => $input_nickname,
				'cert_number' => $input_cert_number
			);
			if($check){
				$this->Auth_m->certificate($input_email);
				alert('가입을 축하합니다.', '/index');
			}
			else{
				$data['error_message'] = '인증번호가 맞지 않습니다.';
				$this->load->view('/auth/certificate_v', $data);
			}
		}
		else{
			// $data['error_message'] = '입력 양식이 맞지 않습니다.';
			$this->load->view('/auth/certificate_v');
		}
		
	}
	public function signin(){
		$this->load->view('navBar_v');
		

		//폼 검증할 필드와 규칙 사전 정의
		$this->form_validation->set_rules('email', '아이디', 'required');
		$this->form_validation->set_rules('password', '비밀번호', 'required');

		// echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';

		if ( $this->form_validation->run() == TRUE ){
			$auth_data = array(
				'email' => $this->input->post('email', TRUE),
				'password' => $this->input->post('password', TRUE)
			);

			$result = $this->Auth_m->signin($auth_data);

			if ( $result ){
				//세션 생성
				$newdata = array(
					// 'username'  => openssl_decrypt($result->username, 'AES-256-CBC', KEY_256, 0, KEY_128),
					'user_id' => $result->user_id,
					'nickname' => $result->nickname,
					'email'     => $result->email,
					'logged_in' => TRUE
				);

				$this->session->set_userdata($newdata);
				redirect('/index');
				
				exit;
			}
			else{
				//실패시
				alert('아이디나 비밀번호를 확인해 주세요.', '/index/signin');
				exit;
			}

		}
		else{
			//쓰기폼 view 호출
			$this->load->view('/auth/signin_v');
		}
		
	}

	public function signout()
	{
		
		$this->session->sess_destroy();

		// echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
		$referred_from = $this->session->userdata('referred_from');
		// die($referred_from);
		redirect($referred_from);
  		exit;
	}

	public function board_page(){
		$this->load->view('navBar_v');
		$this->board();
	}
	public function board(){
		$uri_segment = 3;
		$page_url = '';
		$config['base_url'] = '/index/board_page/';
		// $config['base_url'] = 'http://localhost/index.php/test/page/';
		// $config['total_rows'] = 200;

		//set pagination num_links, set total page 5.
		$config['total_rows'] = $this->Board_m->get_list('board', 'count', '', ''); //게시물의 전체 갯수
		$config['per_page'] = 5;
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
		if ( $page > 1 ){
			$start = (($page/$config['per_page'])) * $config['per_page'];
		}
		else{
			$start = ($page-1) * $config['per_page'];
		}
		$limit = $config['per_page'];

		$data['board_pagination_list'] = $this->Board_m->get_list('board', '', $start, $limit);
		// $data['board_pagination_list'] = $this->Spot_m->get_list($table, '', $start, $limit, '', $category, $subcategory);
		$this->load->view('/board/board_v', $data);
	}

	function board_write(){
		$this->load->view('navBar_v');
		if($this->session->userdata('logged_in') == TRUE){
			//폼 검증할 필드와 규칙 사전 정의
			$this->form_validation->set_rules('title', '제목', 'required');
			$this->form_validation->set_rules('contents', '내용', 'required');
			$this->form_validation->set_rules('type', '타입', 'required');

			if ( $this->form_validation->run() == TRUE ){
				$config['upload_path'] = './upload/';
				$config['allowed_types'] = 'gif|jpg|png|zip';
				$config['max_size']	= '10000';
				$this->load->library('upload', $config);

				
				// if user upload file, this statement would return true;
				$attached_file_name = '';
				$attached_file_path = '';
				if($this->upload->do_upload()){
					$data = array('upload_data' => $this->upload->data());
					$attached_file_name = $data['upload_data']['file_name'];
					$attached_file_path = '/upload/'.$attached_file_name;
				}
				else if($this->upload->data()['file_name'] != ''){
					alert($this->upload->display_errors(), '/index/board_write');
				}
				$write_data = array(
					'user_id' => $_SESSION['user_id'],
					'table' => 'board',
					'title' => $this->input->post('title', TRUE),
					'type' => $this->input->post('type', TRUE),
					'contents' => $this->input->post('contents', TRUE),
					'nickname' => $this->session->userdata('nickname'),
					'attached_file_name' => $attached_file_name,
					'attached_file_path' => $attached_file_path
				);

				$result = $this->Board_m->insert_board($write_data);

				if ( $result ){
					//글 작성 성공시 게시판 목록으로
					alert('입력되었습니다. ', '/index/board_page');
					exit;
				}
				else{
					//글 실패시 게시판 목록으로
					alert('다시 입력해 주세요.', '/index/board_page');
					exit;
				}

			}
			else
			{
				//쓰기폼 view 호출
				$this->load->view('/board/board_write_v');
			}
		}
		else
		{
			$this->session->set_userdata('referred_from', '/index/board');
			alert('로그인후 작성하세요', '/index/signin');
			exit;
		}
	 }
	 public function board_delete(){
		if(!isset($_SESSION['user_id'])){
			alert('로그인 하세요!', '/index/signin');
		}
		
		else{
			$id_to_delete = $this->uri->segment(3);
			$board_data = $this->Board_m->get_board_info($id_to_delete);
			$board_written_id = $board_data->user_id;
			if($_SESSION['user_id'] != $board_written_id){
				alert('아이디가 달라요', '/index/board_page');
				exit;
			}
			$board_file_path = $board_data->attached_file_path;
			$this->Board_m->board_delete($id_to_delete);
			unlink('.'.$board_file_path);
			alert('삭제햇슴다', '/index/board_page');
		}
	 }
	public function board_modify(){
		$this->load->view('navBar_v');
		$id_to_modify = $this->uri->segment(3);
		$board_info = $this->Board_m->get_board_info($id_to_modify);
		if(!isset($_SESSION['user_id']))
			alert('로그인 해주세요', '/index/signin');
		if($_SESSION['user_id'] != $board_info->user_id){
			alert('아이디가 달라요', '/index/board_page');
		}
		else{
			foreach($board_info as $key => $value)
				$_POST[$key] = $value;
			$this->load->view('/board/board_modify_v', $board_info);
		}
	}
	public function board_modify_action(){
		$modify_data = array(
			'table' => 'board',
			'board_id' => $_GET['board_id'],
			'title' => $this->input->post('title', TRUE),
			'type' => $this->input->post('type', TRUE),
			'contents' => $this->input->post('contents', TRUE),
			'nickname' => $this->session->userdata('nickname'),
			'reg_date' => date("Y-m-d H:i:s", strtotime ("+9 hours"))
		);
		$this->Board_m->board_modify($modify_data);
		alert('수정되었습니다.', '/index/board_page');
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

		if(!isset($_GET['ajax']) && $method != 'index'){
			$this->load->view('footer_v');
		}
		
		// if($this->session->userdata['reffered_from_-2'])
		// $this->session->set_userdata('referred_from_-2', $this->session->userdata['referred_from']);
		$this->session->set_userdata('referred_from', current_url());
   }

}
