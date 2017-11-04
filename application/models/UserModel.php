<?php defined('BASEPATH') OR exit('No direct script access allowed');

class UserModel extends MY_Model {
	protected $_table = "users";

	public function get_all_user_by_role_and_organization($role_id, $diagnostic_lab_id) {
		$this->db->select('u.user_id, u.firstname, u.lastname, u.phone');
		$this->db->from('users u');
		$this->db->join('user_role ur', 'u.user_id = ur.user_id');
		$this->db->join('user_org_map uom', 'ur.user_id = uom.user_id');
		$this->db->where([
			'role_id' 			=> $role_id,
			'diagnostic_lab_id' => $diagnostic_lab_id
		]);

		$query = $this->db->get();
		if($query->num_rows() > 0):
			return $query->result_array();
		else:
			return [];
		endif;
	}
}