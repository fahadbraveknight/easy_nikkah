<?php

class Profession_model extends CI_Model {

    public function __construct()
    {
            // Call the CI_Model constructor
            parent::__construct();
    }

    function get_all_professions()
    {
        return $this->db->get('professions')->result_array();
    }
}

?>