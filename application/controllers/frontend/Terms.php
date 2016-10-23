<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Terms extends CI_Controller {

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
		}
		$data['view'] = 'frontend/terms';
		$this->load->view('frontend/layout/base_layout',$data);
		
	}
}