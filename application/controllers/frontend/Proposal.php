<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Proposal extends CI_Controller {

	function __construct() {
        parent::__construct();
        $this->load->model(array('User_model','Groom_model','Location_model','Profession_model','Qualification_model','Proposal_model'));
    }

	public function index()
	{
		if($this->session->userdata('userid'))
		{
			$data['proposal_sent'] = $this->Proposal_model->get_user_relationships($this->session->userdata('userid'),'awaiting_response',2);
			$data['proposal_requests'] = $this->Proposal_model->get_user_relationships($this->session->userdata('userid'),'awaiting_response',1);

			$data['need_more_time'] = $this->Proposal_model->get_user_relationships($this->session->userdata('userid'),'need_more_time',1);
			$data['proposal_accepted'] = $this->Proposal_model->get_user_relationships($this->session->userdata('userid'),'accepted');
			$data['proposal_declined'] = $this->Proposal_model->get_user_relationships($this->session->userdata('userid'),'declined');
			$data['view'] = 'frontend/inbox';
			// pr($data);exit;
			$this->load->view('frontend/layout/base_layout',$data);
		}
	}

	public function ajax_send_proposal()
	{
		if($this->session->userdata('userid'))
		{
			$relationship = $this->Proposal_model->get_relationship($this->session->userdata('userid') , $_POST['relationship_id']);
			if($this->session->userdata('userid') != $relationship['from_id']){
				$data['user']['id'] = $relationship['from_id'];
			}else{
				$data['user']['id'] = $relationship['to_id'];
			}
			if(empty($relationship) && $_POST['status']='awaiting_response')
			{
				$result = $this->Proposal_model->add_relationship($this->session->userdata('userid'), $_POST['relationship_id']);
				// pr($result);
				if($result)
				{
					$data['relationship'] = $this->Proposal_model->get_relationship($this->session->userdata('userid') , $_POST['relationship_id']);
					$response['html'] = $this->load->view('frontend/partial_view/_proposal_view.php',$data,true);
					$response['rc'] = TRUE;
				}
				else{	
					$response['rc'] = FALSE;
					$response['error'] = "Proposal Failed.";
				}
				
			}
			elseif(!empty($relationship))
			{
				$result = $this->Proposal_model->edit_relationship($this->session->userdata('userid'), $_POST['relationship_id'],$_POST['status']);
				if($result)
				{
					$data['relationship'] = $this->Proposal_model->get_relationship($this->session->userdata('userid') , $_POST['relationship_id']);
					if($data['relationship']['status']=='accepted')
					{
						$data['user_contact_persons'] = $this->User_model->get_user_contact_person($data['user']['id']);
						$response['contact_html'] = $this->load->view('frontend/partial_view/_profile_contact_view.php',$data,true);
					}
					$response['html'] = $this->load->view('frontend/partial_view/_proposal_view.php',$data,true);
					$response['rc'] = TRUE;
				}
				else{	
					$response['rc'] = FALSE;
					$response['error'] = "Action Failed.";
				}
			}
			else{
					$response['rc'] = FALSE;
					$response['error'] = "Action Failed.";			
			}
		}
		echo json_encode($response);
	}

	public function ajax_delete_proposal()
	{
		if($this->session->userdata('userid'))
		{
			$relationship = $this->Proposal_model->get_relationship($this->session->userdata('userid') , $_POST['relationship_id']);
			if(!empty($relationship))
			{
				if($this->session->userdata('userid') != $relationship['from_id']){
					$data['user']['id'] = $relationship['from_id'];
				}else{
					$data['user']['id'] = $relationship['to_id'];
				}
				$result = $this->Proposal_model->delete_relationship($this->session->userdata('userid'), $_POST['relationship_id']);
				if($result)
				{
					$data['relationship'] = $this->Proposal_model->get_relationship($this->session->userdata('userid') , $_POST['relationship_id']);
					$response['html'] = $this->load->view('frontend/partial_view/_proposal_view.php',$data,true);
					$response['rc'] = TRUE;
				}
				else{	
					$response['rc'] = FALSE;
					$response['error'] = "Could not delete relationship.";
				}
				
			}
			else{
					$response['rc'] = FALSE;
					$response['error'] = "No Relationship Exists.";			
			}
		}
		echo json_encode($response);
	}

}
