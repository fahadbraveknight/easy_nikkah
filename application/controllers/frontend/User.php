<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	function __construct() {
        parent::__construct();
        $this->load->model(array('User_model','Location_model','Qualification_model','Proposal_model'));
    	$this->load->helper('string');
    }

	public function index()
	{	
		if($this->session->userdata('userid')){
			$data['proposal_accepted'] = $this->Proposal_model->get_status_notification($this->session->userdata('userid'),'accepted');
			$data['proposal_request'] = $this->Proposal_model->get_status_notification($this->session->userdata('userid'),'awaiting_response');
			$data['proposal_declined'] = $this->Proposal_model->get_status_notification($this->session->userdata('userid'),'declined');
		}
		$data['view'] = 'frontend/index';
		$this->load->view('frontend/layout/base_layout',$data);
		
	}

	public function search()
	{	
		if(!empty($_GET))
		{
			$params = $_GET;
			
			$result = $this->User_model->get_users_by_params($params);
			$data['result'] = $result;
			// pr($result);
		}
		$data['view'] = 'frontend/search';
		$data['qualifications'] = $this->Qualification_model->get_all_qualifications();
		$data['countries'] = $this->Location_model->get_valid_countries();
		$this->load->view('frontend/layout/base_layout',$data);
		
	}

	public function login()
	{
		$this->form_validation->set_rules('email', 'Email' , 'required|xss_clean');
		$this->form_validation->set_rules('password', 'password' , 'required|xss_clean');

		if($this->form_validation->run())
		{
			$check_email_verification_status = $this->User_model->check_email_verification_status($_POST['email']);
			
			if($check_email_verification_status['email'])
			{
				if($check_email_verification_status['email_verification_status'] == 0)
				{
					$data['verification_id'] = $check_email_verification_status['verification_id'];
					$data['email'] = $check_email_verification_status['email'];
					$data['full_name'] = $check_email_verification_status['full_name'];
					$this->session->set_flashdata('message', '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Please verify your email id to continue accessing the website.</div>');
					$data['view'] = 'frontend/resend_verification';
					$this->load->view('frontend/layout/base_layout',$data);
				}

				else if($check_email_verification_status['email_verification_status'] == 1 && $check_email_verification_status['user_status'] == 'active')
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

				else if($check_email_verification_status['email_verification_status'] == 1 && $check_email_verification_status['user_status'] == 'inactive')
				{
					$data['verification_id'] = $check_email_verification_status['verification_id'];
					$data['email'] = $check_email_verification_status['email'];
					$data['full_name'] = $check_email_verification_status['full_name'];
					$this->session->set_flashdata('message', '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Please click on Reactivate Account.</div>');
					$data['view'] = 'frontend/reactivate_account';
        			$this->load->view('frontend/layout/base_layout',$data);
				}
			}
			else
			{
				$this->session->set_flashdata('message', '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>The email id entered is not registered. Please click on Register tab to register the profile.</div>');
				$data['view'] = 'frontend/login';
				$this->load->view('frontend/layout/base_layout',$data);
			}
			
			// else
			// {
			// // 	$result = $this->User_model->login($_POST['email'],$_POST['password']);
			// // // pr($result);
			// // 	if($result['rc'])
			// // 	{
			// // 		if($result['user_height'] == '')
			// // 		{
			// // 			redirect('frontend/'.$this->session->userdata('user_detail').'/edit_profile/'.$result['id']);
			// // 			exit;
			// // 		}
			// // 		redirect('frontend/user');
			// // 		exit;
			// // 	}
			// // 	else
			// // 	{
			// // 		$this->session->set_flashdata('error_login',$result['error']);
			// // 		redirect('frontend/user/login');
			// // 		exit;
			// // 	}
			// }

			
		}
		else
		{
			$data['view'] = 'frontend/login';
			$this->load->view('frontend/layout/base_layout',$data);
		}

	}

	public function send_email_to_reactivate_account()
	{
		$verification_id = $this->input->post('verification_id');
		$email = $this->input->post('email');
		$full_name = $this->input->post('full_name');


		$this->load->library('email');
	    $config['protocol']     = 'smtp';
	    $config['smtp_host']    = 'bh-33.webhostbox.net';
	    $config['smtp_port']    = '587';
	    $config['smtp_user']    = 'info@easynikah.in';
	    $config['smtp_pass']    = 'Tech!1234';
	    $config['charset']     = 'utf-8';
	    $config['newline']     = "\r\n";
	    $config['mailtype']  = 'html'; // or html
	    $config['validation']  = TRUE; // bool whether to validate email or not

	    $this->email->initialize($config);
		$this->email->set_newline("\n\r");


		$message = "As salaamu alaikum wa rehmatullahe wa barakatuhu ".$full_name."<br><br>Please <a href='".base_url()."frontend/user/reactivate_account/".$verification_id."'>click</a> on  the link to reactivate your account and start using Easy Nikah services again.<br><br> Best Regards<br>Admin - Easy Nikah";



		$this->email->from('info@easynikah.in','Admin - Easy Nikah');
		$this->email->to($email);
		$this->email->subject('Easy Nikah Profile Reactivation');
		$this->email->message($message);

		if($this->email->send())
		{
			// echo "you email was sent";
			// $data['view'] = 'frontend/verification';
			// $this->load->view('frontend/layout/base_layout',$data);
			$this->session->set_flashdata('message', '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Please click on the verification link in your email to reactivate your account.</div>');
			redirect('frontend/user/login');
		}
		else
		{
			$this->session->set_flashdata('message', '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>We have encountered an issue. Please come back tomorrow to register.</div>');
			$data['view'] = 'frontend/resend_verification';
			$this->load->view('frontend/layout/base_layout',$data);
			// show_error($this->email->print_debugger());
		}
	}

	public function reactivate_account($id)
	{
		$reactivate_account = $this->User_model->reactivate_account($id);
		
		if($reactivate_account)
		{
			
			$this->session->set_flashdata('message', '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> Your account has been reactivated. Please click on login to start using Easy Nikah. We hope you find your life partner sson In sha Allah </div>');
			redirect('frontend/user/login');
		}
	}

	public function resend_email_verification_link()
	{
		$verification_id = $this->input->post('verification_id');
		$email = $this->input->post('email');
		$full_name = $this->input->post('full_name');


		$this->load->library('email');
	    $config['protocol']     = 'smtp';
	    $config['smtp_host']    = 'bh-33.webhostbox.net';
	    $config['smtp_port']    = '587';
	    $config['smtp_user']    = 'info@easynikah.in';
	    $config['smtp_pass']    = 'Tech!1234';
	    $config['charset']     = 'utf-8';
	    $config['newline']     = "\r\n";
	    $config['mailtype']  = 'html'; // or html
	    $config['validation']  = TRUE; // bool whether to validate email or not

	    $this->email->initialize($config);
		$this->email->set_newline("\n\r");


		$message = "As salaamu alaikum wa rehmatullahe wa barakatuhu ".$full_name."<br><br>JazakAllahu khairan for registering on EasyNikah.in<br><br>Please <a href='".base_url()."frontend/user/email_verification/".$verification_id."'>click</a> on this link to complete your registration.<br><br><br> Note: Without email verification you wont be able to login in your account to proceed <br><br> Best Regards<br>Admin - Easy Nikah";



		$this->email->from('info@easynikah.in','Admin - Easy Nikah');
		$this->email->to($email);
		$this->email->subject('Easy Nikah Profile Verification');
		$this->email->message($message);

		if($this->email->send())
		{
			// echo "you email was sent";
			// $data['view'] = 'frontend/verification';
			// $this->load->view('frontend/layout/base_layout',$data);
			$this->session->set_flashdata('message', '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>An Email has been sent to your mail id for your account registration. Kindly click on verification link to confirm the same.</div>');
			redirect('frontend/user/login');
		}
		else
		{
			$this->session->set_flashdata('message', '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>We have encountered an issue. Please come back tomorrow to register.</div>');
			$data['view'] = 'frontend/resend_verification';
			$this->load->view('frontend/layout/base_layout',$data);
			// show_error($this->email->print_debugger());
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('frontend/user');
		exit;
	}

	public function script()
	{
		$unverified = $this->db->get_where('users',array('email_verification_status'=>0))->result_array();
		$fp = fopen(FCPATH.'resources/contact.csv', 'w');
		echo FCPATH.'resources/contact.csv';
		// if(file_exists(FCPATH.'resources/contact.csv')){echo's';exit;}
		foreach ($unverified as $key => $value) {
			fputcsv($fp, array($value['email'],$value['full_name']));
			// pr($value);
		}
		$fo = fclose($fp);
	}
	
	public function register()
	{
		$this->form_validation->set_rules('full_name', 'Full Name' , 'required|xss_clean');
		$this->form_validation->set_rules('email', 'Email' , 'required|is_unique[users.email]|valid_email|xss_clean');

		$this->form_validation->set_rules('age-month', 'Month' , 'required|xss_clean');
		$this->form_validation->set_rules('age-date', 'Date' , 'required|xss_clean');
		$this->form_validation->set_rules('age-year', 'Year' , 'required|xss_clean');
		$this->form_validation->set_message('is_unique', 'Already registered email,try another.');

		if($this->form_validation->run())
		{

			// $profile_id = $this->create_profile_id();
			// exit();
			$age = strtotime($_POST['age-date'].'-'.$_POST['age-month'].'-'.$_POST['age-year']);

			$params = array('full_name' => $_POST['full_name'],
    						'email' => $_POST['email'],
    						'password' => $_POST['password'],
    						'age' => $age,
    						// 'profile_id' => $profile_id,
    						'gender' => $_POST['gender'],
    						'verification_id'=> random_string('alnum', 50) );
			$verification_id = $params['verification_id'];
			$user_id = $this->User_model->add_user($params);
			$profile = $this->db->select('profile_id')->from('users')->get()->result();
			$profile_id =  'EN_'.count($profile);
			// exit();

			//email verification
			if($user_id)
			{
				$this->load->library('email');
			    $config['protocol']     = 'smtp';
			    $config['smtp_host']    = 'bh-33.webhostbox.net';
			    $config['smtp_port']    = '587';
			    $config['smtp_user']    = 'info@easynikah.in';
			    $config['smtp_pass']    = 'Tech!1234';
			    $config['charset']     = 'utf-8';
			    $config['newline']     = "\r\n";
			    $config['mailtype']  = 'html'; // or html
			    $config['validation']  = TRUE; // bool whether to validate email or not

			    $this->email->initialize($config);
				$this->email->set_newline("\n\r");


				$message = "As salaamu alaikum wa rehmatullahe wa barakatuhu ".$_POST['full_name']."<br><br>JazakAllahu khairan for registering on EasyNikah.in<br><br>Please <a href='".base_url()."frontend/user/email_verification/".$verification_id."/".$profile_id."'>click</a> on this link to complete your registration.<br><br><br> Note: Without email verification you wont be able to login in your account to proceed <br><br> Best Regards<br>Admin - Easy Nikah";



				$this->email->from('info@easynikah.in','Admin - Easy Nikah');
				$this->email->to($params['email']);
				$this->email->subject('Easy Nikah Profile Verification');
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
					$this->session->set_flashdata('message', '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>We have encountered an issue. Please come back tomorrow to register.</div>');
					redirect('frontend/user/register');
					// show_error($this->email->print_debugger());
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
		// pr($states);
		if(isset($_POST['valid']) && $_POST['valid']==true){
			$states = $this->Location_model->get_valid_states($country_id);
		}
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
		if(isset($_POST['valid']) && $_POST['valid']==true){
			$cities = $this->Location_model->get_valid_cities($state_id);
		}
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

	public function ajax_delete_contact_person($contact_person_id=0)
	{
		$result = $this->User_model->delete_user_contact_person($contact_person_id);
		if($result)
		{
			$response['rc'] = true;
		}
		else
		{
			$response['rc'] = false;
		}
		echo json_encode($response);
	}	

	public function ajax_delete_family($family_id=0)
	{
		$result = $this->User_model->delete_user_family($family_id);
		if($result)
		{
			$response['rc'] = true;
		}
		else
		{
			$response['rc'] = false;
		}
		echo json_encode($response);
	}

	function create_profile_id()
	{
		// $profile = $this->db->query('SELECT id,profile_id FROM users ORDER BY id DESC LIMIT 1,1')->row_array();
		$profile = $this->db->select('profile_id')->from('users')->get()->result();

		// echo "<pre>";
		// echo count($profile);
		// exit();
		if(empty($profile))
		{
			return 'EN_1';
		}
		else{

			$id = explode('_',$profile['profile_id']);
			// echo $id['1'];
			
			$profile_id = $id['1']+1;

			// $profile_id= $profile['id']+1;
			return 'EN_'.$profile_id;
		}
		echo count($profile);
		exit();
	}

	function email_verification($id,$profile_id)
	{
		// $profile_id = $this->create_profile_id();
		
		$email_verification_status = $this->User_model->change_email_status($id, $profile_id);

		if($email_verification_status)
		{



		// $user = $this->User_model->get_user_details($id);
		// $email = $user->email;
		// $name = $user->full_name;

		// $this->load->library('email');
	 //    $config['protocol']     = 'smtp';
	 //    $config['smtp_host']    = 'bh-33.webhostbox.net';
	 //    $config['smtp_port']    = '587';
	 //    $config['smtp_user']    = 'contact@easynikah.in';
	 //    $config['smtp_pass']    = 'Tech!1234';
	 //    $config['charset']     = 'utf-8';
	 //    $config['newline']     = "\r\n";
	 //    $config['mailtype']  = 'html'; // or html
	 //    $config['validation']  = TRUE; // bool whether to validate email or not

	 //    $this->email->initialize($config);
		// $this->email->set_newline("\n\r");


		// $message = $name."<br><br>Alhamdulillah!!! Your profile has been verified successfully. Please login and complete your detailed profile.<br><br>All the services at Easy Nikah are absolutely FREE  and will always be In sha Allah with no charges during registration, search or after you find your match In sha Allah.<br><br>We sincerely hope you find your desired match at Easy Nikah and your search here is fruitful. <br><br>All the very best!!! <br><br> Best Regards<br>Admin - Easy Nikah";



		// $this->email->from('contact@easynikah.in','Admin - Easy Nikah');
		// $this->email->to($email);
		// $this->email->subject('Easy Nikah Profile successfully verified');
		// $this->email->message($message);

		// if($this->email->send())
		// {
			$this->session->set_flashdata('message', '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Your email has been verified. Please login and complete your profile by filling up the detailed form.</div>');
			redirect('frontend/user/login');	

			}
			else
			{
				echo "some error are occured";
			}
		// }
		// else
		// {
		// 	show_error($this->email->print_debugger());
		// }

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

	//opening the view of forgot password
	public function forgot_password()
	{
		$data['view'] = 'frontend/forgot_password';
		$this->load->view('frontend/layout/base_layout',$data);
	}

	// sending the forgot password link to given mail id.
	public function change_password_request()
	{
		$email = $this->input->post('email');

		$check_email_exist = $this->User_model->check_email_exist($email);
		$name = $check_email_exist->full_name;
		$count = count($check_email_exist);

		if($count == 1)
		{
			$password_reset_id = random_string('alnum', 50);

			$user = $this->User_model->forgot_password_request($email, $password_reset_id);

			if($user)
			{
				$this->load->library('email');
			    $config['protocol']     = 'smtp';
			    $config['smtp_host']    = 'bh-33.webhostbox.net';
			    $config['smtp_port']    = '587';
			    $config['smtp_user']    = 'info@easynikah.in';
			    $config['smtp_pass']    = 'Tech!1234';
			    $config['charset']     = 'utf-8';
			    $config['newline']     = "\r\n";
			    $config['mailtype']  = 'html'; // or html
			    $config['validation']  = TRUE; // bool whether to validate email or not

			    $this->email->initialize($config);
				$this->email->set_newline("\n\r");


				$message = "As salaamu alaikum wa rehmatullahe wa barakatuhu ".$check_email_exist->full_name." <br><br>Please <a href='".base_url()."frontend/user/reset_password/".$password_reset_id."'>click</a> on this link to reset your password <br><br> Best Regards<br>Admin - Easy Nikah";



				$this->email->from('info@easynikah.in','Admin - Easy Nikah');
				$this->email->to($email);
				$this->email->subject('Easy Nikah Forgot Password');
				$this->email->message($message);

				if($this->email->send())
				{
					$this->session->set_flashdata('message', '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Please check your email for the password reset link</div>');
					redirect('frontend/user/forgot_password');
				}
				else
				{
					$this->session->set_flashdata('message', '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>We have encountered an issue. Please try again.</div>');
					redirect('frontend/user/forgot_password');
					// show_error($this->email->print_debugger());
				}

			}
		}
		else
		{
			$this->session->set_flashdata('message', '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>email id does not exist.</div>');
					redirect('frontend/user/forgot_password');
		}		
	}

	//opening the reset password view.
	public function reset_password($id)
	{		
		$data['token_id'] = $id;
		$data['view'] = 'frontend/reset_password';
		$this->load->view('frontend/layout/base_layout',$data);
	}

	//reset the password.
	public function reset_password_request()
	{
		$token_id = $this->input->post('token_id');
		$password = $this->input->post('password');

		$reset_password = $this->User_model->reset_password($token_id, $password);
		if($reset_password)
		{
			$this->session->set_flashdata('message', '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Your password has been successfully reset.</div>');
				redirect('frontend/user/login');
		}
	}
}
