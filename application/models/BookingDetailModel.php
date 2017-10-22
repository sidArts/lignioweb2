<?php defined('BASEPATH') OR exit('No direct script access allowed');

class BookingDetailModel extends MY_Model {
	protected $_table = "booking_details";

	public function get_all() {
		$args = func_get_args();
		$this->db->select('bd.*, dt.name, dt.cost, dt.specimen, s.name as statusDesc');
		$this->db->from('booking_details bd');
		$this->db->join('diagnostic_tests dt', 'dt.diagnostic_test_id = bd.diagnostic_test_id');
		$this->db->join('status s', 's.status_id = bd.status');
		if (isset($args) && is_array($args[0]) && count($args[0]) > 0):
			$this->db->where($args[0]);
		endif;
		$query = $this->db->get();
		if($query->num_rows() > 0)
			return $query->result_array();
		else
			return [];
	}
}