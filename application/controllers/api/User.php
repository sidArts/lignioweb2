<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH. 'core/REST_Controller.php';
class User extends REST_Controller {
	protected $modelName = 'UserModel';
	public function __construct() {
		parent::__construct();
		$this->load->model('UserModel', 'user');
		$this->escapeTokenFilter = [ 'save' ];
	}	

	public function read_all() {
		$res = $this->UserModel->get_all($this->access_permission_restrict);
		$this->_response(parent::HTTP_OK, $res);
	}

	public function read_all_pathologists() {
		$res = $this->UserModel->get_all_user_by_role_and_organization(3, $this->userDetails['diagnostic_lab_id']);
		$this->_response(parent::HTTP_OK, $res);
	}

	function save() {
		$modelName = $this->modelName;
		if($this->input->method() == 'post'):
			$data = json_decode($this->input->raw_input_stream, TRUE);
			$insertedId = $this->user->insert($data);	
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
}