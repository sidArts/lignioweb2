<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MasterDiagnosticTests extends MY_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model("MasterDiagnosticTestModel", "booking");
	}
	public function index() {
		// $this->view = "booking/master-diagnostic-test-view";		
	}
}
