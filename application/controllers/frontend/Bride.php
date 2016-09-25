<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bride extends CI_Controller {

	function __construct() {
        parent::__construct();
        $this->load->model(array('User_model','Bride_model'));
    }


	public function edit_bride($id=0)
	{
		$bride = $this->Bride_model->get_bride_by_id($id);
		if(isset($bride['id']))
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
				$data['view'] = 'frontend/edit_profile';
				$this->load->view('frontend/layout/base_layout',$data);
			}
		}
		else
		{
			show_error('Invalid Bride');    
		}
		
	}
}
