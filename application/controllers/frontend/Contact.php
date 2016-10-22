<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller {

	function __construct() {
        parent::__construct();
        //$this->load->model(array('User_model','Location_model','Marital_status_model','Qualification_model','Age_group_model'));
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
		$data['view'] = 'frontend/contact';
		//$data['marital_statuses'] = $this->Marital_status_model->get_all_marital_statuses();
		//$data['qualifications'] = $this->Qualification_model->get_all_qualifications();
		//$data['age_groups'] = $this->Age_group_model->get_age_groups();
		//$data['countries'] = $this->Location_model->get_countries();
		$this->load->view('frontend/layout/base_layout',$data);
		
	}
}