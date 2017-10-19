<?php defined('BASEPATH') OR exit('No direct script access allowed');

class BookingModel extends MY_Model {
	protected $_table = "bookings";

	public function get_all() {
		$args = func_get_args();
		$this->db->select('b.*, u.firstname, u.lastname ');
		$this->db->from('bookings b');
		$this->db->join('users u', 'u.user_id = b.user_id');	
		if (isset($args) && count($args) > 1 && is_array($args[0]))
			$this->db->where($args);

		return $this->db->get()->result();
	}
}