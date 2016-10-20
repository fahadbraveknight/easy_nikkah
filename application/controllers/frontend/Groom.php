<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Groom extends CI_Controller {

	function __construct() {
        parent::__construct();
        $this->load->model(array('User_model','Groom_model','Location_model','Profession_model','Qualification_model','Marital_status_model'));
    }

	public function index()
	{
		$data['view'] = 'frontend/index';
		$this->load->view('frontend/layout/base_layout',$data);
	}

	public function edit_profile($id=0)
	{
		$groom = $this->Groom_model->get_groom_by_id($id);
		if($this->session->userdata('userid') == $id )
		{
			if(isset($groom['id']))
			{
				$this->form_validation->set_rules('full_name', 'Full Name' , 'required|xss_clean');
				$this->form_validation->set_rules('user_height', 'Height' , 'required|trim|xss_clean');
				// echo '<pre>';print_r($_POST);exit;
				if(!empty($_POST['contact_person']))
				{
					foreach ($_POST['contact_person'] as $key => $contact) {
						$this->form_validation->set_rules('contact_person['.$key.'][contact_person_name]', 'Contact Person Name' , 'xss_clean');
						$this->form_validation->set_rules('contact_person['.$key.'][contact_person_email]', 'Contact Person Email' , 'trim|xss_clean');
						$this->form_validation->set_rules('contact_person['.$key.'][contact_person_phone_no]', 'Contact Person Phone Number' , 'xss_clean');
						$this->form_validation->set_rules('contact_person['.$key.'][contact_person_relation]', 'Contact Person Relation' , 'trim|xss_clean');
					}
				}

				if(!empty($_POST['family_info']))
				{		foreach ($_POST['family_info'] as $key => $family) {
						$this->form_validation->set_rules('family_info['.$key.'][family_member_name]', 'Family Member Name' , 'xss_clean');
						$this->form_validation->set_rules('family_info['.$key.'][family_member_relation]', 'Family Member Relation' , 'xss_clean');
						$this->form_validation->set_rules('family_info['.$key.'][family_member_marital_status]', 'Family Member Phone Marital Status' , 'xss_clean');
					}
				}

				if($this->form_validation->run())
				{
					// if($_POST)
					// echo '<pre>';print_r($_POST);exit;
					$user_work_location = $_POST['user_work_location_city'].' '.$_POST['user_work_location_state'].' '.$_POST['user_work_location_country'];
					$user_native_location = $_POST['user_native_location_city'].' '.$_POST['user_native_location_state'].' '.$_POST['user_native_location_country'];
					$age = strtotime($_POST['age-date'].'-'.$_POST['age-month'].'-'.$_POST['age-year']);
			
					$params = array('full_name' => $_POST['full_name'],
		    						'user_height' => $_POST['user_height'],
		    						'user_namaz_type' => $_POST['user_namaz_type'],
		    						'age' => $age,
		    						'user_fasting_type' => $_POST['user_fasting_type'],
		    						'user_beard_type' => $_POST['user_beard_type'],
		    						'user_marital_status' => $_POST['user_marital_status'],
		    						'user_children' => $_POST['user_children'],
		    						'user_partner_age_group' => $_POST['user_partner_age_group'],
		    						'user_qualification' => $_POST['user_qualification'],
		    						'user_profession' => $_POST['user_profession'],
		    						'user_personal_description' => $_POST['user_personal_description']
		    						);
					if(!empty($_POST['user_location_country'])){$params['user_location_country'] = $_POST['user_location_country']; }
					if(!empty($_POST['user_location_state'])){$params['user_location_state'] = $_POST['user_location_state']; }
					if(!empty($_POST['user_location_city'])){$params['user_location_city'] = $_POST['user_location_city']; }
					if($user_work_location != "  "){$params['user_work_location'] = $user_work_location; }
					if($user_native_location != "  "){$params['user_native_location'] = $user_native_location; }
					$this->Groom_model->edit_groom($id,$params);

					$add_user_family = array();
					$edit_user_family = array();

					if(!empty($_POST['family_info']))
					{
						$add_key=0;
						$edit_key=0;
						foreach ($_POST['family_info'] as $key => $family) {
							if($family['id']==0)
							{
								if($family['family_member_name']!=='')
								{
									$add_user_family[$add_key] = $family;
									$add_user_family[$add_key]['user_id'] = $groom['id'];
									$add_key++;
								}
							}
							else
							{
								$edit_user_family[$edit_key] = $family;
								$edit_key++;
							}
						}
					}

					if(!empty($add_user_family))
						$this->User_model->add_user_family($add_user_family);
					if(!empty($edit_user_family))
						$this->User_model->edit_user_family($edit_user_family);

					$add_contact_person_params = array();
					$edit_contact_person_params = array();

					if(!empty($_POST['contact_person']))
					{
						$add_key=0;
						$edit_key=0;
						foreach ($_POST['contact_person'] as $key => $contact) {
							if($contact['id']==0 )
							{
								if($contact['contact_person_name']!=='')
								{		
									$add_contact_person_params[$add_key] = $contact;
									$add_contact_person_params[$add_key]['user_id'] = $groom['id'];
									$add_key++;
								}
							}
							else
							{
								$edit_contact_person_params[$edit_key] = $contact;
								$edit_key++;
							}
						}
					}	

					if(!empty($add_contact_person_params))
						$this->User_model->add_user_contacts($add_contact_person_params);
					if(!empty($edit_contact_person_params))
						$this->User_model->edit_user_contacts($edit_contact_person_params);

					redirect('frontend/groom/view_profile/'.$groom['id']);
				}
				else
				{
					$data['user_partner_marital_status'] = array();
					$partner_marital_statuses = $this->User_model->get_user_partner_marital_status($groom['id']);
					foreach ($partner_marital_statuses as $key => $value) {
						array_push($data['user_partner_marital_status'], $value['user_partner_marital_status']);
					}
					$data['qualifications'] = $this->Qualification_model->get_all_qualifications();
					$data['professions'] = $this->Profession_model->get_all_professions();
					$data['groom_family'] = $this->User_model->get_user_family($groom['id']);
					$data['groom_contact_persons'] = $this->User_model->get_user_contact_person($groom['id']);
					$data['groom'] = $groom;
					$data['countries'] = $this->Location_model->get_countries();
					$data['view'] = 'frontend/edit_profile_groom';
					$this->load->view('frontend/layout/base_layout',$data);
				}
			}
			else
			{
				show_error('Invalid Groom.');    
			}
		}
		else
		{
			show_error('Not Authorised to access this page.');
		}	
	}

	public function view_profile($id=0)
	{
		$groom = $this->Groom_model->get_groom($id);
		if(!empty($groom))
		{
			$data['groom'] = $groom;
			$data['groom_family'] = $this->User_model->get_user_family($groom['id']);
			$data['marital_statuses'] = $this->Marital_status_model->get_all_marital_statuses();
			$data['groom_contact_persons'] = $this->User_model->get_user_contact_person($groom['id']);
			// echo '<pre>'; print_r($groom);exit;
			$data['view'] = 'frontend/view_profile';
			$this->load->view('frontend/layout/base_layout',$data);
		}

	}

}
