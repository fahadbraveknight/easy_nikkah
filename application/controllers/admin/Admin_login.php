<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_login extends CI_Controller  {

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
		
		$data['err_msg'] = '';
		$data['info_msg'] = '';
		$this->load->view('admin/login_page');
	}
	
	
	function display_page()
	{
		$data = array();
		
		$posted_username = $this->input->post('frm_username');
		$posted_password = $this->input->post('frm_password');

		$data['frm_username'] = $posted_username;
		$data['frm_password'] = $posted_password;
		
		$this->_show_page($this->default_view, $data);
	}
	
	function check_login()
	{
		$data = array();
		
		$posted_username = $this->input->post('frm_username');
		$posted_password = $this->input->post('frm_password');
		
		if(!empty($posted_username) && !empty($posted_password))
		{
			$query_where = array("email" => $posted_username, "pass" => md5($posted_password), "status" => "1");
			$this->db->where($query_where);
			//$this->db->join(TBL_USER_ROLES,$this->db_table_name.".id = ".TBL_USER_ROLES.".user_id");
			
			$query_result = $this->db->get($this->db_table_name);
			
			$query_num_records = $query_result->num_rows();
			
			if($query_num_records > 0)
			{
				$user_details = array();
				
				foreach($query_result->result() as $query_data_obj)
				{
					$user_details['first_name'] = $query_data_obj->first_name;
					$user_details['last_name'] = $query_data_obj->last_name;
					$user_details['user_email'] = $query_data_obj->email;
					$user_details['user_id'] = $query_data_obj->id;
					//$user_details['role_id'] = $query_data_obj->role_id;					
				}
				
				/*$profile_query_where = array("user_id" => $user_details['user_id']);
			
				$profile_query_result = $this->db->get_where($this->profile_table_name, $profile_query_where);
				
				//$profile_num_records = $profile_query_result->result();*/
				//print_r($user_details);
				if($query_num_records > 0)
				{ 
					$this->session->set_userdata('first_name', $user_details['first_name']);
					$this->session->set_userdata('last_name', $user_details['last_name']);
					$this->session->set_userdata('user_email', $user_details['user_email']);
					$this->session->set_userdata('user_id', $user_details['user_id']);
					//$this->session->set_userdata('role_id', $user_details['role_id']);
					$this->session->set_userdata('user_logged_in', '1');
					
					$redirect_to = $this->session->userdata('accessed_url');
					if(isset($redirect_to) && !empty($redirect_to))
					{ //echo 'hie';die;
						$this->session->unset_userdata('accessed_url');
						header('Location:'.$redirect_to);
						exit;
					}
					else
					{ //echo 'bye';die;
						/* print_r($this->session->all_userdata());
						die; */
						redirect('dashboard', 'refresh');
					}
				}
				else
				{ 
					$this->err_msg = '<li>Your account has been Deactivated. Please contact System Administrator.</li>';
					$this->display_page();
				}
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
	
	function forgot_password()
	{
		$data = array();
		
		$this->module_name = 'forgot_password';
		
		$frm_email = $this->input->post('frm_email');

		$data['frm_email'] = $frm_email;
		
		$this->_show_page($this->password_view, $data);
	}
	
	function reset_password()
	{
		$data = array();
		
		$this->module_name = 'forgot_password';
		
		$frm_email = $this->input->post('frm_email');
		
		if(!empty($frm_email))
		{
			$this->db->select('id, status');
			$this->db->where('email', $frm_email);
			
			$query_result = $this->db->get($this->db_table_name);
			
			if($query_result->num_rows() > 0)
			{
				$user_details = array();
				
				foreach($query_result->result_array() as $query_data_arr)
				{
					$user_details = $query_data_arr;
				}
				
				if($user_details['status'] == 1)
				{
					$new_password = $this->_generate_password($frm_email);
					
					$posted_data = array('pass' => md5($new_password), 'modified_at' => date('Y-m-d H:i:s'), 'status' => '0');
					
					$activation_link_param = base64_encode($frm_email.'#'.$user_details['id']);
					
					$email_data['activation_link_param'] = $activation_link_param;
					
					$email_data['new_password'] = $new_password;
					
					$this->db->set($posted_data);
					$this->db->where('email', $frm_email);
					$this->db->update($this->db_table_name);
					
					$this->load->library('email');
					
					ob_start();		
					$this->load->view('email_forgot_password', $email_data);
					$eml_body = ob_get_contents();
					ob_end_clean();
					
					ob_start();		
					$this->load->view('email_forgot_password_alt', $email_data);
					$alt_eml_body = ob_get_contents();
					ob_end_clean();

					$this->email->from(ADMIN_EMAIL, ADMIN_NAME);
					$this->email->reply_to(ADMIN_EMAIL, ADMIN_NAME);
					$this->email->to($frm_email); 
					
					$this->email->subject('Request for Password Reset');
					$this->email->message($eml_body);
					$this->email->set_alt_message($alt_eml_body);
					
					//echo $eml_body;
					
					//$this->email->send();
					
					
					
					$this->info_msg = '- Your password has been reset. An email with the new password has been sent to '.$frm_email.'. Follow the instructions in the email to activate your acount again.';
					
					$this->forgot_password();
				}
				else
				{
					$this->err_msg = '<li>Your account is not active. Please contact System Administrator.</li>';
					$this->forgot_password();
				}
			}
			else
			{
				$this->err_msg = '<li>The Email Adddress entered is not in the system. Please try again.</li>';
				$this->forgot_password();
			}
		}
		else
		{
			
			$this->err_msg = '<li>Please Enter your Email Address (Username).</li>';
			$this->forgot_password();
		}
	}
	
	function activate_user($param)
	{
		if(!empty($param))
		{
			$decoded_param = base64_decode($param);
			$param_arr = explode('#', $decoded_param);
			
			$rec_id = $param_arr[1];
			
			$posted_data = array('status' => '1');
			
			$this->db->set($posted_data);
			$this->db->where('id', $rec_id);
			$this->db->update($this->db_table_name);
			
			$this->info_msg = '- Your account has been activated. Please login.';
			
			$this->display_page();
		}
		else
		{
			redirect('admin_login');
		}
	}
	
	function logout()
	{
		$this->session->sess_destroy();

		$this->info_msg = 'You have successfully logged out of your account.';
			
		$this->display_page();
	}
	
	function _generate_password($str, $maxlen=6)
	{
		$pwd = substr(md5(rand(9,99).$str), 0, $maxlen);	
		return $pwd;
	}
	
	function _show_page($view_name, $data)
	{
		$data['module_name'] = $this->module_name;
		$data['module_heading'] = $this->module_heading;
		
		$data['err_msg'] = $this->err_msg;
		$data['info_msg'] = $this->info_msg;
		
		//$this->load->view($this->view_header, $data);
		$this->load->view($view_name, $data);
		//$this->load->view($this->view_sidebar, $data);
		//$this->load->view($this->view_footer, $data);
	}

 }
?>