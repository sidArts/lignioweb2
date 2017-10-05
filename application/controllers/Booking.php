<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Booking extends MY_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model("BookingModel", "booking");
	}

	public function getAll($diagnosticLabId) {
		$config = array(
			"method"   => "GET"
		);
		$this->_validateRequest($config);
		$this->output
		     	->set_content_type('application/json')
			 	->set_output(json_encode($this->booking->get_all([ "diagnostic_lab_id" => $diagnosticLabId ])));
	}

	public function index() {
		$data['diagnosticLabId']= 1;
		$data['heading']     	= "RB Diagnostic Center";
		$this->layout->render("booking/bookingsList", $data);
	}

	public function newBooking() {
		$data['diagnosticLabId']= 1;
		$data['heading']     	= "RB Diagnostic Center";
		$this->layout->render("booking/newBooking", $data);
	}

	public function _validateRequest($config) {
		if(isset($config['method']) && $_SERVER['REQUEST_METHOD'] != $config['method']) {
		    $this->output
		         ->set_status_header(405)
		         ->_display();
		    exit;
		}
		if(isset($config['dataType']) && $_SERVER['CONTENT_TYPE'] != $config['dataType']) {
		    $this->output
		         ->set_status_header(415)
		         ->_display();
		    exit;
		}
	}
}

