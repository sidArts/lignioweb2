<?php defined('BASEPATH') OR exit('No direct script access allowed');

class BookingDetailModel extends MY_Model {
	protected $_table = "booking_details";
	protected $_primary_key = 'id';
	protected $_table_alias = 'bd';
	public function get_all() {
		$args = func_get_args();
		$this->db->select('bd.*, mdt.name, dt.cost, mdt.specimen, s.name as statusDesc');
		$this->db->from('booking_details bd');		
		$this->db->join('org_diagnostic_tests dt', 'dt.id = bd.diagnostic_test_id');
		$this->db->join('master_diagnostic_tests mdt', 'mdt.id = dt.master_diagnostic_test_id');
		$this->db->join('status s', 's.id = bd.status_id');
		if (isset($args) && is_array($args[0]) && count($args[0]) > 0):
			$this->db->where($args[0]);
		endif;
		$query = $this->db->get();
		if($query->num_rows() > 0)
			return $query->result_array();
		else
			return [];
	}

	public function get() {
		
		$args = func_get_args();
		
		$this->db->select('bd.*, dt.name, dt.cost, dt.specimen, s.name as statusDesc, u.firstname as assignee_firstname, u.lastname as assignee_lastname, u.phone as assignee_phone ');
		$this->db->from($this->_table . ' '. $this->_table_alias);
		$this->db->join('diagnostic_tests dt', 'dt.diagnostic_test_id = bd.diagnostic_test_id');
		$this->db->join('status s', 's.status_id = bd.status');
		$this->db->join('users u', 'u.user_id = bd.assigned_to', 'left');
		if(isset($args[1]) && is_array($args[1])) {
			$this->db->select(implode(',', $args[1]));
		}
		if (count($args) > 1 || is_array($args[0]))
			$this->db->where($args[0]);
		else
			$this->db->where('id', $args[0]);
		
		return $this->db->get()->row_array();
	}

	public function get_by_org($org_id) {
		$sql = "SELECT bd.id, bd.booking_id, b.end_user_id, concat(eu.firstname, if(eu.middlename is null or eu.middlename = '', ' ', concat(' ', eu.middlename, ' ')) , eu.lastname) as fullname, bd.diagnostic_test_id, mdt.name as diagnostic_test, mdt.id as master_diagnostic_test_id, bd.status_id, st.name as status_name, bd.created_at, bd.updated_at FROM booking_details bd join bookings b on bd.booking_id = b.id join status st on st.id = bd.status_id join org_diagnostic_tests odt on odt.id = bd.diagnostic_test_id join master_diagnostic_tests mdt on mdt.id = odt.master_diagnostic_test_id join end_users eu on eu.id = b.end_user_id where odt.org_id = " . $org_id;
		$query = $this->db->query($sql);
		$testResultList = $query->result_array();
		return $testResultList;		
	}
}