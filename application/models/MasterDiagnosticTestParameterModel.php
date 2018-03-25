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

	public function getTestParameterWithValueByBookingDetailId($diagnostic_test_id, $booking_detail_id) {
		$sql = "select max(id) as lab_analysis_detail_id from lab_analysis_details where booking_detail_id = " . $booking_detail_id;
		$query = $this->db->query($sql);

		if($query->num_rows() > 0):
			$lab_analysis_detail_id = $query->row_array()['lab_analysis_detail_id'];
			$sql = 'SELECT tp.*, dtr.value, dtr.status_id, dtr.is_alarming, mu.description as unit, mu.short_form as unit_short_form, it.name as form_input_type FROM master_diagnostic_test_params tp JOIN measurement_units mu JOIN form_input_types it LEFT JOIN	diagnostic_test_results dtr ON mu.id = tp.measurement_unit_id and it.id = tp.input_type_id and dtr.test_param_id = tp.id WHERE tp.master_diagnostic_test_id = ? AND dtr.lab_analysis_detail_id = ?';
			$query = $this->db->query($sql, [$diagnostic_test_id, $lab_analysis_detail_id]);
			return $query->result_array();
		else:
			$sql = 'SELECT tp.*, mu.description as unit, mu.short_form as unit_short_form, it.name as form_input_type FROM master_diagnostic_test_params tp JOIN measurement_units mu JOIN form_input_types it ON mu.id = tp.measurement_unit_id and it.id = tp.input_type_id WHERE tp.master_diagnostic_test_id = ?';
			$query = $this->db->query($sql, $diagnostic_test_id);
			return $query->result_array();		
		endif;

		

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