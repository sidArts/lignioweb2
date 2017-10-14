<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct() {
		parent::__construct();
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
		if ($this->input->server('REQUEST_METHOD') == 'POST'):
			$query = $this->db->get_where('user', [ 
				'email' => $this->input->post('email'),
				'password' => $this->input->post('password')
			]);
			
			if($query->num_rows() > 0):
				$result = $query->row_array();	
				$expiry = round(microtime(true) * 1000) + (1 * 60 * 1000);
				$json = [
					'user_id'	=> $result['user_id'],
					'org_id'	=> $result['org_id'],
					'username'	=> $result['username'],
					'fullname'	=> $result['fullname'],
					'expiry'	=> $expiry
				];
				$this->db->flush_cache();
				$this->db->select('role_id');
				$query = $this->db->get_where('user_role', [ 'user_id' => $result['user_id'] ]);

				if($query->num_rows() > 0):

					$result = $query->result_array();
					$roleIds = [];
					
					foreach ($result as $value) {
						$roleIds[] = $value['role_id'];
					}			
					$json['roles'] = $roleIds;

					$token = $this->_encryptDecrypt('encrypt', json_encode($json));

					$this->db->insert('jwt', [ 
						'token' 	=> $token, 
						'expiry'	=> $expiry 
					]);
					if($this->db->affected_rows() == 1){
						$this->load->view('login', [ 'status' => true, 'token' => $token ]);	
					} else {
						show_404();	
					}					
				else:
					$this->load->view('login', [ 'status' => false, 'token' => '' ]);	
				endif;				
			else:
				$this->load->view('login', [ 'status' => false, 'token' => '' ]);
			endif;
		else:
			$this->load->view('login', [ 'status' => false, 'token' => '' ]);
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
