<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH. 'core/REST_Controller.php';
class DiagnosticTest extends REST_Controller {
	protected $modelName = 'DiagnosticTestModel';
	function __construct() {
		parent::__construct();
	}
}