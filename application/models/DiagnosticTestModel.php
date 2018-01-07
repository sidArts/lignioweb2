<?php defined('BASEPATH') OR exit('No direct script access allowed');

class DiagnosticTestModel extends MY_Model {
	protected $_table = "org_diagnostic_tests";

	public function get_all() {
		$sql = sprintf('SELECT odt.id, odt.org_id, mdt.name, mdt.description, odt.cost, mdt.specimen, dtc.name as category, odt.created_at, odt.updated_at, odt.is_active FROM org_diagnostic_tests odt JOIN master_diagnostic_tests mdt JOIN diagnostic_test_categories dtc ON odt.master_diagnostic_test_id = mdt.id AND mdt.category_id = dtc.id WHERE odt.org_id = %s', $this->userDetails['org_id']);
		$query = $this->db->query($sql);
		return $query->result_array();
	}
}