<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

	public function __construct() {
		parent::__construct();		
		$this->load->library("Layout", "layout");
	}


	public function _remap($method, $params = []) {
		if (method_exists($this, $method)) {
			call_user_func_array(array($this, $method), $params);
		} else {
			show_404();	
		}
		
	}


}