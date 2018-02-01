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
	}

	public function MasterDiagnosticTests() {
		$this->data['diagnosticLabId'] = 1;
		$this->data['heading']     	= "RB Diagnostic Center";
	}

	public function TestResults() {
		$this->data['diagnosticLabId'] = 1;
		$this->data['heading']     	= "RB Diagnostic Center";
	}

	public function PendingSampleCollection() {
		$this->data['org_id'] = 1;
		$this->data['heading']     	= "RB Diagnostic Center";
	}

}
	