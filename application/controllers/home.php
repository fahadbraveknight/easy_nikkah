<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct() {
        parent::__construct();
        $this->load->model(array('User_model','Location_model'));
    }

	public function index()
	{
		redirect('frontend/user');
	}
}
