<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class REST_Controller extends CI_Controller {

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

	protected $escapeTokenFilter = [];

	public function __construct() {
		parent::__construct();			
		$this->userDetails = [];
		$this->load->model($this->modelName);
		$this->load->library("EncryptDecrypt", 'encryptDecrypt');
		$this->http_request_headers = [
			'index'		=> [ "request"   => "GET" ],
			'create'	=> [ "request"   => "POST", 	"dataType" => "application/json" ],
			'update'	=> [ "request"   => "PATCH",  	"dataType" => "application/json" ],
			'update'	=> [ "request"   => "DELETE" ]
		];
	}

	public function index() {
		$model = $this->modelName;
		// print_r($this->access_permission_restrict); exit;
		$res = $this->$model->get_all($this->access_permission_restrict);
		$this->_response(REST_Controller::HTTP_OK, $res);
	}

	public function read($id) {
		$model = $this->modelName;
		$primary_key = $this->$model->getTableAlias() . '.' . $this->$model->getPrimaryKey();
		$condition = array_merge($this->access_permission_restrict, [ $primary_key => $id ]);
		$res = $this->$model->get($condition);
		$this->_response(REST_Controller::HTTP_OK, $res);
	}

	public function create() {	
		$model 		= $this->modelName;
		$data 		= json_decode($this->input->raw_input_stream, TRUE);
		$insertedId = $this->$model->insert($data);
		$this->_response(REST_Controller::HTTP_CREATED, $insertedId);
	}

	public function update() {
		$model 		= $this->modelName;
		$data 		= json_decode($this->input->raw_input_stream, TRUE);
		$primary_key	= $this->$model->getPrimaryKey();
		if($this->$model->update($data[$primary_key], $data))
			$this->_response(self::HTTP_NO_CONTENT);		
		else
			$this->_response(self::HTTP_BAD_REQUEST);		
	}

	public function delete($id) {
		$model 		= $this->modelName;
		$model_id	= strtolower(get_class($this)) . '_id';
		$where 		= [ $model_id => $id ];
		if($this->$model->delete($where))
			$this->_response(self::HTTP_NO_CONTENT);		
		else
			$this->_response(self::HTTP_BAD_REQUEST);		
	}

	public function _remap($method, $params = []) {	
		
		if(in_array($method, $this->escapeTokenFilter)):
			call_user_func_array(array($this, $method), $params);
		elseif (method_exists($this, $method)):		
			$token = $this->input->get_request_header('Authorization');
			// print $token; exit;
			// $this->_response(200, $token);
			if($token === NULL):			
				$this->_response(self::HTTP_UNAUTHORIZED);
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
					$this->_response(self::HTTP_UNAUTHORIZED);
				else:
					$this->db->where('token', $token);
					$this->db->update('jwt', [ 'expiry' => $milliseconds + self::TOKEN_EXPIRY ]);
					if($this->db->affected_rows() == 1):
						$p = explode('_', $method)[0];
						$p = (($p == 'index') ? 'read' : $p); 	
						$className = strtolower(get_class($this));
						$permission = $className . '_' . $p ;
						/*$query = $this->db->distinct()
											->select('LOWER(code) as permission, p.restrict')
											->from('org_role_permissions rp')
											->join('permissions p', 'p.id = rp.permission_id')
											->where_in('role_id', $this->userDetails['roles'])
											->like('permission_description', $permission, 'none')
											->get();*/

						$sql = 'SELECT p.name, p.restrict FROM permissions p WHERE p.id IN ( (SELECT orp.permission_id FROM org_role_permissions orp WHERE orp.role_id IN (SELECT r.id as role_id FROM org_roles r WHERE r.org_id = '. $this->userDetails['org_id'] .'))) AND p.name LIKE \'' . $permission . '\'';
						$query = $this->db->query($sql);
						if($query->num_rows() > 0):
							$row = $query->result_array();						

							$this->access_permission_restrict = [];
							//if($this->userDetails['org_id'] != 1) {
								/*foreach ($row as $value) {
									if(isset($value['restrict']) && !empty($value['restrict'])):
										$this->access_permission_restrict[$value['restrict']] = $this->userDetails[$value['restrict']];
									endif;
								}*/
								// $this->access_permission_restrict['org_id'] = $this->userDetails['org_id'];	
							//}
							// $this->_validateRequest($method);
							call_user_func_array(array($this, $method), $params);
						else:
							$this->_response(self::HTTP_FORBIDDEN);
						endif;
					else:
						$this->_response(self::HTTP_INTERNAL_SERVER_ERROR);
					endif;
				endif;
			endif;
		else:
			$this->_response(self::HTTP_NOT_FOUND);
		endif;
	}

	public function _response($status, $data = NULL, $contentType = NULL) {
		$this->output->set_status_header($status);     	
     	if (is_array($data) || is_object($data)):
     		$this->output->set_content_type(REST_Controller::HTTP_MIME_TYPE_JSON);
	 		$this->output->set_output(json_encode($data));
	 		$this->output->_display();
	 		exit;
 		elseif (is_string($data) || is_bool($data) || is_int($data) || is_float($data) || is_numeric($data)):
 			$this->output->set_content_type(REST_Controller::HTTP_MIME_TYPE_JSON);
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

	public function _validateRequest($method) {
		
		if(isset($this->http_request_headers[$method]['request']) && $_SERVER['REQUEST_METHOD'] != $this->http_request_headers[$method]['request']) {
		    $this->output->set_status_header(REST_Controller::HTTP_METHOD_NOT_ALLOWED)->_display();
		    exit;
		}
		if(isset($this->http_request_headers[$method]['dataType']) && $_SERVER['CONTENT_TYPE'] != $this->http_request_headers[$method]['dataType']) {
			print $this->http_request_headers[$method]['dataType'];
			print $_SERVER['CONTENT_TYPE']; exit;
		    $this->output->set_status_header(REST_Controller::HTTP_UNSUPPORTED_MEDIA_TYPE)->_display();
		    exit;
		}
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