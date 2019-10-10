<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Spot_m extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

	
    function get_list($table='spot', $type='', $offset='', $limit='', $s_word='', $category='', $subcategory='')
    {
		// search word
		$sword= ' WHERE 1=1 ';

		// category word
		$catword='';
		if($category != ''){
			$catword = ' AND category = \''.$category.'\''; 
			if($subcategory != ''){
				$catword = $catword.' AND subcategory = \''.$subcategory.'\'';	
			}
		}


		if(isset($_GET['s_word']))	$s_word = $_GET['s_word'];

		$opt = 'title';
		if(isset($_GET['opt']))	$opt = $_GET['opt'];
		if ( $s_word != '' )
     	{
			if(strpos($opt, 'title') !== false)	$sword = $sword.' AND title like "%'.$s_word.'%" ';
			if (strpos($opt, 'content') != false)	$sword = $sword.' AND content like "%'.$s_word.'%" ';
     	}

    	$limit_query = '';
    	if ( $limit != '' OR $offset != '' )
     	{
     		//페이징이 있을 경우의 처리
     		$limit_query = ' LIMIT '.$offset.', '.$limit;
     	}

        // $sql = "SELECT * FROM ".$table.$sword." AND board_pid = '0' ORDER BY board_id DESC".$limit_query;
    
		$sql = "SELECT * FROM ".$table.$sword.$catword.$limit_query;
		// die($sql);
   		$query = $this->db->query($sql);
		// die();
		if ( $type == 'count' )
     	{               
     		//리스트를 반환하는 것이 아니라 전체 게시물의 갯수를 반환
	    	$result = $query->num_rows();

	    	//$this->db->count_all($table);
     	}
     	else
     	{
     		//게시물 리스트 반환
	    	$result = $query->result();
     	}
		// die($result);
    	return $result;
    }

    function get_view($table, $id)		
    {
    	//조회수 증가
		$sql0 = "UPDATE ".$table." SET hits=hits+1 WHERE id=".$id;
   		$this->db->query($sql0);

    	$sql = "SELECT * FROM ".$table." WHERE id=".$id;
   		$query = $this->db->query($sql);

     	//게시물 내용 반환
	    $result = $query->row();

    	return $result;
    }
	function get_category($table)
    {
		$sql = "SELECT distinct category FROM ".$table;
   		$query = $this->db->query($sql);
    	return $query->result();
	}
	function get_subcategory($table, $category)
    {
		$sql = "SELECT distinct subcategory FROM ".$table." where category='".$category."'";
   		$query = $this->db->query($sql);
    	return $query->result();
    }
	// function insert_board($arrays)
 	// {
	// 	$insert_array = array(
	// 		'board_pid' => 0, //원글이라 0을 입력, 댓글일 경우 원글번호 입력
	// 		// 'user_id' => $this->enc$arrays['user_id'],
	// 		'user_id' => openssl_decrypt($arrays['user_id'], 'AES-256-CBC', KEY_256, 0, KEY_128),
	// 		'user_name' => openssl_decrypt($arrays['user_id'], 'AES-256-CBC', KEY_256, 0, KEY_128),
	// 		'subject' => $arrays['subject'],
	// 		'contents' => $arrays['contents'],
	// 		'reg_date' => date("Y-m-d H:i:s")
	// 	);

	// 	$result = $this->db->insert($arrays['table'], $insert_array);

	// 	//결과 반환
	// 	return $result;
 	// }

	// function modify_board($arrays)
 	// {
	// 	$modify_array = array(
	// 			'subject' => $arrays['subject'],
	// 			'contents' => $arrays['contents']
	// 	);

	// 	$where = array(
	// 			'board_id' => $arrays['board_id']
	// 	);

	// 	$result = $this->db->update($arrays['table'], $modify_array, $where);

	// 	//결과 반환
	// 	return $result;
 	// }

	// function delete_content($table, $no)
 	// {
	// 	$delete_array = array(
	// 			'board_id' => $no
	// 	);

	// 	$result = $this->db->delete($table, $delete_array);

	// 	//결과 반환
	// 	return $result;
 	// }

	// function writer_check($table, $board_id)
	// {
	// 	$sql = "SELECT user_id FROM ".$table." WHERE board_id = '".$board_id."'";

	// 	$query = $this->db->query($sql);

	// 	return $query->row();
	// }

	// function insert_comment($arrays)
 	// {
	// 	$insert_array = array(
	// 		'board_pid' => $arrays['board_pid'], //원글번호 입력
	// 		'user_id' => $arrays['user_id'],
	// 		'user_name' => $arrays['user_id'],
	// 		'subject' => $arrays['subject'],
	// 		'contents' => $arrays['contents'],
	// 		'reg_date' => date("Y-m-d H:i:s")
	// 	);

	// 	$this->db->insert($arrays['table'], $insert_array);

	// 	$board_id = $this->db->insert_id();

	// 	//결과 반환
	// 	return $board_id;
 	// }

    // function get_comment($table, $id)
    // {
    // 	$sql = "SELECT * FROM ".$table." WHERE board_pid='".$id."' ORDER BY board_id DESC";
   	// 	$query = $this->db->query($sql);

    //  	//댓글 리스트 반환
	//     $result = $query->result();

    // 	return $result;
	// }
}
