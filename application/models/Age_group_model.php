<?php

class Age_group_model extends CI_Model {

    public function __construct()
    {
            // Call the CI_Model constructor
            parent::__construct();
    }

    function get_age_groups()
    {
        return  $this->db->get('age_groups')->result_array();
    }
}
?>