<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Model extends CI_Model {

	function __construct() {
		parent::__construct();
	}

	protected $_primary_key  = 'id';
	protected $_table_alias	 = '';
	public $before_create = array('setCreateAndUpdateDate');
	public $before_update = array('setUpdateDate');
	
	public $after_create  = array();
	public $after_update  = array();

	public function getPrimaryKey() {
		return $this->_primary_key;
	}

	public function getTableAlias() {
		return $this->_table_alias;
	}

	public function get() {
		
		$args = func_get_args();
		
		if(isset($args[1]) && is_array($args[1])) {
			$this->db->select(implode(',', $args[1]));
		}
		if (count($args) > 1 || is_array($args[0]))
			$this->db->where($args[0]);
		else
			$this->db->where('id', $args[0]);
		
		return $this->db->get($this->_table . ' ' .$this->_table_alias)->row_array();
	}


	/* @param $argument[0] @desc where conditions for fetching data
	 * @param $argument[1] @desc columns to be fetched
	 */
	public function get_all() {
		$args = func_get_args();
		
		if(isset($args[1]) && is_array($args[1]) && !empty($args[1])) {
			$this->db->select(implode(',', $args[1]));
		}
		if (isset($args) && is_array($args[0]))
			$this->db->where($args[0]);

		return $this->db->get($this->_table)->result_array();
	}
	public function insert($data) {

		$data = $this->observe('before_create', $data);

		$this->db->insert($this->_table, $data);
		if ($this->db->affected_rows() > 0)
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
			$this->db->where($this->_table_alias . '.' .$this->_primary_key, $args[0]);
		}

		$data = $this->observe('before_update', $args[1]);		
		$this->db->update($this->_table . ' ' .$this->_table_alias, $args[1]);

		if($this->db->affected_rows() > 0) {
			$data = $this->observe('after_update', $args[1]);	
			return true;
		}
		return false;
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

	/*public function setCreateAndUpdateDate($data) {
		$data['created_at'] = $data['updated_at'] = date('Y-m-d H:i:s');
		$data['is_active']  = 1;
		return $data;
	}

	public function setUpdateDate($data) {
		$data['updated_at'] = date('Y-m-d H:i:s');
		return $data;
	}*/

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