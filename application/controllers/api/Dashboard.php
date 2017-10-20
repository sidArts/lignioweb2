<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH. 'core/REST_Controller.php';
class Dashboard extends REST_Controller {
	protected $modelName = 'BookingModel';
	function __construct() {
		parent::__construct();
	}

	

}