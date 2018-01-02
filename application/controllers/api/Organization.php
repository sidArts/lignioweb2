<?php defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH. 'core/REST_Controller.php';
class Organization extends REST_Controller {
	
	protected $modelName = 'OrganizationModel';
	
	function __construct() {
		parent::__construct();
		$this->escapeTokenFilter = [ 'save', 'approvedOrganizations' ];
	}

	function save() {
		$modelName = $this->modelName;
		if($this->input->method() == 'post'):
			$data = json_decode($this->input->raw_input_stream, TRUE);
			$insertedId = $this->organization->insert($data);	
			if($insertedId) {
				$this->output->set_status_header(201)
							 ->set_content_type('application/json');
				print json_encode([ 'insertedId' => $insertedId ]);
				exit;
			} else {
				$this->output->set_status_header(400);
			}
		endif;
		$this->_response(REST_Controller::HTTP_OK, $data);
	}

	function submittedOrganizations() {
		$modelName = $this->modelName;
		$data = $this->$modelName->get_all([ 'status' => 12 ]);
		$this->_response(REST_Controller::HTTP_OK, $data);
	}

	function approvedOrganizations() {
		$modelName = $this->modelName;
		$data = $this->$modelName->get_all([ 'status' => 7 ]);
		$this->_response(REST_Controller::HTTP_OK, $data);
	}
}