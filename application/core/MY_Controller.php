<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

	const TOKEN_EXPIRY = (60 * 60 * 1000);

	public function __construct() {
		parent::__construct();
		$stylesheets = [
			"bootstrap.min.css",
	        "font-awesome.css",
	        "bootstrap-switch.min.css",
	        "daterangepicker.min.css",
	        "morris.css",
	        "fullcalendar.min.css",
	        "jqvmap.css",
	        "components.min.css",
	        "plugins.min.css",
	        "layout.min.css",
	        "darkblue.min.css",
	        "custom.min.css"
		];
		$javascripts = [
			"gtm.js",
			"analytics.js",
			"jquery.min.js",
			"bootstrap.min.js",
			"js.cookie.min.js",
			"jquery.slimscroll.min.js",
			"jquery.blockui.min.js",
			"bootstrap-switch.min.js",
			"moment.min.js",
			"daterangepicker.min.js",
			"morris.min.js",
			"raphael-min.js",
			"jquery.waypoints.min.js",
			"jquery.counterup.min.js",
			"amcharts.js",
			"serial.js",
			"pie.js",
			"radar.js",
			"light.js",
			"patterns.js",
			"chalk.js",
			"ammap.js",
			"worldLow.js",
			"amstock.js",
			"fullcalendar.min.js",
			"horizontal-timeline.js",
			"jquery.flot.min.js",
			"jquery.flot.resize.min.js",
			"jquery.flot.categories.min.js",
			"jquery.easypiechart.min.js",
			"jquery.sparkline.min.js",
			"jquery.vmap.js",
			"jquery.vmap.russia.js",
			"jquery.vmap.world.js",
			"jquery.vmap.europe.js",
			"jquery.vmap.germany.js",
			"jquery.vmap.usa.js",
			"jquery.vmap.sampledata.js",
			"app.min.js",
			"dashboard.min.js",
			"layout.min.js",
			"demo.min.js",
			"quick-sidebar.min.js",
			"quick-nav.min.js",
			"bootbox.js",
			"angular/angular.js"
		];
		$layoutParams = [
			'title'		=> 'Lignio | Diagnostic Lab Dashboard',
			'header'	=> 'layout/header',
			'footer'	=> 'layout/footer',
			'sidebar'	=> 'layout/sidebar',
			'layout'	=> 'layout/dashboardLayout',
			'styles'	=> $stylesheets,
			'scripts'	=> $javascripts
		];
		$this->load->library("Layout", $layoutParams);
		// $this->layout->setLayout('layout/dashboardLayout');
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
						/*$menu_query = $this->db->query('select * from menus ms where ms.id in (select distinct menu_id from menu_access_by_roles join menus ms1 on ms1.id = menu_id where role_id in ('. join(',', $this->userDetails['roles']) .'))');*/
						$menu_query = $this->db->query('select * from menus ms');
						$menu = $menu_query->result_array();
						$root_menus = [];
						foreach($menu as $val):
							if($val['parent_id'] == 0):
								$root_menus[] = $val;
							endif;
						endforeach;
						for($i = 0; $i < count($root_menus); ++$i):
							for($j = 0; $j < count($root_menus) - 1 - $i; ++$j):
								if($root_menus[$j]['sequence'] > $root_menus[$j + 1]['sequence']):
									$tmp = $root_menus[$j];
									$root_menus[$j] = $root_menus[$j + 1];
									$root_menus[$j + 1] = $tmp;
								endif;
							endfor;
						endfor;
						$this->_createParentChildHierarchy($root_menus, $menu, 0);	
						
						$this->data = [ 
							'token' 		=> $token, 
							'userDetails' 	=> $this->userDetails,
							'menuList' 		=> $root_menus
						];
						// print_r($this->data); exit;
						$this->output->set_header('Authorization: '. $token);
						call_user_func_array(array($this, $method), $params);	
						// print $this->view; exit;
						if(!isset($this->view) || empty($this->view)):
							$this->view = get_class($this) . '/' . $method;
						endif;
						$this->layout->render($this->view, $this->data);
					else:
						print 'Authorization token could not be updated!'; exit;
					endif;
				endif;
			else:
				print 'Invalid Authorization header'; exit;
			endif;
		else:
			show_404();	
		endif;
		
	}

	public function _createParentChildHierarchy(&$menu_list, $master_list) {
		
			for ($i = 0; $i < count($menu_list); ++$i):
				$sub_menu = [];
				if(isset($menu_list[$i])):
					foreach($master_list as $menu) :
						if($menu['parent_id'] == $menu_list[$i]['id']):
							$sub_menu[] = $menu;
						endif;
					endforeach;
				endif;
				$menu_list[$i]['sub_menu'] = $sub_menu;
				if(count($menu_list[$i]['sub_menu']) > 0) :
					$this->_createParentChildHierarchy($menu_list[$i]['sub_menu'], $master_list);
				endif;
			endfor;
		
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