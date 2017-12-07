<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller {

	function __construct() {
		parent::__construct();
	}
	public function index()
	{
		$this->data['bookings']		= 21;
        $this->data['reports']		= 45;
        $this->data['collection']	= 34;
        $this->data['rescheduled']	= 10;
	}

	
}
