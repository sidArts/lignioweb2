<?php defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH. 'core/REST_Controller.php';
class Organization extends REST_Controller {
	
	protected $modelName = 'OrganizationModel';
	
	function __construct() {
		parent::__construct();
	}

	function read_submittedOrganizations() {
		$modelName = $this->modelName;
		$data = $this->$modelName->get_all([ 'status' => 12 ]);
		$this->_response(REST_Controller::HTTP_OK, $data);
	}
}