<?php
class States extends CI_Controller {

	var $header_filename = 'admin/template/admin_header.php'; 
	
	var $footer_filename = 'admin/template/admin_footer.php';
	function __construct() {
        parent::__construct();
        
		$is_logged_in = $this->session->userdata('logged_in');
		if(!$is_logged_in)
		{
			redirect(base_url().'admin/admin_login');
		}
		$this->load->model('admin/states_model');
  	}
	
	public function index()
	{
		$data['states'] = $this->states_model->get_list();
		$this->load->view($this->header_filename);
		$this->load->view('admin/states/states_list',$data);
		$this->load->view($this->footer_filename);
	}
	
	public function add_state() {
		$country_id 	= $this->input->post('country_id');
		$state_name 	= $this->input->post('state_name');
		$status 	= $this->input->post('status');
		
		$this->form_validation->set_rules('country_id', 'Country', 'required');
		$this->form_validation->set_rules('state_name', 'State Name', 'required');
		
		if ($this->form_validation->run() == true) {
			$state_count = count($this->states_model->get_count($state_name));
			if (!$state_count) {
				$state_data = array(
						'country_id' => $country_id,
						'state_name' => $state_name,
						'state_status' => $status
					);
				
				$this->states_model->add_state($state_data);
				$this->session->set_flashdata('success','State added successfully !!!');
				redirect(base_url().('admin/states'));
			} else {
				$this->session->set_flashdata('error','State already exists !!!');
			}
		} else {
			$this->session->set_flashdata('error',validation_errors());
		}
		$data['countries'] = $this->states_model->get_countries();
		$this->load->view($this->header_filename);
		$this->load->view('admin/states/add_state',$data);
		$this->load->view($this->footer_filename);
	}
	
	public function edit_state() {
		$id = $this->uri->segment(4);
		$country_id 	= $this->input->post('country_id');
		$state_name 	= $this->input->post('state_name');
		$status 	= $this->input->post('status');
		
		$this->form_validation->set_rules('country_id', 'Country', 'required');
		$this->form_validation->set_rules('state_name', 'State Name', 'required');
		
		if ($this->form_validation->run() == true) {
			$state_data = array(
					'country_id' => $country_id,
					'state_name' => $state_name,
					'state_status' => $status
			);
				
			$this->states_model->update_state($state_data,$id);
			$this->session->set_flashdata('success','State updated successfully !!!');
			redirect(base_url().('admin/states'));
		} else {
			$this->session->set_flashdata('error',validation_errors());
		}
		$data['countries'] = $this->states_model->get_countries();
		$data['state'] = $this->states_model->get_state_detail($id);//echo '<PRE>';print_r($data['state']);die;
		$this->load->view($this->header_filename);
		$this->load->view('admin/states/edit_state',$data);
		$this->load->view($this->footer_filename);
	}
	
	public function change_status() {
		$id = $_GET['id'];
		$status = $_GET['status'];
		$this->states_model->change_status($id,$status);
		redirect(base_url().'admin/states');
	}
}
	