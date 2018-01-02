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
}