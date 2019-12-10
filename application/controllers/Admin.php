<?php
defined('BASEPATH') OR exit('No direct script access allowed');
header("Access-Control-Allow-Origin: *");

class Admin extends CI_Controller {
    function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model('Auth_m');
		$this->load->model('Admin_auth_m');
		$this->load->model('Spot_m');
		$this->load->model('Board_m');

		$this->load->library('pagination');
		$this->load->library('encryption');
		$this->load->library('form_validation');
		$this->load->library('email');
		$this->load->library('image_lib');

		$this->load->helper('form');
		$this->load->helper('alert');
		$this->load->helper('url');
		$this->load->helper('file');
	}
	public function index(){
		if($this->session->userdata('email') != 'admin')	$this->load->view('/admin/signin_v');
		else	$this->load->view('/admin/home_v');
    }
    public function signin(){
		//폼 검증할 필드와 규칙 사전 정의
		$this->form_validation->set_rules('email', '아이디', 'required');
		$this->form_validation->set_rules('password', '비밀번호', 'required');
		if ( $this->form_validation->run() == TRUE){
			$auth_data = array(
				'email' => $this->input->post('email', TRUE),
				'password' => $this->input->post('password', TRUE)
			);
			$result = $this->Admin_auth_m->signin($auth_data);
			if ( $result && $this->input->post('email') == 'admin'){
				//세션 생성
				$newdata = array(
					'user_id' => $result->user_id,
					'nickname' => $result->nickname,
					'email'     => $result->email,
					'logged_in' => TRUE
				);
				$this->session->set_userdata($newdata);
				alert('로그인 되었습니다.', '/admin/home');
				exit;
			}
			else{
				//실패시
				alert('아이디나 비밀번호를 확인해 주세요.', '/admin/signin');
				exit;
			}

		}
		else{
			//쓰기폼 view 호출
			$this->load->view('/admin/signin_v');
		}
	}
	public function home(){
		$this->load->view('/admin/home_v');
	}
    public function spotlist(){
		$table = 'spot';	$category = '';	$subcategory = '';
		if(isset($_GET['table']))	$table = $_GET['table'];
		if(isset($_GET['category']))	$category = $_GET['category'];
		if(isset($_GET['subcategory']))	$subcategory = $_GET['subcategory'];
		$data['spot_list'] = $this->Spot_m->get_list($table, '', '', '', '', $category, $subcategory);
		$data['category_list'] = $this->Spot_m->get_category($table);
		$data['subcategory_list'] = $this->Spot_m->get_subcategory('SUBCATEGORY', $category);
		$this->load->view('/admin/spotlist_v', $data);
	}
	public function spotlist_write(){
		$data['category_list'] = $this->Spot_m->get_category('spot');
		if($this->session->userdata('email') == 'admin'){
			//폼 검증할 필드와 규칙 사전 정의
			$this->form_validation->set_rules('title', '제목', 'required');
			$this->form_validation->set_rules('contents', '내용', 'required');
			if ( $this->form_validation->run() == TRUE ){
				$config['upload_path'] = './image/';
				$config['allowed_types'] = 'gif|jpg|png|zip|jpeg';
				$config['max_size']	= '10000';
				$this->load->library('upload', $config);
				$uploaded_file_name = '';
				$uploaded_file_path = '';
				if($this->upload->do_upload()){
					$data = array('upload_data' => $this->upload->data());
					$uploaded_file_name = $data['upload_data']['file_name'];
					$uploaded_file_path = './image/'.$uploaded_file_name;
				}
				$write_data = array(
					'title' => $this->input->post('title', TRUE),
					'category' => $this->input->post('category', TRUE),
					'desc' => $this->input->post('desc', TRUE),
					'content' => $this->input->post('contents', TRUE),
					'addr' => $this->input->post('addr', TRUE),
					'hours' => $this->input->post('hours', TRUE),
					'tel1' => $this->input->post('tel1', TRUE),
					'tel2' => $this->input->post('tel2', TRUE),
					'x' => $this->input->post('x', TRUE),
					'y' => $this->input->post('y', TRUE),
					'imagepath' => $uploaded_file_name,
					'district' => $this->input->post('district', TRUE)
				);
				$result = $this->Spot_m->insert_spot($write_data);
				$full_path = $data['upload_data']['full_path'];
				$width = $data['upload_data']['image_width'];
				$height = $data['upload_data']['image_height'];
				$this->my_resize($full_path, './image_FHD/'.$uploaded_file_name, 1920, 1080, $width, $height);
				$this->my_resize($full_path, './image_square_desktop/'.$uploaded_file_name, 310, 310, $width, $height);
				$this->my_crop('./image_square_desktop/'.$uploaded_file_name, $width, $height, 310, 310);
				$this->my_resize($full_path, './image_square_mobile/'.$uploaded_file_name, 150, 150, $width, $height);
				$this->my_crop('./image_square_mobile/'.$uploaded_file_name, $width, $height, 150, 150);
				if ( $result ){
					//글 작성 성공시 게시판 목록으로
					alert('입력되었습니다. ', '/admin/spotlist');
					exit;
				}
				else{
					//글 실패시 게시판 목록으로
					alert('다시 입력해 주세요.', '/admin/spotlist_write');
					exit;
				}
			}
			else{
				//쓰기폼 view 호출
				$this->load->view('/admin/spotlist_write_v', $data);
			}
		}
		else{
			$this->session->set_userdata('referred_from', '/index/board');
			alert('로그인후 작성하세요', '/admin/signin');
			exit;
		}
	 }
	 public function my_resize($source_path, $new_path, $wid_size, $hei_size, $width, $height){
		$this->image_lib->clear();
		$config['image_library'] = 'gd2';
		$config['source_image'] = $source_path;
		$config['new_image'] = $new_path;
		$config['create_thumb'] = TRUE;
		$config['maintain_ratio'] = TRUE;
		$config['thumb_marker'] = '';
		if($width > $height)	$config['height'] = $hei_size;	
		else	$config['width'] = $wid_size;
		$this->image_lib->initialize($config);
		$this->image_lib->resize();
	}
	public function my_crop($source_path, $width, $height, $wid_size, $hei_size){
		$this->image_lib->clear();
		$config['image_library'] = 'gd2';
		$config['thumb_marker'] = '';
		$config['source_image'] = $source_path;
		$config['maintain_ratio'] = FALSE;
		if($width > $height){
			$config['x_axis'] = $wid_size/2;
			$config['width'] = $wid_size;
		}
		else{
			$config['y_axis'] = 0;
			$config['height'] = $hei_size;
		}
		
		$this->image_lib->initialize($config);
		$this->image_lib->crop();	
	}
	public function delete_spotlist(){
		$id_to_delete = $this->uri->segment(3);
		$board_data = $this->Spot_m->get_view('spot', $id_to_delete);
		$board_written_id = $board_data->id;
		$board_file_path = $board_data->imagepath;
		$this->delete_file($board_file_path);
		$this->Spot_m->delete_spot($id_to_delete);
		alert('지웠습니다.', '/admin/spotlist');
	}
	public function modify_spotlist(){
		$id = $this->uri->segment(3, 3);
		$spot_data = $this->Spot_m->get_view('spot', $id);
		if($spot_data)
			foreach($spot_data as $key => $value)
				$_POST[$key] = $value;
		$this->form_validation->set_rules('title', 'title', 'required');
		$this->form_validation->set_rules('content', 'content', 'required');
		if ( $this->form_validation->run() == TRUE ){
			$attached_file_path = '';
			$attached_file_name = $this->Spot_m->get_view('spot', $this->input->post('id', TRUE))->imagepath;
			$config['upload_path'] = './image/';
			$config['allowed_types'] = 'gif|jpg|png|zip';
			$config['max_size']	= '10000';
			$this->load->library('upload', $config);	
			if($this->upload->do_upload()){
				$data = array('upload_data' => $this->upload->data());
				$this->delete_file($attached_file_name);
				$attached_file_name = $data['upload_data']['file_name'];
				$attached_file_path = '/upload/'.$attached_file_name;
				$full_path = $data['upload_data']['full_path'];
				$width = $data['upload_data']['image_width'];
				$height = $data['upload_data']['image_height'];
				$this->my_resize($full_path, './image_FHD/'.$attached_file_name, 1920, 1080, $width, $height);
				$this->my_resize($full_path, './image_square_desktop/'.$attached_file_name, 310, 310, $width, $height);
				$this->my_crop('./image_square_desktop/'.$attached_file_name, $width, $height, 310, 310);
				$this->my_resize($full_path, './image_square_mobile/'.$attached_file_name, 150, 150, $width, $height);
				$this->my_crop('./image_square_mobile/'.$attached_file_name, $width, $height, 150, 150);
			}
			$write_data = array(
				'id' => $this->input->post('id', TRUE),
				'title' => $this->input->post('title', TRUE),
				'category' => $this->input->post('category', TRUE),
				'desc' => $this->input->post('desc', TRUE),
				'content' => $this->input->post('content', TRUE),
				'addr' => $this->input->post('addr', TRUE),
				'hours' => $this->input->post('hours', TRUE),
				'tel1' => $this->input->post('tel1', TRUE),
				'tel2' => $this->input->post('tel2', TRUE),
				'x' => $this->input->post('x', TRUE),
				'y' => $this->input->post('y', TRUE),
				'district' => $this->input->post('district', TRUE),
				'imagepath' => $attached_file_name,
				'like' => $this->input->post('like', TRUE),
				'hits' => $this->input->post('hits', TRUE)
			);
			$result1 = $this->db->delete('spot', array('id' => $this->input->post('id', TRUE)));
			$result2 = $this->db->insert('spot', $write_data);
			if($result1 && $result2)
				alert('수정하였습니다.', '/admin/spotlist');
			else
				alert('DB오류, 다시 입력해 주세요.', '/admin/modify_spotlist/'.$this->input->post('id', TRUE));
		}
		else{
			$data['category_list'] = $this->Spot_m->get_category('spot');
			$this->load->view('/admin/spotlist_modify_v', $data);
		}
	}
	public function delete_board(){
		$id_to_delete = $this->uri->segment(3);
		$board_data = $this->Board_m->get_board_info($id_to_delete);
		$board_written_id = $board_data->user_id;
		$board_file_path = $board_data->attached_file_path;
		$this->Board_m->board_delete($id_to_delete);
		if($board_file_path != '')
			unlink('.'.$board_file_path);
		alert('삭제햇습니다', '/admin/board');
	}
	public function modify_board(){
		if(!empty($_GET)){
			$attached_file_name = '';
			$attached_file_path = '';
			if($this->upload->data()['file_name'] != ''){
				$config['upload_path'] = './upload/';
				$config['allowed_types'] = 'gif|jpg|png|zip';
				$config['max_size']	= '10000';
				$this->load->library('upload', $config);	
				if($this->upload->do_upload()){
					$data = array('upload_data' => $this->upload->data());
					$attached_file_name = $data['upload_data']['file_name'];
					$attached_file_path = '/upload/'.$attached_file_name;
				}
			}

			if($attached_file_name = ''){
				$attached_file_name = $this->Spot_m->get_view('spot', $this->input->post('board_id', TRUE))['imagepath'];
			}
			die($attached_file_name);
			$modify_data = array(
				'table' => 'board',
				'board_id' => $this->input->post('board_id', TRUE),
				'title' => $this->input->post('title', TRUE),
				'type' => $this->input->post('type', TRUE),
				'contents' => $this->input->post('contents', TRUE),
				'nickname' => $this->session->userdata('nickname'),
				'reg_date' => date("Y-m-d H:i:s", strtotime ("+9 hours")),
				'imagepath' => $attached_file_name
			);
			$this->Board_m->board_modify($modify_data);
			alert('수정되었습니다.', '/admin/board');
		}
		else{
			$id = $this->uri->segment(3, 3);
			$board_data = $this->Board_m->get_board_info($id);
			if($board_data)
				foreach($board_data as $key => $value)
					$_POST[$key] = $value;
			$this->load->view("/admin/modify_board_v");
		}
	}
	public function board(){
		$data['board_list'] = $this->Board_m->get_list('board');
		$this->load->view('/admin/board_v', $data);
	}
	public function user(){
		$this->load->view('/admin/user_v', $data);
	}
	public function delete_file($file_name){
		if(is_file('./image/'.$file_name))	unlink('./image/'.$file_name);
		if(is_file('./image_FHD/'.$file_name))	unlink('./image_FHD/'.$file_name);
		if(is_file('./image_square_desktop/'.$file_name))	unlink('./image_square_desktop/'.$file_name);
		if(is_file('./image_square_mobile/'.$file_name))	unlink('./image_square_mobile/'.$file_name);
	}
	public function _remap($method)
    {
		echo '<a href="/admin/spotlist">spotlist 관리</a><br>';
		echo '<a href="/admin/board">board 관리</a><br>';

		if($this->session->userdata('email') != 'admin' && $this->uri->segment(1) == 'admin' && $this->uri->segment(2) != 'signin'){
			alert('미 로그인 혹은 세션완료, 다시로그인해주세요', '/admin/signin');
			exit;
		}
		if(!isset($_GET['ajax'])){
			$this->load->view('header_v');
			$this->load->view('header_v_m');
		}
		if( method_exists($this, $method) )
		{
			echo '<a href="/index/signout">signout</a><br>';
			$this->{"{$method}"}();
		}
		if(!isset($_GET['ajax'])){
			$this->load->view('footer_v');
		}
		$this->session->set_userdata('referred_from', current_url());
   }
}
