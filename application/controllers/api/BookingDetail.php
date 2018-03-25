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

	public function update_initiate_lab_analysis() {
		$data = json_decode($this->input->raw_input_stream, TRUE);
		$this->BookingDetailModel->update($data['booking_detail_id'], 
			['status_id' => 4]);
		$insertData = [];
		$insertData['booking_detail_id'] = $data['booking_detail_id'];
		$insertData['assigned_at'] 		 = $milliseconds = round(microtime(true) * 1000);
		$insertData['assigned_to'] 		 = $data['assigned_to'];
		$this->db->insert('lab_analysis_details', $insertData);
		$this->_response(parent::HTTP_OK, $this->db->insert_id());
	}

	public function update_complete_lab_analysis() {
		$data = json_decode($this->input->raw_input_stream, TRUE);
		$sql = "select max(id) as lab_analysis_detail_id from lab_analysis_details where booking_detail_id = " . $data['booking_detail_id'];
		$query = $this->db->query($sql);
		$lab_analysis_detail_id = $query->row_array()['lab_analysis_detail_id'];
		$updateData = [];
		$updateData['completed_at'] = $milliseconds = round(microtime(true) * 1000);
		$updateData['status_id']	= $data['status_id'];		
		$this->db->where('id', $lab_analysis_detail_id);
		$this->db->update('lab_analysis_details', $updateData);
		if($data['status_id'] == 7):
			$this->BookingDetailModel->update($data['booking_detail_id'], 
				['status_id' => 5 ]);
		elseif ($data['status_id'] == 8):
			$this->BookingDetailModel->update($data['booking_detail_id'], 
				['status_id' => 3]);
		endif;
		$this->_response(parent::HTTP_OK, $lab_analysis_detail_id);
	}

	public function insert_test_result() {
		$data = json_decode($this->input->raw_input_stream, TRUE);
		$sql = "select max(id) as lab_analysis_detail_id from lab_analysis_details where booking_detail_id = " . $data[0]['booking_detail_id'];
		$query = $this->db->query($sql);
		$lab_analysis_detail_id = $query->row_array()['lab_analysis_detail_id'];
		$test_results_param_id = [];
		foreach ($data as $key => $reportParam) :
			$reportParam['lab_analysis_detail_id'] = $lab_analysis_detail_id;

			$query = $this->db->get_where('diagnostic_test_results', [
				'booking_detail_id' => $reportParam['booking_detail_id'],
				'test_param_id'		=> $reportParam['test_param_id'],
				'lab_analysis_detail_id' => $lab_analysis_detail_id
			]);
			if($query->num_rows() > 0):
				$old_data = $query->row_array();
				$old_data['value'] = $reportParam['value'];
				$this->db->where('id', $old_data['id']);
				$this->db->update('diagnostic_test_results', $old_data);
			else:
				$this->db->insert('diagnostic_test_results', $reportParam);
				$test_results_param_id[$key] = $this->db->insert_id(); 
			endif;
			
			
		endforeach;
		$this->BookingDetailModel->update($data[0]['booking_detail_id'], ['status_id' => 6 ]);
		$this->_response(parent::HTTP_OK, $test_results_param_id);
	}

	public function update_approve_test_param_value() {
		$data = json_decode($this->input->raw_input_stream, TRUE);
		$sql = "select max(id) as lab_analysis_detail_id from lab_analysis_details where booking_detail_id = " . $data['booking_detail_id'];
		$query = $this->db->query($sql);
		$data['lab_analysis_detail_id'] = $query->row_array()['lab_analysis_detail_id'];
		$this->db->where($data);
		$this->db->update('diagnostic_test_results', ['status_id' => 7]);
	}

	public function update_reject_test_param_value() {
		$data = json_decode($this->input->raw_input_stream, TRUE);
		$sql = "select max(id) as lab_analysis_detail_id from lab_analysis_details where booking_detail_id = " . $data['booking_detail_id'];
		$query = $this->db->query($sql);
		$data['lab_analysis_detail_id'] = $query->row_array()['lab_analysis_detail_id'];
		$this->db->where($data);
		$this->db->update('diagnostic_test_results', ['status_id' => 8]);
	}

	public function update_test_report_status() {
		$data = json_decode($this->input->raw_input_stream, TRUE);
		$sql = "select max(id) as lab_analysis_detail_id from lab_analysis_details where booking_detail_id = " . $data['booking_detail_id'];
		$query = $this->db->query($sql);
		$data['lab_analysis_detail_id'] = $query->row_array()['lab_analysis_detail_id'];
		$this->db->where($data);
		$query = $this->db->get('diagnostic_test_results');	

		$isRejected = false;
		foreach($query->result_array() as $key => $value) {
			if($value['status_id'] == 8):
				$isRejected = true;
				break;
			endif;
		}
		if($isRejected):
			$this->BookingDetailModel->update($data['booking_detail_id'], ['status_id' => 14]);
		else:
			/*$query = $this->db->query('SELECT booking_id FROM booking_details bd where bd.id = '. $data['booking_detail_id']);
			$booking_id = $query->row_array()['booking_id'];
			$query = $this->db->query('select sum(cost) as total_amount from org_diagnostic_tests where id in ( select diagnostic_test_id from booking_details where booking_id = '. $booking_id .')');
			$total_amount = $query->row_array()['total_amount'];
			$query = $this->db->query('select paid_amount from bookings where id = ' . $booking_id);
			$paid_amount = $query->row_array()['paid_amount'];
			if(($total_amount - $paid_amount) > 0):
				$this->BookingDetailModel->update($data['booking_detail_id'], ['status_id' => 9]);
			else:
				$this->BookingDetailModel->update($data['booking_detail_id'], ['status_id' => 10]);
			endif;*/
			$this->BookingDetailModel->update($data['booking_detail_id'], ['status_id' => 7]);
		endif;
	}
}