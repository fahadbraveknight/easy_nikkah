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
    						'gender' => $_POST['gender']);
			$user_id = $this->User_model->add_user($params);
			if($params['gender']=='male')
			{
				redirect('frontend/groom/edit_profile/'.$user_id);
			}
			else if($params['gender']=='female')
			{
				redirect('frontend/bride/edit_profile/'.$user_id);
			}
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
}
