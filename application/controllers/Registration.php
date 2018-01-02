	<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Registration extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->library('Layout', [
			'styles'  => [ "bootstrap.min.css", "font-awesome.css" ],
			'scripts' => [ "jquery.min.js", "bootstrap.min.js", "angular/angular.js", "bootbox.js" ]
		]);
		$this->load->model("OrganizationModel", "organization");
	}	

	function employee() {		
		// $this->view = 'register';
		$this->layout->render('Registration/employee', []);
	}

	function organization() {		
		// $this->view = 'register';
		$this->layout->render('Registration/organization', []);
	}

}