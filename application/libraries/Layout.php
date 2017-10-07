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

	function __construct() {
        $this->_ctrl	= &get_instance();
        $this->_layout 	= 'layout/default';
        $this->_header 	= 'layout/header';
        $this->_sidebar = 'layout/sidebar';
        $this->_footer	= 'layout/footer';
        $this->_title	= 'Lignio | Diagnostic Lab Dashboard';
        $this->_css 	= array(
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
		);
		$this->_js = array(
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
			"angular/angular.js"
		);
	}

	public function render($view, $data) {

		$css = '';
		foreach ($this->_css as $stylesheet) {
			$css .= sprintf('<link type="text/css" rel="stylesheet" href="%s">', base_url('assets/css/lib/'. $stylesheet));
		}
		$js = '';
		foreach ($this->_js as $javascript) {
			$js .= sprintf('<script type="text/javascript" src="%s"></script>', base_url('assets/js/lib/'. $javascript));
		}
		
		$data['js'] = $js;		
		$data['css'] = $css;
		$data['title'] = $this->_title;
		$data['content'] = $this->_ctrl->load->view($view, $data, TRUE);
		$data['header']  = $this->_ctrl->load->view($this->_header, $data, TRUE);
		$data['sidebar'] = $this->_ctrl->load->view($this->_sidebar, $data, TRUE);			
		$data['footer'] = $this->_ctrl->load->view($this->_footer, $data, TRUE);	
		
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

	

}
