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
	const HTTP_MIME_TYPE_JSON			= 'application/json';
	const HTTP_MIME_TYPE_TEXT			= 'text/html';

	public function __construct() {
		parent::__construct();			
		$this->load->model($this->modelName);	
		$this->http_request_headers = [
			'index'		=> [ "request"   => "GET" ],
			'create'	=> [ "request"   => "POST", "dataType" => "application/json" ]
		];
	}

	public function index() {
		$model = $this->modelName;
		$res = $this->$model->get_all();
		$this->_response(REST_Controller::HTTP_OK, $res);
	}

	public function create() {	
		$model 		= $this->modelName;
		$data 		= json_decode($this->input->raw_input_stream, TRUE);
		$insertedId = $this->$model->insert($data);
		$this->_response(REST_Controller::HTTP_CREATED, $insertedId);
	}

	public function _remap($method, $params = []) {

		if (method_exists($this, $method)) {
			$this->_validateRequest($method);
			call_user_func_array(array($this, $method), $params);
		} else {
			$this->_response(REST_Controller::HTTP_NOT_FOUND);
		}
	}

	public function _response($status, $data = NULL, $contentType = NULL) {
		$this->output->set_status_header($status);     	
     	if (is_array($data) || is_object($data)):
     		$this->output->set_content_type(REST_Controller::HTTP_MIME_TYPE_JSON);
	 		$this->output->set_output(json_encode($data));
 		elseif (is_string($data) || is_bool($data) || is_int($data) || is_float($data) || is_numeric($data)):
 			$this->output->set_content_type(REST_Controller::HTTP_MIME_TYPE_JSON);
	 		$this->output->set_output($data);
 		else:
 			$this->output->set_content_type($contentType);
	 		$this->output->set_output($data);
 		endif;
	}

	public function _validateRequest($method) {
		
		if(isset($this->http_request_headers[$method]['request']) && $_SERVER['REQUEST_METHOD'] != $this->http_request_headers[$method]['request']) {
		    $this->output->set_status_header(REST_Controller::HTTP_METHOD_NOT_ALLOWED)->_display();
		    exit;
		}
		if(isset($this->http_request_headers[$method]['dataType']) && $_SERVER['CONTENT_TYPE'] != $this->http_request_headers[$method]['dataType']) {
		    $this->output->set_status_header(REST_Controller::HTTP_UNSUPPORTED_METHOD)->_display();
		    exit;
		}
	}
	
}