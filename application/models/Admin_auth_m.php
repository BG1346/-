<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * 사용자인증 모델
 *
 * @author Jongwon Byun <advisor@cikorea.net>
 */
class Admin_auth_m extends CI_Model
{
    function __construct()
    {
		parent::__construct();
		$this->load->library('email');
    }

	/**
	 * 아이디, 비밀번호 체크
	 *
	 * @author Jongwon Byun <advisor@cikorea.net>
	 * @param array $auth 폼전송 받은 아이디, 비밀번호
	 * @return array
	 */
    function signin($auth)
    {
		$email = $auth['email'];
		$pw = md5($auth['password']);
		$sql = "SELECT nickname, email, user_id FROM user WHERE email = '".$email."' AND password = '".$pw."' ";

   		$query = $this->db->query($sql);

		if ( $query->num_rows() > 0 ){
			//맞는 데이터가 있다면 해당 내용 반환
     		return $query->row();
     	}
     	else{
     		//맞는 데이터가 없을 경우
	    	return FALSE;
     	}
	}
	function signup($auth)
    {
		$cert_number = mt_rand(1000, 9999);
		$sql = "INSERT INTO user(email, password, nickname, cert_number) VALUES ('".$auth['email']."', '".md5($auth['password'])."', '".$auth['nickname']."', ".$cert_number."); ";
		$query = $this->db->query($sql);
		   
		$sql = "SELECT * FROM user WHERE email='".$auth['email']."' AND password = '".md5($auth['password'])."' AND nickname = '".$auth['nickname']."'; ";
		$query = $this->db->query($sql);

		// $this->email->from('bg134@naver.com', 'mr.jenson');
		$this->email->from('bg1346@naver.com', 'Your Name');
		$this->email->to('bg1346@naver.com');
		// $this->email->to($auth['email']);

		$this->email->subject('회원가입 인증 코드입니다.');
		$this->email->message('code number is '.$cert_number);
		$var = $this->email->send();
		if ($var)
		{
			echo '성공 '.$auth['email'].'<br>';
			echo $this->email->print_debugger().'<br>';
			echo '사유끝<br>';
		}
		else{
			
			echo'실패<br>';
			echo $this->email->print_debugger().'<br>';
			echo '사유끝<br>';
			
		}



		// $this->email->clear();

		if ( $query->num_rows() > 0 ){	
			// 맞는 데이터가 있다면 해당 내용 반환
     		return $query->row();
     	}
     	else{
     		//맞는 데이터가 없을 경우
	    	return FALSE;
     	}
	}
	function certificate($email)
    {	
		$sql = "UPDATE user set certificated = 1 where email = '".$email."'";
		$query = $this->db->query($sql);
		if($query)
			return true;
		else 
			return false;
	}
	function check_cert_number($email, $cert_number){
		$sql = "SELECT * FROM user WHERE email='".$email."' and cert_number=".$cert_number;
		$query = $this->db->query($sql);
		if($query->num_rows() > 0){
			return true;
		}
		return false;

	}	
	function same_email_detected($email){
		$sql  = "SELECT * FROM user WHERE email='".$email."'";
		$query = $this->db->query($sql);
		if($query->num_rows() > 0)
			return true;
		return false;
	}

}