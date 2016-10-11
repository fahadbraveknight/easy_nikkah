<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	
	//var $header_filename = 'admin/admin_dashboard_header.php';			//tauheed
	var $header_filename = 'admin/template/admin_header.php'; 
	//var $footer_filename = 'admin/admin_dashboard_footer.php';
	
	//var $header_filename = 'admin/new_dashboard_header.php';
	//var $footer_filename = 'admin/new_dashboard_footer.php';
	
	var $footer_filename = 'admin/template/admin_footer.php';
	function __construct() {
        parent::__construct();
        
        //echo '<PRE>';print_r($this->session->all_userdata());die;
        
		$is_logged_in = $this->session->userdata('logged_in');
		if(!$is_logged_in)
		{
			redirect(base_url().'admin/admin_login');
		}
  	} 
	public function index()
	{
		$this->load->view($this->header_filename);
		$this->load->view('admin/template/dashboard');
		$this->load->view($this->footer_filename);
	}
}
