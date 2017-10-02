<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Testinfo extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model("TestInformationModel", "testInfo");
	}

	public function getAll() {
		$config = array(
			"method"   => "GET"
		);
		$this->_validateRequest($config);
		$this->output
		     ->set_content_type('application/json')
			 ->set_output(json_encode($this->testInfo->get_all()));
	}

	public function insert() {
		$config = array(
			"method"   => "POST",
			"dataType" => "application/json"
		);
		$this->_validateRequest($config);

		$data = file_get_contents('php://input');
		$data = (array)json_decode($data);
		$insertedId = $this->testInfo->insert($data);
		if($insertedId)
			$this->output
				 ->set_status_header(201)
				 ->set_content_type('text/plain', 'utf-8')
				 ->set_output($insertedId);
	 	else
	 		$this->output->set_status_header(400);
	}

	public function _validateRequest($config) {
		if(isset($config['method']) && $_SERVER['REQUEST_METHOD'] != $config['method']) {
		    $this->output
		         ->set_status_header(405)
		         ->_display();
		    exit;
		}
		if(isset($config['dataType']) && $_SERVER['CONTENT_TYPE'] != $config['dataType']) {
		    $this->output
		         ->set_status_header(415)
		         ->_display();
		    exit;
		}
	}

}
