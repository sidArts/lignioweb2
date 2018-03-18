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

	public function index() {
		$res = $this->UserModel->get_all([ 'org_id' => $this->userDetails['org_id']]);
		$this->_response(parent::HTTP_OK, $res);
	}

	public function save() {
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