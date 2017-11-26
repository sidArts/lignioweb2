<?php defined('BASEPATH') OR exit('No direct script access allowed');

class BookingModel extends MY_Model {
	protected $_table = "bookings";

	public function get_all() {
		$this->load->model('BookingDetailModel');
		$args = func_get_args();
		$this->db->select('b.*, u.firstname, u.lastname, u.phone, s.name as status_desc ');
		$this->db->from('bookings b');
		$this->db->join('end_users u', 'u.end_user_id = b.end_user_id');	
		$this->db->join('status s', 'b.status = s.status_id');	
		if (isset($args) && count($args) > 1 && is_array($args[0]) && count($args[0]) > 0)
			$this->db->where($args);
		$query = $this->db->get();
		if($query->num_rows() > 0):
			$result = $query->result_array();
			foreach ($result as $index => $booking) {
				$bookingDetails = $this->BookingDetailModel->get_all(['booking_id' => $booking['booking_id']]);	
				$result[$index]['bookingDetails'] = $bookingDetails;
			}
			return $result;
		endif;
		return [];
	}

	public function get() {
		$where = func_get_args()[0];
		$this->db->select('b.*, s.name as statusDesc, (select sum(dt.cost) from booking_details bd join diagnostic_tests dt on dt.diagnostic_test_id = bd.diagnostic_test_id where booking_id = '. $where['booking_id'] .') as required_amount');
		$this->db->from('lignio_db.bookings b');
		$this->db->join('status s', 's.status_id = b.status');		
		$this->db->where($where);
		$query = $this->db->get();
		if($query->num_rows() > 0):
			return $query->row_array();
		else:
			return NULL;
		endif;
	}
}