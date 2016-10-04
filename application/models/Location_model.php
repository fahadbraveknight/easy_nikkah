<?php

class Location_model extends CI_Model {

    public function __construct()
    {
            // Call the CI_Model constructor
            parent::__construct();
    }

    function get_states()
    {
        return $this->db->get('states')->result_array();
    }

    function get_cities()
    {
        return $this->db->get('cities')->result_array();
    }

    function get_countries()
    {
        return $this->db->get('countries')->result_array();
    }

    function get_cities_by_state($state_id)
    {
        return $this->db->get_where('cities',array('state_id'=>$state_id))->result_array();
    }

    function get_states_by_country_id($country_id)
    {
        return $this->db->get_where('states',array('country_id'=>$country_id))->result_array();
    }
}

?>