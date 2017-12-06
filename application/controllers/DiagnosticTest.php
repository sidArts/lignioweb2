<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DiagnosticTest extends MY_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model("DiagnosticTestModel", "diagnosticTestModel");
	}	

	public function index() {
		$this->data['diagnosticLabId']= 1;
		$this->data['heading']     	= "RB Diagnostic Center";
		
		$this->view = "diagnosticTest/index";
	}

	public function create() {
		$this->data['diagnosticLabId'] = 1;
		$this->data['heading']     	= "RB Diagnostic Center";
		$this->view = "diagnosticTest/createNew";
	}

}
	