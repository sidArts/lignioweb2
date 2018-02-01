<?php defined('BASEPATH') OR exit('No direct script access allowed');

class BookingModel extends MY_Model {
	protected $_table = "bookings";

	public function get_all() {
		$this->load->model('BookingDetailModel');
		$args = func_get_args();
		$this->db->select('b.*, u.firstname, u.lastname, u.phone, s.name as status_desc ');
		$this->db->from('bookings b');
		$this->db->join('end_users u', 'u.id = b.end_user_id');	
		$this->db->join('status s', 'b.status_id = s.id');	
		if (isset($args) && count($args) > 1 && is_array($args[0]) && count($args[0]) > 0)
			$this->db->where($args);
		$query = $this->db->get();
		/*if($query->num_rows() > 0):
			$result = $query->result_array();
			foreach ($result as $index => $booking) {
				$bookingDetails = $this->BookingDetailModel->get_all(['booking_id' => $booking['id']]);	
				$result[$index]['bookingDetails'] = $bookingDetails;
			}
			return $result;
		endif;
		return []; */
		return $query->result_array();
	}

	public function get() {
		$args = func_get_args();
		$booking_id = $args[0];
		$sql = sprintf('SELECT `b`.*, `s`.`name` as `statusDesc`, (select sum(odt.cost) from booking_details bd join org_diagnostic_tests odt on odt.id = bd.diagnostic_test_id where bd.booking_id = %s) as required_amount FROM `bookings` `b` JOIN `status` `s` ON `s`.`id` = `b`.`status_id` WHERE `b`.`id` = %s', $booking_id, $booking_id);
		
		$query = $this->db->query($sql);
		if($query->num_rows() > 0):
			return $query->row_array();
		else:
			return NULL;
		endif;
	}


	public function payment()
{
  $sql= 'SELECT b.paid_amount,e.firstname,e.lastname,o.name,od.cost from bookings as b INNER JOIN booking_details as bd on b.id=bd.booking_id INNER JOIN org_diagnostic_tests as od on od.master_diagnostic_test_id=bd.diagnostic_test_id INNER JOIN end_users as e on e.id=b.end_user_id inner JOIN organizations as o on o.id = od.org_id';
  $query = $this->db->query($sql);
  
    return $query->result_array();

}
}