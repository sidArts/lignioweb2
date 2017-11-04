<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH. 'core/REST_Controller.php';
class User extends REST_Controller {
	protected $modelName = 'UserModel';
	public function __construct() {
		parent::__construct();
		$this->load->model('UserModel');
	}	

	public function read_all() {
		$res = $this->UserModel->get_all($this->access_permission_restrict);
		$this->_response(parent::HTTP_OK, $res);
	}

	public function read_all_pathologists() {
		$res = $this->UserModel->get_all_user_by_role_and_organization(3, $this->userDetails['diagnostic_lab_id']);
		$this->_response(parent::HTTP_OK, $res);
	}
}