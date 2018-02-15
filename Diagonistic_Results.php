<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Diagnostic_Test_results extends MY_Model {

	protected $_table = "Diagnostic_Test_results";
	
   public function testResults()
   { 
        $sql="SELECT bd.id,bd.booking_id,m.value,m.is_alarming,o.name,o.healthy_range,o.measurement_unit_id ,b.end_user_id,mdt.specimen,mdt.description,concat(eu.firstname, if(eu.middlename is null or eu.middlename = '', ' ', concat(' ', eu.middlename, ' ')) , eu.lastname)as fullname, bd.diagnostic_test_id, mdt.name as diagnostic_test, b.status_id, st.name as status_name, bd.created_at, bd.updated_at FROM booking_details bd join bookings b on bd.booking_id = b.id join status st on st.id = bd.status_id JOIN diagnostic_test_results as m on m.booking_id=bd.booking_id join org_diagnostic_tests odt on odt.id = bd.diagnostic_test_id join master_diagnostic_tests mdt on mdt.id = odt.master_diagnostic_test_id join end_users eu on eu.id = b.end_user_id JOIN master_diagnostic_test_params o on o.master_diagnostic_test_id=mdt.category_id where odt.org_id=".$booking_id";
     	$query = $this->db->query($sql);
		return $query->result_array();
   }
}
