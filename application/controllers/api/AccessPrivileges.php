<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH. 'core/REST_Controller.php';
class AccessPrivileges extends REST_Controller {
	protected $modelName = 'AccessPrivilegesModel';
	public function __construct() {
		parent::__construct();
		$this->load->model($this->modelName);
	}
	public function index() {
		$model = $this->modelName;
		$res = $this->$model->get_all();
		$this->_response(REST_Controller::HTTP_OK, $res);
	}
}