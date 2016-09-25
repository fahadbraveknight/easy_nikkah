<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Groom extends CI_Controller {

	function __construct() {
        parent::__construct();
        $this->load->model(array('User_model','Groom_model','Location_model'));
    }

	public function index()
	{
		$data['view'] = 'frontend/index';
		$this->load->view('frontend/layout/base_layout',$data);
	}

	public function edit_groom($id=0)
	{
		$groom = $this->Groom_model->get_groom_by_id($id);
		if(isset($groom['id']))
		{
			$this->form_validation->set_rules('full_name', 'Full Name' , 'required');

			if($this->form_validation->run())
			{
				$age = strtotime($_POST['age-date'].'-'.$_POST['age-month'].'-'.$_POST['age-year']);

				$params = array('full_name' => $_POST['full_name'],
	    						'user_height' => $_POST['user_height'],
	    						'user_namaz_type' => $_POST['user_namaz_type'],
	    						'age' => $age,
	    						'user_fasting_type' => $_POST['user_fasting_type'],
	    						'user_beard_type' => $_POST['user_beard_type'],
	    						'user_marital_status' => $_POST['user_marital_status'],
	    						'user_children_status' => $_POST['user_children_status']);
				$this->Groom_model->edit_groom($id,$params);
			}
			else
			{
				$data['groom'] = $groom;
				$data['groom_traits'] = $this->Groom_model->get_groom_traits();
				$data['states'] = $this->Location_model->get_states();
				$data['view'] = 'frontend/edit_profile_groom';
				$this->load->view('frontend/layout/base_layout',$data);
			}
		}
		else
		{
			show_error('Invalid Groom.');    
		}
		
	}
}
