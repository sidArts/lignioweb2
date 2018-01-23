<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH. 'core/REST_Controller.php';
class UserRoles extends REST_Controller {
	protected $modelName = 'OrgRolesModel';
	public function __construct() {
		parent::__construct();
		$this->load->model($modelName);
	}	
}