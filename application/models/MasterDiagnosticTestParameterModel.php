<?php defined('BASEPATH') OR exit('No direct script access allowed');

class MasterDiagnosticTestParameterModel extends MY_Model {
	protected $_table = "master_diagnostic_test_params";

	function __construct() {
		parent::__construct();
	}

	public function getReportParamByDiagnosticTestId($diagnostic_test_id) {
		$sql = 'SELECT tp.*, mu.description as unit, mu.short_form as unit_short_form, it.name as form_input_type FROM master_diagnostic_test_params tp JOIN measurement_units mu JOIN form_input_types it ON mu.id = tp.measurement_unit_id and it.id = tp.input_type_id WHERE tp.master_diagnostic_test_id = ?';
		$query = $this->db->query($sql, $diagnostic_test_id);
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