<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Testinfo extends CI_Controller {

	public function getAll() {
		$this->db->select();
		$this->db->from("test_information");
		$query  = $this->db->get();
		$result = ($query->num_rows() > 0) ? $query->result() : [];
		$this->output
		->set_content_type('application/json')
		->set_output(json_encode($result));
	}

	public function insert() {
		$data = file_get_contents('php://input');
		$data = json_decode($data);
		$this->db->insert("test_information", $data);
    	print $this->db->insert_id();
	}

}
