<?php
defined('BASEPATH') OR exit('No direct script access allowed');
header("Access-Control-Allow-Origin: *");
class Ajax extends CI_Controller {
    function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model('spot_m');
		$this->load->model('board_m');
		$this->load->library('image_lib');
    }
    public function index(){
        $this->load->view("welcome_v");
    }
    public function ajax_get_subcategory(){
		$table = 'spot';
		$category = 'cafe';
		if(isset($_GET['table']))	$table = $_GET['table'];
        if(isset($_GET['category']))	$category = $_GET['category'];
        
        echo json_encode($this->spot_m->get_subcategory($table, $category));
    }
    public function ajax_categorization(){
		$table = 'spot';
		$category = '';
		$subcategory = '';

		if(isset($_GET['table']))	$table = $_GET['table'];
		if(isset($_GET['category']))	$category = $_GET['category'];
		if(isset($_GET['subcategory']))	$subcategory = $_GET['subcategory'];

		echo json_encode($this->spot_m->get_list($table, '', '', '', '', $category, $subcategory));
	}

}
?>