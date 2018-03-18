<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Booking extends MY_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model("BookingModel", "booking");
	}	

	public function index() {
		$this->data['diagnosticLabId'] = 1;
		$this->data['heading']     	   = "RB Diagnostic Center";
		$this->view = "booking/bookingsList";
		
	}

	public function create() {
		$this->data['diagnosticLabId']= 1;
		$this->view = "booking/newBooking";
	}

	public function details($booking_id) {
		$this->data['booking_id'] 	= $booking_id;
		$this->view = "booking/bookingDetails";
	}
}

