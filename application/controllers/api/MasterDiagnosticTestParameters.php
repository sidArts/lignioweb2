<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH. 'core/REST_Controller.php';
class MasterDiagnosticTestParameters extends REST_Controller {
	protected $modelName = 'MasterDiagnosticTestParameterModel';
	function __construct() {
		parent::__construct();
	}

	public function index() {
		$this->_response(parent::HTTP_NOT_FOUND);
	}
	
	public function read($diagnostic_test_id) {
		$modelName = $this->modelName;
		$res = $this->$modelName->getReportParamByDiagnosticTestId($diagnostic_test_id);
		// print_r($res); exit;
		$this->_response(parent::HTTP_OK, $res);
	}

	public function read_with_param_value($diagnostic_test_id, $booking_detail_id) {
		$modelName = $this->modelName;
		$res = $this->$modelName->getTestParameterWithValueByBookingDetailId($diagnostic_test_id, $booking_detail_id);
		// print_r($res); exit;
		$this->_response(parent::HTTP_OK, $res);
		// $this->_response(parent::HTTP_OK, $this->db->last_query());
	}
}