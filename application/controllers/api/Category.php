<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH. 'core/REST_Controller.php';
class Category extends REST_Controller {
	protected $modelName = 'CategoryModel';
	function __construct() {
		parent::__construct();
	}
}