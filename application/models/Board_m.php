<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Board_m extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    function get_list($table='board', $page_type='', $offset='', $limit='', $type='')
    {
    	$limit_query = '';
    	if ( $limit != '' OR $offset != '' ){
     		//페이징이 있을 경우의 처리
     		$limit_query = ' LIMIT '.$offset.', '.$limit;
        }

        // 글쓰기 장르
        $type_query = '';
        if($type != ''){
            $type_query = " WHERE type = '".$type."' ";
        }

		
		$sql = "SELECT * FROM ".$table.$type_query.$limit_query;
        $query = $this->db->query($sql);
        if ( $page_type == 'count' ){               
			$result = $query->num_rows();
			return $result;
     	}
		$result = $query->result();
		return $result;
    }
    function insert_board($arrays){
		$insert_array = array(
			// 'board_pid' => 0, //원글이라 0을 입력, 댓글일 경우 원글번호 입력
			// // 'user_id' => $this->enc$arrays['user_id'],
			// 'user_id' => openssl_decrypt($arrays['user_id'], 'AES-256-CBC', KEY_256, 0, KEY_128),
			// 'user_name' => openssl_decrypt($arrays['user_id'], 'AES-256-CBC', KEY_256, 0, KEY_128),
			// 'subject' => $arrays['subject'],
			// 'contents' => $arrays['contents'],
            // 'reg_date' => date("Y-m-d H:i:s")

			// 'user_id' => openssl_decrypt($arrays['user_id'], 'AES-256-CBC', KEY_256, 0, KEY_128),
			'user_id' => $arrays['user_id'],
			'nickname' => $arrays['nickname'],
            'title' => $arrays['title'],
            'type' => $arrays['type'],
			'contents' => $arrays['contents'],
			'reg_date' => date("Y-m-d H:i:s", strtotime("+9 hours")),
			'attached_file_name' => $arrays['attached_file_name'],
			'attached_file_path' => $arrays['attached_file_path']
		);
		$result = $this->db->insert($arrays['table'], $insert_array);

		//결과 반환
		return $result;
	 }
	 function board_delete($id){
		$sql = "delete from board where board_id = '".$id."'";
		$result = $this->db->query($sql);
		return $result;
	 }
	function get_board_info($id){
		$sql = "select * from board where board_id = '".$id."'";
		$query = $this->db->query($sql);
		return $query->row();
	}
	function board_modify($modify_data){
		$sql  = "update board set title='".$modify_data['title']."', type='".$modify_data['type']."', contents='".$modify_data['contents']."', reg_date = '".$modify_data['reg_date']."' where  board_id = ".$modify_data['board_id'];
		return $this->db->query($sql);
	}
}
