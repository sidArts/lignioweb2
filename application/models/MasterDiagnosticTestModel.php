<?php defined('BASEPATH') OR exit('No direct script access allowed');

class MasterDiagnosticTestModel extends MY_Model {
	protected $_table = "master_diagnostic_tests";

	public function get_all() {
		$sql = 'SELECT dt.*,c.name as category_desc FROM master_diagnostic_tests dt join diagnostic_test_categories c on dt.category_id = c.id';
		
		return $this->db->query($sql)->result_array();
	}

	public function getOrgSpecificDiagnosticTests($org_id) {
		$sql = sprintf('SELECT c.name as category,mdt.*,(select count(odt.id) from org_diagnostic_tests odt where odt.master_diagnostic_test_id = mdt.id and org_id = %s) as isAdded FROM master_diagnostic_tests mdt JOIN diagnostic_test_categories c ON c.id = mdt.category_id ', $org_id);
		$query = $this->db->query($sql);
		$masterDiagnosticTests = $query->result_array();
		foreach ($masterDiagnosticTests as $index => $masterDiagnosticTest) {
			$q = $this->db->get_where('master_diagnostic_test_params', [ 
				'master_diagnostic_test_id' => $masterDiagnosticTest['id'] 
			]);
			$masterDiagnosticTests[$index]['laboratoryParameters'] = $q->result_array();
		}
		return $masterDiagnosticTests;
	}
}