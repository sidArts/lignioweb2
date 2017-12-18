<?php defined('BASEPATH') OR exit('No direct script access allowed');

class MasterDiagnosticTestCategoryModel extends MY_Model {
	protected $_table = "diagnostic_test_categories";

	public function get_all() {
		$sql = 'SELECT *, (select count(*) from lignio_db.master_diagnostic_tests dt where dt.category_id = c.id) as diagnostic_test_count  FROM lignio_db.diagnostic_test_categories c';
		return $this->db->query($sql)->result_array();
	}

	public function setCreateAndUpdateDate($data) {
		$data['created_at'] = $data['updated_at'] = (time() * 1000);
		$data['is_active']  = 1;
		return $data;
	}

	public function setUpdateDate($data) {
		$data['updated_at'] = (time() * 1000);
		return $data;
	}
}