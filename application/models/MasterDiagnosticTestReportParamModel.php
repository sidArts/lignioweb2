<?php defined('BASEPATH') OR exit('No direct script access allowed');

class MasterDiagnosticTestReportParamModel extends MY_Model {
	protected $_table = "master_diagnostic_test_params";

	function __construct() {
		parent::__construct();
	}

	public function getReportParamByDiagnosticLabId($diagnostic_test_id) {
		$query = $this->db->get_where($this->_table, [ 
			'diagnostic_test_id' => $diagnostic_test_id 
		]);
		return $query->result_array();
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