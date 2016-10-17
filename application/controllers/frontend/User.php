<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	function __construct() {
        parent::__construct();
        $this->load->model(array('User_model','Location_model'));
    }

	public function index()
	{
		$data['view'] = 'frontend/index';
		$this->load->view('frontend/layout/base_layout',$data);
	}

	public function register()
	{
		$this->form_validation->set_rules('full_name', 'Full Name' , 'required|xss_clean');
		$this->form_validation->set_rules('email', 'Email' , 'required|is_unique[users.email]|xss_clean');

		$profile_id = $this->create_profile_id();
		if($this->form_validation->run())
		{
			$age = strtotime($_POST['age-date'].'-'.$_POST['age-month'].'-'.$_POST['age-year']);

			$params = array('full_name' => $_POST['full_name'],
    						'email' => $_POST['email'],
    						'password' => $_POST['password'],
    						'age' => $age,
    						'profile_id' => $profile_id,
    						'gender' => $_POST['gender']);
			$user_id = $this->User_model->add_user($params);
			
			if($user_id)
			{

				$this->load->library('email');
			    $config['protocol']     = 'smtp';
			    $config['smtp_host']    = 'smtp.zoho.com';
			    $config['smtp_port']    = '465';
			    $config['smtp_user']    = 'admin@bargaincry.com';
			    $config['smtp_pass']    = 'hogo@007';
			    $config['charset']     = 'utf-8';
			    $config['newline']     = "\r\n";
			    $config['mailtype']  = 'text'; // or html
			    $config['validation']  = TRUE; // bool whether to validate email or not

			    // $this->load->library('email');
			    // $config['protocol']     = 'smtp';
			    // $config['smtp_host']    = 'email-smtp.us-east-1.amazonaws.com';
			    // $config['smtp_port']    = '465';
			    // $config['smtp_user']    = 'AKIAJAN77COJ77CT2MWA';
			    // $config['smtp_pass']    = 'Ak24bhQSnN7UT5KgRBzacWJ8H188K9ebFUCPA37tjvgf';
			    // $config['charset']     = 'utf-8';
			    // $config['newline']     = "\r\n";
			    // $config['mailtype']  = 'html'; // or html
			    // $config['validation']  = TRUE; // bool whether to validate email or not
			    
			    $this->email->initialize($config);
				$this->email->set_newline("\n\r");


				$this->email->from('admin@bargaincry.com','Muzammil');
				$this->email->to('mukatuka7@gmail.com');
				$this->email->subject('This is an email check for its working or not');
				$this->email->message('It is working. Great!');

				if($this->email->send())
				{
					echo "you email was sent";
				}
				else
				{
					show_error($this->email->print_debugger());
				}



			// $this->email->from('contact@easynikah.in', 'Easynikah');
			// $this->email->to($params['email']);
			// // $this->email->cc('another@another-example.com');
			// // $this->email->bcc('them@their-example.com');

			// $this->email->subject('Email Test');
			// $this->email->message('Testing the email class.');

			// $this->email->send();


			// if($params['gender']=='male' && $this->email->send())
			// {
			// 	redirect('frontend/groom/edit_profile/'.$user_id);
			// }
			// else if($params['gender']=='female' && $this->email->send())
			// {
			// 	redirect('frontend/bride/edit_profile/'.$user_id);
			// }


			}


			
		}
		else
		{
			$data['view'] = 'frontend/register';
			$this->load->view('frontend/layout/base_layout',$data);
		}
	}

	public function check_if_marital_status_has_children($marital_status_id=0)
	{
		$marital_status = $this->User_model->get_marital_status_by_id($marital_status_id);
		if(!empty($marital_status))
		{
			if($marital_status['marital_status_has_children'])
			{
				$response['marital_status_has_children'] = true;
			}
			else
			{
				$response['marital_status_has_children'] = false;
			}
		}
		echo json_encode($response);
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
		$profile = $this->db->query('SELECT profile_id FROM users ORDER BY profile_id DESC LIMIT 1')->row_array();
		if($profile['profile_id'] < 2000)
		{
			return 2000;
		}
		else{
			return $profile['profile_id']+1;
		}
	}
}
