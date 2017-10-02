<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AppController extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$headerData['title']	= "Lignio | Diagnostic Lab Dashboard";
		$data['header']      	= $this->load->view("partials/header", $headerData, TRUE);
		$data['sidebar']      	= $this->load->view("partials/sidebar.php", [], TRUE);	
		$data['heading']     	= "RB Diagnostic Center";
		$data['bookings']		= 21;
        $data['reports']		= 45;
        $data['collection']		= 34;
        $data['rescheduled']	= 10;
		$this->load->view("index", $data);
	}

	public function insert() {
		print "End";
	}
}
