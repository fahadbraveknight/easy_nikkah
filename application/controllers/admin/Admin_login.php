<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_login extends CI_Controller  {

	var $default_view = 'admin/login_page';
	var $err_msg = '';
	var $info_msg = '';
	/*var $default_view = 'login_page';
	var $password_view = 'forgot_password';

	var $db_table_name = TBL_ADMIN_USER;
	//var $profile_table_name = TBL_USER_ROLES;
	
	var $module_name = 'login';
	var $module_heading = 'Backend - Login ';
	
	var $err_msg = '';
	var $info_msg = '';	

	var $rec_per_page = 20;*/

	function __construct() {
		 parent::__construct();
		
	}

	function index()
	{
		//$this->display_page();
		$data['module_name'] = 'login';
		$data['module_heading'] = 'Backend - Login ';
		
		$this->load->view('admin/login_page');
	}
	
	
	function display_page()
	{
		$data = array();
		
		$posted_username = $this->input->post('frm_username');
		$posted_password = $this->input->post('frm_password');

		$data['frm_username'] = $posted_username;
		$data['frm_password'] = $posted_password;
		
		$data['err_msg'] = $this->err_msg;
		$data['info_msg'] = $this->info_msg;
		
		$this->load->view($this->default_view, $data);
	}
	
	public function check_login()
	{
		$data = array();
		
		$posted_username = $this->input->post('frm_username');
		$posted_password = $this->input->post('frm_password');
		
		if(!empty($posted_username) && !empty($posted_password))
		{
			if(($posted_username == 'admin@admin.com') && ($posted_password == 'password@123'))
			{
				$newdata = array(
						'username'  => 'Admin',
						'email'     => 'admin@admin.com',
						'logged_in' => TRUE
				);
				
				$this->session->set_userdata($newdata);
				redirect(base_url().'admin/dashboard/index');
			}
			else
			{
				$this->err_msg = 'Invalid Username and Password combination. Please try again.';
				$this->display_page();
			}
		}
		else
		{
			
			$this->err_msg = '<li>Please enter Username.</li><li>Please enter Password.</li>';
			$this->display_page();
		}
	}
		
	function logout()
	{
		$this->session->sess_destroy();

		$this->info_msg = 'You have successfully logged out of your account.';
			
		$this->display_page();
	}
 }
?>