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
		    						'user_married_sisters' => $_POST['user_married_sisters'],
		    						'user_location_country' => $_POST['user_location_country'],
		    						'user_location_state' => $_POST['user_location_state'],
		    						'user_location_city' => $_POST['user_location_city']
		    						);
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


	public function delete_profile_view($id=0)
	{
		$data['view'] = 'frontend/delete_profile';
		$this->load->view('frontend/layout/base_layout',$data);
	}

	public function delete_profile($id=0)
	{
		$delete_reason = $this->input->post('delete_profile');

		$delete_profile_reason = $this->User_model->delete_reason($id, $delete_reason);

		$user_details = $this->User_model->get_user_by_id($id);
		$full_name = $user_details['full_name'];
		$email = $user_details['email'];
		$verification_id = $user_details['verification_id'];

		if($delete_profile_reason)
		{

			$this->load->library('email');
			    $config['protocol']     = 'smtp';
			    $config['smtp_host']    = 'bh-33.webhostbox.net';
			    $config['smtp_port']    = '587';
			    $config['smtp_user']    = 'info@easynikah.in';
			    $config['smtp_pass']    = 'Tech!1234';
			    $config['charset']     = 'utf-8';
			    $config['newline']     = "\r\n";
			    $config['mailtype']  = 'html'; // or html
			    $config['validation']  = TRUE; // bool whether to validate email or not

			    $this->email->initialize($config);
				$this->email->set_newline("\n\r");


				$message = "As salaamu alaikum wa rehmatullahe wa barakatuhu ".$full_name."<br><br>JazakAllahu khairan for providing us a chance to assist you with partner search at Easy Nikah<br><br>Please <a href='".base_url()."frontend/Groom/delete_verification/".$verification_id."'>click</a> on this link to complete your profile deletion.<br><br><br> Note: Without clicking on confirmation link your profile wont be deleted. <br><br> Best Regards<br>Admin - Easy Nikah";



				$this->email->from('info@easynikah.in','Admin - Easy Nikah');
				$this->email->to($email);
				$this->email->subject('Easy Nikah Profile Deletion');
				$this->email->message($message);

				if($this->email->send())
				{
					$this->session->set_flashdata('message', '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>We have sent a confirmation link on your email for profile deletion. Please click on the link to delete your Easy Nikah profile. </div>');
					redirect('home');
				}
				// else
				// {
				// 	$this->session->set_flashdata('message', '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>We have encountered an issue. Please come back tomorrow to register.</div>');
				// 	$data['view'] = 'frontend/delete_profile';
				// 	$this->load->view('frontend/layout/base_layout',$data);
				// 	// show_error($this->email->print_debugger());
				// }




			// $this->session->set_flashdata('message', '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>We have sent a confirmation link on your email for profile deletion. Please click on the link to delete your Easy Nikah profile.</div>');
			// 		redirect('home');


		}
		// else
		// {

		// }
	}

	public function delete_verification($id)
	{
		$delete_confirmation = $this->User_model->delete_confirmation($id);
		
		if($delete_confirmation)
		{
			
			$this->session->set_flashdata('message', '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> Your profile has been successfully deleted. We thank you for using our services at Easy Nikah for your partner search. Please feel to share your valuable feedbacks or suggestions at easynikaah@gmail.com </div>');
			redirect('home');
		}
	}

}
