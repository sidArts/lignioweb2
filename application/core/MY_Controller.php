<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

	public function __construct() {
		parent::__construct();		
		$this->load->library("Layout", "layout");
	}

	public function _remap($method, $params = []) {		
		if (method_exists($this, $method)):
			$token = NULL;
			if($this->input->get_request_header('Authorization') != NULL):
				$token = $this->input->get_request_header('Authorization');
			elseif($this->input->post('Authorization') != NULL):
				$token = $this->input->post('Authorization');
			else:
				print 'Missing Authorization token!';
				exit;
			endif;
			$query = $this->db->get_where('jwt', [ 'token' => $token ]);
			$tokenDetails = $query->row_array();
			if($query->num_rows() > 0):
				$tokenString = $this->_encryptDecrypt("decrypt", $tokenDetails['token']);
				$this->userDetails = json_decode($tokenString, TRUE);
				$milliseconds = round(microtime(true) * 1000);
				if($tokenDetails['expiry'] < $milliseconds) {
					$this->db->where('token', $token);
					$this->db->delete('jwt');
					print 'Your session has expired!';
				} else {					
					$this->db->where('token', $token);
					$this->db->update('jwt', [ 'expiry' => $milliseconds + (0.5 * 60 * 1000) ]);
					if($this->db->affected_rows() == 1) {
						$this->data = [ 'token' => $token ];
						$this->output->set_header('Authorization: '. $token);
						call_user_func_array(array($this, $method), $params);					
					} else {
						print 'Authorization token could not be updated!'; exit;
					}
				}
			else:
				print 'Invalid Authorization header'; exit;
			endif;
		else:
			show_404();	
		endif;
		
	}

	public function _encryptDecrypt($action, $string) {
		$output = false;
		$encrypt_method = "AES-256-CBC";
		$secret_key = 'This is my secret key';
		$secret_iv = 'This is my secret iv';
    	// hash
		$key = hash('sha256', $secret_key);

    	// iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
		$iv = substr(hash('sha256', $secret_iv), 0, 16);
		if ( $action == 'encrypt' ) {
			$output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
			$output = base64_encode($output);
		} else if( $action == 'decrypt' ) {
			$output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
		}
		return $output;
	}

}