<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	function __construct() {
        parent::__construct();
        $this->load->model(array('User_model','Location_model','Marital_status_model','Qualification_model','Age_group_model'));
    }

	public function index()
	{	
		if(!empty($_GET))
		{
			$params = $_GET;
			
			$result = $this->User_model->get_users_by_params($params);
			$data['result'] = $result;
			// pr($result);
		}
		$data['view'] = 'frontend/index';
		$data['marital_statuses'] = $this->Marital_status_model->get_all_marital_statuses();
		$data['qualifications'] = $this->Qualification_model->get_all_qualifications();
		$data['age_groups'] = $this->Age_group_model->get_age_groups();
		$data['countries'] = $this->Location_model->get_countries();
		$this->load->view('frontend/layout/base_layout',$data);
		
	}
	public function login()
	{
		$this->form_validation->set_rules('email', 'Email' , 'required|xss_clean');
		$this->form_validation->set_rules('password', 'password' , 'required|xss_clean');

		if($this->form_validation->run())
		{
			$result = $this->User_model->login($_POST['email'],$_POST['password']);
			// pr($result);
			if($result['rc'])
			{
				if($result['user_height'] == '')
				{
					redirect('frontend/'.$this->session->userdata('user_detail').'/edit_profile/'.$result['id']);
					exit;
				}
				redirect('frontend/user');
				exit;
			}
			else
			{
				$this->session->set_flashdata('error_login',$result['error']);
				redirect('frontend/user/login');
				exit;
			}
		}
		else
		{
			$data['view'] = 'frontend/login';
			$this->load->view('frontend/layout/base_layout',$data);
		}

	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('frontend/user');
		exit;
	}

	public function register()
	{
		$this->form_validation->set_rules('full_name', 'Full Name' , 'required|xss_clean');
		$this->form_validation->set_rules('email', 'Email' , 'required|is_unique[users.email]|xss_clean');

		if($this->form_validation->run())
		{
			$profile_id = $this->create_profile_id();
			$age = strtotime($_POST['age-date'].'-'.$_POST['age-month'].'-'.$_POST['age-year']);

			$params = array('full_name' => $_POST['full_name'],
    						'email' => $_POST['email'],
    						'password' => $_POST['password'],
    						'age' => $age,
    						'profile_id' => $profile_id,
    						'gender' => $_POST['gender'],
    						'verification_id'=> rand(1,10000)+rand(1,10000) );
			$verification_id = $params['verification_id'];
			$user_id = $this->User_model->add_user($params);

			//email verification
			if($user_id)
			{
				$this->load->library('email');
			    $config['protocol']     = 'smtp';
			    $config['smtp_host']    = 'bh-33.webhostbox.net';
			    $config['smtp_port']    = '587';
			    $config['smtp_user']    = 'contact@easynikah.in';
			    $config['smtp_pass']    = 'Tech!1234';
			    $config['charset']     = 'utf-8';
			    $config['newline']     = "\r\n";
			    $config['mailtype']  = 'html'; // or html
			    $config['validation']  = TRUE; // bool whether to validate email or not

			    $this->email->initialize($config);
				$this->email->set_newline("\n\r");


				$message = "As salaamu alaikum wa rehmatullahe wa barakatuhu ".$_POST['full_name']."<br><br>JazakAllahu khairan for registering on EasyNikah.in<br><br>Please <a href='".base_url()."frontend/user/email_verification/".$verification_id."'>click</a> on this link to complete your registration.<br><br><br> Note: Without email verification you wont be able to login in your account to proceed <br><br> Best Regards<br>Admin - Easy Nikah>";



				$this->email->from('contact@easynikah.in','Easynikah');
				$this->email->to($params['email']);
				$this->email->subject('Easynikah Verification');
				$this->email->message($message);

				if($this->email->send())
				{
					// echo "you email was sent";
					// $data['view'] = 'frontend/verification';
					// $this->load->view('frontend/layout/base_layout',$data);
					$this->session->set_flashdata('message', '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>An Email has been sent to your mail id for your account registration. Kindly click on verification link to confirm the same.</div>');
					redirect('frontend/user/register');
				}
				else
				{
					show_error($this->email->print_debugger());
				}

			}


			// if($params['gender']=='male')
			// {
			// 	redirect('frontend/groom/edit_profile/'.$user_id);
			// }
			// else if($params['gender']=='female')
			// {
			// 	redirect('frontend/bride/edit_profile/'.$user_id);
			// }
		}
		else
		{
			$data['view'] = 'frontend/register';
			$this->load->view('frontend/layout/base_layout',$data);
		}
	}

	public function ajax_get_all_states($country_id=0)
	{
		$states = $this->Location_model->get_states_by_country_id($country_id);

		if(!empty($states))
		{
			$response['rc'] = true;
			$response['states'] = $states;
			
		}
		else
		{
			$response['rc'] = false;
		}
		echo json_encode($response);
	}

	public function ajax_get_all_cities($state_id=0)
	{
		$cities = $this->Location_model->get_cities_by_state($state_id);
		if(!empty($cities))
		{
			$response['rc'] = true;
			$response['cities'] = $cities;
			
		}
		else
		{
			$response['rc'] = false;
		}
		echo json_encode($response);
	}

	function create_profile_id()
	{
		$profile_id = "EN_".rand(0,100000);
		$profile = $this->db->query('SELECT profile_id FROM users where profile_id ="'.$profile_id.'"')->row_array();
		if(!empty($profile['profile_id']))
		{
			$this->create_profile_id();
		}
		else{
			return $profile_id;
		}
	}

	function email_verification($id)
	{
		$email_verification_status = $this->User_model->change_email_status($id);

		$user = $this->User_model->get_user_details($id);
		$email = $user->email;
		$name = $user->full_name;

		$this->load->library('email');
	    $config['protocol']     = 'smtp';
	    $config['smtp_host']    = 'bh-33.webhostbox.net';
	    $config['smtp_port']    = '587';
	    $config['smtp_user']    = 'contact@easynikah.in';
	    $config['smtp_pass']    = 'Tech!1234';
	    $config['charset']     = 'utf-8';
	    $config['newline']     = "\r\n";
	    $config['mailtype']  = 'html'; // or html
	    $config['validation']  = TRUE; // bool whether to validate email or not

	    $this->email->initialize($config);
		$this->email->set_newline("\n\r");


		$message = $name."<br><br>Alhamdulillah!!! Your profile has been verified successfully. Please login and complete your detailed profile.<br><br>All the services at Easy Nikah are absolutely FREE  and will always be In sha Allah with no charges during registration, search or after you find your match In sha Allah.<br><br>We sincerely hope you find your desired match at Easy Nikah and your search here is fruitful. <br><br>All the very best!!! <br><br> Best Regards<br>Admin - Easy Nikah>";



		$this->email->from('contact@easynikah.in','Easynikah');
		$this->email->to($email);
		$this->email->subject('Easynikah Verification');
		$this->email->message($message);

		if($this->email->send())
		{
			$this->session->set_flashdata('message', '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Your email has been verified. Please login and complete your profile by filling up the detailed form.</div>');
			redirect('frontend/user');	
		}
		else
		{
			show_error($this->email->print_debugger());
		}

		// $gender = $user->gender;

		// if($gender == 'male')
		// 	{
		// 		redirect('frontend/groom/edit_profile/'.$user->id);
		// 	}
		// 	else if($params['gender']=='female')
		// 	{
		// 		redirect('frontend/bride/edit_profile/'.$user->id);
		// 	}
	}
}
