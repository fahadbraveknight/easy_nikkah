<?php

class Qualifications_model extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function get_list() {
        $query = $this->db->select('*')
        				->order_by('qualifications.qualification_id')
        				->get('qualifications');
        return $query->result_array();
    }
    
    function get_count($qualification_name) {
    	$query = $this->db->select('*')
    						->where('qualification_name',$qualification_name)
    						->get('qualifications');
    	return $query->result_array();
    }
    
    function add_qualification($data) {
    	return $this->db->insert('qualifications', $data);
    }
    
    function get_qualification_detail($id) {
    	$query = $this->db->select('*')
    						->where('qualification_id',$id)
    						->get('qualifications');
    	return $query->row_array();
    }
    
    function update_qualification($data,$id) {
		$this->db->where('qualification_id', $id);
		return $this->db->update('qualifications', $data);
    }
}