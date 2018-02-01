<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH. 'core/REST_Controller.php';
class Status extends REST_Controller {
	protected $modelName = 'StatusModel';
	function __construct() {
		parent::__construct();
	}
}