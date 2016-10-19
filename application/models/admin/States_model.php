<?php

class States_model extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function get_list() {
        $query = $this->db->select('states.*,countries.country_name')
        				->join('countries','countries.country_id = states.country_id','left')
        				->order_by('states.state_id')
        				->get('states');
        return $query->result_array();
    }
    
	function change_status($id,$status) {
    	$data = array(
    			'state_status' 	=> (($status == 'active') ? 'inactive' : 'active'),
    	);
    	$this->db->where('state_id', $id);
    	return $this->db->update('states', $data);
    }
    
    function get_countries() {
    	$query = $this->db->get('countries');
    	return $query->result_array();
    }
    
    function get_count($state_name) {
    	$query = $this->db->select('*')
    						->where('state_name',$state_name)
    						->get('states');
    	return $query->result_array();
    }
    
    function add_state($data) {
    	return $this->db->insert('states', $data);
    }
    
    function get_state_detail($id) {
    	$query = $this->db->select('*')
    						->where('state_id',$id)
    						->get('states');
    	return $query->row_array();
    }
    
    function update_state($data,$id) {
		$this->db->where('state_id', $id);
		return $this->db->update('states', $data);
    }
}