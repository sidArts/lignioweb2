<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	const HTTP_OK						= 200;
	const HTTP_CREATED					= 200;
	const HTTP_NO_CONTENT				= 204;

	const HTTP_BAD_REQUEST				= 400;
	const HTTP_UNAUTHORIZED				= 401;
	const HTTP_FORBIDDEN				= 403;
	const HTTP_NOT_FOUND				= 404;
	const HTTP_METHOD_NOT_ALLOWED		= 405;
	const HTTP_NOT_ACCEPTABLE			= 406;
	const HTTP_UNSUPPORTED_MEDIA_TYPE	= 415;
	const HTTP_INTERNAL_SERVER_ERROR	= 500;
	const HTTP_MIME_TYPE_JSON			= 'application/json';
	const HTTP_MIME_TYPE_TEXT			= 'text/html';
	const TOKEN_EXPIRY 					= (60 * 60 * 1000);

	public function _remap($method, $params = []) {		
		if (method_exists($this, $method) && $method != 'login'):
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
			
			if($query->num_rows() > 0):
				$tokenDetails = $query->row_array();
				$tokenString = $this->_encryptDecrypt("decrypt", $tokenDetails['token']);
				$this->userDetails = json_decode($tokenString, TRUE);
				$milliseconds = round(microtime(true) * 1000);
				if($tokenDetails['expiry'] < $milliseconds):
					$this->db->where('token', $token);
					$this->db->delete('jwt');
					print 'Your session has expired!';
				else:
					$this->db->where('token', $token);
					$this->db->update('jwt', [ 'expiry' => $milliseconds + self::TOKEN_EXPIRY ]);
					if($this->db->affected_rows() == 1) :
						$this->data = [ 
							'token' 		=> $token, 
							'userDetails' 	=> $this->userDetails
						];
						// print_r($this->data); exit;
						$this->output->set_header('Authorization: '. $token);
						call_user_func_array(array($this, $method), $params);	
						// print $this->view; exit;
						// if(!isset($this->view) || empty($this->view)):
						// 	$this->view = get_class($this) . '/' . $method;
						// endif;
						
					else:
						print 'Authorization token could not be updated!'; exit;
					endif;
				endif;
			else:
				print 'Invalid Authorization header'; exit;
			endif;
		elseif ($method == 'login') :
			call_user_func_array(array($this, $method), $params);	
		else:
			show_404();	
		endif;
	}

	public function login() {
		if ($this->input->server('REQUEST_METHOD') == 'POST'):
			$credentials = json_decode($this->input->raw_input_stream, TRUE);

			// $this->db->join('organizations o', 'o.id = u.org_id', 'left');
			$query = $this->db->get_where('superadmins su', $credentials);

			if($query->num_rows() > 0):
				$result = $query->row_array();	
				$expiry = round(microtime(true) * 1000) + (1 * 60 * 1000);
				$json = [
					'id'				=> $result['id'],
					'firstname'			=> $result['firstname'],
					'lastname'			=> $result['lastname'],
					'expiry'			=> $expiry
				];
				$this->db->flush_cache();
				$token = $this->_encryptDecrypt('encrypt', json_encode($json));
				$this->db->insert('jwt', [ 
					'token' 	=> $token, 
					'expiry'	=> $expiry 
				]);
				if($this->db->affected_rows() == 1 ):

					$this->output->set_status_header(200);
					$this->output->set_content_type('application/json');
					$output = [ 
						"success" => TRUE, 
						'message' => 'Login Successfull!', 
						'token'   => $token	

					];
					$this->output->set_output(json_encode($output));
				else:
					$this->output->set_status_header(400);
					$this->output->set_content_type('application/json');
					$output = [ "success" => FALSE, 'message' => 'Unable to create token!' ];
					$this->output->set_output(json_encode($output));
					exit;
				endif;
			else:
				$this->output->set_status_header(401);
				$this->output->set_content_type('application/json');
				$output = [ "success" => FALSE, 'message' => 'Invalid Username or Password!' ];
				$this->output->set_output(json_encode($output));
			endif;
		else:
			$this->load->view('superadmin/login');
		endif;	
		
	}

	public function organizations() {

		$this->load->view('superadmin/org_approval', $this->data);	
	}

	public function getOrganizations() {
		$this->db->select('o.*, s.name as status');
		$this->db->join('status s', 's.id = o.status_id' );
		$query = $this->db->get('organizations o');
		$this->_response(self::HTTP_OK, $query->result_array());
	}

	public function getStatus() {
		$query = $this->db->get('status');
		$this->_response(self::HTTP_OK, $query->result_array());
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

	public function _response($status, $data = NULL, $contentType = NULL) {
		$this->output->set_status_header($status);     	
     	if (is_array($data) || is_object($data)):
     		$this->output->set_content_type(self::HTTP_MIME_TYPE_JSON);
	 		$this->output->set_output(json_encode($data));
	 		$this->output->_display();
	 		exit;
 		elseif (is_string($data) || is_bool($data) || is_int($data) || is_float($data) || is_numeric($data)):
 			$this->output->set_content_type(self::HTTP_MIME_TYPE_JSON);
	 		$this->output->set_output($data);
	 		$this->output->_display();
	 		exit;
 		else:
 			$this->output->set_content_type($contentType);
	 		$this->output->set_output($data);
	 		$this->output->_display();
	 		exit;
 		endif;
	}
}