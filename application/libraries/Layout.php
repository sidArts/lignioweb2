<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Layout {

	private $_layout;
	private $_title;
	private $_header;
	private $_sidebar;
	private $_footer;
	private $_js = [];
	private $_css = []; 

	public function __construct($params) {
        $this->_ctrl	= &get_instance();
        $this->_layout 	= isset($params['layout'])  ? $params['layout']  : 'layout/default';
        $this->_header 	= isset($params['header'])  ? $params['header']  : NULL;
        $this->_footer	= isset($params['footer'])  ? $params['footer']  : NULL;
        $this->_sidebar = isset($params['sidebar']) ? $params['sidebar'] : NULL;
        $this->_title	= isset($params['title'])   ? $params['title']   : '';
        $this->_css		= isset($params['styles'])  ? $params['styles']  : [];
        $this->_js		= isset($params['scripts']) ? $params['scripts'] : [];
	}

	public function render($view, $data = []) {

		$css = '';
		if(!empty($this->_css)) {
			foreach ($this->_css as $stylesheet) {
				$css .= sprintf('<link type="text/css" rel="stylesheet" href="%s">', base_url('assets/css/lib/'. $stylesheet));
			}	
		}
		
		$js = '';
		if(!empty($this->_js)) {
			foreach ($this->_js as $javascript) {
				$js .= sprintf('<script type="text/javascript" src="%s"></script>', base_url('assets/js/lib/'. $javascript));
			}
		}		
		
		$data['js'] 	 = $js;		
		$data['css'] 	 = $css;
		$data['title'] 	 = $this->_title;
		$data['content'] = $this->_ctrl->load->view($view, $data, TRUE);
		if(isset($this->_header) && $this->_header != NULL)
			$data['header']  = $this->_ctrl->load->view($this->_header, $data, TRUE);
		
		if(isset($this->_sidebar) && $this->_sidebar != NULL)
			$data['sidebar'] = $this->_ctrl->load->view($this->_sidebar, $data, TRUE);

		if(isset($this->_footer) && $this->_footer != NULL)
			$data['footer']  = $this->_ctrl->load->view($this->_footer, $data, TRUE);
		
		$this->_ctrl->load->view($this->_layout, $data, FALSE);

	}

	public function setHeader($view) {
		$this->_header = $view;
	}

	public function setSidebar($view) {
		$this->_sidebar = $view;
	}

	public function setFooter($view) {
		$this->_footer = $view;
	}

	public function setStylesheet($cssList) {
		$this->_css = $cssList;
	}

	public function setJavascript($jsList) {
		$this->_js = $jsList;
	}

	public function setTitle($title) {
		$this->_title = $title;
	}

	public function setLayout($layout) {
		$this->_layout = $layout;
	}

}
