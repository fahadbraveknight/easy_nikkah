<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	function __construct() {
        parent::__construct();
        $this->load->model(array('User_model','Location_model','Marital_status_model','Qualification_model','Age_group_model'));
    }

	public function index()
	{
		$data['view'] = 'frontend/index';
		$data['marital_statuses'] = $this->Marital_status_model->get_all_marital_statuses();
		$data['qualifications'] = $this->Qualification_model->get_all_qualifications();
		$data['age_groups'] = $this->Age_group_model->get_age_groups();
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

	public function search()
	{
		$params = $_POST;

		$result = $this->User_model->get_users_by_params($params);
		pr($result);
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
