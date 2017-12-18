<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH. 'core/REST_Controller.php';
class MeasurementUnits extends REST_Controller {
	protected $modelName = 'MeasurementUnitModel';
	function __construct() {
		parent::__construct();
	}
}