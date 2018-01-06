<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH. 'core/REST_Controller.php';
class DiagnosticTest extends REST_Controller {
	protected $modelName = 'DiagnosticTestModel';
	function __construct() {
		parent::__construct();
	}

	public function index() {
		$model = $this->modelName;
		$res = $this->$model->get_all($this->access_permission_restrict);
		$this->_response(REST_Controller::HTTP_OK, $res);
	}

	public function create() {	
		$model 			= $this->modelName;
		$data 			= json_decode($this->input->raw_input_stream, TRUE);
		$data['org_id'] = $this->userDetails['org_id'];
		$insertedId = $this->$model->insert($data);
		$this->_response(REST_Controller::HTTP_CREATED, $insertedId);
	}
	
}