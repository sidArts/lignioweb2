	<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Employeeregistration extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->library('Layout', [
			'styles'  => [ "bootstrap.min.css", "font-awesome.css" ],
			'scripts' => [ "jquery.min.js", "bootstrap.min.js", "angular/angular.js", "bootbox.js" ]
		]);
		$this->load->model("UserModel","users");
	}	

	function index() {		
		// $this->view = 'register';
		$this->layout->render('/Employeeregistration', []);
	}

	function save() {
		if($this->input->method() == 'post'):
			$data = json_decode($this->input->raw_input_stream, TRUE);
			$insertedId = $this->users->insert($data);	
			if($insertedId) {
				$this->output->set_status_header(201)
							 ->set_content_type('application/json');
				print json_encode([ 'insertedId' => $insertedId ]);
				exit;
			} else {
				$this->output->set_status_header(400);
			}
		endif;
	}	
}