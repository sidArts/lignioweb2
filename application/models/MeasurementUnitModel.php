<?php defined('BASEPATH') OR exit('No direct script access allowed');

class MeasurementUnitModel extends MY_Model {
	protected $_table = "measurement_units";

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