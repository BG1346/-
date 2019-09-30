<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
		$this->load->view('welcome_v');
	}
	public function _remap($method)
 	{
		if( method_exists($this, $method) )
		{
			$this->{"{$method}"}();
		}

		//푸터 include
		$this->load->view('footer_v');
    }
}
