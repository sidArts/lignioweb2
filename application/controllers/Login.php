<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->library('Layout', [
			'styles'  => [ "bootstrap.min.css", "font-awesome.css" ],
			'scripts' => [ "jquery.min.js", "bootstrap.min.js", "angular/angular.js", "bootbox.js" ]
		]);
	}

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
		$this->layout->render('login', []);
	}

	public function authorize() {
		if ($this->input->server('REQUEST_METHOD') == 'POST'):
			$credentials = json_decode($this->input->raw_input_stream, TRUE);

			if(is_numeric($credentials['email'])):
				$credentials['phone'] = $credentials['email'];
				unset($credentials['email']);
			endif;

			$this->db->join('organizations o', 'o.organization_id = u.org_id', 'left');
			$query = $this->db->get_where('users u', $credentials);

			if($query->num_rows() > 0):
				$result = $query->row_array();	
				$expiry = round(microtime(true) * 1000) + (1 * 60 * 1000);
				$json = [
					'user_id'			=> $result['user_id'],
					'firstname'			=> $result['firstname'],
					'lastname'			=> $result['lastname'],
					'expiry'			=> $expiry,
					'diagnostic_lab_id' => $result['org_id'],
					'org_name'			=> $result['name']
				];
				$this->db->flush_cache();
				$this->db->select('role_id');
				$query = $this->db->get_where('user_role', [ 
					'user_id' => $result['user_id'] 
				]);

				if($query->num_rows() > 0):

					$result = $query->result_array();
					// in_array(5, $result)
					if(count($result) == 1 && $result[0]['role_id'] == 3):
						$json['roles'] = [3];
					else:
						$roleIds = [];
						foreach ($result as $value):
							$roleIds[] = $value['role_id'];						
						endforeach;
						$json['roles'] = $roleIds;	
						$this->db->flush_cache();
					endif;			

					$token = $this->_encryptDecrypt('encrypt', json_encode($json));

					$this->db->insert('jwt', [ 
						'token' 	=> $token, 
						'expiry'	=> $expiry 
					]);
					if($this->db->affected_rows() == 1):
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
					$output = [ "success" => FALSE, 'message' => 'Your Account is pending for approval'];
					$this->output->set_output(json_encode($output));
				endif;				
			else:
				$this->output->set_status_header(401);
				$this->output->set_content_type('application/json');
				$output = [ "success" => FALSE, 'message' => 'Invalid Username or Password!' ];
				$this->output->set_output(json_encode($output));
			endif;
		else:
			$this->output->set_status_header(405)->_display();
		endif;		
	}

	public function logout() {
		$token = $this->input->get_request_header('Authorization');
		if($token != NULL):
			$this->db->delete('jwt', [ 'token' => $token ]);
			if($this->db->affected_rows() == 1):
				$this->output->set_status_header(200);
			else:
				$this->output->set_status_header(500);
			endif;
		else:
			$this->output->set_status_header(401);
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
