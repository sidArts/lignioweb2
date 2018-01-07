<?php defined('BASEPATH') OR exit('No direct script access allowed');

class OrganizationModel extends MY_Model {

	protected $_table = 'organizations';
	function __construct() {
		parent::__construct();
	}

	public function get_all() {

		$sql = 'SELECT o.*, ct.name as city, st.name as state, cn.name as country, s.name as status FROM organizations o JOIN cities ct JOIN states st JOIN countries cn JOIN status s ON o.city_id = ct.id AND ct.state_id = st.id AND st.country_id = cn.id AND o.status_id = s.id';

		/*$args = func_get_args();
		
		if(isset($args[1]) && is_array($args[1]) && !empty($args[1])) {
			$this->db->select(implode(',', $args[1]));
		}
		if (isset($args) && is_array($args[0]))
			$this->db->where($args[0]);

		$this->db->join('');*/

		return $this->db->query($sql)->result_array();
	}
}