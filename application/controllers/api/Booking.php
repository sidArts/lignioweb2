<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH. 'core/REST_Controller.php';
class Booking extends REST_Controller {
	protected $modelName = 'BookingModel';
	public function __construct() {
		parent::__construct();
		$this->load->model('BookingModel');
	}	

	public function read_all() {
		$res 	= $this->BookingModel->get_all($this->access_permission_restrict);
		$this->_response(parent::HTTP_OK, $res);
	}

	public function create_offline_booking() {	
		$this->load->model('EndUserModel');
		$this->load->model('BookingDetailModel');
		$data 		= json_decode($this->input->raw_input_stream, TRUE);
		$booking 	= [];		
		$user 		= $this->EndUserModel->get([ 'phone' => $data['phone'] ], ['end_user_id']);
		
		if(!$user):
			$user = [];
			$user['end_user_id'] = $this->EndUserModel->insert([ 
				'firstname'			=> $data['firstname'],
				'lastname'			=> $data['lastname'],
				'phone' 			=> $data['phone']
			]);
			if(!$user['end_user_id']):
				$this->_response(parent::HTTP_BAD_REQUEST);
			endif;
		endif;
		$booking['end_user_id'] 		= $user['end_user_id'];
		$booking['diagnostic_lab_id'] 	= $this->userDetails['diagnostic_lab_id'];
		$booking['booking_type']		= 'Offline';
		$booking['booking_creator_id'] 	= $this->userDetails['user_id'];
		$booking['status']				= 1;
		$insertedBookingId 				= $this->BookingModel->insert($booking);
		if(!$insertedBookingId):
			$this->_response(parent::HTTP_BAD_REQUEST);
		endif;
		foreach($data['diagnosticTests'] as $diagnosticTest):
			$bookingDetails 						= [];
			$bookingDetails['booking_id'] 			= $insertedBookingId;
			$bookingDetails['diagnostic_test_id'] 	= $diagnosticTest['diagnostic_test_id'];
			$this->BookingDetailModel->insert($bookingDetails);
		endforeach;
		$this->_response(REST_Controller::HTTP_CREATED, $insertedBookingId);
	}

	public function read($booking_id) {
		$this->load->model('BookingDetailModel');
		$this->access_permission_restrict['booking_id'] = $booking_id;
		$data = $this->BookingModel->get($this->access_permission_restrict);
		if($data != NULL):
			$bookingDetails = $this->BookingDetailModel->get_all(['booking_id' => $booking_id]);	
			$data['bookingDetails'] = $bookingDetails;
			$this->_response(parent::HTTP_OK, $data);                                                  
		else:
			$this->_response(parent::HTTP_NO_CONTENT);		
		endif;
	}
}