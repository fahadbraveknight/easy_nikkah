<?php
class Cities extends CI_Controller {

	var $header_filename = 'admin/template/admin_header.php'; 
	
	var $footer_filename = 'admin/template/admin_footer.php';
	function __construct() {
        parent::__construct();
        
		$is_logged_in = $this->session->userdata('logged_in');
		if(!$is_logged_in)
		{
			redirect(base_url().'admin/admin_login');
		}
		$this->load->model('admin/cities_model');
  	}
	
	public function index()
	{
		$data['cities'] = $this->cities_model->get_list();
		$this->load->view($this->header_filename);
		$this->load->view('admin/cities/cities_list',$data);
		$this->load->view($this->footer_filename);
	}
	
	public function add_city() {
		$state_id 	= $this->input->post('state_id');
		$city_name 	= $this->input->post('city_name');
		$status 	= $this->input->post('status');
		
		$this->form_validation->set_rules('state_id', 'State', 'required');
		$this->form_validation->set_rules('city_name', 'City Name', 'required');
		
		if ($this->form_validation->run() == true) {
			$city_count = count($this->cities_model->get_count($city_name));
			if (!$city_count) {
				$city_data = array(
						'state_id' => $state_id,
						'city_name' => $city_name,
						'city_status' => $status
					);
				
				$this->cities_model->add_city($city_data);
				$this->session->set_flashdata('success','City added successfully !!!');
				redirect(base_url().('admin/cities'));
			} else {
				$this->session->set_flashdata('error','City already exists !!!');
			}
		} else {
			$this->session->set_flashdata('error',validation_errors());
		}
		$data['states'] = $this->cities_model->get_states();
		$this->load->view($this->header_filename);
		$this->load->view('admin/cities/add_city',$data);
		$this->load->view($this->footer_filename);
	}
	
	public function edit_city() {
		$id = $this->uri->segment(4);
		$state_id 	= $this->input->post('state_id');
		$city_name 	= $this->input->post('city_name');
		$status 	= $this->input->post('status');
		
		$this->form_validation->set_rules('state_id', 'State', 'required');
		$this->form_validation->set_rules('city_name', 'City Name', 'required');
		
		if ($this->form_validation->run() == true) {
			$city_data = array(
					'state_id' => $state_id,
					'city_name' => $city_name,
					'city_status' => $status
			);
				
			$this->cities_model->update_city($city_data,$id);
			$this->session->set_flashdata('success','City updated successfully !!!');
			redirect(base_url().('admin/cities'));
		} else {
			$this->session->set_flashdata('error',validation_errors());
		}
		$data['states'] = $this->cities_model->get_states();
		$data['city'] = $this->cities_model->get_city_detail($id);//echo '<PRE>';print_r($data['state']);die;
		$this->load->view($this->header_filename);
		$this->load->view('admin/cities/edit_city',$data);
		$this->load->view($this->footer_filename);
	}
	
	public function change_status() {
		$id = $_GET['id'];
		$status = $_GET['status'];
		$this->cities_model->change_status($id,$status);
		redirect(base_url().'admin/cities');
	}
}
	