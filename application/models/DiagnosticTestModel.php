<?php defined('BASEPATH') OR exit('No direct script access allowed');

class DiagnosticTestModel extends MY_Model {
	protected $_table = "org_diagnostic_tests";

	public function get_all() {
		$sql = sprintf('SELECT odt.id, odt.org_id, mdt.name, mdt.description, odt.cost, mdt.specimen, dtc.name as category, odt.created_at, odt.updated_at, odt.is_active FROM org_diagnostic_tests odt JOIN master_diagnostic_tests mdt JOIN diagnostic_test_categories dtc ON odt.master_diagnostic_test_id = mdt.id AND mdt.category_id = dtc.id WHERE odt.org_id = %s', $this->userDetails['org_id']);
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function get_testResults() {
		$sql = "SELECT bd.id, bd.booking_id, b.end_user_id, concat(eu.firstname, if(eu.middlename is null or eu.middlename = '', ' ', concat(' ', eu.middlename, ' ')) , eu.lastname) as fullname, bd.diagnostic_test_id, mdt.name as diagnostic_test, b.status_id, st.name as status_name, bd.created_at, bd.updated_at FROM booking_details bd join bookings b on bd.booking_id = b.id join status st on st.id = bd.status_id join org_diagnostic_tests odt on odt.id = bd.diagnostic_test_id join master_diagnostic_tests mdt on mdt.id = odt.master_diagnostic_test_id join end_users eu on eu.id = b.end_user_id where odt.org_id = " . $this->userDetails['org_id'];
		$query = $this->db->query($sql);
		$testResultList = $query->result_array();
		return $testResultList;		
	}
}