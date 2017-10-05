<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Model extends CI_Model {

	function __construct() {
		parent::__construct();
	}

	public $before_create = array('setCreateAndUpdateDate');
	public $before_update = array('setUpdateDate');
	
	public $after_create  = array();
	public $after_update  = array();

	public function get() {
		
		$args = func_get_args();
		
		if (count($args) > 1 || is_array($args[0]))
			$this->db->where($args);
		else
			$this->db->where('id', $args[0]);
		
		return $this->db->get($this->_table)->row();
	}


	public function get_all() {
		$args = func_get_args();
		
		if (isset($args) && count($args) > 1 && is_array($args[0]))
			$this->db->where($args);

		return $this->db->get($this->_table)->result();
	}
	public function insert($data) {

		$data = $this->observe('before_create', $data);

		$success = $this->db->insert($this->_table, $data);
		if ($success)
		{
			$data = $this->observe('after_create', $data);
			return $this->db->insert_id();
		}
		else
		{
			return FALSE;
		}
	}

	public function update()
	{
		$args = func_get_args();
		if (is_array($args[0]))
		{
			$this->db->where($args);
		}
		else{
			$this->db->where('id', $args[0]);
		}

		$data = $this->observe('before_update', $args[1]);		
		$this->db->update($this->_table, $args[1]);

		if($this->db->affected_rows() > 0) {
			$data = $this->observe('after_update', $args[1]);	
		}
	}
	public function delete()
	{
		$args = func_get_args();
		if (count($args) > 1 || is_array($args[0]))
			$this->db->where($args);
		else
			$this->db->where('id', $args[0]);
		return $this->db->delete($this->_table);
	}

	public function observe($event, $data)
	{
		if (isset($this->$event) && is_array($this->$event))
		{
			foreach ($this->$event as $method)
			{
				$data = call_user_func_array(array($this, $method), array($data));
			}
		}
		return $data;
	}

	public function setCreateAndUpdateDate($data) {
		$data['created_at'] = $data['updated_at'] = date('Y-m-d H:i:s');
		$data['is_active']  = 1;
		return $data;
	}

	public function setUpdateDate($data) {
		$data['updated_at'] = date('Y-m-d H:i:s');
		return $data;
	}
}