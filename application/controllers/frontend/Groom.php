<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Groom extends CI_Controller {

	function __construct() {
        parent::__construct();
        $this->load->model(array('User_model','Groom_model','Location_model','Profession_model','Qualification_model','Proposal_model'));
    }

	public function index()
	{
		$data['view'] = 'frontend/index';
		$this->load->view('frontend/layout/base_layout',$data);
	}

	public function edit_profile($id=0)
	{
		$groom = $this->Groom_model->get_groom($id);
		$india = $this->Location_model->get_country_by_name('india');
		if($this->session->userdata('userid') == $id )
		{
			if(isset($groom['id']))
			{
				$this->form_validation->set_rules('full_name', 'Full Name' , 'required|xss_clean');
				$this->form_validation->set_rules('user_height', 'Height' , 'required|trim|xss_clean');
				$this->form_validation->set_rules('user_namaz_type', 'Namaz Type' , 'required|xss_clean');
				$this->form_validation->set_rules('user_beard_type', 'Groom Beard' , 'required|trim|xss_clean');	
				$this->form_validation->set_rules('user_fasting_type', 'Groom Fasting' , 'required|xss_clean');
				$this->form_validation->set_rules('user_father_name', 'Groom Father\'s Name' , 'required|trim|xss_clean');	
				$this->form_validation->set_rules('user_father_profession', 'Groom Father\'s Profession' , 'required|xss_clean');
				$this->form_validation->set_rules('user_mother_name', 'Groom Mother\'s Name' , 'required|trim|xss_clean');
				$this->form_validation->set_rules('user_mother_profession', 'Groom Mother\'s Profession' , 'required|trim|xss_clean');
				$this->form_validation->set_rules('user_work_location_country', 'Work Country' , 'required|trim|xss_clean');
				$this->form_validation->set_rules('user_location_country', 'Current Country' , 'required|trim|xss_clean');
				$this->form_validation->set_rules('user_native_location_country', 'Native Country' , 'required|trim|xss_clean');
				$this->form_validation->set_rules('user_qualification', 'Qualification' , 'required|trim|xss_clean');
				$this->form_validation->set_rules('user_profession', 'Profession' , 'required|trim|xss_clean');
				$this->form_validation->set_rules('user_marital_status', 'Marital Status' , 'required|trim|xss_clean');
				// echo '<pre>';print_r($_POST);exit;
				if(!empty($_POST['contact_person']))
				{
					foreach ($_POST['contact_person'] as $key => $contact) {
						$required = '';
						if($key == 0){$required = 'required|';}
						if($key ==  0 || !empty($contact)){
							$this->form_validation->set_rules('contact_person['.$key.'][contact_person_name]', 'Contact Person Name' , $required .'trim|xss_clean');
							$this->form_validation->set_rules('contact_person['.$key.'][contact_person_email]', 'Contact Person Email' , $required .'valid_email|trim|xss_clean');
							$this->form_validation->set_rules('contact_person['.$key.'][contact_person_phone_no]', 'Contact Person Phone Number' , $required .'trim|xss_clean');
							$this->form_validation->set_rules('contact_person['.$key.'][contact_person_relation]', 'Contact Person Relation' , $required .'trim|xss_clean');
						}
					}
				}

				if(isset($_POST['user_location_country']) && $_POST['user_location_country']==$india['country_id'])
				{
					$this->form_validation->set_rules('user_location_city', 'Current City' , 'required|trim|xss_clean');
					$this->form_validation->set_rules('user_location_state', 'Current State' , 'required|trim|xss_clean');
					// pr($_POST);
				}
				// if(!empty($_POST['family_info']))
				// {		foreach ($_POST['family_info'] as $key => $family) {
				// 		$this->form_validation->set_rules('family_info['.$key.'][family_member_name]', 'Family Member Name' , 'xss_clean');
				// 		$this->form_validation->set_rules('family_info['.$key.'][family_member_relation]', 'Family Member Relation' , 'xss_clean');
				// 		$this->form_validation->set_rules('family_info['.$key.'][family_member_marital_status]', 'Family Member Phone Marital Status' , 'xss_clean');
				// 	}
				// }

				if($this->form_validation->run())
				{
					// if($_POST)
					// echo '<pre>';print_r($_POST);exit;
					$user_work_location = $_POST['user_work_location_city'].'~'.$_POST['user_work_location_state'].'~'.$_POST['user_work_location_country'];
					$user_native_location = $_POST['user_native_location_city'].'~'.$_POST['user_native_location_state'].'~'.$_POST['user_native_location_country'];
					$age = strtotime($_POST['age-date'].'-'.$_POST['age-month'].'-'.$_POST['age-year']);
			
					$params = array('full_name' => $_POST['full_name'],
		    						'user_height' => $_POST['user_height'],
		    						'user_namaz_type' => $_POST['user_namaz_type'],
		    						'age' => $age,
		    						'user_fasting_type' => $_POST['user_fasting_type'],
		    						'user_beard_type' => $_POST['user_beard_type'],
		    						'user_marital_status' => $_POST['user_marital_status'],
		    						'user_children' => $_POST['user_children'],
		    						'user_qualification' => $_POST['user_qualification'],
		    						'user_profession' => $_POST['user_profession'],
		    						'user_father_name' => $_POST['user_father_name'],
		    						'user_mother_name' => $_POST['user_mother_name'],
		    						'user_father_profession' => $_POST['user_father_profession'],
		    						'user_mother_profession' => $_POST['user_mother_profession'],
		    						'user_brothers' => $_POST['user_brothers'],
		    						'user_married_brothers' => $_POST['user_married_brothers'],
		    						'user_sisters' => $_POST['user_sisters'],
		    						'user_married_sisters' => $_POST['user_married_sisters']
		    						);
					if(!empty($_POST['user_location_country'])){$params['user_location_country'] = $_POST['user_location_country']; }
					if(!empty($_POST['user_location_state'])){$params['user_location_state'] = $_POST['user_location_state']; }
					if(!empty($_POST['user_location_city'])){$params['user_location_city'] = $_POST['user_location_city']; }
					if($user_work_location != "  "){$params['user_work_location'] = $user_work_location; }
					if($user_native_location != "  "){$params['user_native_location'] = $user_native_location; }
					$this->Groom_model->edit_groom($id,$params);

					//family functionality
					// $add_user_family = array();
					// $edit_user_family = array();

					// if(!empty($_POST['family_info']))
					// {
					// 	$add_key=0;
					// 	$edit_key=0;
					// 	foreach ($_POST['family_info'] as $key => $family) {
					// 		if($family['id']==0)
					// 		{
					// 			if($family['family_member_name']!=='')
					// 			{
					// 				$add_user_family[$add_key] = $family;
					// 				$add_user_family[$add_key]['user_id'] = $groom['id'];
					// 				$add_key++;
					// 			}
					// 		}
					// 		else
					// 		{
					// 			$edit_user_family[$edit_key] = $family;
					// 			$edit_key++;
					// 		}
					// 	}
					// }

					// if(!empty($add_user_family))
					// 	$this->User_model->add_user_family($add_user_family);
					// if(!empty($edit_user_family))
					// 	$this->User_model->edit_user_family($edit_user_family);

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
					
					$data['qualifications'] = $this->Qualification_model->get_all_qualifications();
					$data['professions'] = $this->Profession_model->get_all_professions();
					$data['groom_family'] = $this->User_model->get_user_family($groom['id']);
					$data['groom_contact_persons'] = $this->User_model->get_user_contact_person($groom['id']);
					$data['groom'] = $groom;
					$data['countries'] = $this->Location_model->get_countries();
					$data['view'] = 'frontend/edit_profile_groom';
					// pr($data);
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
		if($this->session->userdata('userid'))
		{
			$groom = $this->Groom_model->get_groom($id);
			if(!empty($groom))
			{
				if($groom['id'] != $this->session->userdata('userid'))
				{
					$data['relationship'] = $this->Proposal_model->get_relationship($this->session->userdata('userid'),$groom['id']);
				}
				$data['groom'] = $groom;
				$data['groom_family'] = $this->User_model->get_user_family($groom['id']);
				$data['groom_contact_persons'] = $this->User_model->get_user_contact_person($groom['id']);
				// echo '<pre>'; print_r($groom);exit;
				$data['view'] = 'frontend/view_profile';
				$this->load->view('frontend/layout/base_layout',$data);
			}
		}
	}

}
