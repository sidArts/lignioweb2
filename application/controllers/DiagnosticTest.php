<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DiagnosticTest extends MY_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model("DiagnosticTestModel", "diagnosticTestModel");
	}	

	public function index() {
		$data['diagnosticLabId']= 1;
		$data['heading']     	= "RB Diagnostic Center";
		
		$this->layout->render("diagnosticTest/index", $data);
	}

	public function create() {
		$data['diagnosticLabId']= 1;
		$data['heading']     	= "RB Diagnostic Center";
		$this->layout->render("diagnosticTest/createNew", $data);
	}

}
	