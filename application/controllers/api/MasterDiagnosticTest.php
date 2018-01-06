<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH. 'core/REST_Controller.php';
class MasterDiagnosticTest extends REST_Controller {
	protected $modelName = 'MasterDiagnosticTestModel';
	function __construct() {
		parent::__construct();
		// $this->escapeTokenFilter = ['read_OrgSpecificMasterDiagnosticTest'];
	}

	public function read_OrgSpecificMasterDiagnosticTest() {
	
		$model = $this->modelName;
		// print_r($this->userDetails); exit;
		$res = $this->$model->getOrgSpecificDiagnosticTests($this->userDetails['org_id']);
		$this->_response(REST_Controller::HTTP_OK, $res);	
	
	}
}