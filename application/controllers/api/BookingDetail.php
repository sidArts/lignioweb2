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
		$model = $this->modelName;
		$res = $this->$model->get_by_org($this->userDetails['org_id']);
		$this->_response(parent::HTTP_OK, $res);
	}

	public function get_by_booking_id($booking_id) {
		$model = $this->modelName;
		$res = $this->$model->get_all();
		$this->_response(parent::HTTP_OK, $res);
	}

	public function update_initiate_sample_collection() {
		$data = json_decode($this->input->raw_input_stream, TRUE);
		$this->BookingDetailModel->update($data['booking_detail_id'], 
			['status_id' => 2]);
		// print $this->db->last_query();
		// exit;
		$insertData = [];
		$insertData['booking_detail_id'] = $data['booking_detail_id'];
		$insertData['assigned_at'] 		 = $milliseconds = round(microtime(true) * 1000);
		$insertData['assigned_to'] 		 = $data['assigned_to'];
		$this->db->insert('sample_collection_details', $insertData);

		$this->_response(parent::HTTP_OK, $this->db->insert_id());
	}

	public function update_complete_sample_collection() {
		$data = json_decode($this->input->raw_input_stream, TRUE);
		$sql = "select max(id) as sample_collection_id from sample_collection_details where booking_detail_id = " . $data['booking_detail_id'];
		$query = $this->db->query($sql);
		$sample_collection_id = $query->row_array()['sample_collection_id'];
		$updateData = [];
		$updateData['completed_at'] = $milliseconds = round(microtime(true) * 1000);
		$updateData['status_id']	= $data['status_id'];		
		$this->db->where('id', $sample_collection_id);
		$this->db->update('sample_collection_details', $updateData);
		if($data['status_id'] == 7):
			$this->BookingDetailModel->update($data['booking_detail_id'], 
				['status_id' => 3 ]);
		elseif ($data['status_id'] == 8):
			$this->BookingDetailModel->update($data['booking_detail_id'], 
				['status_id' => 1]);
		endif;
		$this->_response(parent::HTTP_OK, $sample_collection_id);
	}

	public function update_for_lab_analysis() {
		$data = json_decode($this->input->raw_input_stream, TRUE);
		$this->BookingDetailModel->update($data['booking_detail_id'], 
			['status_id' => 4]);
		$insertData = [];
		$insertData['booking_detail_id'] = $data['booking_detail_id'];
		$insertData['assigned_at'] 		 = $milliseconds = round(microtime(true) * 1000);
		$insertData['assigned_to'] 		 = $data['assigned_to'];
		$this->db->insert('sample_collection_details', $insertData);

		$this->_response(parent::HTTP_OK, $this->db->insert_id());
	}
}