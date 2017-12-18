<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH. 'core/REST_Controller.php';
class MasterDiagnosticTestCategories extends REST_Controller {
	protected $modelName = 'MasterDiagnosticTestCategoryModel';
	function __construct() {
		parent::__construct();
	}

	public function index() {
		$modelName = $this->modelName;
		$res = $this->$modelName->get_all();
		$this->_response(parent::HTTP_OK, $res);
	}
}