<?php

class Groom_model extends CI_Model {

    public function __construct()
    {
            // Call the CI_Model constructor
            parent::__construct();
    }

    function get_groom_by_id($id)
    {

        return $this->db->get_where('users',array('id'=>$id , 'gender'=>'male'))->row_array();
    }

    function edit_groom($id,$params)
    {
        $this->db->where('id',$id);
        return $this->db->update('users',$params);
        
    }

    function get_groom_traits()
    {
        $response = array();
        $response['namaz_types'] = $this->db->get('namaz_types')->result_array();
        $response['beard_types'] = $this->db->get('beard_types')->result_array();
        $response['fasting_types'] = $this->db->get('fasting_types')->result_array();
        $response['marital_status'] = $this->db->get('marital_status')->result_array();
        
        return $response;        
    }
}

?>