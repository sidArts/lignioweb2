<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH. 'core/REST_Controller.php';
class Booking extends REST_Controller {
	protected $modelName = 'BookingModel';
	public function __construct() {
		parent::__construct();
	}	

	public function index() {
		$model 	= $this->modelName;
		// $res 	= $this->$model->get_all([ 'diagnostic_lab_id' => $this->userDetails['diagnostic_lab_id'] ]);
		$res 	= $this->$model->get_all($this->access_permission_restrict);
		$this->_response(REST_Controller::HTTP_OK, $res);
	}

	public function create_offline_booking() {	
		$this->load->model('UserModel');
		$this->load->model('BookingDetailModel');
		$model 		= $this->modelName;
		$data 		= json_decode($this->input->raw_input_stream, TRUE);
		$booking 	= [];		
		$user 		= $this->UserModel->get([ 'phone' => $data['phone'] ], ['user_id']);
		
		if(!$user):
			$user = [];
			$user['user_id'] = $this->UserModel->insert([ 
				'firstname'			=> $data['firstname'],
				'lastname'			=> $data['lastname'],
				'phone' 			=> $data['phone'], 
				'is_first_login' 	=> 'Y' 
			]);
			print $user['user_id']; exit;
			if(!$user['user_id']):
				$this->_response(parent::HTTP_BAD_REQUEST);
			endif;
		endif;
		$booking['user_id'] 			= $user['user_id'];
		$booking['diagnostic_lab_id'] 	= $this->userDetails['diagnostic_lab_id'];
		$booking['booking_type']		= 'Offline';
		$insertedBookingId 				= $this->$model->insert($booking);
		if(!$insertedBookingId):
			$this->_response(parent::HTTP_BAD_REQUEST);
		endif;
		foreach($data['checkedDiagnosticTestIds'] as $diagnosticTestId):
			$bookingDetails 						= [];
			$bookingDetails['booking_id'] 			= $insertedBookingId;
			$bookingDetails['diagnostic_test_id'] 	= $diagnosticTestId;
			$this->BookingDetailModel->insert($bookingDetails);
		endforeach;
		$this->_response(REST_Controller::HTTP_CREATED, $insertedBookingId);
	}
}