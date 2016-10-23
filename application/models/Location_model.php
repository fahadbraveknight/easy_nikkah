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

    function get_valid_countries()
    {
        $sql = "SELECT countries.* 
                From 
                    countries 
                JOIN users on countries.country_id= users.user_location_country
            ";
        return $this->db->query($sql)->result_array();
    }

    function get_valid_states($country_id)
    {
        $sql = "SELECT states.* 
                From 
                    states 
                JOIN users on states.state_id= users.user_location_state
                WHERE 
                    states.country_id=".$country_id;
        return $this->db->query($sql)->result_array();
    }

    function get_valid_cities($state_id)
    {
        $sql = "SELECT cities.* 
                From 
                    cities 
                JOIN users on cities.city_id= users.user_location_city
                WHERE 
                    cities.state_id=".$state_id;
        return $this->db->query($sql)->result_array();
    }

    function get_country_by_name($country)
    {
        return $this->db->get_where('countries',array('country_name' => $country))->row_array();
    }
}

?>