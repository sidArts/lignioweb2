<?php defined('BASEPATH') OR exit('No direct script access allowed');

class DiagnosticTestModel extends MY_Model {
	protected $_table = "org_diagnostic_tests";

	/*public function get_all() {
		$args = func_get_args();
		
		if(isset($args[1]) && is_array($args[1]) && !empty($args[1])) {
			$this->db->select(implode(',', $args[1]));
		}
		if (isset($args) && is_array($args[0]))
			$this->db->where($args[0]);

		return $this->db->get($this->_table)->result_array();
	}	*/
}