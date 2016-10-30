<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cron extends CI_Controller {

	function __construct() {
        parent::__construct();
        $this->load->model(array('User_model','Location_model'));
    }

	public function reset_proposal_limit()
	{
		$this->User_model->edit_all_user( array('user_proposal_limit' => 0 ));
	}
}
