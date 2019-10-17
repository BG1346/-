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
	function get_subcategory($table, $category='')
    {
		$category_word = '';
		if($category != ''){
			$category_word = " WHERE CATEGORY='".$category."'";
		}
		else{
			return null;
		}
		$sql = "SELECT * FROM ".$table.$category_word;
		$query = $this->db->query($sql);
		return $query->result();
    }
}
