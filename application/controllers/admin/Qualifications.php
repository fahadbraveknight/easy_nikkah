<?php
class Qualifications extends CI_Controller {

	var $header_filename = 'admin/template/admin_header.php';

	var $footer_filename = 'admin/template/admin_footer.php';
	function __construct() {
		parent::__construct();

		$is_logged_in = $this->session->userdata('logged_in');
		if(!$is_logged_in)
		{
			redirect(base_url().'admin/admin_login');
		}
		$this->load->model('admin/qualifications_model');
	}

	public function index()
	{
		$data['qualifications'] = $this->qualifications_model->get_list();
		$this->load->view($this->header_filename);
		$this->load->view('admin/qualifications/qualifications_list',$data);
		$this->load->view($this->footer_filename);
	}

	public function add_qualification() {
		$qualification_name 	= $this->input->post('qualification_name');

		$this->form_validation->set_rules('qualification_name', 'Qualification Name', 'required');

		if ($this->form_validation->run() == true) {
			$qualification_count = count($this->qualifications_model->get_count($qualification_name));
			if (!$qualification_count) {
				$qualification_data = array(
						'qualification_name' => $qualification_name
				);

				$this->qualifications_model->add_qualification($qualification_data);
				$this->session->set_flashdata('success','Qualification added successfully !!!');
				redirect(base_url().('admin/qualifications'));
			} else {
				$this->session->set_flashdata('error','Qualification already exists !!!');
			}
		} else {
			$this->session->set_flashdata('error',validation_errors());
		}
		$this->load->view($this->header_filename);
		$this->load->view('admin/qualifications/add_qualification');
		$this->load->view($this->footer_filename);
	}

	public function edit_qualification() {
		$id = $this->uri->segment(4);
		$qualification_name 	= $this->input->post('qualification_name');

		$this->form_validation->set_rules('qualification_name', 'Qualification Name', 'required');

		if ($this->form_validation->run() == true) {
			$qualification_data = array(
					'qualification_name' => $qualification_name
			);

			$this->qualifications_model->update_qualification($qualification_data,$id);
			$this->session->set_flashdata('success','Qualification updated successfully !!!');
			redirect(base_url().('admin/qualifications'));
		} else {
			$this->session->set_flashdata('error',validation_errors());
		}
		$data['qualification'] = $this->qualifications_model->get_qualification_detail($id);//echo '<PRE>';print_r($data['state']);die;
		$this->load->view($this->header_filename);
		$this->load->view('admin/qualifications/edit_qualification',$data);
		$this->load->view($this->footer_filename);
	}
}
