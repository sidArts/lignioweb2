<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DiagnosticTestInfo extends REST_Controller {
	public function __construct() {
		parent::__construct();				
		$this->http_request_headers = [];
		$this->http_response_headers = [];
	}
	public function __remap($method, $param = []) {
		if (method_exists($this, $method)) {
			call_user_func_array(array($this, $method), $params);
		} else {
			show_404();	
		}
		
	}
}