<?php defined('BASEPATH') OR exit('No direct script access allowed');

class LocationManagementModel extends CI_Model {
	function __construct() {
		parent::__construct();
	}

	function getCountryList() {
		return $this->db->get('countries')->result_array();
	}

	function getStateList($country_id) {
		return $this->db->get_where('states', [ 'country_id' => $country_id ])->result_array();
	}

	function getCityList($state_id) {
		return $this->db->get_where('cities', [ 'state_id' => $state_id ])->result_array();
	}
}