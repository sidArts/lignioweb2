<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AppController extends MY_Controller {

	function __construct() {
		parent::__construct();
	}
	public function index()
	{
		$data['heading']     	= "RB Diagnostic Center";
		$data['bookings']		= 21;
        $data['reports']		= 45;
        $data['collection']		= 34;
        $data['rescheduled']	= 10;
		$this->layout->render("index", $data);
	}
}
