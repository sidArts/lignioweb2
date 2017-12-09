<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH. 'core/REST_Controller.php';
class MasterDiagnosticTestReportParams extends REST_Controller {
	protected $modelName = 'MasterDiagnosticTestReportParamModel';
	function __construct() {
		parent::__construct();
	}

	public function index() {
		$this->_response(parent::HTTP_NOT_FOUND);
	}
	
	public function read($diagnostic_lab_id) {
		$modelName = $this->modelName;
		$res = $this->$modelName->getReportParamByDiagnosticLabId($diagnostic_lab_id);
		// print_r($res); exit;
		$this->_response(parent::HTTP_OK, $res);
	}
}