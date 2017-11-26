<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH. 'core/REST_Controller.php';
class BookingDetail extends REST_Controller {
	protected $modelName = 'BookingDetailModel';
	public function __construct() {
		parent::__construct();
		$this->load->model('BookingDetailModel');
	}	

	public function index() {
		$this->_response(parent::HTTP_NOT_FOUND);
	}

	public function get_by_booking_id($booking_id) {
		$model = $this->modelName;
		$res = $this->$model->get_all([ 'booking_id' => $booking_id ]);
		$this->_response(parent::HTTP_OK, $res);
	}
}