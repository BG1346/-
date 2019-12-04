<?php
defined('BASEPATH') OR exit('No direct script access allowed');
header("Access-Control-Allow-Origin: *");

class Auth extends CI_Controller {
    function __construct(){
		parent::__construct();
		$this->load->model('Auth_m');
	}
	public function index(){
    }
    public function signup()
	{
		//폼 검증 라이브러리 로드
		$this->load->library('form_validation');

		//폼 검증할 필드와 규칙 사전 정의
		$this->form_validation->set_rules('email', '이메일', 'required');
		$this->form_validation->set_rules('password', '비밀번호', 'required');
        $this->form_validation->set_rules('password2', '비밀번호2', 'required');
        
		echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';

		if ( $this->form_validation->run() == TRUE ){
	 		$auth_data = array(
				'username' => $this->input->post('username', TRUE),
				'password' => $this->input->post('password', TRUE),
				'email' => $this->input->post('email', TRUE)
	  		);

			  $result = $this->auth_m->signup($auth_data);
			if ( $result ){
   				//세션 생성
				$newdata = array(
                   'username'  => $result->username,
                   'email'     => $result->email,
                   'logged_in' => TRUE
				);

				$this->session->set_userdata($newdata);

  				alert('회원가입 되었습니다.', '/index');
  				exit;
   			}
   			else{
  				alert('아이디나 비밀번호를 확인해 주세요.', $this->load->view('auth/signup_v'));
  				exit;
               }
  		}
  		else{
	 		//쓰기폼 view 호출
	 		$this->load->view('auth/signup_v');
		}
	}
	public function account(){
		$this->load->view('navBar_v');
		$this->load->view('/auth/account_v');
	}
	public function get_account(){
		$id = $this->uri->segment(3);
		$data['info'] = $this->Auth_m->get_info($id);

		$this->load->view('navBar_v');
		$this->load->view('/auth/get_account_v', $data);
	}
    public function _remap($method){
        $this->load->view('header_v');
		if( method_exists($this, $method)){
			$this->{"{$method}"}();
        }
		$this->load->view('footer_v');
    }

}
