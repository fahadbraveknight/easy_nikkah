<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	function __construct() {
        parent::__construct();
        $this->load->model(array('User_model'));
    }

	public function index()
	{
		$data['view'] = 'frontend/index';
		$this->load->view('frontend/layout/base_layout',$data);
	}

	public function register()
	{
		$this->form_validation->set_rules('full_name', 'Full Name' , 'required');

		if($this->form_validation->run())
		{
			$age = strtotime($_POST['age-date'].'-'.$_POST['age-month'].'-'.$_POST['age-year']);

			$params = array('full_name' => $_POST['full_name'],
    						'email' => $_POST['email'],
    						'password' => $_POST['password'],
    						'age' => $age,
    						'gender' => $_POST['gender']);
			$this->User_model->add_user($params);
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
}
