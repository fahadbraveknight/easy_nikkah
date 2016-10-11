<?php

class Cities_model extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function get_list() {
        $query = $this->db->select('cities.*,states.state_name')
        				->join('states','states.state_id = cities.state_id','left')
        				->order_by('cities.city_id')
        				->get('cities');
        return $query->result_array();
    }
    
	function change_status($id,$status) {
    	$data = array(
    			'city_status' 	=> (($status == 'active') ? 'inactive' : 'active'),
    	);
    	$this->db->where('city_id', $id);
    	return $this->db->update('cities', $data);
    }
    
    function get_states() {
    	$query = $this->db->get('states');
    	return $query->result_array();
    }
    
    function get_count($city_name) {
    	$query = $this->db->select('*')
    						->where('city_name',$city_name)
    						->get('cities');
    	return $query->result_array();
    }
    
    function add_city($data) {
    	return $this->db->insert('cities', $data);
    }
    
    function get_city_detail($id) {
    	$query = $this->db->select('*')
    						->where('city_id',$id)
    						->get('cities');
    	return $query->row_array();
    }
    
    function update_city($data,$id) {
		$this->db->where('city_id', $id);
		return $this->db->update('cities', $data);
    }
}