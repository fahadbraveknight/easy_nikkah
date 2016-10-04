<?php

class Marital_status_model extends CI_Model {

    public function __construct()
    {
            // Call the CI_Model constructor
            parent::__construct();
    }

    function get_all_marital_statuses()
    {
        return $this->db->get('marital_status')->result_array();
    }

}

?>