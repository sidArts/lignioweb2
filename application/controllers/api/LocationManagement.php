<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LocationManagement extends CI_Controller {
	
	function __construct() {
		parent::__construct();	
		$this->load->model('LocationManagementModel', 'locationManagement');
	}

	function getCountries() {
		$data = json_encode($this->locationManagement->getCountryList());
		$this->output->set_content_type('application/json')->set_output($data);
	}
	function getStates($country_id) {
		$data = json_encode($this->locationManagement->getStateList($country_id));
		$this->output->set_content_type('application/json')->set_output($data);
	}
	function getCities($state_id) {
		$data = json_encode($this->locationManagement->getCityList($state_id));
		$this->output->set_content_type('application/json')->set_output($data);
	}
}