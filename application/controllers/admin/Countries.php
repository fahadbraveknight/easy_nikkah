<?php
class Countries extends CI_Controller {

	var $header_filename = 'admin/template/admin_header.php'; 
	
	var $footer_filename = 'admin/template/admin_footer.php';
	function __construct() {
        parent::__construct();
        
		$is_logged_in = $this->session->userdata('logged_in');
		if(!$is_logged_in)
		{
			redirect(base_url().'admin/admin_login');
		}
		$this->load->model('admin/countries_model');
  	}
	
	public function index()
	{
		$data['countries'] = $this->countries_model->get_list();
		$this->load->view($this->header_filename);
		$this->load->view('admin/countries/countries_list',$data);
		$this->load->view($this->footer_filename);
	}
	
	public function add_country() {
		$country_name 	= $this->input->post('country_name');
		$status 	= $this->input->post('status');
		
		$this->form_validation->set_rules('country_name', 'Country Name', 'required');
		
		if ($this->form_validation->run() == true) {
			$country_count = count($this->countries_model->get_count($country_name));
			if (!$country_count) {
				$country_data = array(
						'country_name' => $country_name,
						'country_status' => $status
					);
				
				$this->countries_model->add_country($country_data);
				$this->session->set_flashdata('success','Country added successfully !!!');
				redirect(base_url().('admin/countries'));
			} else {
				$this->session->set_flashdata('error','Country already exists !!!');
			}
		} else {
			$this->session->set_flashdata('error',validation_errors());
		}
		$this->load->view($this->header_filename);
		$this->load->view('admin/countries/add_country');
		$this->load->view($this->footer_filename);
	}
	
	public function edit_country() {
		$id = $this->uri->segment(4);
		$country_name 	= $this->input->post('country_name');
		$status 	= $this->input->post('status');
		
		$this->form_validation->set_rules('country_name', 'Country Name', 'required');
		
		if ($this->form_validation->run() == true) {
			$country_data = array(
					'country_name' => $country_name,
					'country_status' => $status
			);
				
			$this->countries_model->update_country($country_data,$id);
			$this->session->set_flashdata('success','Country updated successfully !!!');
			redirect(base_url().('admin/countries'));
		} else {
			$this->session->set_flashdata('error',validation_errors());
		}
		$data['country'] = $this->countries_model->get_country_detail($id);//echo '<PRE>';print_r($data['state']);die;
		$this->load->view($this->header_filename);
		$this->load->view('admin/countries/edit_country',$data);
		$this->load->view($this->footer_filename);
	}
	
	public function change_status() {
		$id = $_GET['id'];
		$status = $_GET['status'];
		$this->countries_model->change_status($id,$status);
		redirect(base_url().'admin/countries');
	}
}
	