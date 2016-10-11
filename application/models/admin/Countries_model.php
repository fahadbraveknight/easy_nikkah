<?php

class Countries_model extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function get_list() {
        $query = $this->db->select('*')
        				->order_by('countries.country_id')
        				->get('countries');
        return $query->result_array();
    }
    
	function change_status($id,$status) {
    	$data = array(
    			'country_status' 	=> (($status == 'active') ? 'inactive' : 'active'),
    	);
    	$this->db->where('country_id', $id);
    	return $this->db->update('countries', $data);
    }
    
    function get_count($country_name) {
    	$query = $this->db->select('*')
    						->where('country_name',$country_name)
    						->get('countries');
    	return $query->result_array();
    }
    
    function add_country($data) {
    	return $this->db->insert('countries', $data);
    }
    
    function get_country_detail($id) {
    	$query = $this->db->select('*')
    						->where('country_id',$id)
    						->get('countries');
    	return $query->row_array();
    }
    
    function update_country($data,$id) {
		$this->db->where('country_id', $id);
		return $this->db->update('countries', $data);
    }
}