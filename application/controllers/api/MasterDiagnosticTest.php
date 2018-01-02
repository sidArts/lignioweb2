<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH. 'core/REST_Controller.php';
class MasterDiagnosticTest extends REST_Controller {
	protected $modelName = 'MasterDiagnosticTestModel';
	function __construct() {
		parent::__construct();
	}

	function read_OrgSpecificMasterDiagnosticTest() {
		
	}
}