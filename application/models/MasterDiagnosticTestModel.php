<?php defined('BASEPATH') OR exit('No direct script access allowed');

class MasterDiagnosticTestModel extends MY_Model {
	protected $_table = "master_diagnostic_tests";

	public function get_all() {
		$sql = 'SELECT dt.*,c.name as category_desc FROM master_diagnostic_tests dt join diagnostic_test_categories c on dt.category_id = c.id';
		
		return $this->db->query($sql)->result_array();
	}

	public function getOrgSpecificDiagnosticTests() {
		
	}
}