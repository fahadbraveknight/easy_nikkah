<?php

class Qualification_model extends CI_Model {

    public function __construct()
    {
            // Call the CI_Model constructor
            parent::__construct();
    }

    function get_all_qualifications()
    {
        return $this->db->get('qualifications')->result_array();
    }

}

?>